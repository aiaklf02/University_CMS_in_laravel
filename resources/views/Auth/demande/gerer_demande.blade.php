@extends('auth.home') 
@section('title', 'Demandes Reçues')

@section('frameContent')

    <link rel="stylesheet" href="../../../css/auth_home.css">

    <section class="larg">

        @if (session('message'))
            <div style="background-color: green; color: white; padding: 10px; text-align: center; border-radius: 5px;">
                {{ session('message') }}
            </div>
        @endif

        @if(count($demandes) == 0) 
        <div style="width:100%;display:flex;justify-content:center;">
            <h3>Aucune Demande dans votre Boite pour le Moment</h3>
        </div>
        @endif

        @foreach ($demandes as $demande)
            <div>
                <h3> {{ $demande->type }}<span class="entypo-down-open"></span></h3>

                @if (auth()->user()->role !== 0)
                    
                    <h6>{{ $demande->etudiant->name }}</h6>
                    <h6>{{ $demande->etudiant->email }}</h6>
                @endif

                <h6 style="padding: 0px; margin:0px;display: block" id="date_cre" for="auteur">Type de Document
                    :{{ $demande->type }}</h6>
                <h6 style="padding: 0px; margin:0px;display: block" id="date_cre" for="auteur">Faite Le
                    :{{ $demande->created_at }}</h6>
                <h6 style="padding: 0px; margin:0px;display: block" id="auteur" name="auteur">Etudiant(e) :
                    {{ $demande->user_id }} </h6>
                <p>{{ $demande->description }}</p>
                <div style="border:none;display: flex;justify-content:end">

            
                    <form action="{{ route('demandes.destroy', $demande->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-blackes">🚮 Supprimer</button>
                    </form>

                </div>
            </div>
        @endforeach


    </section>



    <script src="../../../js/auth_home.js"></script>
@endsection
