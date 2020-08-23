<?php

    function setup(){
        $medical = Database::getInstance();
        $medical -> makeTable("patients",array('RegNo', 'FullName', 'Age', 'Gender', 'FullAddress', 'DateOfBirth', 'Diagnosis', 
        'BedNo','ContactNo') ,
        array("VARCHAR(20) NOT NULL PRIMARY KEY", "VARCHAR(70) NOT NULL","INT NOT NULL", "VARCHAR(10) NOT NULL",
        "VARCHAR(50) NOT NULL", "DATE NOT NULL", "VARCHAR(30) NOT NULL","VARCHAR(10)","VARCHAR(15) NOT NULL" ));

        $medical -> makeTable("dischargedPatients",array('RegNo', 'FullName', 'Age', 'Gender', 'FullAddress', 'DateOfBirth', 'Diagnosis', 
        'BedNo','ContactNo') ,
        array("VARCHAR(20) NOT NULL PRIMARY KEY", "VARCHAR(70) NOT NULL","INT NOT NULL", "VARCHAR(10) NOT NULL",
        "VARCHAR(50) NOT NULL", "DATE NOT NULL", "VARCHAR(30) NOT NULL","VARCHAR(10)","VARCHAR(15) NOT NULL" ));

        $columns = array('ID','RegNo','Date','ClinicalSignsPresented', 'PrescribedDrugs', 'AdditionalNotes');
        $attributes = array('INT PRIMARY KEY NOT NULL AUTO_INCREMENT', 'VARCHAR(20) NOT NULL',' DATE NOT NULL',
        'VARCHAR(150) NOT NULL','VARCHAR(100) NOT NULL','VARCHAR(100)');
        $medical -> makeTable("history", $columns, $attributes);
        
        $columns = array('regNo','date');
        $attributes = array('VARCHAR(20) NOT NULL', ' DATE NOT NULL');
        
        $medical -> makeTable("xray_request_table", $columns, $attributes);
        $medical -> makeTable("specimen_exam_request_table", $columns, $attributes);
        $medical -> makeTable("microbio_request_table", $columns, $attributes);
        $medical -> makeTable("ecg_request_table", $columns, $attributes);
        $medical -> makeTable("biochemical_request_table", $columns, $attributes);

    }

?>