<?php
include '../../views/layouts/docmenu.php';
// include '../../views/HeaderAndFooter/header.php';
include '../../models/DatabaseConnection/Database.php';
//include '../../models/Users.php';
include '../../classes/Patient.php';
include '../../classes/Test.php';
include '../../views/home/cache.php';


if (!(isset($_SESSION))){
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "stylesheet" href = "../../../bootstrap/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../../../style.css">
    <link rel = "stylesheet" href = "../../../css/styles.css">
    
    <title> </title>
  </head>
  <body class = 'mainbody'>
    <div class="container">
  <?php
        $medical = Database::getInstance();
        if (isset($_POST["test_submit"])){
          if (isset($_POST['tests'])){
            $tests=$_POST['tests'];
            if (!(empty($tests)))
            {
                foreach($tests as $test)
                {
                  $class_name = ucfirst($test);
                  $command = new $class_name;
                  $command->execute($medical,array($_POST["regNo"], date('Y-m-d')));
                  //$medical->enterData($test, array('patient_id','sdate'), array($_SESSION["regNo"], date('Y-m-d')));
                }
            }
          }
      }

        if (isset($_POST["treatment_submit"])){
          $columns = array('RegNo','Date', 'ClinicalSignsPresented','PrescribedDrugs','AdditionalNotes');  //don't need to add the ID column
        if (isset($_POST["medicine"])){
            $medicine = htmlspecialchars($_POST["medicine"]);
            $signs = htmlspecialchars($_POST["signs"]);
            $notes= htmlspecialchars($_POST["notes"]);
            $medical -> enterData("history", $columns, array($_POST["regNo"],date('Y-m-d'), $signs, $medicine,$notes));
        }
      }

        $columns = array('RegNo', 'FullName', 'Age', 'Gender', 'FullAddress', 'DateOfBirth', 'Diagnosis',  'BedNo','ContactNo');
        if(isset($_POST['regNo'])){
          $regNo = $_POST["regNo"];
          $_SESSION["regNo"] = $_POST['regNo'];
        $results =  $medical->retrieveData("patients", $columns, $regNo);
        if (mysqli_num_rows($results)!=0) {
          while($row = mysqli_fetch_array($results)){
            $regNo = $row['RegNo'];
            $diagnosis =  $row['Diagnosis'];
            $name = $row['FullName'];
            $age =  $row['Age'];
            $gender =  $row['Gender'];
            $address =  $row['FullAddress'];
            $dob =  $row['DateOfBirth'];
            $contact = $row['ContactNo'];
            $bedNo = $row['BedNo'];
            if ($bedNo==''){
              $admission="Not admitted";
            }
            else{
              $admission = "Admitted";
            }

            $patient = new Patient($regNo, $name, $age, $address,$diagnosis,$dob,$gender,$admission, $bedNo, $contact,"Existing");
            $_SESSION["Patient"] = $patient;
            $patient->displayUI();
            //include '../../views/ExistingPatient/ExistingPatientForm.php';
          }
        }
      }
        else{
          echo "Registration number not found.";
        }
          ?>
          </div>
    </body>
</html>
