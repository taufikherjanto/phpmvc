<?php

class App {
    // property default
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // get parse url
        $url = $this->parseUrl();
        
        // check existed controller
        if( file_exists('../app/controllers/' . $url[0] .'.php'))  {
            $this->controller = $url[0];

            // remove first element array url
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller .'.php';
        $this->controller = new $this->controller;

        // method
        if ( isset($url[1])) {
            if( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if( !empty($url) ) {
            $this->params = array_values($url);
        }

        // run controller & method, include sent params if existed
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if ( isset($_GET['url']) ) {
            // right trim back slash
            $url = trim($_GET['url'], '/');

            // filter url
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //explode url to array
            $url = explode('/', $url);

            return $url;
        }
        else {
            $url = [$this->controller];
            return $url;
        }
    }
}