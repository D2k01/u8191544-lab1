<?php

include "../vendor/autoload.php";
include "User.php";

use \Symfony\Component\Validator\ValidatorBuilder;

function userValidate(User $user): void 
{
    $validator = (new ValidatorBuilder())->addMethodMapping('loadValidatorMetadata')->getValidator();

    $errors = $validator->validate($user);

    if (count($errors) > 0)
    {
        echo 'User\'\s data is invalid';
        foreach($errors as $error)
        {
            echo $error->getMessage().'<br>';
        }
    }
    else {
        echo 'User\'\s data is valid';
    }
}

$users = [];

$users[] = new User(1, 'user1', 'user1@mail.ru', 'qwerty11');
$users[] = new User(-1, 'user2', 'user2@mail.ru', 'qwerty22');
$users[] = new User(3, 'us', 'user1@mail.ru', 'qwerty33');
$users[] = new User(4, 'user4', 'user', 'qwerty44');
$users[] = new User(1, 'user1', 'user1@mail.ru', 'qwerty');

foreach ($users as $user) {
    userValidate($user);
}