<?php

namespace Dk\Liker;

trait LikeOpportunity
{
    /**
     * @param $user
     * @return mixed
     */
    public function isLikedBy($user)
    {
        return $this->likes->contains($user);
    }

    /**
     * @return mixed
     */
    public function countAllRatings()
    {
        $dislikes = $this->countRatings('dislike');
        $likes = $this->countRatings('like');
        return $dislikes + $likes;
    }

    /**
     * @return mixed
     */
    public function countLikes()
    {
        return $this->countRatings('like');
    }

    /**
     * @return mixed
     */
    public function countDislikes()
    {
        return $this->countRatings('dislike');
    }

    /**
     * @param null $type
     * @return mixed
     */
    public function countRatings($type = null)
    {
        $likes = $this->likes();

        if (!is_null($type)) $likes->wherePivotIn('type', [$type]);

        return $likes->count();
    }

    /**
     * @return mixed
     */
    public function likes()
    {
        $like = ($this->like) ? $this->like : __CLASS__;

        return $this->morphToMany($like, 'likable', 'likes');
    }
}
