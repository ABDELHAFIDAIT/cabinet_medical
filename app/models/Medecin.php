<?php

require_once __DIR__ .'./User.php';

class Medecin extends User{
    // Properties
    private string | null $speciality;
    private int | null $experience;


    // Constructor
    public function __construct($id,$nom,$prenom,$email,$password,$role='Medecin',$status,$date_inscription,$speciality,$experience){
        parent::__construct($id,$nom,$prenom,$email,$password,$role='Medecin',$status,$date_inscription);
        $this->speciality = $speciality;
        $this->experience = $experience;
    }


    // Getters
    public function getSpeciality(){
        return $this->speciality;
    }
    public function getExperience(){
        return $this->experience;
    }


    // Setters
    public function setSpeciality($speciality){
        $this->speciality = $speciality;
    }
    public function setExperience($experience){
        $this->experience = $experience;
    }

}