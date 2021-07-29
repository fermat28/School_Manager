<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title> Etude - Inscription </title>

    <!-- Favicons -->
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.png') }}" type="image/x-icon"/>
    <link rel="icon" href="{{ URL::asset('assets/img/apple-touch-icon.png') }}" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <link href= "{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}"  rel="stylesheet">
    <!--external css-->
    <link href= "{{ asset('assets/lib/font-awesome/css/font-awesome.css') }}"  rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href= "{{ asset('assets/css/style.css') }}"  rel="stylesheet">
    <link href= "{{ asset('assets/css/style-responsive.css') }}"  rel="stylesheet">

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
        <form class="form-login form-sign" action="{{ route('post.register') }}" method="POST">
            @if(Session::get('success'))
            <div class="alert alert-success">
               {{ Session::get('success') }}
            </div>
          @endif

          @if(Session::get('fail'))
            <div class="alert alert-danger">
               {{ Session::get('fail') }}
            </div>
          @endif

            @csrf
            <h2 class="form-login-heading">Créer Compte</h2>
            <div class="row">
                <div class="col-md-6">
                    <h3>Informations Personnelles</h3>
                    <div class="login-wrap">
                        <label>
                            Noms
                            <input type="text" class="form-control" placeholder="Noms" name="nom" required>
                        </label>
                        <label>
                            Prenoms
                            <input type="text" class="form-control" placeholder="Prenoms" name="prenom">
                        </label>
                        <label>
                            Date de naissance
                            <input type="date" class="form-control" placeholder="Date de naissance" name="date_nais" required>
                        </label>
                        <label>
                            Genre
                            <select class="form-control" name="genre">
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </label>
                        <label>
                            Téléphone
                            <input type="text" class="form-control" placeholder="Téléphone" name="telephone" required>
                        </label>
                        <label>
                            Mot de passe
                            <input type="password" class="form-control password" placeholder="Mot de passe"
                                   name="password" required>
                        </label>
                        <label>
                            <input type="password" class="form-control cpassword" placeholder="Confirmer mode passe" name="">
                        </label>
                        <label>
                            <span class="epassword text-danger">Les mots de passe doivent être identique</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Informations Académique</h3>
                    <div class="login-wrap">
                        <label>
                            Ecole
                            <select class="form-control cl_elt" data-target=".cl_fil" data-link="<?= url('accueil/list_filieres/') ?>">
                                <option value="" selected>Choisir</option>
                                    @foreach ($ecoles as $ecole):
                                <option value="<?= $ecole->id_faculte ?>"><?= $ecole->sigle ?></option>
                                 @endforeach
                            </select>
                        </label>
                        <label>
                            Filière
                            <select class="form-control cl_elt cl_fil" data-target=".cl_spec" data-link="<?= url('accueil/list_specialites/') ?>">
                                <option value="" selected>Choisir</option>
                                @foreach ($filieres as $fil):
                                <option value="<?= $fil->id_filiere ?>"><?= $fil->sigle ?></option>
                                 @endforeach
                            </select>
                        </label>
                        <label>
                            Spécialité
                            <select class="form-control cl_elt cl_spec" data-target=".cl_niv" data-link="<?= url('accueil/list_niveaux/') ?>">
                                <option value="" selected>Choisir</option>
                                @foreach ($specialites as $spec):
                                <option value="<?= $spec->id_filiere ?>"><?= $spec->sigle ?></option>
                                 @endforeach
                            </select>
                        </label>
                        <label>
                            Niveau
                            <select class="form-control cl_niv" name="niveau" required>
                                <option value="" selected>Choisir</option>
                               @foreach ($niveau as $level):
                                <option value="<?= $level->id_niveau ?>"><?= $level->nom ?></option>
                                 @endforeach
                            </select>
                        </label>
                        <label>
                            Matricule
                            <input type="text" class="form-control" placeholder="Matricule" name="matricule" required>
                        </label>

                        <label class="checkbox">
                            <?= isset($error) ? "<span class='text-danger'>Nous rencontrons un problème avec votre inscription !</span>" : ''?>
                        </label>

                        <button class="btn btn-theme btn-block"
                                type="submit"><i class="fa fa-lock"></i>Inscription </button>

                        <hr>
                        <div class="registration">
                            Vous avez déjà un compte?<br/>
                            <a class="" href="{{route('login')}}">
                                Se connecter à votre compte
                            </a>
                        </div>
                    </div>
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
    //filtre de liaison matierre niveau
    $('body').on('change', '.cl_elt', function(){
        var id = $(this).val();
        var target = $(this).attr('data-target');
        var link = $(this).attr('data-link');

        if(link){
            $.ajax({
                url : link+id,
                type: "GET",
                dataType: 'HTML',
                success: function(data)
                {
                    // alert(data);
                    $(target).html(data);
                    $(target).trigger('change');
                },
            });
        }
    });
    $('.cpassword').focusout(function (){
        let val = $(this).val();
        let val2 = $('.password').val();
        if(val != val2){
            $('.epassword').show();
        }
    });
    $('.cpassword, .password').focusin(function (){
      $('.epassword').hide();
    });
</script>
</body>
</html>
