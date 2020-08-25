<?php
include '../layouts/docmenu.php';
include '../../classes/Patient.php';
include '../HeaderAndFooter/header.php';
include '../HeaderAndFooter/Discharged.php';
include '../../models/DatabaseConnection/Database.php';
if (!(isset($_SESSION))){
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "stylesheet" href = "../../../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../../../css/styles.css">
    <link rel = "stylesheet" href = "../../../img/test.css">
    <link rel = "stylesheet" href = "../../../style.css">
    <title></title>
  </head>
  <body >
  <?php

    $medical = Database::getInstance();
    $patient = $_SESSION["Patient"];
    $regNo = $patient->getRegNo();
    $name = $patient->getName();
    $age = $patient->getAge();
    $gender = $patient->getGender();
    $address = $patient->getAddress();
    $dob = $patient->getDOB();
    $diagnosis = $patient->getDiagnosis();
    $contact = $patient->getContact();
    $bedNo = $patient->getBedNo();
    if (isset($_SESSION["Patient"])){
        unset($_SESSION["Patient"]);
        unset($_SESSION["regNo"]);
    }
    $patient->goNext();
    $medical->enterData("dischargedPatients", array('RegNo', 'FullName', 'Age', 'Gender', 'FullAddress',
      'DateOfBirth', 'Diagnosis','BedNo','ContactNo'),
      array($regNo,$name, $age, $gender,$address,$dob,$diagnosis,$bedNo, $contact));
    $medical->deleteData("patients", $regNo);
    $patient->displayUI();

  ?>