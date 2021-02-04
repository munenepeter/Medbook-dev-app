<?php
require_once 'config.php';

class Data extends database
{

    public function getData()
    {
        $sql = "SELECT tbl_patient.patient_name, tbl_patient.patient_dob, tbl_patient.general_comments, tbl_gender.gender_type, tbl_service.service_type 
       FROM tbl_patient 
       JOIN tbl_gender 
       ON tbl_patient.patient_id = tbl_gender.patient_id 
       JOIN tbl_service 
       ON tbl_patient.patient_id = tbl_service.patient_id;";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            return $row;
        }
    }
    public function insertPatientsData($nameofpatient, $dateofbirth, $comments)
    {
        $sql = "INSERT INTO `tbl_patient`(`patient_id`, `patient_name`, `patient_dob`, `general_comments`) 
        VALUES (?,?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([1,$nameofpatient,$dateofbirth,$comments]);

    }
    public function insertGenderData($gender)
    {
        $sql = "INSERT INTO `tbl_gender`(`gender_id`, `gender_type`) 
        WHERE `patient_id` = 1
        VALUES (?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([1,$gender]);
    }
    public function insertServiceData($typeofservice)
    {
        $sql = "INSERT INTO `tbl_service`(`service_type`)
        WHERE `patient_id` = 1 
        VALUES (?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$typeofservice]);
    }
}
//error could not upload ... geuss im not getting the <job class=""></job>

/* if (mysqli_query(connect(), $sql)) {
    echo "Records inserted successfully.";
  } else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
 */