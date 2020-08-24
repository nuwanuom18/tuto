<?php
if (!(isset($_SESSION))){
  session_start();
}
$patient = $_SESSION["Patient"];
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
  <body >
  <div class = containor  style="margin-left:20px; margin-right:20px;">

    <form action ="" method = "post">

        <div class="form-row">

          <div class="col-md-3 mb-3 col-md-offset-4 mr-3">
              <label for="regNo">Registration Number</label>
              <input type="text" class="form-control boxstyles" id="regNo" name="regNo" placeholder="Registration Number" value='<?php echo $patient->getRegNo();?>' readonly>
          </div>

        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-2">
            <label for="name">Full Name</label>
            <input type="text" class="form-control boxstyles" id="name" name="name" placeholder="Full Name" value='<?php echo  $patient->getName();?>' readonly>
          </div>

          <div class="ml-5">
            <div class="col-md-7 mb-3 col-md-offset-4 mr-3">
                <label for="age">Age</label>
                <input type="text" class="form-control boxstyles" id="age" name="age" placeholder="Age" value='<?php echo  $patient->getAge();?>' readonly>
            </div>
          </div>

        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-4">
              <label for="diagnosis">Diagnosis</label>
              <input type="text" class="form-control boxstyles " id="diagnosis" name="diagnosis" placeholder="Diagnosis" value='<?php echo $patient->getDiagnosis();?>' readonly>
          </div>

        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-4">
              <label for="address">Full Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Full Address" value='<?php echo$patient->getAddress();?>' readonly>
          </div>

          <div class="ml-5">
          <div class="col-md-10 mb-3 col-md-offset-4">
              <label for="address">Contact No.</label>
              <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Number"  value='<?php echo $patient->getContact();?>' readonly>
          </div>
          </div>

        </div>

        <div class="form-row">
          <div class="col-md-2 mb-3 col-md-offset-4">
              <label for="dob">Date of Birth</label>
              <input type="date" class="form-control" id="dob" name="dob" value='<?php echo $patient->getDOB();?>' readonly>
          </div>
          <div class="col-md-2 mb-3 col-md-offset-4">
              <label for="gender">Gender</label>
              <input type="text" class="form-control" id="gender" name="gender" value='<?php echo $patient->getGender();?>' readonly>
        </div>

          <div class="col-md-2 mb-3 col-md-offset-4">
              <label for="gender">Admission Status</label>
              <input type="text" class="form-control" id="admission" name="admission" value='<?php echo $patient->getAdmissionStatus();?>' readonly>

          </div>
          <?php
          $bedNo=$patient->getBedNo();
          if ($bedNo!=''){
            echo "<div class=\"col-md-2 mb-3 col-md-offset-4\">
            <label for=\"gender\">Bed Number</label>
            <input type=\"text\" class=\"form-control\" id=\"bedNo\" name=\"bedNo\" value='$bedNo' readonly>

        </div>";
          }
          //../../view/DischargedPatient/ConfirmDischarge.php
          //<button class="btn btn-outline-primary mr-4" type = "submit" name = "test"> Discharge Patient </button>
          ?>
        </div>


    </form>
    <div class="form-row">
              <form action = "ExistingTreatments.php" method = post>

                <button class="btn btn-outline-success mr-4" type = "submit" name = "treatment"> History </button>
              </form>
              <br>

              <form action = "../../views/ExistingPatient/TestResults.php" method = post>
                  <button class="btn btn-outline-success mr-4" type = "submit" name = "test"> Test Results </button>
              </form>
              <br>

              <form action = "../../views/ExistingPatient/EditableForm.php" method = post>
                  <button class="btn btn-outline-success mr-4" type = "submit" name = "test"> Edit Form </button>
              </form>

              <br>

              <form action = "../../views/ExistingPatient/NewTests.php" method = post>
                  <button class="btn btn-outline-success mr-4" type = "submit" name = "test"> Order New Tests </button>
              </form>

              <br>

              <form action = "../../views/DischargedPatient/NewlyDischargedPatient.php" method = post>
                  <button class="btn btn-outline-success mr-4" type = "submit"  onclick="return  confirm('Are you sure you want to discharge this patient?')">Discharge Patient </>
              </form>

              <br>

              <form action = "views/home/contents.php" method = post>
                  <button class="btn btn-outline-success mr-4" type = "submit" name = "test"> Return to Main Menu </button>
            </form>

            </div>
            <br>
            <br>
  </body>
</html>
