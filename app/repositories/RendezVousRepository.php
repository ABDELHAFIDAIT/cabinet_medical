<?php

namespace App\Repositories;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\RendezVous;
use Core\Database;
use PDO;
use PDOException;

class RendezVousRepository {
    // Properties
    private $db;
    private $table = 'rendez_vous';

    // Constructor
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    
    }


    // Methods
    // add a new rendez-vous
    public function addRendezVous(RendezVous $rdv){
        try {
            $query = "INSERT INTO $this->table (motif, date_rdv, status_rdv, id_medecin, id_patient)
                    VALUES (:motif, :date_rdv, :status_rdv, :id_medecin, :id_patient)";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':motif', $rdv->getMotif());
            $stmt->bindValue(':date_rdv', $rdv->getDateRdv());
            $stmt->bindValue(':status_rdv', $rdv->getStatusRdv());
            $stmt->bindValue(':id_medecin', $rdv->getMedecin()->getId());
            $stmt->bindValue(':id_patient', $rdv->getPatient()->getId());
            $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error adding rendez-vous to the database.");
        }
    }


    // get all rendez-vous of a medecin
    public function getRendezVousOfMedecin(Medecin $medecin) {
        try {
            $query = "
                SELECT rdv.id_rdv, rdv.motif, rdv.date_rdv, rdv.status_rdv, 
                       user.id_user, user.nom, user.prenom, user.email, user.password, 
                       user.label, user.status, user.date_inscription
                FROM $this->table rdv
                JOIN users user ON user.id_user = rdv.id_patient
                WHERE rdv.id_medecin = :id
            ";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $medecin->getId());
            $stmt->execute();
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($results) {
                $rendez_vous = [];
                foreach ($results as $result) {
                    $patient = new Patient(
                        $result['id_user'],
                        $result['nom'],
                        $result['prenom'],
                        $result['email'],
                        $result['password'],
                        $result['label'],
                        $result['status'],
                        $result['date_inscription']
                    );

                    $rdv = new RendezVous(
                        $result['id_rdv'],
                        $result['motif'],
                        $result['date_rdv'],
                        $result['status_rdv'],
                        $medecin,
                        $patient
                    );

                    array_push($rendez_vous, $rdv);
                }
                return $rendez_vous;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error getting all rendez-vous from the database.");
        }
    }


    // get all rendez-vous of a patient
    public function getRendezVousOfPatient(Patient $patient) {
        try {
            $query = "SELECT *
                    FROM $this->table
                    JOIN users ON $this->table.id_medecin = users.id_user
                    JOIN infos_medecin ON users.id_user = infos_medecin.id_medecin
                    WHERE id_patient = :id";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $patient->getId());
            $stmt->execute();
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($results) {
                $rendez_vous = [];
                foreach ($results as $result) {
                    $medecin = new Medecin(
                        $result['id_user'],
                        $result['nom'],
                        $result['prenom'],
                        $result['email'],
                        $result['password'],
                        'Medecin',
                        $result['status'],
                        $result['date_inscription'],
                        $result['speciality'],
                        $result['experience']
                    );

                    $rdv = new RendezVous(
                        $result['id_rdv'],
                        $result['motif'],
                        $result['date_rdv'],
                        $result['status_rdv'],
                        $medecin,
                        $patient
                    );

                    array_push($rendez_vous, $rdv);
                }
                return $rendez_vous;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error getting all rendez-vous from the database.");
        }
    }


    // confirm a rendez-vous
    public function confirmRDV(RendezVous $rdv) {
        try {
            $query = "UPDATE $this->table
                    SET status_rdv = 'Confirmé'
                    WHERE id_rdv = :id";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $rdv->getId());
            $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error approving rendez-vous in the database.");
        }
    }


    // cancel a rendez-vous
    public function cancelRDV(RendezVous $rdv) {
        try {
            $query = "UPDATE $this->table
                    SET status_rdv = 'Annulé'
                    WHERE id_rdv = :id";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $rdv->getId());
            $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error cancelling rendez-vous in the database.");
        }
    }
    
}