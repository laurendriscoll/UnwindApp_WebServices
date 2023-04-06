<?php

class Request {
    public $data, $id, $param;

    public function __construct($data = null, int $id = null,string $param = null ) {
        $this->id = $id;
        $this->data = $data;
        $this->param = $param;
    }

}