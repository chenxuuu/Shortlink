<?php
    class url {
        function __construct() {
            global $db_c;
            $this->db = $db_c;
        }
        // 生成短地址
        public function set_url($url, $size = 4) {
            $id = $this->get_id($url);
            if(!$id) {
                $id = $this->create_id($url, $size);
                $ip = get_ip();
                $ua = get_ua();
                $this->db->insert('urls', 'id, url, ip, ua', "'$id', '$url', '$ip', '$ua'");
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
            return $str;
        }
        // 查询 ID 号
        public function get_id($url) {
            $result = $this->db->query('urls', "WHERE url = '$url'");
            (count($result) > 0) ? $opt = $result[0]['id'] : $opt = false;
            return $opt;
        }
        // 查询目标地址
        public function get_url($id) {
            $result = $this->db->query('urls', "WHERE id = '$id'");
            (count($result) > 0) ? $opt = $result[0]['url'] : $opt = false;
            return $opt;
        }
        // 检测 ID 是否已经存在
        public function has_id($id) {
            $result = $this->db->query('urls', "WHERE id = '$id'");
            (count($result) > 0) ? $opt = true : $opt = false;
            return $opt;
        }
        // 清空短地址
        public function clean_urls() {
            $del = $this->db->delete('urls');
            if($del) return true;
            return false;
        }
    }
?>
