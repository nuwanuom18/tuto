<?php
include 'app/views/HeaderAndFooter/header.php';
include 'app/models/DatabaseConnection/Database.php';
include 'app/views/home/cache.php';

if (!(isset($_SESSION))){
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "../../../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "app/css/header.css">
    <title></title>
  </head>

  <body>

  <div class = containor  style="margin-left:45px;">
  <br>
  <br>
    <h3> Search for patient </h3>
    <br>
    <form action ="" method = "post">

      <div class="form-row">
          <div class="form-group col-md-3">
              <input type="Search" class="form-control" name='regNo' placeholder="Enter registration number..." autocomplete="off" required>
          </div>
      </div>
      <br>
      <button type="submit" name = 'submit'>Search</button>

    </form>
    </div>

    <?php
/*
        $medical = Database::getInstance();

        if (isset($_POST['regNo'])){
          $_SESSION["regNo"] = $_POST['regNo'];
         // header("Location: ../../../controllers/PatientForms/ExistingPatient.php");
         Router::redirect('PatientForms/ExistingPatient');
    }*/


    ?>

  </body>

</html>
