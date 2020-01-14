<?php
use Core\Controller;
use Core\Request;
use Models\User;

class SessionController extends Controller
{
    public static function create(Request &$request)
    {
        self::render('session/new', $request, array('title' => 'Welcome to my Blog!', $request->params));
    }
    
    public static function login(Request &$request)
    {
        $user = User::find(
            array(
                'email' => $request->params['email']
            )
        )[0];
        if(is_object($user) && password_verify($request->params['password'], $user->Password)) {
            $request->session['logedin'] = $user->id;
            if($request->params['remember'])
                $request->cookies['remember'] = $user->id;
            header('Location: '.(array_key_exists('origin', $request->params)? $request->params['origin'] : '/blog/'));
        } else {
            header('Location: /blog/authenticate');
        }
    }
    
    public static function logout(Request &$request) 
    {
        unset($request->session['logedin']);
        header('Location: /blog/');
    }
}