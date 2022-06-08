<?php

include 'User.php';
include 'Comment.php';

$user1 = new User(111, 'name1', 'example@mail.ru', '12345678');
$user2 = new User(222, 'name2', 'example@mail.ru', '12345678');
$user3 = new User(333, 'name3', 'example@mail.ru', '12345678');

sleep(15);

$filterDate = new DateTime('now');

sleep(15);

$user4 = new User(444, 'name4', 'example@mail.ru', '12345678');
$user5 = new User(555, 'name5', 'example@mail.ru', '12345678');
$user6 = new User(666, 'name6', 'example@mail.ru', '12345678');

echo $user1->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";
echo $user2->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";
echo $user3->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";
echo $user4->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";
echo $user5->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";
echo $user6->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";

$comments = [];

$comments[] = new Comment($user1, "Comment1");
$comments[] = new Comment($user2, "Comment2");
$comments[] = new Comment($user3, "Comment3");
$comments[] = new Comment($user4, "Comment4");
$comments[] = new Comment($user5, "Comment5");
$comments[] = new Comment($user6, "Comment6");

foreach ($comments as $comment) 
{
    if ($comment->getUser()->getCreationDateTime() > $filterDate) 
    {
        echo $comment->getMessage()."<br>";
    }
}