<?php
use Core\Data\SqlDataBase;
use Core\Controller;

class IndexController
{
    public static function index(&$request)
    {
        echo json_encode(array('jonas', 'funcke', '4ahit'));
        print_r($_SESSION);
    }
}
?>