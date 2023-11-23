<?php 
require 'assets/config/config.php';
ob_start();
session_start();

if (!isset($_SESSION['oturum'])) {
    
    header('Location:login.php');
}


?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeta Roleplay Gamnig Kontrol Paneli</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <!-- RESPONSIVE -->
    <link rel="stylesheet" media="(max-width: 768px)" href="assets/css/tablet.css">
    <link rel="stylesheet" media="(max-width: 500px)" href="assets/css/mobile.css">
</head>

<body>
    <section id="zeta-bg">
        <header class="bg-dark">
            <nav id="navbar">
                <h1 class="heading-text">Zeta RPG Kontrol Paneli</h1>
                <ul>
                    <li class="nav-item"><a href="https://zeta-rpg.com">Anasayfa</a></li>
                    <li class="nav-item"><a href="https://zeta-rpg.com/forum">Forum</a></li>
                    <li class="nav-item"><a href="#karakter-bilgileri">Karakter Bilgileri</a></li>
                    <li class="nav-item"><a href="#karakter-mulk">Karakter Mülkleri</a></li>
                </ul>
            </nav>
        </header>