<?php

namespace App\Models;

use App\Models\User;

class Patient extends User{
    // Constructor
    public function __construct($id,$nom,$prenom,$email,$password,$role='Patient',$status,$date_inscription){
        parent::__construct($id,$nom,$prenom,$email,$password,$role='Patient',$status,$date_inscription);
    }
}