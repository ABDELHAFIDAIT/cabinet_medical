<?php

namespace App\Repositories;

use App\Models\Medecin;
use App\Repositories\UserRepository;
use Core\Database;
use PDO;
use PDOException;

class MedecinRepository extends UserRepository
{
    // Properties
    private $infos_table = 'infos_medecin';

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    public function getMedecinById($id){
        try {
            $query = "SELECT * 
                    FROM $this->table 
                    JOIN roles ON $this->table.id_role = roles.id_role
                    JOIN $this->infos_table ON $this->table.id_user = $this->infos_table.id_medecin
                    WHERE id_user = :id AND roles.label = :label";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindValue(':label', 'Medecin');
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                $medecin =  new Medecin(
                    $result['id_user'], 
                    $result['nom'], 
                    $result['prenom'], 
                    $result['email'], 
                    $result['password'], 
                    $result['label'], 
                    $result['status'], 
                    $result['date_inscription'],
                    $result['speciality'],
                    $result['experience']
                );
                return $medecin;
            }else{
                return null;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error getting medecin from the database.");
        }
    }


    public function getAllMedecins(){
        try {
            $query = "SELECT * 
                    FROM $this->table 
                    JOIN roles ON $this->table.id_role = roles.id_role
                    JOIN $this->infos_table ON $this->table.id_user = $this->infos_table.id_medecin
                    WHERE roles.label = :label";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':label', 'Medecin');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $medecins = [];
            foreach($result as $medecin){
                $medecins[] = new Medecin(
                    $medecin['id_user'], 
                    $medecin['nom'], 
                    $medecin['prenom'], 
                    $medecin['email'], 
                    $medecin['password'], 
                    $medecin['label'], 
                    $medecin['status'], 
                    $medecin['date_inscription'],
                    $medecin['speciality'],
                    $medecin['experience']
                );
            }
            return $medecins;
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error getting medecins from the database.");
        }
    }
}