<?php
use Core\Controller;
use Core\Request;
use Core\PageUtils;
use Models\User;

class ProfileController extends Controller
{
	public static function view(Request &$request)
	{
		$user = User::findById($request->params['id']);
		if($user !== null)
			self::render('profile/view', $request, array('title' => 'Profile', 'user' => $user));
		else
			PageUtils::renderErrorPage(array('code' => '404', 'message' => 'User could not be found!'));
	}
	
	public static function edit(Request &$request) 
	{
		$user = User::findById($request->params['id']);
		if($user !== null)
			self::render('profile/edit', $request, array('title' => 'Edit '.$user->Username, 'user' => $user));
		else
			PageUtils::renderErrorPage(array('code' => '404', 'message' => 'User could not be found!'));
	}
	
	public static function update(Request &$request)
	{
		$user = User::findbyId($request->params['id']);
		if($user !== null && ($request->params['password'] == $request->params['repeat'])) {
			$user->Username = $request->params['username'];
			$user->Firstname = $request->params['firstname'];
			$user->Lastname = $request->params['lastname'];
			$user->Email = $request->params['email'];
			$user->Password = password_hash($request->params['password'], PASSWORD_DEFAULT);
			$user->Description = $request->params['description'];
			$user->update();
			header('Location: /blog/profile?id='.$request->params['id']);
		} else
			PageUtils::renderErrorPage(array('code' => '404', 'message' => 'User  could not be found'));
	}
}