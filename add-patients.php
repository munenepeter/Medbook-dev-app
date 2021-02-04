<?php
  include_once "includes/autoloader.php";
 
//declare variables & get the values
if (isset($_POST['submit'])) {
  $nameofpatient = htmlspecialchars($_POST['nameofpatient']);
  $dateofbirth = htmlspecialchars($_POST['date']);
  foreach ($_POST['gender'] as $select) {
    $gender = htmlspecialchars($select); // Displaying Selected Value
  }
  foreach ($_POST['typeofservice'] as $select) {
    $typeofservice = htmlspecialchars($select); // Displaying Selected Value
  }
  $comments = htmlspecialchars($_POST['comments']);
 

  $insertData = new Data();
  $insertData->insertData($nameofpatient, $dateofbirth, $comments, $gender, $typeofservice);
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
            <a class="nav-link" href="view-patients.php">View Patients</a>
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
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6 mr-2 ">
        <div class="card  mt-5">
          <div class="card-body">
            <form action="" method="POST" class="form-control">
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
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>
