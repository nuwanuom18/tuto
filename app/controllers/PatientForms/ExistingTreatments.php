<?php
include '../../views/layouts/docmenu.php';
// include '../../views/HeaderAndFooter/header.php';
include '../../models/DatabaseConnection/Database.php';
include '../../views/home/cache.php';

if (!(isset($_SESSION))){
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <script src="../../../js/jQuery-2.2.4.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <link rel = "stylesheet" href = "../../../bootstrap/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
        <link rel = "stylesheet" href = "../../../style.css">
        <link rel = "stylesheet" href = "../../../css/styles.css">
        <link rel = "stylesheet" href = "../../../img/test.css">
    <title> </title>
  </head>
  <body class ='mainbody'>
    <div class="container">

    
  <table class="table table-bordered" >
    <thead>
      <tr>
          <th style="text-align:center" scope="col" class ="textStyle"> <b>Date</b></th>
          <th style="text-align:center" scope="col" class ="textStyle"><b>Presented Clinical Signs</b> </th>
          <th style="text-align:center" scope="col" class ="textStyle"><b> Prescribed Medicine</b></th>
          <th style="text-align:center" scope="col" class ="textStyle"><b>Additional Notes</b> </th>
      </tr>
    </thead>
    <tbody>
  <?php
        $medical = Database::getInstance();
        $columns = array('RegNo','Date', 'ClinicalSignsPresented','PrescribedDrugs',"AdditionalNotes");
        if (isset($_SESSION["regNo"]))
          {
            $regNo = $_SESSION["regNo"];
          }
        else{
          if (isset($_POST["regNo"])){
            
            $regNo = $_POST["regNo"];
          }
        }

        $results =  $medical->retrieveData("history", $columns, $regNo);
        
          while($row = mysqli_fetch_array($results)){
            $date = $row['Date'];
            $signs =  $row['ClinicalSignsPresented'];
            $drugs =  $row['PrescribedDrugs'];
            $notes =  $row['AdditionalNotes'];
            echo 
            "<tr>
              <td> <input type=\"text\" value=$date readonly class='boxstyles'/> </td>
              <td> <textarea id=\"signs\" name = \"signs\"   rows=\"4\" cols=\"30\" readonly class='boxstyles'>$signs</textarea></td>
              <td> <textarea id=\"medicine\" name = \"medicine\"   rows=\"4\" cols=\"30\" readonly class='boxstyles'>$drugs</textarea></td>
              <td> <textarea id=\"notes\" name = \"notes\"   rows=\"4\" cols=\"30\" readonly class='boxstyles'>$notes</textarea></td>
            </tr>"
        ;
          }
          ?>

    <form action="ExistingPatient.php" method = "post">
        <tr>
          <td> <input type="text" value="<?php echo date('Y-m-d');?>" readonly class="boxstyles"/> </td>
          <td> <textarea id="signs" name = "signs" value='' rows="4" cols="30" class="boxstyles"><?php if (isset($_POST['signs'])) echo $_POST['signs'] ?></textarea></td>
          <td> <textarea id="medicine" name = "medicine" value='' rows="4" cols="30" class="boxstyles"><?php if (isset($_POST['medicine'])) echo $_POST['medicine'] ?></textarea></td>
          <td> <textarea id="notes" name = "notes" value='' rows="4" cols="30" class="boxstyles"><?php if (isset($_POST['notes'])) echo $_POST['notes'] ?></textarea></td>
        </tr>
        </tbody>
  </table>
        <div style="text-align:center">  
            <input type="submit" class =" btn btn-outline-success"name="treatment_submit" id="treatment_submit"/>  
        </div>
        </form>
        <br>
        </div>
    </body>
</html>