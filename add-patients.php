<?php
include_once "includes/autoloader.php";

//Check if the submit button was submitted
if (isset($_POST['submit'])) {

  //Validate the input with the Validator class
  $validate = new Validator($_POST);
  $validate->validateform(); 

  #for testing  purposes 
  //print_r($_POST);

 //Get the values From the POST super globalArrays
  $nameofpatient = $_POST['nameofpatient'];
  $dateofbirth = $_POST['date'];
  $gender = $_POST['gender'];
  $typeofservice = $_POST['typeofservice'];
  $comments = $_POST['comments'];

  //Get The select inputs from thier respectively  Arrays
  $gender = $gender[0];
  $typeofservice = $typeofservice[0];

  //Instatiate the Data class to insert the data into the db
  $insertData = new Data();
  $insertData->insertData($nameofpatient, $dateofbirth, $comments);

  if($insertData->insertData($nameofpatient, $dateofbirth, $comments)){
     $insertData->insertrestData($nameofpatient, $gender, $typeofservice);
  }else{
    echo 'sorry Cannot insert';
  }

  
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>Medbook-dev-app</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Medbook-dev-app</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
        </ul>
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="add-patients.php">Add Patients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">View Patients</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">User</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="card mt-5" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Some features</li>
            <li class="list-group-item">To be Added</li>
            <li class="list-group-item">I don't Know when</li>
          </ul>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6 mr-2 ">
        <div class="card  mt-5">
          <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-control">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name of Patient</label>
                <input name="nameofpatient" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name of Patient">
              </div>
              <div class="input-group mb-3 ">
                <div class="mr-3">
                  <label for="exampleFormControlInput1" class="form-label">Gender</label>
                  <select name="gender[]" class="form-select" aria-label="Default select example">
                    <option selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </div>
                <div class="">
                  <label for="exampleFormControlInput1" class="form-label">Date</label>
                  <input name="date" type="Date" class="form-control" id="exampleFormControlInput1" placeholder="Date">
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Type of service</label>
                <select name='typeofservice[]' class="form-select" aria-label="Default select example">
                  <option selected>Select</option>
                  <option value="inpatient">Inpatient</option>
                  <option value="outpatient">Outpatient</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">General Comments</label>
                <textarea name="comments" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-3">
          <?php
           if(empty($validate->errors)){
             $display = "none";
           }else{
            $display = ""; 
           }   
          ?>
        <div class="card text-white bg-danger mt-5" style="width: 18rem; display:<?php echo $display; ?>;">
          <div class="card-header text-center">
            Form Errors.
          </div>
          
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="alert alert-danger " role="alert">
                <?php
                echo $validate->errors['NameofPatient'] ?? "";
                ?>
              </div>
            </li>
            <li class="list-group-item">
              <div class="alert alert-danger " role="alert">
                <?php
                echo $validate->errors['DateofBirth'] ?? "";
                ?>
              </div>
            </li>
            <li class="list-group-item">
              <div class="alert alert-danger" role="alert">
                <?php
                echo $validate->errors['Gender'] ?? "";
                ?></div>
            </li>
            <li class="list-group-item">
              <div class="alert alert-danger " role="alert">
                <?php
                echo $validate->errors['TypeofService'] ?? "";
                ?></div>
            </li>
            <li class="list-group-item">
              <div class="alert alert-danger " role="alert">
                <?php
                echo $validate->errors['GeneralComments'] ?? "";
                ?></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>
