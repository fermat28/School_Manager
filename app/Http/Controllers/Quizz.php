<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Utils\Vii;
use Illuminate\Http\Request;

class Quizz extends Controller
{
    //
    public function getWelcome(){
        return view('quizz');
    }

}
