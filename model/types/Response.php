<?php

class Response {
    public $data, $status, $error;

    public function __construct($data = null, $status = 0, $error = null){
        $this->data = $data;
        $this->status = $status; // 1
        $this->error = $error; // "Name of the field contains vulgar language"

        if ($error !== null && $status === 0) {
            $this->status = -1;
        }

    }

}