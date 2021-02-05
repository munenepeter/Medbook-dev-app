<?php

class Data extends Database{

    public function getData()
    {
        $sql = "SELECT tbl_patient.patient_name, tbl_patient.patient_dob, tbl_patient.general_comments, tbl_gender.gender_type, tbl_service.service_type 
       FROM tbl_patient 
       JOIN tbl_gender 
       ON tbl_patient.patient_id = tbl_gender.patient_id 
       JOIN tbl_service 
       ON tbl_patient.patient_id = tbl_service.patient_id;";
        $stmt = $this->connect()->query($sql)->fetch();   
        return $stmt; 
    }
      public function insertData($nameofpatient, $dateofbirth, $gender, $typeofservice, $comments){
      
        // insert into respective tables
        if (!$this->connect()) {
            echo "There is no connection to the db";
        }else {
            echo "There is a connection to the db";
           $sql1 = $this->connect();

           $stmt = $sql1->query("INSERT INTO `tbl_patient`( `patient_id` `patient_name`, `patient_dob`, `general_comments`) 
            VALUES ('$nameofpatient', '$dateofbirth', '$comments');");
            $sql1->exec($stmt);
           
           $id = $sql1->lastInsertId();
          
 
          $stmt1 = $sql1->query("INSERT INTO `tbl_gender`( `patient_id` `gender_id`, `gender_type`) 
            VALUES ('$id',1,'$gender');");
           $sql1->exec($stmt1);
          
        

           $stmt2 = $sql1->query("INSERT INTO `tbl_service`( `patient_id` `service_type`) 
            VALUES ('$id','$typeofservice');");
           $sql1->exec($stmt2);
         
           
              if ($sql1->exec($stmt)) {
                echo "<br>it is executing ";
              }else {
                echo "<br>it is not executing";
              }  
        }
       

   /*   public function insertData($nameofpatient, $dateofbirth, $gender, $typeofservice, $comments){
      
        // insert into respective tables
        if (!$this->connect()) {
            echo "There is no connection to the db";
        }else {
            echo "There is a connection to the db";
           $sql1 = $this->connect();
           $sql1->exec("INSERT INTO `tbl_patient`( `patient_name`, `patient_dob`, `general_comments`) 
            VALUES ('$nameofpatient','$dateofbirth','$comments');");
            //get the id
            $id = $sql1->lastInsertId();
            //second query
           $sql1->exec("INSERT INTO `tbl_gender`(`gender_id`, `gender_type`)
              VALUES ('$id',1,'$gender');");

           $sql1->exec("INSERT INTO `tbl_service`(`service_type`)
              VALUES ('$id','$typeofservice');");
           
            

              if ($sql1) {
                echo "<br>it is executing ";
              }else {
                echo "it is not executing";
              }  
        }
        */

    
     
    }
   /*  public function insertData($nameofpatient, $dateofbirth, $comments, $gender, $typeofservice){
        //start transaaction
        try {  
      $this->connect()->beginTransaction();
        // insert into respective tables
      $insert1 = $this->connect()->query("INSERT INTO `tbl_patient`( `patient_name`, `patient_dob`, `general_comments`) 
        VALUES ('$nameofpatient','$dateofbirth','$comments');");

      $insert2 = $this->connect()->query("INSERT INTO `tbl_gender`(`gender_id`, `gender_type`) 
        WHERE `patient_id` = 1
        VALUES ('$gender');");

      $insert3 = $this->connect()->query("INSERT INTO `tbl_service`(`service_type`)
        WHERE `patient_id` = 1 
        VALUES ('$typeofservice');");

       //check whether the transaction went tthrough
        if($insert1 && $insert2 && $insert3) {
            $this->connect()->commit();
        } else {
          $this->connect()->rollback();
      }
      } catch (Exception $e) {
            echo "Failed: " . $e->getMessage();
}
    } */
  

}
//error could not upload ... geuss im not getting the <job class=""></job>
