<?php

namespace Dk\Liker;

trait Like
{
    protected $likeRelation = __CLASS__;

    /**
     * @param $item
     */
    public function like($item)
    {
        $this->setType($item, 'like');
    }

    /**
     * @param $item
     */
    public function dislike($item)
    {
        $this->setType($item, 'dislike');
    }

    /**
     * @param $item
     * @param $type
     * @return mixed
     */
    public function setType($item, $type)
    {
        $items = array_fill_keys((array)$this->checkLikeItem($item), ['type' => $type]);

        return $this->likeItems()->sync($items, false);
    }

    /**
     * @return mixed
     */
    public function likeItems()
    {
        return $this->morphedByMany($this->likeRelation, 'likable', 'likes');
    }

    /**
     * @param $item
     * @return mixed
     */
    protected function checkLikeItem($item)
    {
        if ($item instanceof \Illuminate\Database\Eloquent\Model)
            $this->setLikeRelation(get_class($item));

        return $item->id;
    }

    /**
     * @param $class
     * @return mixed
     */
    protected function setLikeRelation($class)
    {
        return $this->likeRelation = $class;
    }
}
