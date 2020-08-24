<?php
include 'app/views/HeaderAndFooter/header.php';
//include 'app/models/DatabaseConnection/Database.php';
//include 'app/classes/Patient.php';
include 'app/views/home/cache.php';
if (!(isset($_SESSION))){
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel = "stylesheet" href = "bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" href = "css/styles.css">
    <title> </title>
  </head>

  <body class="mainbody">

  <div class="container">
  <?php
        $medical1 = Database::getInstance();
          $records = $medical1->getLastRecord('patients');
          if (mysqli_num_rows($records)!=0) {
            while($row = mysqli_fetch_array($records)){
              $lastRegNo = $row["RegNo"];
              echo "Last used registration number: " .$lastRegNo;
              echo '<br>';
            }
          }
// action="../../controllers/NewPatient.php"
        ?>
    <form action="<?=PROOT?>NewPatient/NewPatientForm" method = "post">

        <div class="form-row">


          <div class="col-md-3 mb-3 col-md-offset-4 mr-3">
              <label for="regNo" class ="textStyle">Registration Number</label>
              <input type="text" class="form-control boxstyles" id="regNo" name="regNo" placeholder="Registration Number"  autocomplete="off" required>
          </div>

        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-2">
            <label for="name" class ="textStyle">Full Name</label>
            <input type="text" class="form-control boxstyles" id="name" name="name" placeholder="Full Name"  autocomplete="off" required>
          </div>

          <div class="ml-5">
          <div class="col-md-7 mb-3 col-md-offset-4 mr-3">
              <label for="age" class ="textStyle">Age</label>
              <input type="number" class="form-control boxstyles" id="age" name="age" placeholder="Age"  autocomplete="off" required min="0">
          </div>
          </div>

        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-4">
              <label for="diagnosis" class ="textStyle">Diagnosis</label>
              <input type="text" class="form-control boxstyles" id="diagnosis" name="diagnosis" placeholder="Diagnosis"  autocomplete="off" required>
          </div>


        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-4">
              <label for="address" class ="textStyle">Full Address</label>
              <input type="text" class="form-control boxstyles" id="address" name="address" placeholder="Full Address"  autocomplete="off" required>
          </div>

          <div class="ml-5">
          <div class="col-md-10 mb-3 col-md-offset-4">
              <label for="address" class ="textStyle">Contact No.</label>
              <input type="tel" class="form-control boxstyles" id="contact" name="contact" placeholder="Contact Number"  autocomplete="off" required minlength="10" maxlength="12">
          </div>
          </div>

        </div>

        <div class="form-row">

          <div class="col-md-2 mb-3 col-md-offset-4">
              <label for="dob" class ="textStyle">Date of Birth</label>
              <input type="date" class="form-control boxstyles" id="dob" name="dob"  autocomplete="off" required>
          </div>

          <div class="ml-5">
              <div class="col-sm-12">
              <legend class="col-form-label col-sm-2 pt-0 textStyle">Gender</legend>

                <input type="radio" name="gender" value="Male"  required > <span class ="textStyle">Male</span> <br>
                <input type="radio" name="gender" class ="textStyle" value="Female"> <span class ="textStyle">Female</span>
              </div>
        </div>

          <div class="ml-5">
            <div class="col-sm-12">
            <legend class="col-form-label col-sm-2 pt-0 textStyle">Admitted </legend>
                      <input type="radio" onclick="javascript:yesnoCheck();" name="admitted" id="yesCheck" value = 'true' required> <span class ="textStyle">Yes</span><br>
                      <input type="radio" onclick="javascript:yesnoCheck();" name="admitted" id="noCheck" value='false'> <span class ="textStyle">No</span><br>
                  <div id="ifYes" style="visibility:hidden" class ="textStyle ">
                    Bed Number: <input type="text" class="form-control " id="bed" name="bed"  autocomplete="off" >
                  </div>
            </div>
          </div>
        </div>
        <table class="table table-bordered" >
        <thead>
          <tr>
              <th style="text-align:center" scope="col-3">Date</th>
              <th style="text-align:center" scope="col-3">Presented Clinical Signs</th>
              <th style="text-align:center" scope="col-3">Prescribed Medicine</th>
              <th style="text-align:center" scope="col-3">Additional Notes</th>
          </tr>
        </thead>

      <tbody>
        <tr>
          <td> <input type="text" value="<?php echo date('Y-m-d');?>" readonly/> </td>
          <td> <textarea id="signs" name = "signs" value='' rows="4" cols="30"></textarea></td>
          <td> <textarea id="medicine" name = "medicine" value='' rows="4" cols="30"></textarea></td>
          <td> <textarea id="notes" name = "notes" value='' rows="4" cols="30"></textarea></td>

        </tr>
      </tbody>
  </table>
    <br>
    <h5 class = "textStyle"> Tests: </h5>
    <div class="form-row">

      <div class="ml-5">

        <input  type = 'checkbox' name = 'tests[]' value = 'xray_request_table '>  <span class ="textStyle">: X-Ray </span><br>
        <input class ="textStyle" type = 'checkbox' name = 'tests[]' value = 'biochemical_request_table'> <span class ="textStyle"> : Biochemical Investigation</span><br>
        <input class ="textStyle" type = 'checkbox' name = 'tests[]' value = 'ecg_request_table'>  <span class ="textStyle">: ECG</span>  <br>
        <input class ="textStyle" type = 'checkbox' name = 'tests[]' value = 'specimen_exam_request_table'> <span class ="textStyle"> : Specimen Examination</span><br>
        <input class ="textStyle" type = 'checkbox' name = 'tests[]' value = 'microbio_request_table'> <span class ="textStyle"> : Microbiology Request</span><br>
      </div>
    </div>
    <br>

    <div class="form-row">
        <input type = "submit" name = "submit" class ="btn btn-outline-success ">
    </div>
    </form>
  </div>
  <br>
  <br>


  </body>
</html>

<script>
    function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';

    }

  </script>
