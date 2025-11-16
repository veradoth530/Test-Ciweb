<!DOCTYPE html>
<html>
    <head>

        <title>Ajout d'un article</title>

    </head>

    <body>
        <h1>Ajout d'un article</h1>
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

        <form action="{{ route('articles.ajout') }}" method="POST">
            @csrf
            <label>Nom : </label>
            <input type="text" name="nom" required>

            <label>Prix HT : </label>
            <input type="number" name="prix_ht" required>

            <label>Prix d'achat : </label>
            <input type="number" name="prix_achat" required>

            <label>Taux TGC : </label>
            <select name="taux_tgc">
                <option value="3">3%</option>
                <option value="6">6%</option>
                <option value="11">11%</option>
                <option value="22">22%</option>
            </select>

            <label>Famille : </label>
            <select name="famille_id">
                @foreach($familles as $famille)
                    <option value="{{ $famille->id }}">{{ $famille->nom }}</option>
                @endforeach
            </select>

            <button type="submit">Ajouter</button>
    </body>
</html>