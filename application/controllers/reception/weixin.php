<<?php

define('TOKEN','chuanxiphp');
$webChat = new WeChat();
//判断是否设置了随机字符串
if(isset($_GET['echostr'])){
    $webChat->valid();
}else{
    $webChat->responseMsg();
}

class WeChat{
    public function valid(){
        $echostr = $_GET['echostr'];
        if($this->check()){
            echo $echostr;
            exit;
        }
    }
    //验证:signature中的字符串，是否是TOKEN,timestamp,nonce组合在一起，加密的结果
    public function check(){
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $token = TOKEN;
        $tmpArr = array($token,$timestamp,$nonce);//组合成一个数组
        sort($tmpArr,SORT_STRING);//排序
        $tmpStr = implode($tmpArr);//组合成一个字符串
        $tmpStr = sha1($tmpStr);//sha1加密
        if($signature == $tmpStr){//比较signature和加密后的字符串是否相等
            return true;//返回true,验证通过
        }else{
            return false;
        }
    }

    //获取客户端提交过来的数据，返回数据
    public function responseMsg()
    {
        $postData = $GLOBALS['HTTP_RAW_POST_DATA'];//此变量仅在碰到未识别 MIME 类型的数据时产生。
        if (!empty($postData)) {
            $postObj = simplexml_load_string($postData, 'SimpleXMLElement', LIBXML_NOCDATA);
            $type = $postObj->MsgType;
            switch($type){
                case "text":
                    $this->replyText($postObj);
                    break;
                case "image":
                    break;
                case "video":
                    $this->replyVideo($postObj);
                    break;
                case "voice":
                    break;
                case "location":
                    break;
                case "link":
                    break;
                default:
                    echo "";
                    break;
            }
        }else {
            echo "";
            exit;
        }
    }

    //回复文本信息
    public function replyText($postObj){
        $from = $postObj->FromUserName;
        $to = $postObj->ToUserName;
        $key = trim($postObj->Content);
        $time = time();
        if($key == "时间"){
            $content = date("Y-m-d H:i:s 星期:w",time());
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[text]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        </xml>";
            $result = sprintf($textTpl,$from,$to,$time,$content);
            echo $result;
        }elseif($key == "音乐"){
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[music]]></MsgType>
                        <Music>
                        <Title><![CDATA[下定决心忘记你]]></Title>
                        <Description><![CDATA[下定决心忘记你]]></Description>
                        <MusicUrl><![CDATA[http://1.chuanxiphp.applinzi.com/music/xdjxwjn.mp3]]></MusicUrl

>
                        <HQMusicUrl><![CDATA[http://1.chuanxiphp.applinzi.com/music/xdjxwjn.mp3]]></HQMusicUrl

>
                        </Music>
                        </xml>";
            $result = sprintf($textTpl,$from,$to,$time);
            echo $result;
        }

    }
    public function replyImg($postObj){
        $from = $postObj->FromUserName;
        $to = $postObj->ToUserName;



}
    public function replyVideo($postObj){
        $from = $postObj->FromUserName;
        $to = $postObj->ToUserName;
        $mediaId = $postObj->MediaId;
        $time = time();
        $textTpl = "<xml><ToUserName><![CDATA[toUser]]></ToUserName>
        <FromUserName><![CDATA[fromUser]]></FromUserName>
        <CreateTime>12345678</CreateTime>
        <MsgType><![CDATA[video]]></MsgType>
     <Video>
     <MediaId><![CDATA[media_id]]></MediaId>
        <Title><![CDATA[title]]></Title>
        <Description><![CDATA[description]]></Description>
    </Video></xml>";
        $result = sprintf($textTpl,$from,$to,$time,$mediaId);
        echo $result;
    }

}
