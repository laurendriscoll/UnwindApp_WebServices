<?php

require_once(__DIR__ . "/../model/types/Request.php");
require_once(__DIR__ . "/../model/types/Response.php");
require_once(__DIR__ . "/../model/types/Session.php");
require_once(__DIR__ . "/../model/SessionModel.php");
class SessionsController {
    static public function post(Request $request): Response {
        $session = new Session($request->data);
        $response = new Response();

        $result = SessionModel::saveSession($session);

        if (!$result) {
            $response->status = 1;
        }
        return $response;
    }
    
    static public function get(Request $request) : Response {
        $response = new Response();
        $response->data = SessionModel::getSessions();
        return $response;
    }
}