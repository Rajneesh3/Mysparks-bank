<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "customers";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  die("sorry".mysqli_connect_error());
}
else{
  echo "Connection to db successful<br>";
}

$sql = "SELECT * FROM `customers`";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num > 0){
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CUSTOMERS LIST</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="table.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </head>
  <body>
    <h1>CUSTOMERS</h1>
   	<table >
   	<tr>
    <th>ID</th>
   	<th>NAME</th>
   	<th>EMAIL</th>
   	<th>BALANCE</th>
   	</tr>
   	<?php while($row=mysqli_fetch_array($result)):?>
   	<tr>
    <td><?php echo $row['ID'];?></td>
   	<td><?php echo $row['NAME'];?></td>
   	<td><?php echo $row['EMAIL'];?></td>
   	<td><?php echo $row['BALANCE'];?></td>
   	</tr>
   	<?php endwhile;?>
   	</table>
    <div class=" hqq nav-btns">
    <button type="button" onclick="location.href='index.html'" class="btn hq btn-primary btn-lg">HOME</button>
    </div>

  </body>
</html>
