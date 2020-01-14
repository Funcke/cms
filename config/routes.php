<?php
  return [
    'base_url' => '/', #please do only add subfolders
    '' => [
      'GET' =>'IndexController::index'
    ],
    'authenticate' => [
      'GET' => 'SessionController::create',
      'POST' => 'SessionController::login',
      'PUT' => 'SessionController::login'
    ],
    'authenticate/logout' => [
      'GET' => 'SessionController::logout'
    ],
    'profile' => [
      'GET' => 'ProfileController::view'
    ],
    'profile/edit' => [
      'GET' => 'ProfileController::edit',
      'POST' => 'ProfileController::update'
    ],
    'admin' => [
      'GET' => 'AdminController::view'  
    ]
  ];