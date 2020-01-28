<?php
use Core\Data\SqlDataBase;
use Core\Controller;

class IndexController extends Controller
{
    public static function index(&$request)
    {
        self::render('index/index', $request, array('title' => 'Welcome to CMS!'));
    }
}
?>