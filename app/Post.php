<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

    'title',
    'content'

    ];

    public function createdAt()
    {
        return $this->created_at->toFormattedDateString();
    }


}
