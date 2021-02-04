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
    public function insertData($nameofpatient, $dateofbirth, $comments, $gender, $typeofservice){
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
    }
  

}
//error could not upload ... geuss im not getting the <job class=""></job>
