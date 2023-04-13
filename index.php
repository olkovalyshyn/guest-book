<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guest-page</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<!--<h1>Hello, world!</h1>-->
<?php include("./view/navbar.php")?>
<a href="./view/formAddMessage.php">Add message</a>
<!--<button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMessageModal" >Add message</button>-->
<?php //include("./view/modal/formAddMessage.php") ?>
<?php include("./view/modal/modalSignupLogin.php") ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="./model/js/userRegister.js"></script>
<script src="./model/js/userLogin.js"></script>
<script src="./model/js/userLogout.js"></script>

</body>

</html>


