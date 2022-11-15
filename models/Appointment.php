<?php

require_once(__DIR__ . '/../helpers/functions/Database.php');

class Appointment
{
    private int $_id;
    private string $_datehour;
    private int $_idpatient;
    // private string $_doctorName;

// getters -- setters
    public function setId(int $id):void
    {
        $this->_id = $id;
    }

    public function getId():int
    {
        return $this->_id;
    }

    public function setDateHour(string $datehour):void
    {
        $this->_datehour = $datehour;
    }

    public function getDateHour():string
    {
        return $this->_datehour;
    }

    public function setIdPatient(int $idpatient):void
    {
        $this->_idpatient = $idpatient;
    }

    public function getIdPatient():int
    {
        return $this->_idpatient;
    }
// END getters -- setters

    /**
     * Méthode qui permet de créer un rendez-vous
     * 
     * @return boolean
     */
    public function add(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `appointments` (`datehour`, `idpatient`) 
                    VALUES (:datehour, :idpatient);';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':datehour', $this->getDateHour());
        $stmt->bindValue(':idpatient', $this->getIdPatient(), PDO::PARAM_INT);
        if ($stmt->execute()) {
            return ($stmt->rowCount() > 0) ? true : false;
        } else {
            return false;
        }
    }

    public static function delete(int $id):bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `appointments` WHERE `id` = :id;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return ($stmt -> rowCount() == 1);
        }
        return false;
    }

    /**
     * Méthode qui permet de mettre à jour un rdv
     * 
     * @param int $id
     * 
     * @return bool
     */
    public function update(int $id): bool
    {
        $sql = 'UPDATE `appointments` SET `datehour` = :dateHour, `idpatients` = :idpatients
                    WHERE `id` = :id;';

        $sth = $this->pdo->prepare($sql);

        $sth->bindValue(':dateHour', $this->getDateHour(), PDO::PARAM_STR);
        $sth->bindValue(':idpatients', $this->getIdPatient(), PDO::PARAM_INT);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    /**
     * Méthode permettant de récupérer un rdv
     * @param int $id
     * 
     * @return object
     */
    public static function getOne(int $id):object
    // :object|false => parser error->syntax error
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `appointments`
                WHERE `appointments`.`id` = :id;';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    }

    /**
     * Méthode qui permet de lister tous les rdv et leur patient
     * 
     * @return array
     */
    public static function getAll(int $currentPage, int $patientsPerPage, int $id = 0):array
    {
            // limit by 8-12 per page, in request sql with offset -> 
        $pdo = Database::getInstance();
        $offset = $currentPage * $patientsPerPage;
        $sql = 'SELECT 
        `appointments`.`id`,
        `patients`.`lastname`,
        `patients`.`firstname`,
        `appointments`.`datehour`,
        `appointments`.`idpatient`
        FROM `patients`
        RIGHT JOIN `appointments`
        ON `patients`.`id` = `appointments`.`idpatient`';
        if($id != 0)  $sql .= ' WHERE `patients`.`id` = :id';
        $sql .= " LIMIT $patientsPerPage OFFSET $offset;";
        $stmt = $pdo->prepare($sql);
        if($id != 0) $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public static function getTotalNumberOf(int $id = 0):int
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT COUNT(*) AS count FROM `appointments`';
        if($id != 0) $sql .= "WHERE `idpatient` = $id";
        $sql .= ';';
        $stmt = $pdo->query($sql);
        $stmt = $stmt->fetch();
        return intval($stmt->count);
    }
}