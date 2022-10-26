<?php
// Fonction pour supprimer un patient depuis la Liste

function DeletePatient($pdo, $error)
{
    try {
        if (isset($_GET['delete']) && !empty($_GET['delete'])) { ?>
<div class="alert alert-info pb-1">
    <p class="text-center">Patient supprimé avec succès</p>
</div><?php
                    $delete = $_GET['delete'];
                    $sql = 'DELETE FROM patients WHERE id = :delete;';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['delete' => $delete]);
                    header("Location:/patientlist");
                    exit();
                }
            } catch (PDOException $e) {
                $error = $e->GetMessage();
            }
            if ($error) : ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif;
        } ?>
<?php

//Fonction pour supprimer un patient et un RDV depuis la page profil-patient.php
function DeletePatientAndRDV($pdo, $error)
{
    try {
        if (isset($_GET['deleteAll']) && !empty($_GET['deleteAll'])) { ?>
<div class="alert">
    <p class="center">Patient et RDV supprimés avec succès</p>
</div><?php
                    $deleteAll = $_GET['deleteAll'];
                    $sql = 'DELETE FROM appointments WHERE idPatients = :deleteAll;';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['deleteAll' => $deleteAll]);
                    $sql = 'DELETE FROM patients WHERE id = :deleteAll;';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['deleteAll' => $deleteAll]);
                    header("Location:/patientlist");
                    exit();
                }
            } catch (PDOException $e) {
                $error = $e->GetMessage();
            }
            if ($error) : ?>
<div class=""><?= $error ?></div>
<?php endif;
        } ?>


<?php
//Fonction pour supprimer un rendez-vous
function DeleteRDV($pdo, $error)
{
    try {
        if (isset($_GET['deleterdv']) && !empty($_GET['deleterdv'])) { ?>
<div class="alert">
    <p class="center">RDV supprimé avec succès</p>
</div><?php
                    $deleterdv = $_GET['deleterdv'];
                    $sql = 'DELETE FROM appointments WHERE id = :deleterdv';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['deleterdv' => $deleterdv]);
                    header("Location:/appointmentlist");
                    exit;
                }
            } catch (PDOException $e) {
                $error = $e->GetMessage();
            }
            if ($error) : ?>
<div class="alert"><?= $error ?></div>
<?php endif;
        } ?>

<?php



// Fonction pour update les données
function UpdateData($pdo, $error)
{
    try {
        if (isset($_GET['update']) && !empty($_GET['update'])) {

            if (isset($_POST['idUpdate']) && !empty($_POST['idUpdate']) && isset($_POST['firstnameUpdate']) && !empty($_POST['firstnameUpdate']) && isset($_POST['lastnameUpdate']) && !empty($_POST['lastnameUpdate']) && isset($_POST['birthdateUpdate']) &&  !empty($_POST['birthdateUpdate']) && isset($_POST['phoneUpdate']) && !empty($_POST['phoneUpdate']) && isset($_POST['mailUpdate']) && !empty($_POST['mailUpdate'])) {
                $idUpdate = $_POST['idUpdate'];
                $firstnameUpdate = $_POST['firstnameUpdate'];
                $lastnameUpdate = $_POST['lastnameUpdate'];
                $birthdateUpdate = $_POST['birthdateUpdate'];
                $phoneUpdate = $_POST['phoneUpdate'];
                $mailUpdate = $_POST['mailUpdate'];
                $sql = 'UPDATE patients SET firstname=:firstnameUpdate, lastname=:lastnameUpdate, birthdate=:birthdateUpdate, phone=:phoneUpdate, mail=:mailUpdate WHERE id=:idUpdate';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':idUpdate', $idUpdate, PDO::PARAM_INT);
                $stmt->bindValue(':firstnameUpdate', $firstnameUpdate, PDO::PARAM_STR);
                $stmt->bindValue(':lastnameUpdate', $lastnameUpdate, PDO::PARAM_STR);
                $stmt->bindValue(':birthdateUpdate', $birthdateUpdate, PDO::PARAM_STR);
                $stmt->bindValue(':phoneUpdate', $phoneUpdate, PDO::PARAM_STR);
                $stmt->bindValue(':mailUpdate', $mailUpdate, PDO::PARAM_STR);
                $stmt->execute();
                header("Location:/patientlist");
                exit();
            } else { ?>
<div class="alert">Vous pouvez modifier un profil ici:</div>
<?php }
        }
    } catch (PDOException $e) {
        echo $e->GetMessage(); ?>
<div class="alert"><?= $error ?></div>
<?php
    }
}  ?>