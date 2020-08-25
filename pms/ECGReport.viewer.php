<?php

include "../app/views/layouts/labmenu.php";
include_once "Patient.class.php";
session_start();
$patient = unserialize($_SESSION['patient']);
$test_date=$_SESSION['request_date'];

//************* Fill the form tag

// this has an error
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
        <title>ecg</title>

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
                <h3> REQUISITION FOR ELECTROCARDIOGRAPH EAXMINATION </h3>
                <br>
            </div>
        </header>


        <form action="ECGReport.control.php"  class ="main-form" method="POST">
					<div class="container">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name"> NAME:</label>
                          <input type="text" name="name" id="name" class="form-control form-control-sm" readonly value=<?php echo $patient->getName()?> >

                    </div>

										<div class="form-group">
                        <label for="name_add"> ADDRESS:</label>
                        <textarea name="address" id="address" cols="20" rows="5" class="form-control form-control-sm" readonly><?php echo $patient->getAddress();?></textarea>

                    </div>
                </div>
								<div class="col">
                    <div class="form-group">
                        <label for="pid">  patient ID:</label>
                        <input type="text" name="pid" id="pid" class="form-control form-control-sm" readonly value= <?php echo $patient->getRegNo();?> >

                    </div>

                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="bedno">  BED No:</label>
                        <input type="number" name="bedno" id="bedno" class="form-control form-control-sm" readonly  value= <?php echo $patient->getBedNo();?>  >

                    </div>

                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="wardno">  WARD No:</label>
                        <input type="number" name="wardno" id="wardno" class="form-control form-control-sm" value=19 readonly>

                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="bht"> B.H.T No:</label>
                        <input type="text" name="bht" id="bht" class="form-control form-control-sm" readonly  value= <?php echo $patient->getBedNo();?>   >

                    </div>
                </div>
                <div class="col">
                    <div class="form-group w-25">
                        <label for="age"> Age:</label>
                        <input type="number" name="age" id="age" class="form-control form-control-sm" value=<?php echo $patient->getAge() ?> readonly>

                    </div>

                </div>

                <div class="col">
                    <div class="form-group w-25">
                        <label for="sex">  Sex:</label>
                        <select name="sex" id="sex" class="form-control form-control-sm" disabled ="true">
                                <option ><?php echo $patient->getGender() ?></option>

                        </select>
                    </div>

                </div>
            </div>



        <table class="table table-bordered">
            <thead>
                <th scope="col"> CLINICAL HISTORY</th>
                <th scope="col"> ELECTROCARDIOGRAPH EAXMINATION</th>


            </thead>

            <tbody>
                <tr>
                    <td rowspan="3">  SURGEON/ PHYSICIAN
											<label for="sleads">SURGEON/ PHYSICIAN </label>
											<input type="text" name="surgeon" id="surgeon" class="form-control form-control-sm">
										</td>
                    <td colspan="2">
                        <label for="sleads">STANDARD LEADS</label>
                        <input type="text" name="sleads" id="sleads" class="form-control form-control-sm">


                        <tr>
                            <td>
                                <label for="anyleads">ANY OTHER LEADS </label>
                                <input type="text" name="anyleads" id="anyleads" class="form-control form-control-sm">
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="sigmo">SIGNATURE M/O </label>
                                <input type="text" name="sigmo" id="sigmo" class="form-control form-control-sm">
                            </td>
                        </tr>
                    </td>

                </tr>

            </tbody>

        </table>
        <br>
        <hr class="newhr">



            <div class=" text-center">
                <h5><b>FOR THE USE OF THE DEPARTMENT OF CARDIOGRAPHY ONLY</b></h5>
            </div>
        <br>

            <div class="form-group w-50  ">
                <label for="regno">REGISTERED No: </label>
                <input type="text" name="regno" id="regno" class="form-control form-control-sm ">
            </div>
            <div class="form-group w-50  ">
                <label for="remark"> REMARKS: </label>
                <textarea name="remark" id="remark" cols="30" rows="4" class="form-control form-control-sm"></textarea>
            </div>

        <br>




            <div class="row ">

                    <div class="col">
                        <input type="date" name="dates" class="form-control form-control-sm" placeholder="DATE STAMP">
                    </div>

                    <div class="col">
                        <input type="text" name="signcardio" class="form-control form-control-sm " placeholder="SIGNATURE OF CARDIOGRAPHER">

                    </div>

            </div>
            <hr class="newhr">



		<input type="submit" name="submitform" class="btn btn-info" value="Submit">
			</div>
		</form>

		</body>
</html>
