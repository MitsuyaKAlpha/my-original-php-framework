<?php

class HttpResponse
{
    /**
     * 
     */
    public $headers = [];

    /**
     * 
     */
    public $body = "";

    /**
     * 
     */
    public function emitResponse()
    {
        foreach ($this->headers as $key => $value) {
            echo "$key: $value";
        }

        echo $this->body;
    }
}
