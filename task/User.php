<?php

include "../vendor/autoload.php";

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User {

    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private DateTime $creationDTime;


    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints("id", [new Assert\NotBlank(), new Assert\Length(['min' => 1]), new Assert\Positive()]);
        $metadata->addPropertyConstraints("name", [new Assert\NotBlank(), new Assert\Length(['min' => 3])]);
        $metadata->addPropertyConstraints("email", [new Assert\NotBlank(), new Assert\Email()]);
        $metadata->addPropertyConstraints("password", [new Assert\NotBlank(), new Assert\Length(['min' => 8])]);
    }

    public function __construct(int $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;        
        $this->email = $email;
        $this->password = $password;
        $this->creationDTime = new DateTime('now');
    }

    public function getCreationDateTime(): DateTime
    {
        return $this->creationDTime;
    }

}



