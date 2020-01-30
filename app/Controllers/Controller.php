<?php


class Controller {

    protected $DAO;


    protected function arrayToJson($json){
        $array = [];

        foreach ($json as $u)
            $array[] = $u->toArray();

        return json_encode($array);
    }
}