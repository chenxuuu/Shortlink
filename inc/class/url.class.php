<?php
    class url {
        function __construct() {
            global $conn;
            $this->conn = $conn;
        }
        // 生成短地址
        public function set_url($url, $size = 4) {
            $id = $this->get_id($url);
            if(!$id) {
                $id = $this->create_id($url, $size);
                if(!mysqli_query($this->conn,"INSERT INTO urls(id,data)VALUES('$id','$url')")){
                    exit('get url error'.mysqli_error($this->conn));
                }
            }
            $s_url = get_uri() . $id;
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
        public function get_url($id) {
            $check_query = mysqli_query($this->conn,"select data from urls where id='$id' limit 1");
            if(!$check_query){
                return false;
            }
            $result = mysqli_fetch_array($check_query,MYSQLI_ASSOC);
            if($result){
                return $result["data"];
            }
            else{
                return false;
            }
        }
    }
?>
