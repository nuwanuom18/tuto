<?php
include '../../views/layouts/docmenu.php';
include '../../views/HeaderAndFooter/header.php';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href = "../../../css/styles.css">
        <link rel = "stylesheet" href = "../../../css/styles.css">
        <link rel = "stylesheet" href = "../../../img/test.css">
    <title> </title>
  </head>
  <body class ='mainbody'>
    <div class="container">

    
  <table class="table table-bordered" >
    <thead>
      <tr>
          <th style="text-align:center" scope="col" >Date</th>
          <th style="text-align:center" scope="col" >Presented Clinical Signs</th>
          <th style="text-align:center" scope="col" >Prescribed Medicine</th>
          <th style="text-align:center" scope="col" >Additional Notes</th>
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
              <td> <input type=\"text\" value=$date readonly/> </td>
              <td> <textarea id=\"signs\" name = \"signs\"   rows=\"4\" cols=\"30\" readonly>$signs</textarea></td>
              <td> <textarea id=\"medicine\" name = \"medicine\"   rows=\"4\" cols=\"30\" readonly>$drugs</textarea></td>
              <td> <textarea id=\"notes\" name = \"notes\"   rows=\"4\" cols=\"30\" readonly>$notes</textarea></td>
            </tr>"
        ;
          }
          ?>

    <form action="ExistingPatient.php" method = "post">
        <tr>
          <td> <input type="text" value="<?php echo date('Y-m-d');?>" readonly/> </td>
          <td> <textarea id="signs" name = "signs" value='' rows="4" cols="30"><?php if (isset($_POST['signs'])) echo $_POST['signs'] ?></textarea></td>
          <td> <textarea id="medicine" name = "medicine" value='' rows="4" cols="30"><?php if (isset($_POST['medicine'])) echo $_POST['medicine'] ?></textarea></td>
          <td> <textarea id="notes" name = "notes" value='' rows="4" cols="30"><?php if (isset($_POST['notes'])) echo $_POST['notes'] ?></textarea></td>
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