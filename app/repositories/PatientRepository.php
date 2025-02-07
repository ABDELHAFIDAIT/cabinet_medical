<?php

require_once __DIR__ . './UserRepository.php';
require_once __DIR__ . './../core/Database.php';

class PatientRepository extends UserRepository
{
    // Constructor
    public function __construct(Database $db)
    {
        parent::__construct($db);
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
}