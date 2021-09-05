<?php
include_once 'includes/autoloader.php';
//Instatiate the Data class 
// $newData = new Data();
// //get data
// $row = $newData->getData();

//print_r($row);


?>

<?php include_once "includes/head.php"; ?>
<?php
$database = Database::getInstance();
$row = $database->getData();
var_dump($row);
?>
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
            <th scope="col">General Comments </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($row as $data) : ?>
            <tr>
              <th scope="row"><?= $data['patient_name']; ?></th>
              <td><?php echo date_format(date_create($data['patient_dob']), "d, F Y"); ?></td>
              <td><?= $data['gender_type']; ?></td>
              <td><?= $data['service_type']; ?></td>
              <td><?= $data['general_comments']; ?></td>
            </tr>
          <?php endforeach; ?>
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