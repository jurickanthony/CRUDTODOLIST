<?php

// Include database file
include 'Functions.php';

$customerObj = new Functions();


// Delete record from table
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $taskdelete = $customerObj->displayData();
      $customerObj->deleteTrashTask($deleteId);
    }
    


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>To DO List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>

  <div class="card text-center">
    <h4 class="text-dark shadow p-3bg-white rounded" style="padding:15px;"> <i class="fa fa-trash" aria-hidden="true" ></i> Recently Task Deleted</h4>
  </div><br>

  <div class="container">
    <?php
    
    
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
    ?>
   <a href="index.php"> <button type="button" class="btn btn-success mb-2"  style="float:right;">
      GO BACK&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>
    </button></a>
    <table class="table table-hover shadow p-3 mb-5 bg-white rounded">
      <thead class="bg-dark text-white">
        <tr>
          <th>Task</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $customers = $customerObj->displayDeletedata();
        foreach ($customers as $customer) {

        ?>
      <tr>
            <td><input type="checkbox" >&nbsp<?php echo $customer['task'] ?></td>
            <td><?php echo $customer['created_at'] ?></td>
            <td>
             &nbsp;&nbsp;
              <a href="trash.php?deleteId=<?php echo $customer['trash_id'] ?>" style="color:red">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a>&nbsp;

            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
   
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </script>
</body>

</html>