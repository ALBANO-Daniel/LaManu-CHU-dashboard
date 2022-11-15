<?php


public static function patientSelect($search)
{
    $pdo = Database::getInstance();
    $sql = 'SELECT * FROM `patients`';
    if($search != '') $sql .= 'WHERE `lastname` LIKE :search or `email` :search';
    $sql .= ';';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':search', $search, PDO::PARAM_STR);

}


?>

use LIKE to get inwords...

= request 



better:
$sth->bindValue(':search', '%'.$search.'%');

vs

WHERE lastname LIKE CONCAT('%'.$search.'%'); 