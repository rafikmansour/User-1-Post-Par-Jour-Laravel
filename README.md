# Controller Laravel pour autoriser un utilisateur à poster un seul post par jour uniquement.

Dans ce Controller j'ai sauter les étapes sur comment créer un controller ou comment déclarer la route.

Nous allons créer un contrôleur qui gérera cette logique en utilisant le modèle Post pour enregistrer les publications et la table de base de données pour stocker les détails des publications des utilisateurs.

Assurez-vous que le modèle Post est correctement défini dans le fichier app/Models/Post.php. Assurez-vous également d'avoir une migration pour la table posts qui stockera les détails des publications des utilisateurs.

Dans le fichier routes/web.php ou routes/api.php, ajoutez la route pour la méthode store du contrôleur PostController.

<code><pre>
// routes/web.php ou routes/api.php

use App\Http\Controllers\PostController;

Route::post('/post', [PostController::class, 'store'])->middleware('auth');
</pre></code>

Maintenant, lorsque vous appelez l'API pour créer un nouveau post (par exemple, en utilisant une requête POST à l'URL /post), la méthode store du contrôleur PostController sera appelée. Le contrôleur vérifiera si l'utilisateur a déjà posté aujourd'hui en recherchant les publications de l'utilisateur pour la date actuelle. S'il a déjà posté, il renverra un message indiquant qu'un seul post par jour est autorisé. Sinon, il enregistrera le nouveau post de l'utilisateur.
Assurez-vous que l'utilisateur est authentifié (par exemple, en utilisant le middleware auth) avant de lui permettre de créer un post, afin de garantir que seuls les utilisateurs connectés peuvent publier.
