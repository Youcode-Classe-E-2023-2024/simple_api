<?php

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $user = $this->model('User');

        $this->view('home', $user->getAll());
    }
}
