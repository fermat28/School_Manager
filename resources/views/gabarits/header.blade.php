<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Michael NSOM">
    <title>Etude - Profil</title>

    <!-- Favicons -->
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.png') }}" type="image/x-icon"/>
    <link rel="icon" href="{{ URL::asset('assets/img/apple-touch-icon.png') }}" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <link href= {{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}  rel="stylesheet">
    <!--external css-->
    <link href= {{ asset('assets/lib/font-awesome/css/font-awesome.css') }}  rel="stylesheet">
    <link href= {{ asset('plugins/ijaboCroptool/ijaboCropTool.min.css') }}  rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href= {{ asset('assets/css/style.css') }}  rel="stylesheet">
    <link href= {{ asset('assets/css/style-responsive.css') }}  rel="stylesheet">

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        <?= url('accueil/sign/compte') ?>
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="<?= url('assets/index.html')?>" class="logo"><b>MK<span>SkOOL</span></b></a>
        <!--logo end-->

        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="{{route('logout')}}">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered">
             @if($photo)
              <img src="{{ URL::asset('assets/img/profil/' .$photo) }}" class="img-circle" width="80" height="80">  @else
              <img src="{{ URL::asset('assets/img/profil/avatar.jpg') }}" class="img-circle" width="80">
              @endif
                </p>
                <h5 class="centered"><?= $nom.' '.$prenom ?></h5>
                <li class="mt">
                    <a class="active" href="/compte">
                        <i class="fa fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="mt">
                    <a class="active" href="">
                        <i class="fa fa-question-circle"></i>
                        <span>Evaluations</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

