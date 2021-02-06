<?php
include_once 'includes/autoloader.php';
//Instatiate the Data class 
$newData = new Data();
//get data
$row = $newData->getData();

//print_r($row);


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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
        </ul>
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="add-patients.php">Add Patients</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Dr Odidi</a>
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
            <li class="list-group-item">Todays Appointments</li>
            <li class="list-group-item">Rescheduled Appointments</li>
            <li class="list-group-item">Notes</li>
          </ul>
        </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-8">
          <table class="table mt-5">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Gender</th>
                <th scope="col">Type of service </th>
                <th scope="col">General Comments  </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              foreach ($row as $data) {
            ?>

              <tr>
                <th scope="row"><?php echo $data['patient_name']; ?></th>
                
                <td><?php echo date_format(date_create($data['patient_dob']), "d, F Y"); ?></td>

                <td><?php echo $data['gender_type']; ?></td>
                <td><?php echo $data['service_type']; ?></td>
                <td><?php echo $data['general_comments']; ?></td>
              </tr>
             <?php
             }
             ?>
            </tbody>
          </table>
        </div>
    <div class="col-md-1"></div>
      </div>
    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>
