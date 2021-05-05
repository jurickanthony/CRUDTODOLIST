<?php

// Include database file
include 'functions.php';

$functionObj = new Functions();
if (isset($_POST['submit'])) {
  $functionObj->insertData($_POST);
}




// Delete record from table
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
  $deleteId = $_GET['deleteId'];
  $taskdelete = $functionObj->displayData();
  foreach($taskdelete as $trash){
    $trash = $task['task'];
    // $functionObj->insertTrashData();
    $functionObj->deleteRecord($deleteId, $trash);
  }
  
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

  <div class="card text-center">
    <h4 class="bg-dark text-dark shadow p-3  bg-white rounded"> <i class="fas fa-tasks"></i> My To Do List</h4>
  </div>

  <div class="container">
    <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<script>swal('Good job!', 'Your Task Successfully Added', 'success');</script>";
    }
    if (isset($_GET['msg2']) == "update") {
      echo "<script>swal('Good job!', 'Your Task Successfully Updated', 'success');</script>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<script>swal('Good job!', 'Your Task Successfully Deleted', 'success');</script>";
    }
    ?>
    <a href="trash.php"><button class="btn btn-danger mt-3" style="float:right;margin-left:5px">Trash&nbsp<i class="fa fa-trash" aria-hidden="true" ></i></button></a>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2 mt-3" data-toggle="modal" data-target="#exampleModal" style="float:right;">
      Add Task&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ENTER YOUR TASK HERE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" class="form-inline mb-4" method="post">
              <input type="text" class="form-control" name="task" placeholder="Enter task" required="" style="width: 91%;">
              <button type="button" class="btn btn-secondary mt-2   mr-2" data-dismiss="modal" style="margin: float;">Close</button>
              <input type="submit" name="submit" class="btn btn-primary mt-2" style="margin: float;" value="Add task">
            </form>
          </div>
        </div>
      </div>
    </div>



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
        $tasks = $functionObj->displayData();
        foreach ($tasks as $task) {

        ?>
          <tr>
            <td><input class="check" type="checkbox" >&nbsp<?php echo $task['task'] ?></td>
            <td><?php echo $task['created_at'] ?></td>
            <td>
              <a href="edit.php?editId=<?php echo $task['id'] ?>" style="color:green">
                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
              <a href="index.php?deleteId=<?php echo $task['id'] ?>" style="color:red">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a>&nbsp

            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
   
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
   $('.check').change(function(){
    if($(this).prop("checked") == true){
       
        $(this).parent().css("text-decoration","line-through");
        }
    else if($(this).prop("checked") == false){
            $(this).parent().parent().css("text-decoration","none");
        }
        });
  </script>
  </script>
</body>

</html>