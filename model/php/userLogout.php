<?php
session_start();
if($_POST['logout']){
    session_unset();
    session_destroy();
}