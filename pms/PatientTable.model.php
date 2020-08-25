<?php

include_once 'Patient.class.php';
class PatientTable{
    private $parent_database;
    private $table_name;

    public function __construct($parent_database){
        $this->parent_database=$parent_database;
        $this->table_name="medical.patients";
    }
    
    public function getPatientByID($id){
        // access the database and get required patient details from the patient_id(reg_no)
        //$query="SELECT * FROM ".$this->table_name." WHERE RegNo='$id'";        //name format use for naming tables is <test_type>_table
        //$result=mysqli_query( $this->parent_database->getConnection(),$query);  
        $columns = array('RegNo', 'FullName', 'Age', 'Gender', 'FullAddress', 'DateOfBirth', 'Diagnosis',  'BedNo','ContactNo');
        $results =  $this->parent_database->retrieveData("medical.patients", $columns, $id);
        $row=mysqli_fetch_assoc($results);//stops
        $regNo = $row['RegNo'];
        $diagnosis =  $row['Diagnosis'];
        $name = $row['FullName'];
        $age =  $row['Age'];
        $gender =  $row['Gender'];
        $address =  $row['FullAddress'];
        $dob =  $row['DateOfBirth'];
        $contact = $row['ContactNo'];
        $bedNo = $row['BedNo'];
        if ($bedNo==''){
            $admission="Not admitted";
        }
        else{
            $admission = "Admitted";
        }
        $patient = new Patient($regNo, $name, $age, $address,$diagnosis,$dob,$gender,$admission, $bedNo, $contact,"Existing");
        return $patient;

}
}
?>