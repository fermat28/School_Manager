<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    protected $table = 'question';
    public $timestamps = false;
    //public $incrementing = false;

    protected $fillable = [
        'question_text',
        'explanation',
        'source'
    ];

    protected $guarded = [
        'id'
    ];


    public function answers(){
        return $this->hasMany('App\Models\Answer', 'question_id');
    }
}
