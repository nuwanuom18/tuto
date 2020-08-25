<?php
include "../app/views/layouts/labmenu.php";
include_once 'Patient.class.php';
session_start();
$patient = unserialize($_SESSION['patient']);
$test_date=$_SESSION['request_date'];

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> specimen Exam</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sheet1.css">
    <link rel="stylesheet" href="../img/test.css">
       
       <link rel="stylesheet" href="../style.css">

  </head>
  <body>
    <header>
        <div class="container text-center">
            <h4> MEDICAL RESEARCH INSTITUTE  </h4>
            <h3> REQUEST FOR EXAMINATION OF SPECIMEN</h3>

        </div>
    </header>
    <form  action="SpecimenExam.control.php" method="POST">


    <div class="container">
        <hr class="newhr">
        <div class="container text-center">
            <h5> To be filled by the Medical Officer requesting Examination  </h5>
        </div>
        <br>


            <div class="row">
                <div class="col">
                    <div class="form-group w-75" >
                        <label for="serialno" >Serial No.: </label>
                        <input type="text" name="serialno" id="serialno" class="form-control form-control-sm "?> 
                    </div>

                </div>

                <div class="col">
                    <div class="form-group w-75 " >
                        <label for="bht" >BHT No:</label>
                        <input type="text" name="bht" id="bht" class="form-control form-control-sm "readonly value=<?php  echo $patient->getBedNo(); ?> >
                    </div>

                </div>

                <div class="col">
                    <div class="form-group w-75" >
                        <label for="wardno" >Ward No:</label>
                        <input type="text" name="wardno" id="wardno" class="form-control form-control-sm " value=19 readonly>
                    </div>

                </div>

            </div>

            <div class="form-group w-25 " >
                <label for="bedno" >Bed No:</label>
                <input type="text" name="bedno" id="bedno" class="form-control form-control-sm " readonly value=<?php  echo $patient->getBedNo(); ?> >
            </div>

            <div class="form-group  w-75" >
                <label for="exams" >Material and Examination requested:</label>
                <textarea name="exams" id="exams" rows="5" cols="" class="form-control form-control-sm" ></textarea>


            </div>


            <div class="row">
                <div class="col">
                    <div class="form-group w-50">
                        <label for="coldate"> Date of collection:</label>
                        <input type="date" name="coldate" id="coldate" class="form-control form-control-sm">

                    </div>
                </div>
                <div class="col">
                    <div class="form-group w-50">
                        <label for="coltime"> Time:</label>
                        <input type="time" name="coltime" id="coltime" class="form-control form-control-sm">

                    </div>

                </div>
            </div>

            <br>
            <p> <b> Clinical history (a full clinical history will facilitate laboratory diagnosis) </b></p>
            <br>


            <div class="d-flex justify-content-end">
                <div class="form-group w-25 " >
                    <input type="text" name="signmo" id="signmo" class="form-control form-control-sm  ">
                    <div class="text-center">
                        <label for="signmo"  >Signature of Medical Officer</label>
                    </div>
                </div>
            </div>


            <div class="form-group w-50" >
                <label for="address" > Address:</label>
                <textarea name="address" id="address" cols="" rows="" class="form-control form-control-sm" readonly ><?php  echo $patient->getAddress(); ?> </textarea>
            </div>

            <div class="d-flex justify-content-end">
                <div class="form-group w-25 " >
                    <label for="date"  >Date</label>
                    <input type="date" name="date" id="date" class="form-control form-control-sm  " value=<?php echo $test_date;?> readonly>

                </div>
            </div>

            <hr class="newhr">

            <div class="container text-center">
                <h5> To be filled in at the counter  </h5>
            </div>
            <br>

            <div class="row">
                <div class="col">
                    <div class="form-group w-75" >
                        <label for="insno" >Institution No: </label>
                        <input type="text" name="insno" id="insno" class="form-control form-control-sm  ">
                    </div>

                </div>

                <div class="col">
                    <div class="form-group w-50" >
                        <label for="cdate"  >Date:</label>
                        <input type="date" name="cdate" id="cdate" class="form-control form-control-sm  ">

                    </div>

                </div>

                <div class="col">
                    <div class="form-group w-50">
                        <label for="ctime"> Time:</label>
                        <input type="time" name="ctime" id="ctime" class="form-control form-control-sm">

                    </div>
                </div>

            </div>

            <div class="form-group w-50" >
                <label for="cReceived" >Received By:</label>
                <input type="text" name="cReceived" id="cReceived" class="form-control form-control-sm ">
            </div>

            <div class="form-group w-50  ">
                <label for="remark"> Remarks: </label>
                <textarea name="remark" id="remark" cols="" rows="5" class="form-control form-control-sm"></textarea>
            </div>

            <br>
            <hr class="newhr">


            <div class="container text-center">
                <h5> <b>LABORATORY USE ONLY </b> </h5>
            </div>


            <div class="row">
                <div class="col">
                    <div class="form-group " >
                        <label for="labno" >Laboratory No: </label>
                        <input type="text" name="labno" id="labno" class="form-control form-control-sm  ">
                    </div>

                </div>

                <div class="col">
                    <div class="form-group w-50 " >
                        <label for="labdate" >Date:</label>
                        <input type="date" name="labdate" id="labdate" class="form-control form-control-sm ">
                    </div>

                </div>

                <div class="col">
                    <div class="form-group " >
                        <label for="Received" >Received By:</label>
                        <input type="text" name="Received" id="Received" class="form-control form-control-sm ">
                    </div>

                </div>

            </div>

            <div class="form-group w-75">
									<label for="labnote">LABORATORY NOTICE: </label>
                 <textarea name="labnote" id="labnote" cols="" rows="5" class="form-control form-control-sm"></textarea>
            </div>

            <div class="form-group w-25">

                <input type="text" name="labsign" class="form-control form-control-sm " placeholder="SIGNATURE ">
            </div>
            <hr class="newhr">

            <div class="form-group   ">
                <label for="repspec">Report on Specimen: </label>
                <textarea name="repspec" id="repspec" rows="5" cols="" class="form-control form-control-sm" ></textarea>
            </div>

            <hr class="newhr">

            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label for="repcheck">Report checked by: </label>
                        <input type="text" name="repcheck" id="repcheck" class="form-control form-control-sm ">
                    </div>

                </div>

                <div class="col">
                    <div class="form-group ">
                        <label for="senton">Sent on: </label>
                        <input type="date" name="senton" id="senton" class="form-control form-control-sm ">
                    </div>

                </div>


            </div>

              <input type='submit' class="btn btn-info" value="Submit">

    </div>
    </form>

  </body>
</html>
