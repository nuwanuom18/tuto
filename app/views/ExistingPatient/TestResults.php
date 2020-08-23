<?php
include '../../models/DatabaseConnection/Database.php';
include '../HeaderAndFooter/header.php';
include '../../cache.php';
if (!(isset($_SESSION))){
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "../../css/styles.css">

    <title></title>
  </head>
</div>
<br>
  <body class ="mainbody">
  <div class = " container ">

  <div class="form-group w-25   ">
        <button type="button" class="btn btn-outline-success mr-4 btn-block justify-content-center"  onclick="window.location.href = '../TestResults/BiochemicalInvestigations.php';">Biochemical Investigations</button>
        <button type="button" class="btn btn-outline-success mr-4 btn-block"  onclick="window.location.href = '../TestResults/ECG.php';">ECG  </button>
        <button type="button" class="btn btn-outline-success mr-4 btn-block"  onclick="window.location.href = '../TestResults/microbio.php';">Microbiology Tests</button>
        <button type="button" class="btn btn-outline-success mr-4 btn-block"  onclick="window.location.href =  '../TestResults/SpecimenExamination.php';">Specimen Examinations</button>
        <button type="button" class="btn btn-outline-success mr-4 btn-block"  onclick="window.location.href = '../TestResults/XRay.php';">X-Rays</button>
        
  </div>
</div>

  </body>
</html>

