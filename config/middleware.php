<?php
  return [
   #please do only add subfolders
    'authenticate/logout' => [
        'Middleware::CheckLogin'
    ],
    'profile' => [
        'Middleware::CheckLogin'
    ],
    'profile/edit' => [
        'Middleware::CheckLogin'
    ],
    'admin' => [
        'Middleware::CheckLogin'
    ],
    'vocab' => [
        'Middleware::CheckLogin'
    ],
    'vocab/import' => [
        'Middleware::CheckLogin'
    ],
    'vocab/new' => [
        'Middleware::CheckLogin'
    ],
    'vocab/show' => [
        'Middleware::CheckLogin'
    ],
    'vocab/train' => [
        'Middleware::CheckLogin'
    ],
    'chat' => [
        'Middleware::CheckLogin'
    ],
    'chat/load' => [
        'Middleware::CheckLogin'
    ],
    'chat/refresh' => [
        'Middleware::CheckLogin'
    ]
  ];