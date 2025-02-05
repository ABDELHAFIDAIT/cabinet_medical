<?php

abstract class User{
    // Properties
    protected int | null $id;
    protected string | null $nom;
    protected string | null $prenom;
    protected string | null $email;
    protected string | null $password;
    protected string | null $role;
    protected string | null $status;
    protected string | null $date_inscription;
    

    // Constructor
    public function __construct($id,$nom,$prenom,$email,$password,$role,$status,$date_inscription){
        $this->id=$id;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
        $this->status=$status;
        $this->date_inscription=$date_inscription;
    }

    // Getters
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getDateInscription(){
        return $this->date_inscription;
    }


    // Setters
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setDateInscription($date_inscription){
        $this->date_inscription = $date_inscription;
    }
}