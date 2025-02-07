<?php

require_once __DIR__ .'./RepositoryInterface.php';
require_once __DIR__ .'./../../core/Database.php';


class UserRepository implements RepositoryInterface
{
    // Properties
    protected $db;
    protected $table = 'users';


    // Constructor
    public function __construct(Database $db)
    {
        $this->db = Database::getInstance()->getConnection();
    }


    // Methods Implementation
    public function getUser($email)
    {
        try {
            $query = "SELECT * 
                    FROM $this->table JOIN roles ON $this->table.id_role = roles.id_role
                    WHERE email = :email";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$result){
                return null;
            }else{
                $user =  new User(
                    $result['id_user'], 
                    $result['nom'], 
                    $result['prenom'], 
                    $result['email'], 
                    $result['password'], 
                    $result['label'], 
                    $result['status'], 
                    $result['date_inscription']
                );
                return $user;
            }
            
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error getting user from the database.");
        }
    }

    public function checkUserStatus($status){
        if($status === 'Actif'){
            return true;
        }else{
            return false;
        }
    }

    public function login($email, $password)
    {
        $user = $this->getUser($email);
        if($user){
            $isActif = $this->checkUserStatus($user->getStatus());
            if($isActif){
                if(password_verify($password, $user->getPassword())){
                    return $user;
                }else{
                    echo '<script>alert("Mot de Passe Incorrecte !");</script>';
                    return false;
                }
            }else{
                echo '<script>alert("Votre Compte est Inactif !");</script>';
                return false;
            }
        }else{
            echo '<script>alert("Aucun utilisateur trouvé avec cet email !");</script>';
            return false;
        }
    }
}