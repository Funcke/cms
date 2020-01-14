<?php

use Core\Controller;
use Core\Request;
use Models\User;

class AdminController extends Controller 
{

	public static function view(Request &$request)
	{
		error_reporting(E_ALL);
		self::render('admin/view', $request, array(
			'title' => 'Admin Page', 
			'users' => User::all()));
	}
	
}