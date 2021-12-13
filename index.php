<?php
$insert = false;
if(isset($_POST['name'])){
       $SERVER = "localhost";
       $username = "root";
       $password = "";

       $con = mysqli_connect($SERVER, $username, $password);

       if(!$con) {
           die("connection to this database failed due to" . mysqli_connect_error());
       }
    //    echo "success connecting to db";

       $name = $_POST['name'];
       $dept = $_POST['dept'];
       $year = $_POST['year'];
       $age = $_POST['age'];
       $email = $_POST['email'];
       $phone = $_POST['phone'];
       $desc = $_POST['desc'];
       
       $sql = "INSERT INTO `trip`.`trip` (`name`, `dept`, `year`, `age`, `email`, `ph`, `desc`) 
               VALUES ('$name', '$dept', ' $year', '$age', '$email', '$phone', '$desc');";
        // echo $sql;

        if($con->query($sql) == true){
        //    echo "successfull inserted";  
            $insert = true;
        }
        else{
            echo "ERROE : $sql <br> $con->error";
        }

        $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Smooch&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
       <h1>Adamas University - IIT kharagpur Trip form</h1>
        <p>Enter your details to confirm participation in the trip</p>

       <form action="index.php" method="post">
       <input type="text" name="name" id="name" placeholder="Enter your Name" required>
           <input type="text" name="dept" id="dept" placeholder="Enter your Department" required>
           <input type="text" name="year" id="year" placeholder="Enter your Year" required>
           <input type="text" name="age" id="age" placeholder="Enter your Age" required>
           <input type="email" name="email" id="email" placeholder="Enter your Email" required>
           <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number" required>
           <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other Information here"></textarea>
           <button class="btn">Submit</button>
       </form>

       <?php
       if($insert == true){
        echo "<p class='submitmsg' style='color: rgb(26, 168, 13); font-size: 20px; '>your form has been submitted successfully!!</p>";
        }
        ?>
    </div>
    

    <script src="index.js"></script>
</body>
</html>