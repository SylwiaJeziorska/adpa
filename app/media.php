<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    protected $fillable = ['title','file_name','original_name','published_at', 'page_id' ];
    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
