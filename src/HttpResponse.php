<?php

class HttpResponse
{
    /**
     * 
     */
    public $status_line = "HTTP/1.1 200 OK";

    /**
     * 
     */
    public $status_code = 200;

    /**
     * 
     */
    public $status_text = "OK";


    /**
     * 
     */
    public $headers = [
        "Content-Type" => "text/html; charset=UTF-8",
        "Set-Cookie" => [],
    ];

    /**
     * 
     */
    public const CONTENT_TYPE = [
        "html" => "text/html",
        "json" => "application/json",
    ];

    /**
     * 
     */
    public $body = "";

    /**
     * 
     */
    public function writeStatusLine(int $status_code = 200, string $status_text = "OK")
    {
        $this->status_code = $status_code;
        $this->status_text = $status_text;
    }

    /**
     * 
     */
    public function setContentType($content_type)
    {
        $this->headers["Content-Type"] = $content_type;
    }

    /**
     * 
     */
    public function setCookie($name, $value, $expires, $path)
    {
        $this->headers["Set-Cookie"][$name] = $value;
        /**
         * $this->cookies[] = sprintf("Set-Cookie: %s=%s", $name, $value);
         */
    }

    /**
     * 
     */
    public function writeBody($body)
    {
        $this->body = $body;
    }

    /**
     * 
     */
    public function emitResponse()
    {
        header($this->status_line);

        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }

        echo $this->body;
    }

    /**
     * 
     */
    public function redirectTo($uri)
    {
        header('Location: ' . $uri, true, 302);
        exit 0;    
    }
}
