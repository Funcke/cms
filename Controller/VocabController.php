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
        error_reporting(E_ALL);
        self::render('vocab/new', $request, array(
            'title' => 'Create new Quiz'
        ));
    }

    public static function create(Request &$request)
    {
        $quiz = new Quiz();
        $quiz->Title = $request->params['name'];
        $quiz->OwnerId = 4;#$request->session['logedin'];
        if($quiz->store() !== 0)
        {
            $quiz = Quiz::find(array(
                'Title' => $quiz->Title,
                'OwnerId' => $quiz->OwnerId
            ))[0];
            foreach($request->params['vocabs'] as $pair) 
            {
                $quizpart = new QuizPart();
                $quizpart->QuizId = $quiz->id;
                $quizpart->English = $pair[0];
                $quizpart->German = $pair[1];
                $quizpart->store();
            }

            header('Location: /vocab/show?id='.$quiz->id);
        } else {
            header('Location: /vocab/new');
        }
    }

    public static function show(Request &$request)
    {
        $quiz = [];
        $quiz['metadata'] = Quiz::find(array('id' => $request->params['id']))[0];
        $quiz['content'] = retrieve_quiz_from_db($request->params['id']);
        self::render('vocab/show', $request, array('title' => 'Show', 'quiz' => $quiz));
    }

    public static function start_quiz(Request &$request)
    {
        $quiz = [];
        $quiz['metadata'] = Quiz::find(array('id' => $request->params['id']))[0];
        $quiz['content'] = retrieve_quiz_from_db($request->params['id']);
        self::render('vocab/quiz.php', $request, array('title' => 'Quiz', 'quiz' => $quiz, 'format' => $request->params['format']));
    }

    public static function control(Request &$request)
    {
        # gfreit mi nu ned
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