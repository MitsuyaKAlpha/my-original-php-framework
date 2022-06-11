<?php

class ServerRequest
{
    public $http_method = "";

    public function __construct()
    {
        $this->http_method = $_SERVER['REQUEST_METHOD'];
    }

    public function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getRequestMethod()
    {
        return $this->http_method;
    }

    public function getServerParams()
    {
        return $_POST;
    }

    public function getServerQuerys()
    {
        return $_GET;
    }

    public function getScheme()
    {
        return $_SERVER["REQUEST_SCHEME"];
    }

    public function getPathInfo()
    {
        return $_SERVER['PATH_INFO'];
    }

    public function isSsl()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on") {
            return true;
        }
        
        return false;
    }

    public function getHttpReferer()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    public function getHostName()
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            return $_SERVER['HTTP_HOST'];
        }
        return $_SERVER['SERVER_NAME'];
    }

    public function generatePathInfo()
    {
        $request_uri = $this->getRequestUri();
        $pos = strpos($request_uri, "?");

        if ($pos !== false) {
            $path_info = substr($request_uri, 0, $pos);
        } else {
            $path_info = $request_uri;
        }

        return $path_info;
    }
}
