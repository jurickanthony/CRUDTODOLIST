<?php

// Include database file
include 'functions.php';

$functionObj = new Functions();

// Edit task record
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
  $editId = $_GET['editId'];
  $task = $functionObj->displyaRecordById($editId);
}

// Update Record in task table
if (isset($_POST['update'])) {
  $functionObj->updateRecord($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>


  <!-- <div class="container">
    <form action="edit.php" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="uname" value="<?php echo $task['name']; ?>" required="">
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="uemail" value="<?php echo $task['email']; ?>" required="">
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="upname" value="<?php echo $task['username']; ?>" required="">
      </div>
      <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
      </div>
    </form>
  </div> -->

  <div class="card shadow p-3 mb-5 mt-5 bg-white rounded mx-auto" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title text-center mb-4">Update Your Task</h5> <hr>
    <form action="edit.php" method="POST">
      <div class="form-group">  
        <input type="text" class="form-control" name="task" value="<?php echo $task['task']; ?>" required="">
      </div>
      <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input type="submit" name="update" class="btn btn-primary btn-block" style="float:right;" value="Update">
      </div>
    </form>
  </div>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>