<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title> Etude - Connexion</title>
    <!-- Favicons -->
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.png') }}" type="image/x-icon"/>
    <link rel="icon" href="{{ URL::asset('assets/img/apple-touch-icon.png') }}" type="image/x-icon"/>
    <!-- Bootstrap core CSS -->
    <link href= {{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}  rel="stylesheet">
    <!--external css-->
    <link href= {{ asset('assets/lib/font-awesome/css/font-awesome.css') }}  rel="stylesheet">
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
<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<div id="login-page">
    <div class="container">
        <form class="form-login" action="{{ route('login') }}" method="POST">
            @csrf
            <h2 class="form-login-heading">Connexion</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" placeholder="Matricule" name="login">
                <br>
                <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                <label class="checkbox">
                    <?= $errors ? '<span class="text-danger"> Login ou mot de passe incorrect !</span>' : ''?>
                </label>
                <button class="btn btn-theme btn-block"
                        type="submit"><i class="fa fa-lock"></i> Connexion</button>
                <hr>
                <div class="registration">
                    Vous n'avez pas de compte?<br/>
                    <a class="" href="{{route('register')}}">
                        Créer un compte
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="{{ asset('assets/lib/jquery.backstretch.min.js') }} "></script>
<script>
  $.backstretch("{{ asset('assets/img/login-bg.jpg') }}", {
    speed: 500
  });
</script>
</body>

</html>
