<?php
  return [
   #please do only add subfolders
    '' => [
      'GET' =>'IndexController::index'
    ],
    'signup' => [
      'GET' => 'SessionController::show_signup_form',
      'POST' => 'SessionController::signup'
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
    'vocab' => [
      'GET' => 'VocabController::all',
      'POST' => 'VocabController::create'
    ],
    'vocab/import' => [
      'POST' => 'VocabController::import'
    ],
    'vocab/new' => [
      'GET' => 'VocabController::new'
    ],
    'vocab/show' => [
      'GET' => 'VocabController::show'
    ],
    'vocab/train' => [
      'GET' => 'VocabController::start_quiz',
      'POST' => 'VocabController::control'
    ],
    'chat' => [
      'GET' => 'ChatController::index',
      'POST' => 'ChatController::send'
    ],
    'chat/load' => [
      'GET' => 'ChatController::show'
    ],
    'chat/refresh' => [
      'GET' => 'ChatController::recieve_update',
      'POST' => 'ChatController::recieve_update'
    ]
  ];