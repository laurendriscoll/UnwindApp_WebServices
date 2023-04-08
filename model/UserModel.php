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

    static public function deleteUser(int $user_id) {
        $sql = "DELETE FROM tblUsers WHERE user_id = ?";
        Database::executeSql($sql, "i", array($user_id));
        return !isset(Database::$lastError);
    }
    static public function editUser(User $user) {
        $sql = "UPDATE tblUsers SET username = ?, password = ? WHERE user_id = ?";
        Database::executeSql($sql, "ssi", array($user->username, $user->password, $user->user_id));
        return !isset(Database::$lastError);
    }
}