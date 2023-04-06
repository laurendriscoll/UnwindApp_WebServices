<?php
require_once(__DIR__ . "/Database.php");
require_once(__DIR__ . "/types/User.php");
class UserModel {
    static public function createUser(User $user) : bool {
        $sql = "INSERT INTO tblUsers (username, password) VALUES (?, ?)";

        Database::executeSql($sql, "ss", array($user->username, $user->password));

        return ! isset(Database::$lastError);
    }

    static public function getUser($username) : User {
        $sql = "select * from tblUsers where username = ?";
        $results = Database::executeSql($sql, "s", array($username));
        $user = new User($results[0]);
        return $user;
    }
}