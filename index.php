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
$users = $em->setModel(User::class)->find(2);

echo '<pre>';
// var_dump($users[0]->getEmail());
var_dump($users);
echo '</pre>';

//foreach ($users as $user) {
//    echo $user->getLogin() . '<br>';
//}
