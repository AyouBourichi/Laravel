<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Liste de contacts</title>

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
                <h1>Liste des contacts</h1>

                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                        @endif
                    @endforeach
                </div>

                <button class="btn btnContact btnAddContact" type="button" onclick="window.location='{{ route('new_contact') }}'">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>Ajouter un contact
                </button>
                <table class="dataTable hover stripe cell-border">
                    <thead>
                        <tr>
                            <th>Civilité</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Téléphone</th>
                            <th>E-mail</th>
                            <th>Société</th>
                            <th>Ville</th>
                            <th style="text-align:right"><i class="fa fa-bars"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $contacts as $contact)
                            <tr>
                                <td>
                                    @if( $contact->civilite == "M")
                                        <i class="fa fa-male" style="color:#72BEE3"></i>
                                    @else
                                        <i class="fa fa-female" style="color:#ED73B2">
                                    @endif
                                </td>
                                <td>{{ $contact->prenom }}</td>
                                <td>{{ $contact->nom }}</td>
                                <td>{{ $contact->telephone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->societe_nom }}</td>
                                <td>{{ $contact->societe_ville }}</td>
                                <td class="tdAction">
                                    <a href="{{ route("update_contact_form", [$contact->id]) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <span class="deleteContact" path="{{ route("delete_contact", [$contact->id]) }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </span>
                                    <a href="{{ route("update_contact_form", [$contact->id]) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ $contact->societe_site_web }}">
                                        <i class="fa fa-street-view" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
        </script>
        <script>
            $( function() {
                $('.deleteContact').click(function () {
                    const trContact = $(this)
                    let path = trContact.attr('path');
                    swal({
                        title: "Êtes-vous sûr?",
                        text: "Une fois supprimé, vous ne pourrez plus récupérer ce contact!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                method: 'POST',
                                url: path,
                                success : function(result){
                                    trContact.parent().parent().remove();
                                    swal("Le contact a été supprimé..!", {
                                        icon: "success",
                                    });
                                }
                            });
                            // $.ajax({
                            //     type: 'POST',
                            //     url: path,
                            //     success : function(result){
                            //         swal("Le contact a été supprimé..!", {
                            //             icon: "success",
                            //         });
                            //     }
                            // });
                        }
                    });
                });
            });
        </script>
    </body>
</html>
