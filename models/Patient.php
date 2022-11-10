<?php

// Database class to connect instance on DBase
require_once(__DIR__ . '/../helpers/functions/Database.php');

class Patient
{

    // private || protected || public    
    /// example protected =  class Example extends Father ... then use protected on father soo childrens can access it
    // private var with underscore to be better identified

    private int $_id;
    private string $_firstname;
    private string $_lastname;
    private string $_phone;
    private string $_birthdate;
    private string $_email;

    // empty construct, opted to use getters and setters directly
    public function __construct()
    {
    }
    // GETTER/SETTER
    public function setId(int $id): void
    {
        $this->_id = $id;
    }
    public function getId(): int
    {
        return $this->_id;
    }

    public function setFirstname(string $firstname): void
    {
        $this->_firstname = $firstname;
    }
    public function getFirstname(): string
    {
        return $this->_firstname;
    }

    public function setLastname(string $lastname): void
    {
        $this->_lastname = $lastname;
    }
    public function getLastname(): string
    {
        return $this->_lastname;
    }

    public function setPhone(string $phone): void
    {
        $this->_phone = $phone;
    }
    public function getPhone(): string
    {
        return $this->_phone;
    }

    public function setBirthdate(string $birthdate): void
    {
        $this->_birthdate = $birthdate;
    }
    public function getBirthdate(): string
    {
        return $this->_birthdate;
    }

    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }
    public function getEmail(): string
    {
        return $this->_email;
    }
    // END -- GETTER/SETTER

    public function add()
    {
        $pdo = Database::getInstance(); // //   call of public static method of 'Database' class to connect DBase
        $sql = "INSERT INTO `patients`(`firstname`,`lastname`,`birthdate`,`phone`,`email`) 
                VALUES (:firstname,:lastname,:birthdate,:phone,:email)";
        // nominativ marker ( : )   'var' sql, interact with prepare method of pdo, and protect malware SQL injections 
        // interrogativ marker ( ? )
        //statement e.g. communications with database
        // stmt || sth
        $stmt = $pdo->prepare($sql);
        // bindParam - rare  - as  if was 'var' so it can change later.
        // bindValue - affect definitvly, accept a 3rd parameter...
        // ...3rd param. to be precised if var type != string ( more used: PDO::PARAM_INT and PARAM_STR)
        $stmt->bindValue(':firstname', $this->getFirstname());
        $stmt->bindValue(':lastname', $this->getLastname());
        $stmt->bindValue(':birthdate', $this->getBirthdate());
        $stmt->bindValue(':phone', $this->getPhone());
        $stmt->bindValue(':email', $this->getEmail());
         // the method runs and also get its result its returned, boolean, used to test sucess/fail
        if($stmt->execute()){
            return intval($pdo->lastInsertId());
        } else {
            return false;
        }
    }

    public function edit(int $id)
    {
        $pdo =  Database::getInstance();
        $sql = "UPDATE `patients` SET 
                `firstname` = :firstname,
                `lastname` = :lastname,
                `birthdate` = :birthdate,
                `phone` = :phone,
                `email` = :email
                WHERE `id` = $id;
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':firstname', $this->getFirstname());
        $stmt->bindValue(':lastname', $this->getLastname());
        $stmt->bindValue(':birthdate', $this->getBirthdate());
        $stmt->bindValue(':phone', $this->getPhone());
        $stmt->bindValue(':email', $this->getEmail());
        if($stmt->execute()){
            return $id;
        } else {SessionFlash::set(true,'Le patient a bien etais edite');
            return false;
        }
    }

    public static function delete(int $id):bool    
    {
        $pdo = Database::getInstance();
        $sql = "DELETE FROM `patients` WHERE `id` = $id;";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute();
    }

    public static function emailExist(string $email): bool
    {
        try {
            $pdo = Database::getInstance();
            $sql = 'SELECT `patients`.`id` FROM `patients` WHERE `email` = :email';
            $stmt = $pdo->prepare($sql);  // return a object of the class PDOStatement..   statment handle
            $stmt->bindValue(':email', $email);
            $isTrueStmt = $stmt->execute();
            if ($isTrueStmt) {
                if (empty($stmt->fetch())) {
                    return false;
                } else {
                    SessionFlash::set(false,'Le email est deja enregistrer pour une Patient.');
                    return true;
                };
            } else {
                SessionFlash::set(false,'Impossible des faire Connexion a la base de Donnes, try again or call support.');
                return true;
            }
            //$pdo = new PDO(DNS,login,pass);
            //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public static function getOne(int $id)
    {
        $pdo = Database::getInstance();
        $sql = "SELECT * FROM `patients` WHERE `ID` = $id ;";
        $stmt = $pdo->query($sql);
        return $stmt->fetch();
    }
    
    public static function getTotalNumberOf()
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT COUNT(*) AS count FROM `patients`;';
        $stmt = $pdo->query($sql);
        $stmt = $stmt->fetch();
        return intval($stmt->count);
    }

    public static function getAll(int $currentPage, int $patientsPerPage):array
    {
        // limit by 8-12 per page, in request sql with offset -> 
        $pdo = Database::getInstance();
        $offset = $currentPage * $patientsPerPage;
        $sql = "SELECT `id`, `firstname`, `lastname`, `birthdate`, `phone`, `email` 
        FROM `patients`
        LIMIT $patientsPerPage OFFSET $offset;";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }
}
