
<?php
  include '../../models/DatabaseConnection/Database.php';
  include '../../models/Validation.php';
  include '../../classes/Patient.php';
  include '../../classes/Test.php';
  include '../../../core/View.php';
  include '../../views/home/cache.php';

  if (!(isset($_SESSION))){
    session_start();
    }

  $errors = array();
  $medical = Database::getInstance();

  if (isset($_POST['name']))
    {
      try {
        $name = Validation :: str($_POST['name']);
      }
      catch (Exception $e){
        array_push($errors,"Name incorrectly entered");

      }
  }

  if (isset($_POST['regNo'])) {

      try {
        $regNo = Validation :: str(trim(htmlspecialchars($_POST['regNo'])));
        //$_SESSION["regNo"] = $regNo;
      }
      catch (Exception $e){
        array_push($errors,"Registration number incorrectly entered");
      }

  }

  if (isset($_POST['contact']))
    {
      try {
        $contact = Validation :: phone($_POST['contact']);
      }
      catch (Exception $e){
        array_push($errors,"Contact number incorrectly entered");
      }
  }

  if (isset($_POST['age'])) {
    try {
      $age = Validation :: int(trim(htmlspecialchars($_POST['age'])));
    }
    catch (Exception $e){
        array_push($errors,"Age incorrectly entered");
    }
  }

if (isset($_POST['diagnosis'])) {
  try {
    $diagnosis = Validation :: str(trim(htmlspecialchars($_POST['diagnosis'])));
  }
  catch (Exception $e){
      array_push($errors,"Diagnosis incorrectly entered");
  }
}
  if (isset($_POST['gender'])) {
    try {
      $gender = Validation :: str(trim(htmlspecialchars($_POST['gender'])));
    }
    catch (Exception $e){
        array_push($errors,"Gender incorrectly entered");
    }
  }

  if (isset($_POST['address'])) {
    try {
      $address = Validation :: str(trim(htmlspecialchars($_POST['address'])));
    }
    catch (Exception $e){
        array_push($errors,"Address incorrectly entered");
    }
  }

  if (isset($_POST['dob'])) {
    $dob = $_POST['dob'];
  }


  if (isset($_POST['admitted'])) {
    $status = $_POST['admitted'];
    if ($status == true){
      $status= "Admitted";
      if (isset($_POST['bed'])) {
        $bed = trim(htmlspecialchars($_POST['bed']));
    }
  }
    else{
      $status =  "Not admitted";
      $bed='';
    }

}

  if (isset($_POST["medicine"])){
    $medicine = htmlspecialchars($_POST["medicine"]);
  }

  if (isset($_POST["signs"])){
    $signs = htmlspecialchars($_POST["signs"]);
  }

  if (isset($_POST['tests'])){
    $tests=$_POST['tests'];
  }
  if (isset($_POST['notes'])){
    $notes=$_POST['notes'];
  }

  if (isset($_POST["submit"])){
    if (empty($errors))
  {
      $patient1 = new Patient($regNo, $name, $age, $address,$diagnosis,$dob,$gender,$status, $bed, $contact,"New");
      $_SESSION["Patient"]= $patient1;
      $error = $medical->enterData("patients", array('RegNo', 'FullName', 'Age', 'Gender', 'FullAddress',
      'DateOfBirth', 'Diagnosis','BedNo','ContactNo'),
      array($regNo,$name, $age, $gender,$address,$dob,$diagnosis,  $bed, $contact));
      if ($error==false){
        echo "Please recheck the data you entered";
      }
      else{

      $columns = array('RegNo','Date', 'ClinicalSignsPresented','PrescribedDrugs',"AdditionalNotes");  //don't need to add the ID column
      $medical -> enterData("history",$columns,
                array($_POST["regNo"],date('y/m/d'), $signs, $medicine,$notes));


        if (!(empty($tests)))
      {
        foreach($tests as $test){
              $class_name = ucfirst($test);
              $command = new $class_name;
              $command->execute($medical,array($regNo, date('Y-m-d')));
          //$medical->enterData($test, array('patient_id','sdate'), array($regNo, date('Y-m-d')));
      }
    }
  header("Location: ../../views/home/contents.php");
   //$this->view->render('home/index');
  

      }

  }

  else{
    $message = "";
    for($i=0; $i<count($errors); $i++)
    {
      $message = $message. $errors[$i];
    }
    echo $message;
  }
}

    ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "stylesheet" href = "../../../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
  <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }

</script>

  </body>
</html>
