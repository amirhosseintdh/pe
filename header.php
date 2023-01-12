<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>assets/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>assets/style.css">
    <link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>assets/icofont/icofont.min.css">
    <title>Document</title>
</head>
<body dir="rtl" id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
            <i class="icofont-navigation-menu" id="header-toggle"></i>
        </div>

        <div class="header__nav_items" id="header__nav_items"></div>
    </header>
    <div class="r-navbar" id="navbar">
        <nav class="__nav">
            <div >
                <div class="nav__brand">
                    <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>assets/site_icon.png" style="height: 43px;width: 43px;" alt="">
                    <span class="nav__logo-name">دانشگاه</span>
                </div>
                <div class="nav__list">
                    <a href="#" class="nav__link active">
                        <i class="icofont-home nav__icon"></i>
                        <span class="nav__name">
                            خانه
                        </span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div>
        <div class="container-fluid">