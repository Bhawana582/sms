<?php
include("db.php");
?>

<?php 

if(isset($_POST['submit'])){
  echo "4rf4rf4rf";
  $name=$_POST['name'];
  $address=$_POST['address'];
  $roll=$_POST['roll'];
  $phone=$_POST['phone'];

  /*
  data insert query= INSERT  eg. INSERT INTO tbl_name(filds) values(values)
    INSERT INTO `student`(`id`, `name`, `address`, `roll`, `phone`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])

  data update query= UPDATE 
  UPDATE `student` SET `id`=[value-1],`name`=[value-2],`address`=[value-3],`roll`=[value-4],`phone`=[value-5] WHERE 1


  data delete query= DELETE  DELETE FROM `student` WHERE 0

  data select query= SELECT  SELECT `id`, `name`, `address`, `roll`, `phone` FROM `student` WHERE 1

  select = SELECT * from tbl_name

  */

  $sql="INSERT INTO `student`(`name`, `address`, `roll`, `phone`) VALUES ('".$name."','".$address."',$roll,$phone)";
  $saved=$con->query($sql);
   if($saved){
    echo "<p class='text-success'>data inserted successfully</p>";
  }else{
    echo "<p class='text-danger'>Data Faild</p>";
  }
}

$selectsql="SELECT * from student";
$students=$con->query($selectsql);


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<div class="container">
<form action="index.php" method="GET">
  <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input required type="text" class="form-control" name="name" placeholder="Enter your name">
    <small id="NameHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input required type="text" class="form-control" name="address" placeholder="Enter your address">
  </div>
   <div class="form-group">
    <label for="exampleInputRoll1">Roll</label>
    <input required type="text" class="form-control" name="roll" placeholder="Enter your rollno">
  </div>
  <div class="form-group">
    <label for="exampleInputPhone1">Phone</label>
    <input required type="text" class="form-control" name="phone" placeholder="Enter your Phoneno">
  </div>
  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</form>
</div>
<br>
<br>
<!-- Table -->
<div class="container">
 <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Roll</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if ($students->num_rows > 0) {
      while($row = $students->fetch_assoc()) {  ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td><?php echo $row['roll']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td>
              <a href="http://localhost/sms/edit.php/<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
              <a href="http://localhost/sms/delete.php/?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
     
     
<?php }
    } else {
      echo "<td colspan='5'>0 results</td>";
    }
?>
    
  </tbody>
</table>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>