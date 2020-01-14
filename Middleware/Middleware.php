<?php
class Middleware
{
    public static function CheckLogin(&$request)
    {
        if(!array_key_exists('logedin', $request->session))
        {
            http_response_code(403);
            exit();
        }
    }
    
    public static function allowIfNotAuthenticated(&$request)
    {
        if(array_key_exists('logedin', $request->session))
            header('Location: /blog/');
    }
}