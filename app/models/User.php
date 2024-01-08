<?php

class User
{
    public $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function getAll() {
        return ['name' => 'Foobar'];
    }
}