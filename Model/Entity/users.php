<?php

class users {
    private $id;
    private string $username;
    private string $password;
    private string $email;
    private string $firstName ;
    private string $lastName ;
    private int $newsletter;

    private  int $phoneNumber;

    public function __construct($id, $username, $password, $email, $firstName, $lastName, $newsletter) {
}
}