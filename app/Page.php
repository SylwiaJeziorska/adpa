<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title','content','model'];
    public function media()
    {
        return $this->hasMany('App\media');
    }
}
