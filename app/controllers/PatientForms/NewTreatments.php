<?php
include '../../models/DatabaseConnection/Database.php';
include '../../cache.php';
if (!(isset($_SESSION))){
  session_start();

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "../css/header.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "../../css/header.css">
    <title></title>
  </head>

  <body>
    <?php
        $medical = Database::getInstance();
        $columns = array('RegNo','Date', 'ClinicalSignsPresented','PrescribedDrugs','AdditionalNotes');  //don't need to add the ID column
        if (isset($_POST["medicine"])){
          $medicine = htmlspecialchars($_POST["medicine"]);
          $signs = htmlspecialchars($_POST["signs"]);
          $notes= htmlspecialchars($_POST["notes"]);
          $medical -> enterData("history", $columns, array($_SESSION["regNo"],date('y/m/d'), $signs, $medicine,$notes));
          //header("Location: ../PatientForms/ExistingPatient.php");
    }
    ?>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

  </body>

</html>
