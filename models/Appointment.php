<!-- class apointment -->

<!-- getter  -->
<!-- setter  -->
<!-- 4 method du crod  -->


<?php


// Database class to connect instance on DBase
require_once(__DIR__ . '/../helpers/functions/Database.php');

class Appointment
{
    private int $_id;
    private string $_dateHour;
    private int $_idPatient;

// getters -- setters
    public function setId(int $id):void
    {
        $this->_id = $id;
    }

    public function getId():int
    {
        return $this->_id;
    }

    public function setDateHour(int $dateHour):void
    {
        $this->_dateHour = $dateHour;
    }

    public function getDateHour():string
    {
        return $this->_dateHour;
    }

    public function setIdPatient(int $idPatient):void
    {
        $this->_id = $idPatient;
    }

    public function getIdPatient():int
    {
        return $this->_idPatient;
    }
// END getters -- setters

    public static function add(){
        $pdo = Database::getInstance();
        $sql = "INSERT INTO `appointments`(`datehour`,`idpatient`)
                VALUES(:datehour,:idpatient)";
    }
    public static function getOne(){

    }
    public static function getAll(int $id = 0):array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT 
        `appointments`.`id`,
        `patients`.`lastname`,
        `patients`.`firstname`,
        `appointments`.`dateHour`
        FROM `patients`
        RIGHT JOIN `appointments`
        ON `patients`.`id` = `appointments`.`idPatient`';
        if($id != 0)  $sql .= 'WHERE `patients`.`id` = :id';
        $sql .= ';';
        $stmt = $pdo->prepare($sql);
        if($id != 0) $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
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
}   