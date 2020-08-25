<?php

/*This file contains the html form filled with details in the database*/


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
    <title>Xray form</title>
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
            <h4> REQUISITION FOR X-RAY DIAGNOSTIC EXAMINATION   </h4>
            <br>
        </div>
    </header>
    <form action='XraySubmit.controller.php' method='post'>    
    <div class="container">
        <div class="form-group w-25" >
            <label for="date"  >Date:</label>
            <input type="date" name="date" id="date" class="form-control form-control-sm "  value=<?php echo $test_date;?> readonly>

        </div>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="2" rowspan="2">

                        <div class="form-group ">
                            <label for="name"> Name:</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm" value='<?php echo $patient->getName(); ?>' readonly> 
        
                        </div>

                        <div class="form-group " >
                            <label for="address" > Address:</label> 
                            <textarea type="text" name="address" id="address" cols="40" rows="" class="form-control form-control-sm"  readonly><?php echo $patient->getAddress(); ?></textarea>
                        </div>

                    </td>
                    <td>  
                        <div class="form-group w-50" >
                            <label for="wardno" >Ward No:</label> 
                            <input type="text" name="wardno" id="wardno" class="form-control form-control-sm " value=19 readonly>
                        </div>

                        <td>
                            <div class="form-group w-50">
                            <label for="sex">  Sex:</label>
                            <select name="sex" id="sex" class="form-control form-control-sm" selected value="<?php echo $patient->getGender(); ?>" disabled=true readonly>
                                <option value="<?php echo $patient->getGender(); ?>" > <?php echo $patient->getGender(); ?></option>
                            </select>
        
                            </div> 
                        </td>
                        
                        
                        <tr>
                            <td>
                                <div class="form-group w-50">
                                    <label for="bht">  B.H.T No:</label>
                                    <input type="text" name="bht" id="bht"  class="form-control form-control-sm " readonly value = <?php echo $patient->getBedNo(); ?>>
                
                                </div> 
                            </td>

                            <td>
                                <div class="form-group w-25">
                                    <label for="age"> Age:</label>
                                    <input type="number" name="age" id="age" class="form-control form-control-sm " value=<?php echo $patient->getAge(); ?> readonly>
                        
                                </div>
                            </td>
                        </tr>

                    </td>
                </tr>

                <tr>
                    <td colspan="2"> 
                        
                        <p><b> Clinical History </b></p>
                    </td>
                    <td> 
                    <p><b>Region and Nature of Examination </p></b>
                    </td>
                    <td rowspan="2">
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" id="assault" name="region[]"value ="assault" >
                            <label class="form-check-label " for="assault"> ASSAULT</label>

                        </div>

                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" id="accident"name="region[]"value ="accident">
                            <label class="form-check-label" for="accident"> ACCIDENT</label>

                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="inward"name="region[]"value ="inward">
                            <label class="form-check-label" for="inward"> IN WARD </label>

                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="trolley"name="region[]"value ="trolley">
                            <label class="form-check-label" for="trolley"> TROLLEY</label>

                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="chair"name="region[]"value ="chair">
                            <label class="form-check-label" for="chair"> CHAIR </label>

                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="walking"name="region[]"value ="walking">
                            <label class="form-check-label" for="walking"> WALKING </label>

                        </div>

                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group  " >
                            <input type="text" name="sign" id="sign" class="form-control form-control-sm  ">
                            <div class="text-center">
                                <label for="sign"  >Surgeon / Physician</label>         
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="form-group  " >
                            <input type="text" name="signature"  class="form-control form-control-sm  ">
                            <div class="text-center">
                                <label for="sign"  >Signature  M/O</label> 
                            </div>
                        </div>

                    </td>

                </tr>

                <tr>
                    <td rowspan="2">

                        <div class="form-group " >
                            <label for="datestamp" > Date Stamp:</label> 
                            <textarea name="datestamp" id="datestamp" cols="30" rows="" class="form-control form-control-sm" readonly><?php echo date('Y-m-d'); ?> </textarea>
                        </div>
                    </td>

                    <td>
                        <div class="form-group ">
                            
                            <label for="xno"> X-ray No: </label>
                            <input type="text" name="xno" id="xno" class="form-control form-control-sm ">
                        
                        </div>

                        <td>
                            <div class="form-group " >
                                <label for="films" > Size and No. of films used :</label> 
                                <textarea name="films"  cols="30" rows="3" class="form-control form-control-sm"></textarea>
                            </div>

                        </td>

                        <td>
                            <div class="form-group  ">
                                <label for="remark"> Remarks: </label>
                                <textarea name="remark" id="remark" cols="30" rows="3" class="form-control form-control-sm"></textarea>  
                            </div> 


                        </td>

                    </td>
                    
                </tr>

                <tr>
                    <td> 
                        <div class="form-group ">
                            
                            <label for="xroom"> X-ray Room: </label>
                            <input type="text" name="xroom" id="xroom" class="form-control form-control-sm ">
                        
                        </div>


                    </td>

                    <td colspan="2" >
                        <div class="form-group  " >
                            <input type="text" name="signrad" id="signrad" class="form-control form-control-sm  ">
                            <div class="text-center">
                                <label for="signrad"  >Signature of Radiographer</label> 
                            </div>
                        </div>
                        
                    </td>
                </tr>
    
            </tbody>

        </table>

        <input type='submit' class="btn btn-info" value="Submit">


    </div>
</form>
   
  </body>
</html>