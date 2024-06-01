<?php

namespace Photos;
use mysqli;

class DB {
    static $host = "localhost";
    static $user = "root";
    static $password = "";
    static $database = "photos";
    public $link;

    public function __construct() {
        $this->link = new mysqli(self::$host, self::$user, self::$password, self::$database);
        $this->link->set_charset("utf8");
    }

    public function get_all_photos() {
        $sql_result = $this->link->query("SELECT * FROM `photos` ORDER BY `id` DESC");
        if ($sql_result->num_rows) {
            return $sql_result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function get_user_photos($uid) {
        $sql_result = $this->link->query("SELECT * FROM `photos` WHERE `uid` = $uid ORDER BY `id` DESC");
        if ($sql_result->num_rows) {
            return $sql_result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function check_user($login, $password) {
        $sql_result = $this->link->query("SELECT * FROM `users` WHERE `email` = '$login' AND `password` = '$password'");
        if ($sql_result->num_rows) {
            $user = $sql_result->fetch_assoc();
            return $user["id"];
        }
        return false;
    }

    public function new_user($login, $password) {
        $this->link->query("INSERT INTO `users` (name, password, email) VALUES ('', '$password', '$login')");
    }

    public function check_login($login) {
        $sql_result = $this->link->query("SELECT * FROM `users` WHERE `email` = '$login'");
        if ($sql_result->num_rows) {
            return true;
        }
        return false;
    }

    public function new_photo($uid, $image, $text) {
        $this->link->query("INSERT INTO `photos` (uid, image, text, name) VALUES ($uid, '$image', '$text', '')");
    }

    public function get_photo_by_id($photo_id) {
        $sql_result = $this->link->query("SELECT `p`.*, `u`.`name` FROM `photos` `p` LEFT JOIN `users` `u` ON `u`.`id` = `p`.`uid` WHERE `p`.`id` = '$photo_id'");
        if ($sql_result->num_rows) {
            return $sql_result->fetch_assoc();
        }
        return false;
    }

    public function get_photo_comments($photo_id) {
        $sql_result = $this->link->query("SELECT `c`.*, `u`.`name` FROM `comments` `c` LEFT JOIN `users` `u` ON `u`.`id` = `c`.`uid` WHERE `c`.`pid` = {$photo_id}");
        if ($sql_result->num_rows) {
            return $sql_result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function add_comment($photo_id, $user_id, $text) {
        $stmt = $this->link->prepare("INSERT INTO `comments` (pid, uid, text, post_date) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iis", $photo_id, $user_id, $text);
        $stmt->execute();
        $stmt->close();
    }
}
