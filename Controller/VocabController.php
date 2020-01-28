<?php

use Core\Controller;
use Core\Request;
use Models\Quiz;
use Models\QuizPart;
use Models\Attempt;
use Core\PageUtils;

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
        $quiz->OwnerId = $_SESSION['logedin'];
        $quiz->OwnerId = 4;
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
        $quiz['content'] = self::retrieve_quiz_from_db($request->params['id']);
        self::render('vocab/show', $request, array('title' => 'Show', 'quiz' => $quiz));
    }

    public static function start_quiz(Request &$request)
    {
        $quiz = [];
        $quiz['metadata'] = Quiz::find(array('id' => $request->params['id']))[0];
        $quiz['content'] = self::retrieve_quiz_from_db($request->params['id']);
        self::render('vocab/quiz', $request, array('title' => 'Quiz', 'quiz' => $quiz, 'format' => $request->params['format']));
    }

    public static function control(Request &$request)
    {
        $quiz = Quiz::findById($request->params['id']);
        if($quiz !== null) {
            $res = $request->params['mode'] === 'en' ? control_en($request->params, self::retrieve_quiz_from_db($quiz->id)) : control_de($request->params, self::retrieve_quiz_from_db($quiz->id));
            foreach($res as $correct)
            {
                $existing_attempt = Attempt::find(array(
                    'UserId' => $request->session['logedin'],
                    'QuizPartId' => $res->id ));
                if($existing_attempt !== null)
                {
                    $existing_attempt->Successful += 1;
                    $existing_attempt->update();
                } else {
                    $attempt = new Attempt();
                    $attempt->UserId = $request->session['logedin'];
                    $attempt->QuizPartId = $correct->id;
                    $attempt->Successful = 1;
                    $attempt->store();
                }
            }
            self::render('vocab/result.php', $request, array('title' => 'Result', 'correct' => $res));
        } else {
            PageUtils::renderErrorPage(array('code' => 404, 'message' => 'Quiz could not be found'));
        }
    }

# internal functions
    private static function control_en($params, $parts)
    {
        $correct = [];
        foreach($params['guesses'] as $pair)
        {
            foreach($parts as $control_pair)
            {
                if($control_pair->German == $pair['original'] && $control_pair->English == $pair['translation'])
                {
                    array_push($correct, $control_pair);
                }
            }
        }
        return $correct;
    }

    private static function control_de($params, $parts)
    {
        $correct = [];
        foreach($params['guesses'] as $pair)
        {
            foreach($parts as $control_pair)
            {
                if($control_pair->English == $pair['original'] && $control_pair->German == $pair['translation'])
                {
                    array_push($correct, $control_pair);
                }
            }
        }
        return $correct;
    }

    private static function retrieve_all_quizzes()
    {
        $quizzes = Quiz::all();
        $result = [];
        foreach($quizzes as $q) {
            $result[$q->Name] = self::retrieve_quiz_from_db($q->id);
        }

        return $result;
    }

    private static function retrieve_quiz_from_db(int $id) {
        $parts = QuizPart::find(array(
            'QuizId' => $id
        ));
        return $parts;
    }
}