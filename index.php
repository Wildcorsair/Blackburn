<?php

ini_set('display_errors', 'on');

require_once __DIR__ . '/vendor/autoload.php';

use Debra\Core\EntityManager;
use Debra\Entity\User;

$em = new EntityManager();
//$users = $em->setModel(User::class)->all();
//$users = $em->setModel(User::class)->find(1);
$users = $em->setModel(User::class)->where([
    'id = :id'
])->orWhere([
    'id = :id2'
])->orWhere([
     'login = :login'
])->setParams([
    'id' => 1,
    'id2' => 2,
    'login' => 'admin'
])->get();

//$user = new User();
//$user->setEmail('jora@mail.ru');
//
//$em->persist($user);

echo '<pre>';
var_dump($users);
var_dump($em->getQuery());
echo '</pre>';
