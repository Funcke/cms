<?php
  return [
    'base_url' => '/', #please do only add subfolders
    '' => [
      'GET' =>'IndexController::index'
    ],
    'signup' => [
      'GET' => 'SessionController::show_signup_form'
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
    ],
    'vocab/new' => [
      'GET' => 'VocabController::new'
    ],
    'vocab' => [
      'GET' => 'VocabController::all',
      'POST' => 'VocabController::create'
    ],
    'vocab/show' => [
      'GET' => 'VocabController::show'
    ],
    'vocab/train' => [
      'GET' => 'VocabController::start_quiz',
      'POST' => 'VocabController::control'
    ]
  ];