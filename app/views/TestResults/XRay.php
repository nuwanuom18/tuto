<?php
include '../layouts/docmenu.php';
include '../../models/DatabaseConnection/Database.php';
include '../../classes/Patient.php';
if (!(isset($_SESSION))){
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="../../../js/jQuery-2.2.4.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href = "../../../bootstrap/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../../../style.css">
    <link rel = "stylesheet" href = "../../../css/styles.css">

    <title></title>
  </head>

  <div class = "container " >

    <form action ="" method = "post">

    <table class="table table-bordered" >
    <thead>
      <tr>
          <th style="text-align:center" scope="col"class ="textStyle"><b>Test Request Date</b> </th>
          <th style="text-align:center" scope="col"class ="textStyle"><b>Test Results</b> </th>
      </tr>
    </thead>
    <tbody>
    </form>
</div>
<br>
  <body class ="mainbody">
    <?php
        
        $medical = Database::getInstance();
        $results =  $medical->retrieveData("xray_table", array('test_request_date'), $_SESSION["Patient"]->getRegNo());
        if (mysqli_num_rows($results)!=0) { 
            while($row = mysqli_fetch_array($results)){
                $date =  $row['test_request_date']; //THIS NEEDS TO BE THE REQUESTED DATE
                echo 
            "
            <tr>
            <form action = \"../../views/Lab Forms/xray.php\" method = post>
                <td style=\"text-align:center\"> <input type=\"text\"  name = \"date\" id = \"date\" value=$date readonly class ='boxstyles'/> </td>
                <td style=\"text-align:center\">
                
                    <button type = \"submit\" name = \"test\" class ='btn btn-outline-success'> View Results </button>
                </form>
                </td>
                </tr>";
        }
        echo "</table>";
    }
    ?>
  </body>
</html>

