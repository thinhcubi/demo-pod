<?php

namespace App;

class Student
{
    public int $id;
    public string $name;
    public string $email;
    public string $address;
    public int $phone;

    public function __construct($item)
    {
        $this->id = $item['id'];
        $this->name = $item['name'];
        $this->email = $item['email'];
        $this->address = $item['address'];
        $this->phone = $item['phone'];
    }
    public function getId(): int
    {
        return $this->id;
    }
}
