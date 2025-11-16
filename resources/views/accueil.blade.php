<!DOCTYPE html>
<html>
    <head>

        <title>Accueil</title>

    </head>

    <body>
        <h1>Liste des articles</h1>
        <a href="{{ route('articles.creer') }}">Ajouter</a>
        <a href="{{ route('articles.exporter') }}">Exporter</a>

        <!-- Message servant à confirmer que l'ajout, la modification ou la suppression d'un article a bien été effectué -->
        @if(session('success'))
            <div style="color: green; font-weight: bold;">
                {{ session('success')}}
            </div>
        @endif

        <table border = "1" cellpading="5">
            <thead>
                <th>id</th>
                <th>Nom</th>
                <th>Prix ht</th>
                <th>Prix d'achat</th>
                <th>Taux TGC</th>
                <th>Famille</th>
            </thead>
            <tbody>
                @foreach($articles as $article)

                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->nom }}</td>
                    <td>{{ $article->prix_ht }}</td>
                    <td>{{ $article->prix_achat }}</td>
                    <td>{{ $article->taux_tgc }}</td>
                    <td>{{ $article->famille_id }}</td>
                    <td><a href="{{ route('articles.modifier', $article->id) }}">Modifier</a></td>
                    <td><a href="{{ route('articles.confirmerSuppression', $article->id) }}">Supprimer</a></td>
                 @endforeach
                </tr>
            </tbody>
        </table>
    </body>
</html>


