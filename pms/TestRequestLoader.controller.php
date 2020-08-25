<?php
require_once('../app/models/Users.php');
include_once "Database.model.php";

include_once "TestRequestTable.model.php";

include_once "XrayRequestTable.model.php";
include_once "ECGRequestTable.model.php";
include_once "MicrobioRequestTable.model.php";
include_once "BiochemicalRequestTable.model.php";
include_once "SpecimenExamRequestTable.model.php";

include_once "Request.class.php";
include_once "LabAssistant.class.php";
include_once "LabFactory.class.php";
include_once 'SetUp.php';

//$database=new Database("localhost","gayangi","Pswrd","medical"); //Creating new database
//$database->connectDatabase(); // Connect the database to PHP
//$_SESSION['database']=serialize($database);
$database = Database::getInstance();
setup();
$s = Users::$currentLoggedInUser();

$factory=new Factory($database);
$lab_assistant=new LabAssistant();

$lab_assistant->setLAType("microbio_lab");

$request_table=$factory->makeTestRequestTable($lab_assistant);

$request_table->loadRequests();
$requests=$request_table->getRequests(); // get loaded table in to an array

//session_start();
$_SESSION['requests']=$requests;
//$_SESSION['database']=serialize($database);

$iter_var=0;       //iterative variable inside the foreach loop to generate values for radio buttons
echo "<form action='pms/LabReportLoader.controller.php' method='post'>";      // *****have to add action php file
foreach($requests as $request){
    $id=$request->getPatientID();
    $date=$request->getDate();
    echo "<input type='radio' name='test_request' value=$iter_var>";    // radio buttons indexed as integers
    echo $date."\t \t".$id."<br>";
    $iter_var+=1;
}

if(sizeof($requests)){
    echo "<br><input type='submit' value='Add Submission'></form>";
}
else{
    echo "No requests currently available. Take a break :D";
}
?>
