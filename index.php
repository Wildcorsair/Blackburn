<?php

ini_set('display_errors', 'on');

require_once __DIR__ . '/vendor/autoload.php';

use Debra\Core\EntityManager;
use Debra\Entity\User;

//$em = new EntityManager();
//$users = $em->setModel(User::class)->findAll();
//$user = $em->setModel('Lango\Entity\User')->findById(2);

$em = new EntityManager();
// $users = $em->setModel(User::class)->all();
// $users = $em->setModel(User::class)->find(2);
// $users = $em->setModel(User::class)->where([
//     'id = :id',
//     // 'login = :login'
// ])->orWhere([
//     'id = :id2',
//     // 'login = :login2'
// ])->setParams([
//     'id' => 1,
//     // 'login' => 'admi',
//     'id2' => 2,
//     // 'login2' => 'manager'
// ])->get();

$user = new User();
$user->setEmail('jora@mail.ru');

$em->persist($user);

echo '<pre>';
// var_dump($users[0]->getEmail());
var_dump($users);
var_dump($em->getQuery());
echo '</pre>';

//foreach ($users as $user) {
//    echo $user->getLogin() . '<br>';
//}
