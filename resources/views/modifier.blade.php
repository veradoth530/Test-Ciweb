<!DOCTYPE html>
<html>
    <head>

        <title>Modification d'un article</title>

    </head>

    <body>
        <h1>Modifier un article</h1>
        <a href="{{ route('accueil') }}">Revenir à l'accueil</a>

        <!--Retourne un message d'erreur-->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

         <form action="{{ route('articles.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nom : </label>
            <input type="text" name="nom" value="{{ $article->nom }}">

            <label>Prix HT : </label>
            <input type="number" name="prix_ht" value="{{ $article->prix_ht }}">

            <label>Prix d'achat : </label>
            <input type="number" name="prix_achat" value="{{ $article->prix_achat }}">

            <label>Taux TGC : </label>
            <input type="number" name="taux_tgc" value="{{ $article->taux_tgc }}">

            <label>Famille : </label>
            <select name="famille_id">
                @foreach($familles as $famille)
                    <option value="{{ $famille->id }}" {{ $famille->id == $article->famille_id ? 'selected': '' }}> {{ $famille->nom}}</option>
                @endforeach
            </select>

            <button type="submit">Modifier</button>
        
    </body>
</html>