<?php

class RendezVous{
    // Properties
    private int | null $id;
    private string | null $date_rdv;
    private bool | null $status_rdv;

    // Constructor
    public function __construct($id,$date_rdv,$status_rdv){
        $this->id=$id;
        $this->date_rdv=$date_rdv;
        $this->status_rdv=$status_rdv;
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

    // Setters
    public function setDateRdv($date_rdv){
        $this->date_rdv = $date_rdv;
    }
    public function setStatusRdv($status_rdv){
        $this->status_rdv = $status_rdv;
    }

}