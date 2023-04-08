<?php

require_once(__DIR__ . "/../model/types/Request.php");
require_once(__DIR__ . "/../model/types/Response.php");
require_once(__DIR__ . "/../model/types/Session.php");
require_once(__DIR__ . "/../model/SessionModel.php");
class SessionsController {
    static public function post(Request $request): Response {
        $session = new Session($request->data);
        $response = new Response();

        if (SessionModel::saveSession($session)){
            $response->status = 0;
        }
        else {
            $response->status = 1;
        }
        return $response;
    }
    
    static public function get(Request $request) : Response {
        $response = new Response();
        $response->data = SessionModel::getSessions($request->id);
        return $response;
    }

    static public function put(Request $request) : Response {
        $session = new Session($request->data);
        $response = new Response();

        if (SessionModel::updateSession($session)){
            $response->status = 0;
        }
        else {
            $response->status = 1;
        }
        return $response;
    }

    static public function delete(Request $request) : Response {
        $response = new Response();
        $result = SessionModel::deleteSession($request->id);

        if ($result){
            $response->status = 0;
        }
        else {
            $response->status = 1;
        }
        return $response;
    }
}