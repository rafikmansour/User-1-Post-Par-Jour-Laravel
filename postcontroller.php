// app/Http/Controllers/PostController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        // Vérifier si l'utilisateur a déjà posté aujourd'hui
        $alreadyPostedToday = Post::where('user_id', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->exists();

        if ($alreadyPostedToday) {
            return response()->json(['message' => 'Vous avez déjà posté aujourd\'hui.']);
        }

        // Enregistrer le nouveau post de l'utilisateur
        $post = new Post();
        $post->user_id = $user->id;
        $post->content = $request->input('content');
        $post->save();

        return response()->json(['message' => 'Post publié avec succès.']);
    }
}
