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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php include("./view/navbar.php")?>
<?php include("./view/formAddMessage.php") ?>
<?php include("./view/modal/modalSignupLogin.php") ?>

<?php include("./view/modal/modalForgotPassword.php") ?>
<?php include("./view/modal/modalNewPassword.php") ?>
<?php //include("./model/php/captcha.php") ?>
<?php include("./view/modal/modalConfirmDeleteMsg.php") ?>
<?php include("./view/modal/modalEditMsg.php") ?>


<?php if($_SESSION['name']): ?>
<button  type="button" class="btn btn-primary lang" data-bs-toggle="modal" data-bs-target="#addMessageModal" id="btn-show-modal-add" data-translate="addmesage">Add message</button>
<?php endif; ?>

<div class="pagination"></div>


<table class="table" id="table">
    <thead>
    <tr>
        <th data-column-name="name" data-sort-direction="asc" class="sort lang" title="Click to sort" data-translate="username">Username</th>
        <th data-column-name="email" data-sort-direction="asc" class="sort lang" title="Click to sort" data-translate="email">Email</th>
        <th class="lang" data-translate="message">Message</th>
        <th data-column-name="date" data-sort-direction="desc" class="sort lang" title="Click to sort" data-translate="date">Date</th>
    </tr>
    </thead>
    <tbody id="items-row">

    </tbody>
</table>

<div class="pagination"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="./model/js/userRegister.js"></script>
<script src="./model/js/userLogin.js"></script>
<script src="./model/js/userLogout.js"></script>
<script src="./model/js/addMessage.js"></script>
<script src="./model/js/getAll.js"></script>
<script src="./model/js/forgotPassword.js"></script>
<script src="./model/js/newPassword.js"></script>
<script src="./model/js/pagination.js"></script>
<script src="./model/js/sort.js"></script>
<script src="./model/js/messageDelete.js"></script>
<script src="./model/js/messageEdit.js"></script>
<script src="./model/js/translate.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

</body>

</html>


