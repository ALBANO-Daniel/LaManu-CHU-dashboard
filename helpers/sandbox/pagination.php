<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php

$elements = '<li> Database content fetch </li>';

$totalPages = 50;
$elementsPerPage = 8;
$pagesPerPagination = 7;
$halfPagesPerPagination = intval($pagesPerPagination/2);
$halfUpPagesPerPagination = ceil($pagesPerPagination/2);
$currentPage = $_GET['page'] ?? 0;

// OBJECT CLASS to handle info
class Element{

    public static function getAll(int $currentPage, int $elementsPerPage):array
        {
            // limit by 8-12 per page, in request sql with offset -> 
            $pdo = Database::getInstance();
            $offset = $currentPage * $elementsPerPage;
            $sql = "SELECT `element`, `element2`, `etc...`, 
            FROM `elements`
            LIMIT $elementsPerPage OFFSET $offset;";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        }
}

?>

<body>
    <ul class="row pagination">
        <li class="waves-effect"><a href="?page=<?= $currentPage - 1 ?>"><i class="material-icons">chevron_left</i></a></li>

        <?php if ($currentPage < $pagesPerPagination - 1) {

            for ($page = 0; $page < $pagesPerPagination; $page++) { ?>
                <li class="<?= $currentPage == $page ? 'active' : 'waves-effect' ?>">
                    <a href="?page=<?= $page ?>"><?= $page ?></a>

                </li>
            <?php } ?>
            <span> . . . </span>
            <a href="?page=<?= $totalPages ?>"><?= $totalPages ?></a>

        <?php } else if ($currentPage >= $pagesPerPagination-1 && $currentPage < ($totalPages - $halfUpPagesPerPagination)) { ?>

            <a href="?page=<?= 0 ?>">0</a>
            <span> . . . </span>

            <?php for ($page = $currentPage - $halfPagesPerPagination; $page <= $currentPage +$halfPagesPerPagination ; $page++) { ?>
                <li class="<?= $currentPage == $page ? 'active' : 'waves-effect' ?>">
                    <a href="?page=<?= $page ?>"><?= $page ?></a>
                </li>
            <?php } ?>

            <span> . . . </span>
            <a href="?page=<?= $totalPages ?>"><?= $totalPages ?></a>

        <?php } else { ?>
            <a href="?page=<?= 0 ?>">0</a>
            <span> . . . </span>

            <?php for ($page = $currentPage - $halfPagesPerPagination ; $page <= $totalPages ; $page++) { ?>
                <li class="<?= $currentPage == $page ? 'active' : 'waves-effect' ?>">
                    <a href="?page=<?= $page ?>"><?= $page ?></a>
                </li>
            <?php } ?>

        <?php } ?>

        <li class="waves-effect"><a href="?page=<?= $currentPage + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
    </ul>




<!-- OLD LIST -->
    <ul class="row pagination">
                <li class="waves-effect"><a href="?page=<?= $patientListPagesActual - 1 ?>"><i class="material-icons">chevron_left</i></a></li>

                <?php

                for ($i = 0; $i < $patientListPagesTotal + 1; $i++) { ?>
                    <li class="<?= $patientListPagesActual == $i ? 'active' : 'waves-effect' ?>">
                        <a href="?page=<?= $i ?>"><?= $i + 1 ?></a>
                    </li>
                <?php } ?>


                <li class="waves-effect"><a href="?page=<?= $patientListPagesActual + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
            </ul>

</body>

</html>