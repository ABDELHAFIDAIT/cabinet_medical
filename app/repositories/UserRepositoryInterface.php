<?php

interface UserRepositoryInterface
{
    public function getUser($email);
    public function login($email, $password);
}