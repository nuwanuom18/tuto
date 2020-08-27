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
    <link rel = "stylesheet" href = "../../../bootstrap/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../../../style.css">
    <link rel = "stylesheet" href = "../../../css/styles.css">

    <title></title>
  </head>

  <div class = "container ">

    <form action ="" method = "post">

    <table class="table table-bordered" >
    <thead>
      <tr>
          <th style="text-align:center" scope="col">Test Request Date</th>
          <th style="text-align:center" scope="col">Test Results</th>
      </tr>
    </thead>
    <tbody>
    </form>
</div>
<br>
  <body class ="mainbody">

    <?php
        
        $medical = Database::getInstance();
        $results =  $medical->retrieveData("microbio_table", array('test_request_date'), $_SESSION["regNo"]);
        if (mysqli_num_rows($results)!=0) { 
            while($row = mysqli_fetch_array($results)){
                $date =  $row['test_request_date']; //THIS NEEDS TO BE THE COMPLETED DATE NOT THE REQUESTED DATE
                echo 
            "
            <tr>
            <form action = \"../../views/Lab Forms/MicrobiologyRequest.php\" method = post>
                <td style=\"text-align:center\"> <input type=\"text\"  name = \"date\" value=$date readonly/> </td>
                <td style=\"text-align:center\">
                    <button type = \"submit\" name = \"test\"> View Results </button>
                </form>
                </td>
                </tr>";
        }
        echo "</table>";
        
    }
      

      

    ?>
    



    

  </body>
</html>

