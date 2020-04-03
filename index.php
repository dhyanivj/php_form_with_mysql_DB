<?php
if(isset($_POST['name'])){
    //setting connection variable
    $server = "localhost";
    $username="root";
    $password="";
//create db connection
    $con = mysqli_connect($server,$username,$password);
    //check for connection success
    if(!$con){
        die('failed due to'. mysqli_connect_error());
    }
    // echo "connected"; //for new only
    //collect post variable
    $name= $_POST['name'];
$gender= $_POST['gender'];
$age= $_POST['age'];
$email= $_POST['email'];
$phone= $_POST['phone'];

    $sql = "    INSERT INTO`trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', current_timestamp());";
    // echo $sql;
    if($con->query($sql)==true){
        // echo "successfully inserted";
        $insert=true;
    }
    else{
        echo "error: $sql <br> $con->error";
    }
    $con->close();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my travelsite</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }
        
        .container {
            background-color: rgb(213, 243, 165);
            padding: 30px;
        }
        
        .container h3,
        p {
            text-align: center;
        }
        
        input {
            display: block;
            width: 80%;
            padding: 20px;
            margin: 7px auto;
            border: 2px solid black;
            border-radius: 11px;
            outline: none;
        }
        
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        
        .btn {
            padding: 8px;
            border: 3px solid black;
            background-color: azure;
            border-radius: 9px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Welcome to the travel agency form for Us</h3>
        <p>enter all of the deltails so we can confirm you seat for the us trip</p>
    
       
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="text" name="email" id="email" placeholder="enter your email">
            <input type="text" name="phone" id="phone" placeholder="enter your phone">
            <button class="btn">Submit</button>
            <?php
       if ($insert==true)
       {
           echo "thanks for submiting form";
       }
       
       
       ?>
        </form>


    </div>
    <script src="index.js"></script>
 
</body>

</html>