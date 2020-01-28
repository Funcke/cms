<?php
use Core\Data\SqlDataBase;
use Core\Controller;

class IndexController
{
    public static function index(&$request)
    {
        header('Location: /chat');
    }
}
?>