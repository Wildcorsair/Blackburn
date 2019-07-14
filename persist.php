<?php

ini_set('display_errors', 'on');

require_once __DIR__ . '/vendor/autoload.php';

use Debra\Core\EntityManager;
use Debra\Entity\User;

// INSERT example
//$em = new EntityManager();
//$em->setModel(User::class);
//
//$user = new User();
//$user->setLogin('jora2');
//$user->setPassword('qwerty2');
//$user->setEmail('jora2@mail.ru');
//
//$em->persist($user);

// UPDATE example
$em = new EntityManager();
$user = $em->setModel(User::class)->find(2);
$user->setLogin('joppppppaaa2');
$user->setPassword('qwertyaaa2');
$user->setEmail('jora-papa2@mail.ru');

$em->persist($user);

var_dump($em->getQuery());