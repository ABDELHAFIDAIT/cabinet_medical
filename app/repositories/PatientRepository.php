<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Repositories\UserRepository;
use Core\Database;
use PDO;
use PDOException;

class PatientRepository extends UserRepository
{
    // Constructor
    public function __construct()
    {
        parent::__construct();
    }


    // Methods
    public function getPatientById($id){
        try {
            $query = "SELECT * 
                    FROM $this->table 
                    JOIN roles ON $this->table.id_role = roles.id_role
                    WHERE id_user = :id AND roles.label = :label";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindValue(':label', 'Patient');
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                $patient =  new Patient(
                    $result['id_user'], 
                    $result['nom'], 
                    $result['prenom'], 
                    $result['email'], 
                    $result['password'], 
                    $result['label'], 
                    $result['status'], 
                    $result['date_inscription']
                );
                return $patient;
            }else{
                return null;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error getting patient from the database.");
        }
    }

    public function getAllPatients(){
        try {
            $query = "SELECT * 
                    FROM $this->table 
                    JOIN roles ON $this->table.id_role = roles.id_role
                    WHERE roles.label = :label";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':label', 'Patient');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $patients = [];
            foreach($result as $row){
                $patient =  new Patient(
                    $row['id_user'], 
                    $row['nom'], 
                    $row['prenom'], 
                    $row['email'], 
                    $row['password'], 
                    $row['label'], 
                    $row['status'], 
                    $row['date_inscription']
                );
                array_push($patients,$patient);
            }
            return $patients;
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error getting patients from the database.");
        }
    }
}