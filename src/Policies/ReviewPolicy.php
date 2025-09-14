<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews\Policies;

use App\Models\User;
use Mortezaa97\Reviews\Models\Review;

class ReviewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Review $review): bool
    {
        return $user->id === $review->created_by || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Review $review): bool
    {
        return $user->id === $review->created_by || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Review $review): bool
    {
        return $user->id === $review->created_by || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Review $review): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Review $review): bool
    {
        return $user->hasRole('admin');
    }
}
