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
        $this->link = new mysqli(DB::$host, DB::$user, DB::$password, DB::$database);
        $this->link->set_charset("utf8");
    }

    public function get_all_photos() {
        $sql_result = $this->link->query("SELECT * FROM `photos` order by `id` DESC");
        if ($sql_result->num_rows) {
            return $sql_result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }


    public function get_user_photos($uid) {
        $sql_result = $this->link->query("SELECT * FROM `photos` where `uid` = $uid order by `id` DESC ");
        if ($sql_result->num_rows) {
            return $sql_result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }




    public function check_user($login, $password) {
        $sql_result = $this->link->query("SELECT * FROM `users` WHERE `name` = '$login' AND `password` = '$password'");
        if ($sql_result->num_rows) {
            $user = $sql_result->fetch_assoc();
            return $user["id"];
        }
        return false;
    }

    public function new_user($login, $password) {
        $this->link->query("INSERT INTO `users` (name, password) values ('$login', '$password' ) ");
    }

    public function check_login($login) {
        $sql_result = $this->link->query("SELECT * FROM `users` WHERE `email` = '$login'");
        if ($sql_result->num_rows) {
            return true;
        }
        return false;
    }


    public function new_photo ($uid, $image, $text) {
        $this->link->query("INSERT INTO `photos` (uid, image, text, tags) VALUES ( $uid, '$image', '$text', '')");
    }
}
