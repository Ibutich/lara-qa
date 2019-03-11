<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'title', 'body',
    ];
//Question belongs to the user
    public function user()
    {
        return $this->belongsTo(User::class);

    }
//Defining mutator for the title to a slug format for example; title: my first title slug: my-first-title.
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = str_slug($value);
    }
//Accessors that show the creator of the question
    public function getUrlAttribute()
    {
    	return route("questions.show",$this->id);
    }
//Accessor that shows the time the question was created
    public function getCreateDateAttribute()
    {
    	return $this->created_at->diffForHumans(); //1 day ago, 1 month ago etc..
    }
}
 