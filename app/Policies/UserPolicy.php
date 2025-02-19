<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, User $model): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return false; // Les administrateurs ne peuvent pas créer de nouveaux utilisateurs
    }

    public function update(User $user, User $model): bool
    {
        // Les administrateurs peuvent uniquement modifier le statut d'administrateur
        return $user->isAdmin() && $user->id !== $model->id;
    }

    public function delete(User $user, User $model): bool
    {
        // Les administrateurs ne peuvent pas supprimer leur propre compte
        return $user->isAdmin() && $user->id !== $model->id;
    }
}
