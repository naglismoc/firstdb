<?php

class User{
    public $id;
    public $name;
    public $surname;
    public $email;
    public $phoneNumber;

    public function __construct($id, $name, $surname, $email, $phoneNumber) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public function toString()
    {
        # code...
    }

    public static function save($conn){
        print_r($conn);
        $stmt = $conn->prepare("INSERT INTO users (name, surname, email, phone_number) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phoNo'],);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}