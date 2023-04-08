<?php
require_once(__DIR__ . "/Base.php");
class User extends Base {
    public $user_id, $username, $password;

    public function __construct($sourceObject){
        parent::__construct($sourceObject);
    }


}