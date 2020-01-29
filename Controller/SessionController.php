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
    
    public static function show_signup_form(Request &$request)
    {
        self::render('session/signup', $request, array('title' => 'Create a new User', $request->params));
    }

    public static function signup(Request &$request)
    {
        if($request->params['password'] === $request->params['password_rep']) 
        {
            $user = new User();
            $user->Email = $request->params['email'];
            $user->Password = password_hash($request->params['password'], PASSWORD_DEFAULT);
            if($user->store() !== 0) {
                unset($request->session['template']);
                
                $_SESSION['logedin'] = User::find(array(
                    'Email' => $user->Email
                ))[0]->id;
                if($request->params['remember'])
                    $request->cookies['remember'] = $user->id;
                header('Location: /profile?id='.($_SESSION['logedin']));
             } else {
                $request->session['template'] = array('email' => $request->params['email'], 'password' => $request->params['password']);
                header('Location: /authenticate');
            }
        }
    }

    public static function login(Request &$request)
    {
        error_reporting(E_ALL);
        $user = User::find(
            array(
                'Email' => $request->params['email']
            )
        )[0];
        if(is_object($user) == 1 && password_verify($request->params['password'], $user->Password) == 1) {
            $_SESSION['logedin'] = $user->id;
            //if($request->params['remember'])
            //    $request->cookies['remember'] = $user->id;
            header('Location: '.(array_key_exists('origin', $request->params)? $request->params['origin'] : '/'));
        } else {
            header('Location: /authenticate');
        }
    }
    
    public static function logout(Request &$request) 
    {
        unset($_SESSION['logedin']);
        header('Location: /');
    }
}