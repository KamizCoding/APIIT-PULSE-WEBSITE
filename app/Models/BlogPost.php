<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;
use App\Models\User;

class BlogPost extends Model
{
    use HasFactory;
    use Commentable;

    public function likes()
    {
        return $this->hasMany(BlogPostLike::class);
    }

    public function likedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}
