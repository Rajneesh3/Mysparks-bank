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
  // echo "Connection to db successful<br>";
}

if(isset($_POST['submit']))
{
    $from = (isset($_GET['id']) ? $_GET['id'] : '');
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

     if($amount == 0){


         echo "alert('Oops! Zero value cannot be transferred')";

     }


    else {

                // deducting amount from sender's account
                $bal = $sql1['BALANCE'] - $amount;
                $sql = "UPDATE customers set BALANCE=$bal where id=$from";
                mysqli_query($conn,$sql);


                // adding amount to reciever's account
                $newbalance = $sql2['BALANCE'] + $amount;
                $sql = "UPDATE customers set BALANCE=$newbalance where id=$to";

                mysqli_query($conn,$sql);

                $sender = $sql1['NAME'];
                $receiver = $sql2['NAME'];
                $sql = "INSERT INTO transactionhistory (SENDER, RECEIVER, AMOUNT) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Done Successfully');
                                     window.location='transactionhistory.php';
                           </script>";

                }

                $newbalance= 0;
                $amount =0;
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTION</title>
  <link rel="stylesheet" href="table.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<body>

	<div class="container">
        <h1 class="text-center pt-4">TRANSACTION</h1>
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
              // echo "Connection to db successful<br>";
}
                $sid = (isset($_GET['id']) ? $_GET['id'] : '');
                $sql = "SELECT * FROM  customers where id='$sid'";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
            $row=mysqli_fetch_array($result)  ;
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">NAME</th>
                    <th class="text-center">EMAIL</th>
                    <th class="text-center">BALANCE</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $row['ID'] ?></td>
                    <td class="py-2"><?php echo $row['NAME'] ?></td>
                    <td class="py-2"><?php echo $row['EMAIL'] ?></td>
                    <td class="py-2"><?php echo $row['BALANCE'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="color:white"  >TRANSFER TO:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected style="color:white">Choose</option>
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
                $sid=(isset($_GET['id']) ? $_GET['id'] : '');
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['ID'];?>" >

                    <?php echo $rows['NAME'] ;?> (BALANCE:
                    <?php echo $rows['BALANCE'] ;?> )

                </option>
            <?php
                }
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color:white">AMOUNT:</label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
                <div class="text-center" >
            <button class="btn btn-primary btn-lg " name="submit" type="submit" id="myBtn" style="color:white">TRANSFER</button>
            </div>
        </form>
    </div>
    <div class=" hqq nav-btns">
    <button type="button" onclick="location.href='index.html'" class="btn hq btn-primary btn-lg">HOME</button>
    </div>
</body>
</html>
