
 <?php
include("db.php");

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $english=$_POST['english'];
  $science=$_POST['science'];
  $math=$_POST['math'];
  
  $sql="INSERT INTO `stdmrks`(`name`, `english`, `science`, `math`) VALUES ('".$name."',$english,$science,$math)";

  //$con->query($sql);
  $saved=$con->query($sql);
   if($saved){
    echo "<p class='text-success'>data inserted successfully</p>";
  }else{
    echo "<p class='text-danger'>Data Faild</p>";
  }
    
}
  $selectsql="SELECT * from stdmrks";
$students=$con->query($selectsql);

function marksheet($percentage){
    if($percentage>=80){
        return "Distinction";
    }else if($percentage<80 && $percentage>=70){
        return "First Division";
    }else if($percentage<70 && $percentage>=60){
        return "Second Division";
    }else if($percentage<60 && $percentage>=40){
        return "Third Division";
    }else{
        return "Fail";
    }
 }
  
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Students detail</title>
</head>

<body>
    <div class="container">
        <form action="index1.php" method="POST" >
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Students Name</b></label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><b>English</b></label>
                <input type="text" class="form-control" name="english">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><b>Science</b></label>
                <input type="text" class="form-control" name="science">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><b>Math</b></label>
                <input type="text" class="form-control" name="math">
            </div>
            <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
        </form>
    </div>
<br>
<br>
    <div class="container">

    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Students name</th>
      <th scope="col">English</th>
      <th scope="col">Science</th>
      <th scope="col">Math</th>
      <th scope="col">Total</th>
      <th scope="col">Percentage</th>
      <th scope="col">Pass/Fail</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if ($students->num_rows > 0) {
      while($row = $students->fetch_assoc()) { 
          $total=$row['english']+$row['science']+$row['math']; ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['english']; ?></td>
          <td><?php echo $row['science']; ?></td>
          <td><?php echo $row['math']; ?></td>
          <td><?php echo $total ; ?></td>
          <td><?php echo number_format(($total/3),2); ?>%</td>
          <td><?php echo marksheet($total/3) ?></td>
           <td>
              <a href="http://localhost/sms/edit.php/<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
              <a href="http://localhost/sms/marksheetdelete.php/?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
     
     
<?php }
    } else {
      echo "";
    }
?>
    
  </tbody>
</table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>