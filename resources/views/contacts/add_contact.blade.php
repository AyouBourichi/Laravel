<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ajouter un nouveau contact</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="">
            <div class="container-fluid">
                <h1>Nouveau contact</h1>
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                        @endif
                    @endforeach
                </div>
                {{ Form::open(array('url' => 'contact/store')) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Identité du contact</h3>
                                    <label>Civilité</label>
                                    <br>
                                    <button class="btn btnContact civilite female" civilite="F" type="button"><i class="fa fa-female" aria-hidden="true"></i> Madame</button>
                                    <button class="btn btnContact civilite male" civilite="M" type="button"><i class="fa fa-male" aria-hidden="true"></i> Monsieur</button>
                                    {{ Form::hidden('civilite', 'M', ['class' => 'inputCivilite']) }}
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                {{ Form::text('prenom', '', ['class' => 'form-control', 'placeholder' => 'Saisir votre prénom', 'required' => 'required']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                {{ Form::text('nom', '', ['class' => 'form-control', 'placeholder' => 'Saisir votre nom', 'required' => 'required']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fonction</label>
                                                {{ Form::text('fonction', '', ['class' => 'form-control', 'placeholder' => 'Saisir votre fonction']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Service</label>
                                                {{ Form::text('service', '', ['class' => 'form-control', 'placeholder' => 'Saisir votre service']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <div class="input-group">
                                            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Saisir votre e-mail', 'style'=>'border-right:0', 'required' => 'required']) }}
                                            <div class="input-group-append">
                                                <i class="fa fa-envelope emailIcon" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Téléphone</label>
                                                {{ Form::text('telephone', '', ['class' => 'form-control', 'placeholder' => 'Votre téléphone']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Date de naissance</label>
                                                {{ Form::text('date_naissance', '', ['class' => 'form-control datepicker', 'placeholder' => 'JJ/MM/AAAA']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Société</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                {{ Form::text('societe_nom', '', ['class' => 'form-control', 'placeholder' => 'Nom de société']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Adresse</label>
                                                {{ Form::textarea('societe_adresse', '', ['class' => 'form-control', 'placeholder' => 'Adresse de société', 'rows' => '5']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Code postal</label>
                                                {{ Form::number('societe_code_postal', '', ['class' => 'form-control', 'placeholder' => '- - - - -']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Ville</label>
                                                {{ Form::text('societe_ville', '', ['class' => 'form-control', 'placeholder' => 'ville']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Téléphone</label>
                                                {{ Form::text('societe_telephone', '', ['class' => 'form-control', 'placeholder' => 'Téléphone de société']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Site web</label>
                                                {{ Form::text('societe_site_web', '', ['class' => 'form-control', 'placeholder' => 'Site web de société']) }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divAction">
                        <button class="btn btnContact addNewContact"><i class="fa fa-pencil" aria-hidden="true"></i> Enregistrer</button>
                        <button class="btn btnContact btnReturn" type="button" onclick="window.location='{{ route('show_contact') }}'" ><i class="fa fa-th" aria-hidden="true"></i> Retour à la liste des contacts</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script>
            $( function() {
                $(".btnContact.civilite").click(function () {
                    $(".inputCivilite").val($(this).attr("civilite"));
                    $(".btnContact.civilite").css('opacity', .4);
                    $(this).css('opacity', 1)
                })
            });
        </script>
    </body>
</html>
