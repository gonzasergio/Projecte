<?php


class Action {

    private $controller;
    private $method;

    public function __construct($controller, $method) {

        try {
            $this->setController($controller);
            $this->setMethod($method);
        } catch (Exception $e) {
            $this->controller = 'ErrorController';
            $this->method = 'actionError';
        }
    }

    public function setController($controller){
        if(class_exists($controller) and is_subclass_of($controller, 'Controller'))
            $this->controller = $controller;
        else
            throw new Exception('Invalid Controller');
    }

    public function setMethod($method){
        if(method_exists($this->controller, $method))
            $this->method = $method;
        else
            throw new Exception('Method no exist');
    }

    public function execute(){
        $controller = new $this->controller();
        $method = $this->method;
        $controller->$method(null);
    }

}