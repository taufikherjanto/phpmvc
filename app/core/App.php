<?php

class App {
    public function __construct()
    {
        $url = $this->parseUrl();
        var_dump($url);
    }

    public function parseUrl()
    {
        if ( isset($_GET) ) {
            // right trim back slash
            $url = trim($_GET['url'], '/');

            // filter url
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //explode url to array
            $url = explode('/', $url);

            return $url;
        }
    }
}