<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Permite que um admin faça qualquer ação.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->is_admin) {
            return true;
        }
        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Article $article): bool
    {
        return false;
    }

    /**
     * Qualquer usuário logado pode criar um artigo.
     * O middleware 'auth' já cuida de verificar se está logado, então aqui só retornamos true.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Um usuário pode editar seu próprio artigo. (Admin já foi permitido no `before`)
     */
    public function update(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }


    /**
     * Apenas admins podem apagar. (Já tratado no `before`, então retornamos false para os outros)
     */
    public function delete(User $user, Article $article): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article): bool
    {
        return false;
    }
}
