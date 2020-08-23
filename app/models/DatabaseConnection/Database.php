<?php

class Database{
    private $name = "medical";   //Database name
    private $host = "localhost";    //Database server
    private $user = "root";  //Database username
    private $password ="nuwansql" ;    //Database password
    private static $instance;
    private static $link;

    private function __construct(){
        $this->createDatabase();
    }

    public function createDatabase(){
        $sql = "CREATE DATABASE IF NOT EXISTS $this->name";
        $link = $this->makeLink();
        if (!(mysqli_query($link, $sql))) {
            echo "ERROR: Was not able to execute $sql. " . mysqli_error($link);
        }
    }

    public static function getInstance(){
        {
            if (self::$instance == null)
            {
              self::$instance = new Database();
            }
            return self::$instance;
          }
    }

    public function makeLink(){
        if (self::$link==null)
        {
                $link = mysqli_connect($this->host, $this->user, $this->password);    //second parameter is username, 3rd is password
                
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                self::$link = $link;
                
        }
        return self::$link;   //this link is used for all operations
    }

    public function getDatabaseName(){
        return $this->database_name;
    }

    public function insertTable($table){
        //insert TestInboxTable object in to the tables
        $this->table_list[]=$table;
    }


    public function makeTable($tableName, $columns, $attributes)
    {   
        $link = $this->makeLink();
        $selected = mysqli_select_db($link, "medical")  
                or die("Could not select database"); 
        $sql = "CREATE TABLE IF NOT EXISTS $tableName(";
        for ($i=0; $i<count($columns); $i+=1){
            $sql = $sql . $columns[$i] .' '. $attributes[$i];
            if ($i!=count($columns)-1){
                $sql = $sql.' ,';
            }
        }
        $sql = $sql . ")";
        if (!(mysqli_query($link, $sql))) {
            echo "ERROR: Was not able to execute $sql. " . mysqli_error($link);
        }
    }

    function enterData($table,$columns, $data){
        $link = $this->makeLink();
        
        $selected = mysqli_select_db($link, "medical")  
                or die("Could not select database"); 
        $sql = 'INSERT INTO ' . $this->name.'.'.$table. ' (';
        for ($i=0; $i<count($columns); $i+=1){
            $sql = $sql . $columns[$i] ;
            if ($i!=count($columns)-1){
                $sql = $sql.' ,';
            }
        }
        $sql = $sql.") VALUES (";
        for ($i=0; $i<count($data); $i+=1){
            $sql = $sql . "'" . $data[$i]. "'" ;
            if ($i!=count($data)-1){
                $sql = $sql.' ,';
            }
        }
        $sql = $sql.") ";
         return mysqli_query($link, $sql);
    }

    function getLastRecord($table){
        $link = $this->makeLink();
        
        $selected = mysqli_select_db($link, "medical")  
                or die("Could not select database"); 
        $sql = "SELECT * FROM  $this->name.$table ORDER BY RegNo DESC LIMIT 1";
        $results = (mysqli_query($link, $sql));
        //echo $sql;
        return $results;
    }

    function deleteData($table,$regNo){
        $link = $this->makeLink();
        $selected = mysqli_select_db($link, "medical")  
                or die("Could not select database"); 
        $sql = "DELETE FROM " . $this->name.'.'.$table. " WHERE RegNo = '".$regNo."'";
        $results = (mysqli_query($link, $sql));
        return $results;

    }

    function checkQuery( $table, $columns, $regNo){
        $link = $this->makeLink();
        $query = "SELECT ";
        for ($i=0; $i<count($columns); $i++){
            $query = $query . $columns[$i];
            if ($i!=(count($columns)-1)){
                $query = $query.",";
            }
        }
       $query = $query . " FROM " . $this->name.'.'.$table. " WHERE  RegNo ='" . $regNo . "'";
       $results = (mysqli_num_rows($result)($link, $query));
       return ($results==0);
    }

    function retrieveData( $table, $columns, $regNo){
        $link = $this->makeLink();
        $query = "SELECT ";
        for ($i=0; $i<count($columns); $i++){
            $query = $query . $columns[$i];
            if ($i!=(count($columns)-1)){
                $query = $query.",";
            }
        }
        
       $query = $query . " FROM " . $this->name.'.'.$table." WHERE  RegNo ='" . $regNo . "'";
       //print($query);
       $results = (mysqli_query($link, $query));
       return $results;
    }

    function retrieveDataByDate($table, $columns, $date, $regNo){
        $link = $this->makeLink();
        $query = "SELECT ";
        for ($i=0; $i<count($columns); $i++){
            $query = $query . $columns[$i];
            if ($i!=(count($columns)-1)){
                $query = $query.",";
            }
        }
       $query = $query . " FROM " . $this->name.'.'.$table. " WHERE  (regNo, test_request_date) =('" . $regNo . "','".$date ."')";
       $results = (mysqli_query($link, $query));
       if (!($results)) {
            echo "ERROR: Was not able to execute $query. " . mysqli_error($link);
            return $results;
        }
        else{
            return $results;
        }
       
    }

    function filterDataByDiagnosis( $table, $columns, $diagnosis){
        $link = $this->makeLink();
        $query = "SELECT ";
        for ($i=0; $i<count($columns); $i++){
            $query = $query . $columns[$i];
            if ($i!=(count($columns)-1)){
                $query = $query.",";
            }
        }
       $query = $query . " FROM " . $this->name.'.'.$table." WHERE  Diagnosis ='" . $diagnosis . "'";
       $results = (mysqli_query($link, $query));
       return $results;
    }

    function retrieveAllData( $table){
        $link = $this->makeLink();
        $query = "SELECT * FROM ".$this->name.'.'.$table;
       $results = (mysqli_query($link, $query));
       return $results;
    }

    public function updateData($regNo, $columns, $values, $table){
        $link = $this->makeLink();
        echo '<br>';
        $selected = mysqli_select_db($link, "medical")  
                or die("Could not select database"); 
        $query = "SELECT ";
        $select=' ';
        $add = ' ';
        for ($i=0; $i<count($columns); $i++){
            $select = $select . $columns[$i];
            $add = $add . $columns[$i] . '='.  "'" . $values[$i].  "'" ;
            echo '<br>';
            echo $add;
            echo '<br>';
            if ($i!=(count($columns)-1)){
                $add = $add.",";
                $select = $select . ',';
            }
        }
        $query = $query. $select;
        $query = $query . " FROM " . $this->name.'.'.$table. " WHERE  RegNo ='" . $regNo . "'";
        if (!(mysqli_query($link, $query))) {
            echo "ERROR: Was not able to execute $query. " . mysqli_error($link);
        }

        $sql = "UPDATE ". $table . " SET " . $add ." WHERE RegNo = '" . $regNo. "'";
        if (!(mysqli_query($link, $sql))) {
            echo "ERROR: Was not able to execute $sql. " . mysqli_error($link);
        }

    }
}

?>