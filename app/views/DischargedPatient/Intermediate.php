<?php
include '../layouts/docmenu.php';
include_once '../../models/DatabaseConnection/Database.php';
include '../home/cache.php';
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
    
    <title></title>
  </head>
  <body class ="mainbody">
  <div class = container">
  <table class="table table-bordered" >
    <thead>
      <tr>
          <th style="text-align:center" scope="col" >Patient ID</th>
          <th style="text-align:center" scope="col" >Patient File</th>
      </tr>
    </thead>
    <tbody>
  <?php
        $medical = Database::getInstance();
        $results =  $medical->retrieveAllData("dischargedPatients");
          while($row = mysqli_fetch_array($results)){
            $regNo = $row['RegNo'];
            echo
            "
            <form method=\"post\" action=\"AlreadyDischargedPatient.php\">
              <tr>
              <td style=\"text-align:center\">  <input type=\"text\" style=\"text-align:center\" class=\"form-control\" name=\"regNo\" value=$regNo readonly>  </td>
              <td style=\"text-align:center\">  <input type=\"submit\" name=\"action\" value=\"View Patient File\"/>  </td>
              </tr>

            </form>
            <br>
            "
        ;
          }
          ?>
          </div>
  </body>


</html>
