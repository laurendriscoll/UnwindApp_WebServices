<?php
require_once(__DIR__ . "/../model/UserModel.php");
require_once(__DIR__ . "/../model/types/User.php");
require_once(__DIR__ . "/../model/types/Request.php");
require_once(__DIR__ . "/../model/types/Response.php");
require_once(__DIR__ . "/../lib/Security.php");


class UsersController {
    static public function post(Request $request) : Response {
        $user = new User($request->data);
        $user->password = getHashedPassword($user->password);
        print_r($user);
        $response = new Response();
        if (UserModel::createUser($user)) {
            $response->status = 0;
        }
        else {
            $response->status = 1;
        }
        return $response;
    }
}