<?php
require_once(__DIR__ . "/../model/UserModel.php");
require_once(__DIR__ . "/../model/types/User.php");


function getHashedPassword($password){
    return password_hash($password, PASSWORD_DEFAULT);

}

function verifyPassword($clearPassword, $hashedPassword){
    return password_verify($clearPassword, $hashedPassword);
}

function authenticate($username, $password){
    $user = UserModel::getUser($username);
    if (verifyPassword($password, $user->password)){
        return $user;
    }
    else {
        return null;
    }
}