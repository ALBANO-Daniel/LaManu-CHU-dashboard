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
    // birthdate not a DATE type ??????? 
    private string $_birthdate;
    private string $_email;

    // empty construct, opted to use getters and setters directly
    public function __construct()
    {
    }

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

    public function getOne()
    {
    }
    public function getAll()
    {
    }
    public function add()
    {

        $pdo = Database::getInstance(); //   call of public static method of 'Database' class to connect DBase


        $sql = "INSERT INTO `patient`('id','firstname','lastname','birthdate','phone','email') 
                VALUES (:id,:firstname,:lastname,:birthdate,:phone,:email)";
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
        return $stmt->execute(); // the method runs and also get its result its returned, boolean, used to test sucess/fail
    }

    public function edit()
    {
    }
    public function delete()
    {
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
                    return true;
                };
            }
            //$pdo = new PDO(DNS,login,pass);
            //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
