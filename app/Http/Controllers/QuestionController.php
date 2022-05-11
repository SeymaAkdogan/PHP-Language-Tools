<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class QuestionController extends Controller
{
    public static function getQuestions()
    {
        $user =  Auth::user();
        $randomQuestion = DB::table('Questions')
            ->inRandomOrder()
            ->first();
        $check_status = Answers::where([
            'question_id' => $randomQuestion->id,
        ])->first();

        // If Complete test
        if ($user) {
            $answers = Answers::where([
                'user_id' => $user->id
            ])->count();
            $questions = Question::get();
            if ($answers == $questions->count()) {

                $true_questions = Answers::where([
                    'user_id' => $user->id,
                    'status' => true
                ])->get()->count();

                $false_questions = Answers::where([
                    'user_id' => $user->id,
                    'status' => false
                ])->get()->count();


                $user_answers = Answers::where([
                    'user_id' => $user->id
                ])->get();
                foreach ($user_answers as $answer) {
                    $answer->delete();
                }

                return view('question', [
                    'question' => $randomQuestion,
                    'word' => $randomQuestion->english_name,
                    'questions_count' => Question::get()->count(),
                    'true_questions_count' => $true_questions,
                    'false_questions_count' => $false_questions,
                    'info' => 'You Have Completed The Test!'
                ]);
            }
        }


        $left_questions_count = 0;
        $true_questions = 0;
        $false_questions = 0;
        if ($user) {
            $true_questions = Answers::where([
                'user_id' => Auth::user()->id,
                'status' => true
            ])->get()->count();

            $false_questions = Answers::where([
                'user_id' => Auth::user()->id,
                'status' => false
            ])->get()->count();
        }


        if (!$check_status) {
            $words = [];
            array_push($words, $randomQuestion->english_name);
            array_push($words, $randomQuestion->serbian_name);

            return view('question', [
                'question' => $randomQuestion,
                'word' => Arr::random($words),
                'questions_count' => Question::get()->count(),
                'left_questions_count' => $left_questions_count,
                'true_questions_count' => $true_questions,
                'false_questions_count' => $false_questions
            ]);
        } else {
            return QuestionController::getQuestions();
        }

    }



    public static function checkAnswer(Request $request, $word, $id)
    {
        $question = Question::whereId($id)->first();
        $answer = Str::of($request->answer)->trim();

        if(!Auth::user())
        {
            return redirect('login');
        }
        $check_question = Answers::where([
            'question_id' => $id,
            'user_id' => Auth::user()->id
        ])->first();


        if ($check_question) {
            if ($question['english_name'] == $word) {

                if (Str::lower($question['serbian_name']) == Str::lower($answer)) {
                    $check_question['status'] = true;
                    $check_question->save();
                    return redirect('/');
                }
            } elseif ($question['serbian_name'] == $word) {
                if (Str::lower($question['english_name']) == Str::lower($answer)) {
                    $check_question['status'] = true;
                    $check_question->save();
                    return redirect('/');
                }
            }
        } else {
            if ($question['english_name'] == $word) {

                if (Str::lower($question['serbian_name']) == Str::lower($answer)) {
                    Answers::create([
                        'user_id' => Auth::user()->id,
                        'question_id' => $id,
                        'status' => true,
                    ]);
                    return redirect('/');
                } else {
                    Answers::create([
                        'user_id' => Auth::user()->id,
                        'question_id' => $id,
                        'status' => false,
                    ]);
                    return redirect('/');
                }
            } elseif ($question['serbian_name'] == $word) {
                if (Str::lower($question['english_name']) == Str::lower($answer)) {
                    Answers::create([
                        'user_id' => Auth::user()->id,
                        'question_id' => $id,
                        'status' => true,
                    ]);
                    return redirect('/');
                } else {
                    Answers::create([
                        'user_id' => Auth::user()->id,
                        'question_id' => $id,
                        'status' => false,
                    ]);
                    return redirect('/');
                }
            }
        }
        return redirect('/');
    }
}
