<?php

require_once __DIR__ .'./UserRepositoryInterface.php';
require_once __DIR__ .'./../../core/Database.php';


class UserRepository implements UserRepositoryInterface
{
    // Properties
    private $db;
    private $table = 'users';


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
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, '../../logs/errors.log');
            throw new PDOException("Error getting user from the database.");
        }
    }

    public function login($email, $password)
    {
        
    }
}