
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main conten t start-->
    @include("gabarits.header" , ['photo' => $photo , 'nom' => $nom , 'prenom' => $prenom ])
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="row content-panel">
                        <div class="col-md-4 profile-text mt mb centered">
                            <div class="right-divider">
                                <h4>0</h4>
                                <h6>Devoirs</h6>
                                <h4>0</h4>
                                <h6>Evaluation</h6>
                                <h4>0</h4>
                                <h6>Note CC</h6>
                            </div>
                        </div>
                        <!-- /col-md-4 -->
                        <div class="col-md-4 profile-text">
                            <h3>MKSKOOL</h3>
                            <h6>Main Administrator</h6>
                            <p>Toutes vos notes d'information seront disponible ici.</p>
                            <br>

                        </div>
                        <!-- /col-md-4 -->
                        <div class="col-md-4 centered">
                            <div class="profile-pic">
                                <p>
                                    @if($photo)
                                     <img src="{{ URL::asset('assets/img/profil/'.$photo)}}" class="image circle"  >
                                         @else
                                     <img src="{{ URL::asset('assets/img/profil/avatar.jpg') }}" class="img-circle">
                                     <form action="{{route('image.uploaded')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="image">
                                        <input type="submit" value="Upload">
                                    </form>
                                     @endif
                                </p>
                            </div>
                        </div>
                        <!-- /col-md-4 -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /col-lg-12 -->
                <div class="col-lg-12 mt">
                    <div class="row content-panel">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a data-toggle="tab" href="{{ asset('assets/#overview') }}">Mes
                                        devoirs</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="{{ asset('assets/#contact') }}"
                                       class="contact-map">Activités</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="{{ asset('assets/#edit') }}">Mon profil</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /panel-heading -->
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="overview" class="tab-pane active">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Liste devoir</h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="bg-theme text-white">
                                                            <th>#</th>
                                                            <th>Code</th>
                                                            <th>Intitulé</th>
                                                            <th>Détails</th>
                                                            <th>Délais</th>
                                                            <th>Nom fichier</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <style>
                                                        input.y {
                                                           display: block;
                                                           visibility: hidden;
                                                           width: 0;
                                                           height: 0;
                                                       }
                                                       </style>
                                                    <tbody>
                                                        @foreach ($devoirs as $devoir)
                                                        <tr>

                                                            <td> #</td>
                                                            <td>{{$devoir->code}} </td>
                                                            <td>{{$devoir->intitule}} </td>
                                                            <td>{{$devoir->details}}</td>
                                                            <td>{{$devoir->delais}}</td>
                                                                @foreach ($files as $file)
                                                                    @if ($devoir->code == $file->id_devoir)
                                                                    <td>{{$file->name}}</td>
                                                                    @endif
                                                                @endforeach
                                                         <td> <form action="{{route('fileUpload')}}" method="POST" name="submit" enctype="multipart/form-data">
                                                                @csrf
                                                                <input class="yo" type="file" name="file" size="chars">
                                                                <button type="" class="fa fa-upload btn btn-primary"
                                                                      title="Envoyer le devoir"></span> </button></form>
                                                                      @foreach ($files as $file)
                                                            @if ($devoir->code == $file->id_devoir)
                                                            <form action="{{route('filemodified' , ['id' => $file->id])}}" method="POST" name="submit" enctype="multipart/form-data">
                                                                @csrf
                                                                <input class="yo" type="file" name="file" size="chars">
                                                                <button type="" class="fa fa-pencil btn btn-success"
                                                                      title="modifier fichier"></span> </button></form>
                                                    <a href= "{{route('filedeleted' , ['id' => $file->id])}}" class="delete" title="supprimer le fichier" data-toggle="tooltip"><i class="fa fa-close btn btn-danger"></i></a>
                                                            @endif
                                                    @endforeach
                                                        </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /col-md-6 -->
                                        <div class="col-md-6 detailed">
                                            <h4>Mes Stats - Devoir 1</h4>
                                            <div class="row centered mt mb">
                                                <div class="col-sm-4">
                                                    <h1><i class="fa fa-building"></i></h1>
                                                    @if($dat != NULL)
                                                    <h3>{{$dat->note}}</h3>
                                                    @else <h3>0</h3>
                                                    @endif
                                                    <h6>NOTE PROVISOIRE</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h1><i class="fa fa-trophy"></i></h1>
                                                    @if($dat != NULL)
                                                    <h3>{{$dat->bonus}}</h3>
                                                    @else <h3>0</h3>
                                                    @endif
                                                    <h6>BONUS</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h1><i class="fa fa-dollar"></i></h1>
                                                    @if($dat != NULL)
                                                    <h3>{{($dat->note) + ($dat->bonus)}}</h3>
                                                    @else <h3>0</h3>
                                                    @endif
                                                    <h6>NOTE FINAL</h6>
                                                </div>
                                            </div>
                                            <!-- /row -->
                                            <h4>Mon Groupe</h4>
                                            <div class="row centered mb">
                                                <ul class="my-friends">
                                                    <li>
                                                        <div class="friends-pic"><img class="img-circle" width="35" height="35" src="{{ asset('assets/img/friends/fr-01.jpg') }}"></div>
                                                    </li>
                                                    <li>
                                                        <div class="friends-pic"><div class="activity-icon bg-theme
                                                        add-user" title="Ajouter membre">
                                             <form class="form-login form-sign" action="{{ route('group.start')}}">
                                                            @csrf
                                                <button class="activity-icon bg-theme add-user"><i class="fa fa-plus"></i></button>

                                            </div></form>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                            <!-- /row -->
                                            <h4>Tâches en cours</h4>
                                            <div class="row centered">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <h5>Création de gabarit (50%)</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                            <span class="sr-only">50% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                    <h5>Cahier de charge (95%)</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                            <span class="sr-only">95% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /col-md-8 -->
                                            </div>
                                            <!-- /row -->
                                        </div>
                                        <!-- /col-md-6 -->
                                    </div>
                                    <!-- /OVERVIEW -->
                                </div>
                                <!-- /tab-pane -->
                                <div id="contact" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Devoir Classe</h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="bg-theme text-white">
                                                            <th>#</th>
                                                            <th>Groupe</th>
                                                            <th>Fichiers</th>
                                                            <th>Note</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($groups_files as $group_file)
                                                        <tr>

                                                            <td>#</td>
                                                            @foreach ($groups as $group)
                                                                @if ($group_file->id_groupe == $group->id )
                                                                <td>{{$group->nom}}</td>
                                                                @endif
                                                            @endforeach
                                                            <td class="text-center"><a href= "{{route('filedownloaded' , ['id' => $group_file->id])}}" class="delete" title="download file" data-toggle="tooltip"><i class="fa fa-download btn btn-primary"></i></a>
                                                                <label for="file"> {{$group_file->name}} </label></td>
                                                            <td>
                                                                @foreach ($groups as $group)
                                                                @if ($group_file->id_groupe == $group->id )
                                                                <form action="{{route('groupnoted', ['id' => $group->id])}}" method="POST" name="submit" >
                                                                    @csrf
                                                                    <input class="form-control" type="number" name="note" max="20" min="0">
                                                                    <button type='submit' class="fa fa-check btn btn-primary"></span> </button></form>
                                                                        @endif
                                                                       @endforeach
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6 detailed">
                                            <h4>Mes Stats - Devoir 1</h4>
                                            <div class="row centered mt mb">
                                                <div class="col-sm-4">
                                                    <h1><i class="fa fa-building"></i></h1>
                                                    <h3>{{$group->note}}</h3>
                                                    <h6>NOTE PROVISOIRE</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h1><i class="fa fa-trophy"></i></h1>
                                                    <h3>{{$group->bonus}}</h3>
                                                    <h6>BONUS</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h1><i class="fa fa-dollar"></i></h1>
                                                    <h3>{{$group->note + $group->bonus}}</h3>
                                                    <h6>NOTE FINAL</h6>
                                                </div>
                                            </div>
                                            <!-- /row -->
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /tab-pane -->
                                <div id="edit" class="tab-pane">
                                    <div class="row">
                                        <form  action ="{{ route('update')}}" method="POST" class="form-login form-sign">
                                            @csrf
                                            <div class="col-md-6 detailed">
                                                <h4>Informations Personnelles</h4>
                                                <div class="login-wrap">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label"> Avatar</label>
                                                        <div class="col-lg-6">
                                                            <input type="file" id="admin_image" name="admin_image" class="file-pos">
                                                        </div>
                                                    </div>
                                                    <label>
                                                        Noms
                                                        <input type="text" class="form-control"  placeholder="{{$nom}}"  name="nom">
                                                    </label>
                                                    <label>
                                                        Prenoms
                                                        <input type="text" class="form-control"  placeholder="{{$prenom}}" name="prenom">
                                                    </label>
                                                    <label>
                                                        Date de naissance
                                                        <input type="text" class="form-control" placeholder="Date de naissance"  name="date_nais">
                                                    </label>
                                                    <label>
                                                        Genre
                                                        <select class="form-control" name="genre">
                                                            <option>Masculin</option>
                                                            <option>Féminin</option>
                                                        </select>
                                                    </label>
                                                    <label>
                                                        Téléphone
                                                        <input type="text" class="form-control"  placeholder="{{$telephone}}" name="telephone">
                                                    </label>
                                                    <label>
                                                        Mot de passe
                                                        <input type="password" class="form-control" placeholder="Mot de passe" name="password" >
                                                    </label>
                                                    <label class="hidden">
                                                        <input type="password" class="form-control" placeholder="Confirmer mode passe">
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="col-md-6 detailed">
                                                <h4>Informations Académique</h4>
                                                <div class="login-wrap">
                                                    <label>
                                                        Ecole
                                                        <select class="form-control">
                                                            <option>ENSET de Douala</option>
                                                            <option>Polytech de Douala</option>
                                                        </select>
                                                    </label>
                                                    <label>
                                                        Filière
                                                        <select class="form-control">
                                                            <option>TTIC</option>
                                                            <option>GINFO</option>
                                                        </select>
                                                    </label>
                                                    <label>
                                                        Spécialité
                                                        <select class="form-control">
                                                            <option>Génie logiciel</option>
                                                            <option>G2I</option>
                                                        </select>
                                                    </label>
                                                    <label>
                                                        Niveau
                                                        <select class="form-control">
                                                            <option>3</option>
                                                            <option>4</option>
                                                        </select>
                                                    </label>
                                                    <label>
                                                        Matricule
                                                        <input type="text" class="form-control" placeholder="{{$matricule}}" name="matricule">
                                                    </label>

                                                    <button class="btn btn-theme" href="#"
                                                            type="submit"> Enregitrer</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /tab-pane -->
                            </div>
                            <!-- /tab-content -->
                        </div>
                        <!-- /panel-body -->
                    </div>
                    <!-- /col-lg-12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </section>
        <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
@include("gabarits.footer")
