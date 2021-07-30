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

    public function getQuiz(Request $request){

        // If the questions is equals the TOTAL_QUESTION in the quiz.php config file
        // We must redirect user to the result page
        $question_list = $request->session()->get('question-list', []);
        if(count($question_list) == config('quiz.TOTAL_QUESTION')){
            return redirect()->route('get-shown-result');
        }

        $question_fields = ['question.id', 'question.question_text'];
        $answer_fields = ['answer.id', 'answer.question_id', 'answer.answer_text'];

        // Get the questions that do not contain the question id in the question_list
        if(count($question_list) == 0){
            $entries = Question::select($question_fields)
            ->with(['answers' => function($q) use($answer_fields){
                $q->select($answer_fields);
            }])->get();
        }
        else{
            $entries = Question::whereNotIn('question.id', $question_list)
            ->select($question_fields)
            ->with(['answers' => function($q) use($answer_fields){
                $q->select($answer_fields);
            }])->get();
        }


        $rand_question = Vii::randomQuestion($entries->toArray());
        $answers = $rand_question['answers'];
        shuffle($answers);

        return view(
            'quiz',
            [
                'form_uri' => route('post-quiz'),
                'qs' => '',
                'question' => $rand_question,
                'answers' => $answers,
                'question_list' => $request->session()->get('question-list', [])
            ]
        );
    }

    public function getShownResult(Request $request){
        if($request->session()->get('shown-result', 0) == 0){
            session()->flush();
            return redirect()
                ->route('get-welcome');
        }

        $answers = $request->session()->get('answer-list');

        // Find the answers relies on the id list
        $entries = Answer::whereIn('id', $answers)
            ->select(['id', 'question_id', 'correct'])
            ->get();

        // Count the correct answer
        $total_correct = 0;
        foreach($entries as $a){
            if($a->correct == 1)
                $total_correct += $a->correct;
        }

        return view(
            'shown-result',
            [
                'form_uri' => route('post-add-user'),
                'qs' => '',
                'total_correct' => $total_correct,
                'total_question' => count($request->session()->get('question-list', [])),
            ]
        );

    }
}
