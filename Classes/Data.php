<?php
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
      public function insertData($nameofpatient, $dateofbirth, $gender, $typeofservice, $comments){
      
        // insert into respective tables
        if (!$this->connect()) {
            echo "There is no connection to the db";
        }else {
            echo "There is a connection to the db";

           $sql1 = $this->connect();

           $stmt = $sql1->prepare("INSERT INTO `tbl_patient`(`patient_name`, `patient_dob`, `general_comments`) 
            VALUES (:n, :d, :c);");
            $stmt->bindParam('n', $nameofpatient);
            $stmt->bindParam('d', $dateofbirth);
            $stmt->bindParam('c', $comments);
              if($stmt->execute()){
                echo "<br> success";
              }else{
                echo "Failure ";
              }
           
           $id = $sql1->lastInsertId();
          
 
          $stmt = $sql1->prepare("INSERT INTO `tbl_gender`( `patient_id`, `gender_id`, `gender_type`) 
            VALUES (:i, :id, :g);");
            $stmt->bindParam('i', $id);
            $stmt->bindParam('id', $id);
            $stmt->bindParam('g', $gender);
              if($stmt->execute()){
                echo "<br> success <br>";
              }else{
                echo "Failure ";
              }
          
        

           $stmt = $sql1->prepare("INSERT INTO `tbl_service`( `patient_id`, `service_type`)
             VALUES (:i, :t);");
             $stmt->bindParam('i', $id);
             $stmt->bindParam('t', $typeofservice);
              if($stmt->execute()){
                echo "success";
              }else{
                echo "Failure ";
              }
         
        }
       

  } 

}
//error still cannot upload could not upload ... geuss im not getting the <job class=""></job>
