<?php
session_start();
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand lang" data-translate="logo" href="#">Guest book</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active lang" aria-current="page" href="#" key="home">Home</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link lang" href="#" key="link">Link</a>-->
<!--                </li>-->
                    <div class="form-control">
                        <button type="button" id="eng" class="btn  translate">ENG</button>
                        <button type="button" id="ua" class="btn  translate">UA</button>
                    </div>


            </ul>
            <form class="d-flex" role="search">

                <?php if (isset($_SESSION['name']) && !empty($_SESSION['name'])): ?>
                    <p id="greeting-text">Hello, <?= $_SESSION['name']?></p>
                    <button class="btn btn-outline-success lang" type="submit" id="btn-logout" data-translate="logout">Log out</button>
                <?php else: ?>

                    <button class="btn btn-outline-success lang" type="button" data-bs-toggle="modal"
                            data-bs-target="#modalSignupLogin" id="btn-login" data-translate="login">Log in
                    </button>
                    <button type="button" class="btn btn-primary lang" data-bs-toggle="modal"
                            data-bs-target="#modalSignupLogin"
                            id="btn-signup" data-translate="signup">Sign up
                    </button>
                <?php endif; ?>


            </form>
        </div>
    </div>
</nav>


<!--ДО ЗМІН-->
<!--<nav class="navbar navbar-expand-lg bg-body-tertiary">-->
<!--    <div class="container-fluid">-->
<!--        <a class="navbar-brand" href="#">Navbar</a>-->
<!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"-->
<!--                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" aria-current="page" href="#">Home</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Link</a>-->
<!--                </li>-->
<!---->
<!--            </ul>-->
<!--            <form class="d-flex" role="search">-->
<!--                <p id="greeting-text"></p>-->
<!--                --><?php
//                //if($_SESSION['name']){
//                //    echo "Імя існує!!!!";
//                //}else {echo "НЕМАЄ ТАКОГО ІМЕНІ в СЕСІЇ";}
//                ////?>
<!---->
<!--                <button class="btn btn-outline-success" type="submit" id="btn-logout">Log out</button>-->
<!---->
<!--                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"-->
<!--                        data-bs-target="#modalSignupLogin" id="btn-login">Log in-->
<!--                </button>-->
<!--                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSignupLogin"-->
<!--                        id="btn-signup">Sign up-->
<!--                </button>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->