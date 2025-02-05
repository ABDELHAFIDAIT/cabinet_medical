<?php

require_once __DIR__ .'./User.php';

class Patient extends User{
    // Constructor
    public function __construct($id,$nom,$prenom,$email,$password,$role='Patient',$status,$date_inscription){
        parent::__construct($id,$nom,$prenom,$email,$password,$role='Patient',$status,$date_inscription);
    }
}