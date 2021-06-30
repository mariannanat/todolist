<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Weekly To Do List</title>
</head>
<body>

<?php
//richiama le funzionalità del form
 include __DIR__ .'./includes/form.php'; ?>


<?php

   if (isset($_SESSION['message'])): ?>
   <div class="alert alert-<?=$_SESSION['message_type']?>">

         <?php
         echo $_SESSION['message'];
         unset ($_SESSION['message']);
         ?>
  </div>
  <?php endif ?>

<?php
 $mysqli = new mysqli ('localhost', 'root', '', 'todolist') or die (mysqli_error(mysqli));
 $result = $mysqli->query("SELECT * FROM todolist.todo") or die ($mysqli->error);
?>
<div class="container row" mb-3>
<h1>WEEKLY TO DO LIST</h1><hr><br>
    <form action="./includes/form.php" method="POST">
    <input type="hidden" name="ID" value="<?php echo $id; ?>">
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="" value="<?php echo $name; ?>" placeholder="Enter your name">
    </div>
    <div class="mb-3">
    <label for="surname" class="form-label">Surname</label>
    <input type="text" class="form-control" name="surname" id="" value="<?php echo $surname; ?>" placeholder="Enter your surname">
    </div>
    <div class="mb-3">
    <label for="day" class="form-label">Day</label>
    <input type="text" class="form-control" name="day" value="<?php echo $day; ?>" placeholder="Enter the current day">
    </div>
    <div class="mb-3">
    <label for="activity" class="form-label">Activity</label>
    <input type="text" class="form-control" name="activity" value="<?php echo $activity; ?>" placeholder="Enter your activity">
    </div>
    <?php
    if ($update === true): ?>
    <button type="submit" name="update" class="btn btn-info">Update data</button>
   <?php else: ?>
    <button type="submit" name="save" class="btn btn-success">Insert data</button>
    <?php endif; ?> 
    
    <div class="mb-3">
    </form>
    </div>


    <br>
    <br>
    <hr style="margin-top:50px; border: 10px solid green;
     border-radius: 5px; margin-bottom:50px;">

<div class="container justify-content-center">
<table class="table">
   <thead>
     <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Surname</th>
       <th>Day</th>
       <th>Activity</th>
       <th>Action</th> 
    </tr>
   </thead>
   <?php
   //associo il fetch_assoc all'array $row
      while($row = $result->fetch_assoc()):
   ?>
   <tr>
      <td><?php echo $row['ID']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['surname']; ?></td>
      <td><?php echo $row['day']; ?></td>
      <td><?php echo $row['activity']; ?></td>
      <!-- per edit e delete button -->
      <td>
      <a href='index.php?edit=<?php echo $row['ID']; ?>' class="btn btn-warning">Edit</a>
      <a href='index.php?delete=<?php echo $row['ID']; ?>' class="btn btn-danger">Delete</a>
      </td>
   </tr>
      <?php endwhile; ?>
</table>

<?php
/* //stampo i dati del db come un array
pre_r($result->fetch_assoc());
pre_r($result->fetch_assoc());
function pre_r ($array) {
    echo '<pre>';
    print_r($array);
    echo'</pre>'; 
} */
?>


</body>
</html>