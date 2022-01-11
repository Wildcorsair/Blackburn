<?php

ini_set('display_errors', 'on');

require_once __DIR__ . '/vendor/autoload.php';

use FoxTool\Debra\Core\EntityManager;
use Debra\Entity\User;
use Debra\Entity\Ip;

$em = new EntityManager();
// Method returns single object
$user = $em->setModel(User::class)->find(1);
echo '<pre>';
var_dump($user);
var_dump($em->getQuery());
echo '</pre>';

// Methods return multiple objects
// $users = $em->setModel(User::class)->all();
// $users = $em->setModel(User::class)->where([
//     'id = :id'
// ])->orWhere([
//     'id = :id2'
// ])->orWhere([
//      'login = :login'
// ])->setParams([
//     'id' => 1,
//     'id2' => 2,
//     'login' => 'admin'
// ])->get();

// $ip = $em->setModel(Ip::class)->find(1);

// echo '<pre>';
// var_dump($users);
// var_dump($em->getQuery());
// echo '</pre>';
echo time();
