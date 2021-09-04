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

  //trying to debug my code
  //checking if the first query executes before trying to execute the next queries
  if ($insertData->insertData($nameofpatient, $dateofbirth, $comments)) {
    $insertData->insertrestData($nameofpatient, $gender, $typeofservice);
  } else {
    echo 'sorry Cannot insert';
  }
}
?>
<?php include_once "includes/head.php";?>
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
        if (empty($validate->errors)) {
          $display = "none";
        } else {
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