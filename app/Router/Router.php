<?php


class Router {

    //method, path, action, query
    private $action = [];
    private static $actualLeng = ['en', 'ca', 'es', 'fr'];

    public function add($method, $path, $controller, $function, $query = null){
        $action = new Action($controller, $function);
        $this->action[$method.'/'.$path] = [ 'action' => $action, 'query' => $query ];
    }

    private function removeLenguage($url){
        foreach (self::$actualLeng as $l){
            $url = str_replace('/'.$l.'/', '', $url);
        }

        return $url;
    }

    private function removeQuery($url){
        $explode = explode('?', $url);

        return $explode[0];
    }

    private function match($match, $url){
        return $match == $url;
    }

    private function matchQuery($match, $url){
        $exp = explode('/', $url);
        $url = str_replace('/', '#', $url);
        $regExpresion = '/'. str_replace('/', '#', $match) .'/';

        foreach ($this->action[$match]['query'] as $key => $num){
            $this->action[$match]['query'][$key] = $exp[$num];
        }

        return preg_match( $regExpresion, $url );
    }

    public function dispatch($method, $url){
        $url = $this->removeLenguage($url);
        $url = $this->removeQuery($url);
        $url = $method . '/' . $url;
        $url = str_replace('//', '/', $url);

        foreach ($this->action as $path => $act){
            $match = ($act['query'] == null) ? $this->match($path, $url) : $this->matchQuery($path, $url);

            if($match){
                $act['action']->execute();
                die();
                break;
            }
        }

    }

}