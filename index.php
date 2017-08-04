<?php

ini_set('display_errors', 'on');

require_once __DIR__ . '/vendor/autoload.php';

use Lango\Core\EntityManager;
use Lango\Core\EntityManagerV2;
use Lango\Entity\User;

//$em = new EntityManager();
//$users = $em->setModel(User::class)->findAll();
//$user = $em->setModel('Lango\Entity\User')->findById(2);

$em = new EntityManagerV2();
$users = $em->setModel(User::class)->all();

echo '<pre>';
// var_dump($users[0]->getEmail());
var_dump($users);
echo '</pre>';

//foreach ($users as $user) {
//    echo $user->getLogin() . '<br>';
//}
