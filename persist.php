<?php

ini_set('display_errors', 'on');

require_once __DIR__ . '/vendor/autoload.php';

use Debra\Core\EntityManager;
use Debra\Entity\User;

// INSERT example
// $em = new EntityManager();
// $em->setModel(User::class);
//
// $user = new User();
// $user->setLogin('Paul Connor');
// $user->setPassword('12345678');
// $user->setEmail('paul-connor@gmail.com');

// UPDATE example
$em = new EntityManager();
$user = $em->setModel(User::class)->find(4);
$user->setLogin('Paul Connor');
// $user->setPassword('12345678');
$user->setEmail('paul.connor@gmail.com');

$em->persist($user);

var_dump($em->getQuery());
