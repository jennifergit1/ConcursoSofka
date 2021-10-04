<?php
session_start();
if(isset($_SESSION["idUsuario"])){
    header("Location: inicio.php");
}else{
    header("Location: login.php");
}