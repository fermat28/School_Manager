<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
    protected $table = 'answer';
    public $timestamps = false;
    //public $incrementing = false;

    protected $fillable = [
        'question_id',
        'answer_text',
        'correct'
    ];

    protected $guarded = [
        'id'
    ];

    public function question(){
        return $this->belongsTo('App\Models\Question', 'question_id');
    }
}
