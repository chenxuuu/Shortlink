<?php
    class url {
        function __construct() {
            global $conn;
            $this->conn = $conn;
        }
        //精简url
        public function tiny_url($url){
            if(stripos($url,"HTTP://") === 0)
                $url = substr($url,7,strlen($url));
            if(stripos($url,"HTTPS://") === 0)
                $url = substr($url,8,strlen($url));
            $d = strrpos($url,"#");
            if($d)
                $url = substr($url,0,$d);
            if(substr($url, strlen($url) - 1) == '/') $url = substr($url,0,strlen($url) - 1);
            return $url;
        }
        // 生成短地址
        public function set_url($url, $size = 4) {
            global $config;
            $url = $this->tiny_url($url);
            $id = $this->get_id($url);
            if(!$id) {
                $id = $this->create_id($url, $size);
                $time = date("Y-m-d H:i:s");
                if(!mysqli_query($this->conn,"INSERT INTO urls(id,data,time)VALUES('$id','$url','$time')")){
                    exit('get url error'.mysqli_error($this->conn));
                }
            }
            $s_url = $id;
            if($config['url'] != "")//自定义前缀
            {
                $hurl = $config['url'];
                if(substr($hurl, strlen($hurl) - 1) != '/') $hurl .= '/';
                $s_url = $hurl . $s_url;
            }
            else
            {
                $s_url = get_uri() . $s_url;
            }
            return $s_url;
        }
        // 生成地址 ID
        public function create_id($url, $size = 4) {
            $str = "";
            for($i=0;$i<$size;$i++)
            {
                $str .= mb_chr(rand(19968, 40869));
            }
            // 重复 ID 检测
            if($this->get_url($str)) {
                return $this->create_id($url, $size+1);
            } else {
                return $str;
            }
            return $str;
        }
        // 查询 ID 号
        public function get_id($url) {
            $check_query = mysqli_query($this->conn,"select id from urls where data='$url' limit 1");
            if(!$check_query){
                return false;
            }
            $result = mysqli_fetch_array($check_query,MYSQLI_ASSOC);
            if(!$result){
                return false;
            }
            else{
                return $result["id"];
            }
        }
        // 查询目标地址
        public function get_url($id,$update = false) {
            $check_query = mysqli_query($this->conn,"select * from urls where id='$id' limit 1");
            if(!$check_query){
                return false;
            }
            $result = mysqli_fetch_array($check_query,MYSQLI_ASSOC);
            if($result){
                if($update)//是否更新日期
                {
                    $time = date("Y-m-d H:i:s");
                    mysqli_query($this->conn,"update urls set time='$time' where id='$id'");
                }
                else
                {
                    $date1 = strtotime($result["time"]);
                    $date2 = strtotime(date("Y-m-d H:i:s"));
                    $days =abs(round(($date1 - $date2) / 86400));
                    if($days > get_expiry())//超过设定时间，删除
                    {
                        mysqli_query($this->conn,"delete from urls where id='$id'");
                        return false;
                    }
                }
                return $result["data"];
            }
            else{
                return false;
            }
        }
    }
?>
