<?php

require_once __DIR__ . './UserRepository.php';
require_once __DIR__ . './../core/Database.php';

class MedecinRepository extends UserRepository
{
    // Properties
    private $infos_table = 'infos_medecin';

    // Constructor
    public function __construct(Database $db)
    {
        parent::__construct($db);
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
}