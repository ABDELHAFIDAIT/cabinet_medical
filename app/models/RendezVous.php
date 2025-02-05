<?php

require_once __DIR__ .'./Medecin.php';
require_once __DIR__ .'./Patient.php';

class RendezVous{
    // Properties
    private int | null $id;
    private string | null $date_rdv;
    private bool | null $status_rdv;
    private Medecin $medecin;
    private Patient $patient;

    // Constructor
    public function __construct($id,$date_rdv,$status_rdv,Medecin $medecin,Patient $patient){
        $this->id=$id;
        $this->date_rdv=$date_rdv;
        $this->status_rdv=$status_rdv;
        $this->medecin=$medecin;
        $this->patient=$patient;
    }


    // Getters
    public function getId(){
        return $this->id;
    }
    public function getDateRdv(){
        return $this->date_rdv;
    }
    public function getStatusRdv(){
        return $this->status_rdv;
    }
    public function getMedecin(){
        return $this->medecin;
    }
    public function getPatient(){
        return $this->patient;
    }

    // Setters
    public function setDateRdv($date_rdv){
        $this->date_rdv = $date_rdv;
    }
    public function setStatusRdv($status_rdv){
        $this->status_rdv = $status_rdv;
    }
    public function setMedecin(Medecin $medecin){
        $this->medecin = $medecin;
    }
    public function setPatient(Patient $patient){
        $this->patient = $patient;
    }

}