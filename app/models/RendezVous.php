<?php

namespace App\Models;

use App\Models\Medecin;
use App\Models\Patient;

class RendezVous{
    // Properties
    private ?int $id;
    private ?string $date_rdv;
    private ?bool $status_rdv;
    private ?string $motif; 
    private Medecin $medecin;
    private Patient $patient;

    // Constructor
    public function __construct($id,$motif,$date_rdv,$status_rdv,Medecin $medecin,Patient $patient){
        $this->id=$id;
        $this->motif=$motif;
        $this->date_rdv=$date_rdv;
        $this->status_rdv=$status_rdv;
        $this->medecin=$medecin;
        $this->patient=$patient;
    }


    // Getters
    public function getId(){
        return $this->id;
    }
    public function getMotif(){
        return $this->motif;
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
    public function setMotif($motif){
        $this->motif = $motif;
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