<?php

abstract class State
{
    private $remark;

    abstract public function goNext($patient): void;
    abstract public function displayUI($patient);
}

class NewPatient_ extends State{

    function __construct($remark){
        $this->remark = $remark;
    }

    public function goNext($patient): void{
        $patient->setState(new ExistingPatient("Existing Patient"));

    }

    public function displayUI($patient){
    }
}

class ExistingPatient extends State{

    function __construct($remark){
        $this->remark = $remark;
    }

    public function goNext($patient): void{
        $patient->setState(new DischargedPatient("Discharged Patient"));

    }

    public function displayUI($patient){
        include "../../views/ExistingPatient/ExistingPatientForm.php";
    }
}

class DischargedPatient extends State{

    function __construct($remark){
        $this->remark = $remark;
    }

    public function goNext($patient): void{
        $this->remark = "Patient has already been discharged";

    }

    public function displayUI($patient){
        $regNo = $patient->getRegNo();
        $name = $patient->getName();
        $age = $patient->getAge();
        $gender = $patient->getGender();
        $address = $patient->getAddress();
        $dob = $patient->getDOB();
        $diagnosis = $patient->getDiagnosis();
        $contact = $patient->getContact();
        $bedNo = $patient->getBedNo();

        include "./FormDischargedPatient.php";
        
    }
}
?>