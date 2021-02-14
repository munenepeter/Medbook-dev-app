<?php
//After development  remove
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Data extends Database{

    public function getData()
    {
      //use of a view to get the data
        $sql = "SELECT * FROM `view_alldata` WHERE 1";
        $stmt = $this->connect()->query($sql)->fetchAll();   
        return $stmt; 
    }
      public function insertData($nameofpatient, $dateofbirth,$comments){
        //This is the first query
        //Inserts the respective rows into the tbl_patient
        $sql1 = "INSERT INTO `tbl_patient`(`patient_name`, `patient_dob`, `general_comments`) VALUES (?, ?, ?);";
        $stmt = $this->connect()->prepare($sql1);
        $stmt->execute([$nameofpatient, $dateofbirth ,$comments]);
         
        #need to wrap the statements in a dB transaction
        #so that all the inserts change the database records 
        #at the same time.


  } 
    public function insertrestData($nameofpatient, $gender, $typeofservice){
      //This is the Id of the first query
        //That is the foreign key that is needed in the other tables
        $sql0 = "SELECT `patient_id` FROM `tbl_patient` WHERE `patient_name`= ?";
        $stmt0 = $this->connect()->prepare($sql0);
        $stmt0->execute([$nameofpatient]);
        $id = $stmt0->fetch();
        $id = $id['patient_id'];

        //Second query
        //Inserts to the tbl_service and takes in the patient_id from the first query
        $sql2 = "INSERT INTO `tbl_service`(`patient_id`,`service_type`) VALUES(?,?);";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute ([$id, $typeofservice]);


        //Third query
        $sql3 = "INSERT INTO `tbl_gender`(`patient_id`, `gender_type`)  VALUES(?,?);";
        $stmt3 = $this->connect()->prepare($sql3);
        $stmt3->execute([$id, $gender]);
    }
}
//error still cannot upload could not upload ... geuss im not getting the <job class=""></job>
