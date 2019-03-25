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
//Accessors that show the creator of the question for question->user->url attribute in index.blade
    public function getUrlAttribute()
    {
    	return route("questions.show",$this->id); //return the quiz url and since we are in the question model we use $this
    }
//Accessor that shows the time the question was created for created_at attribute in index.blade
    public function getCreatedDateAttribute()
    {
    	return $this->created_at->diffForHumans(); //1 day ago, 1 month ago etc..
    }

    public function getStatusAttribute()
    {
        if($this->answers>0){
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
}
 