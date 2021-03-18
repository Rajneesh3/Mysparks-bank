<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTION HISTORY</title>
    <link rel="stylesheet" href="table.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

	<div class="container">
        <h1 class="text-center pt-4">TRANSACTION HISTORY</h1>

       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">DATE-TIME</th>
                <th class="text-center">SN</th>
                <th class="text-center">SENDER</th>
                <th class="text-center">RECEIVER</th>
                <th class="text-center">AMOUNT</th>
            </tr>
        </thead>
        <tbody>
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


            $sql ="select * from transactionhistory";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
            ?>
              <tr>
              <td class="py-2"><?php echo $rows['DATE-TIME']; ?> </td>
              <td class="py-2"><?php echo $rows['SN']; ?></td>
              <td class="py-2"><?php echo $rows['SENDER']; ?></td>
              <td class="py-2"><?php echo $rows['RECEIVER']; ?></td>
              <td class="py-2"><?php echo $rows['AMOUNT']; ?> </td>
              </tr>

          <?php

            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<div class=" hqq nav-btns">
<button type="button" onclick="location.href='index.html'" class="btn hq btn-primary btn-lg">HOME</button>
</div>
</body>
</html>
