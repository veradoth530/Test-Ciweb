<!DOCTYPE html>
<html>
    <head>

        <title>Suppression d'un article</title>

    </head>

    <body>
        <h1>Supprimer un article</h1>
        <a href="{{ route('accueil') }}">Revenir à l'accueil</a>

        <p>Souhaitez-vous supprimer cet article ?</p>

        <label>Nom : </label> {{ $article->nom }}<br>

        <label>Prix HT : </label> {{ $article->prix_ht }}<br>

        <label>Prix d'achat : </label> {{ $article->prix_achat }}<br>

        <label>Taux TGC : </label> {{ $article->taux_tgc }}<br>

        <label>Famille : </label>{{ $article->famille->nom }}<br>

         <form action="{{ route('articles.supprimer', $article->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">Supprimer</button>
         </form>
    </body>
</html>