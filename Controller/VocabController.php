<?php

use Core\Controller;
use Core\Request;
use Models\Quiz;
use Models\QuizPart;

class VocabController extends Controller 
{

	public static function all(Request &$request)
	{
		error_reporting(E_ALL);
		self::render('vocab/all', $request, array(
			'title' => 'Vocab Admin Page', 
			'quizzes' => Quiz::all()));
	}
    
    public static function new(Request &$request)
    {
        echo "Hello";
        error_reporting(E_ALL);
        self::render('vocab/new', $request, array(
            'title' => 'Create new Quiz'
        ));
    }

    public static function create(Request &$request)
    {
        $quiz = new Quiz();
        $quiz->Name = $request->params['name'];
        $quiz->OwnerId = $request->session['logedin'];

        if($quiz->store() !== 0)
        {
            $quiz = Quiz::find(array(
                'name' => $quiz->Name,
                'OwnerId' => $quiz->OwnerId
            ))[0];
            foreach($request->params['vocabs'] as $english => $german) 
            {
                $quizpart = new QuizPart();
                $quizpart->QuizId = $quiz->id;
                $quizpart->English = $english;
                $quizpart->German = $german;
                $quizpart->store();
            }

            header('Location: /vocab/show?id='.$quiz->id);
        } else {
            header('Location: /vocab/new', $request, array(
                'title' => 'Create Quiz'
            ));
        }
    }

    private static function retrieve_all_quizzes()
    {
        $quizzes = $Quiz::all();
        $result = [];
        foreach($quizzes as $q) {
            $result[$q->Name] = retrieve_quiz_from_db($q->id);
        }

        return $result;
    }

    private static function retrieve_quiz_from_db(int $id) {
        $parts = QuizPart::find(array(
            'id' => $id
        ));
        return $parts;
    }
}