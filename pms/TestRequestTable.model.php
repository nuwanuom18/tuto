<?php

include_once 'Database.model.php';
include_once 'Request.class.php';
include_once 'LabAssistant.class.php';

//This class is an abstract class for all the Request tables.

abstract class TestRequestTable{
    //protected $test_type;
    protected $table_path;
    protected $test_type;
    protected $parent_database;
    protected $requests=array();

    public function loadRequests(){
        /*
        //load requests from relevent database table to $requests array
        $query="SELECT * FROM ".$this->table_path;        //name format use for naming tables is <test_type>_table
        $result=mysqli_query( $this->parent_database->getConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
            $request=new Request($this,$row["sdate"],$row["patient_id"]);
            $this->requests[]=$request;
        }*/
        $results = $this->parent_database->retrieveAllData($this->table_path);
        while($row=mysqli_fetch_assoc($results)){
            $request=new Request($this,$row["date"],$row["regNo"]);
            $this->requests[]=$request;
        }

    }

    public function getRequests(){
        return $this->requests;
    }

    public function getTestType(){
        // get test_type of the table
        return $this-> test_type;
    }


    public function getAllowedLA(){
        return $this->allowed_la;
    }

    public function deleteRowByID($regNo){
        /*
        $query1="DELETE FROM $this->table_path WHERE patient_id='$patient_id1'";
        echo $query1;
        mysqli_query($this->parent_database->getConnection(),$query1);
        */
        $this->parent_database->deleteData($this->table_path, $regNo);
    }
}
?>
