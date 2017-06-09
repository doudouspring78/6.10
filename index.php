<?php
$WX = new WeiXin();
if(isset($_GET['echostr'])){
    $WX->checkSignature();
}else{
    $WX->responseMsg();
}

class WeiXin{
    public function checkSignature(){
        $token = 'weixin';
        $nonce = $_GET['nonce'];
        $timestamp = $_GET['timestamp'];
        $echostr = $_GET['echostr'];
        $signature = $_GET['signature'];

        $arr = array($token,$nonce,$timestamp);
        sort($arr,SORT_STRING);
        $res = sha1(implode($arr));
        if($str==$signature){
            echo $echostr;
            exit;
        }else{
            return '{"errcode":-1;"errmsg":"failed"}';
        }
    }
    public function responseMsg(){
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        $postObj = simplexml_load_string($postArr,'SimpleXMLElement',LIBXML_NOCDATA);
        if( strtolower($postObj->MsgType) == 'event' ){
            if( strtolower($postObj->Event) == 'subscribe' ){
                $this->responseSubscribe($postObj);
            }
        }
        if( strtolower($postObj->MsgType) == 'text' && trim($postObj->Content)=='图文' ){
            $MsgArray=array(
                    'Title'=>'百度嘿嘿嘿',
                    'Description'=>"哈哈哈哈哈哈哈",
                    'PicUrl'=>'https://www.baidu.com/img/bd_logo1.png',
                    'Url'=>'https://www.baidu.com/',
            );
            $this->responseNews($postObj,$MsgArray);
        }else if($postObj->MsgType=='text' && preg_match('/library:\n(d{10})+\n(\w+)/',$postObj->Content,$match)){
             $username = $match[1];
             $password = $match[2];
             $this->responselibrary($username,$password,$Content);

         }
    }
    public function responseNews($postObj,$MsgArray){
        $ToUser = $postObj->FromUserName;
        $FromUser = $postObj->ToUserName;
        $Time = time();
        $Template = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <ArticleCount>".count($MsgArray)."</ArticleCount>
                        <Articles>";
        
        $Template .="<item>
                        <Title><![CDATA[".$MsgArray['Title']."]]></Title> 
                        <Description><![CDATA[".$MsgArray['Description']."]]></Description>
                        <PicUrl><![CDATA[".$MsgArray['PicUrl']."]]></PicUrl>
                        <Url><![CDATA[".$MsgArray['Url']."]]></Url>
                        </item>";
        $Template .="</Articles>
                    </xml> ";
        echo sprintf($Template,$ToUser,$FromUser,$Time);

    }
    public function responseSubscribe($postObj){
        $Content = "欢迎关注\n回复:图文(可查看网页)\n回复学号+密码(可查看图书馆借阅记录)";
        $this->responseText($postObj,$Content);
    }
    public function responselibrary(){
        $url='127.0.0.1/library/api.php?username=$username&password=$password';
        $res = file_get_contents($url);
        $res = json_decode($res,true);
        if($res['code'] == 0) {
            $Content = '';
            for($i = 0;$i < (count($res['data'])>15?15:count($res['data']) );$i++) {
                $Content .= $res['data'][$i]['bookname'] ."\n操作:".$res['data'][$i]['caozuo']."\n时间：".$res['data'][$i]['deadline']."\n-------------------------------------\n";
            }
            $this->responseText($postObj, $Content);
        }else{
            $Content = $res['data'];
            $this->responseText($postObj,$Content);
        }
    }

    public function getAccess_token(){
      if(isset($_SESSION['access_token']) && $_SESSION['expire_time']>time()){
            return $_SESSION['access_token'];
        }else{
            $AppId = 'wxe93771a4a9d70355';
            $AppSecret = '68ad7adecf65e01133d04be24f0c2fdf';
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$AppId.'&secret='.$AppSecret;
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            $res = curl_exec($ch);
            curl_close($ch);
            $res = json_decode($res,true);
            $access_token = $res['access_token'];
            $_SESSION['access_token'] = $access_token;
            $_SESSION['expire_time'] = $res['expire_in']+time();
            return $access_token;
        }
    }
}

// TH4OBzljyFWT5joV7S2xAcavNE6EQ5AXjivdhnChlZJ3K9nCx-ObJOSH20gkRQ3foTXXZnvlF6JKR9c39Zd4OOVMytGrYf12JVDdM2RK-dQZCVfAHAUXQ
?>

