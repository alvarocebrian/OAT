<?php
namespace App\Service\Parser;

use App\Library\Choice;
use App\Library\Question;
use App\Library\QuestionList;
use App\Service\Normalizer\QuestionNormalizer;
use App\Library\Parser\ParserInterface;

class JsonParser implements ParserInterface
{
    protected $questionNormalizer;
    protected $path;

    public function __construct(QuestionNormalizer $questionNormalizer, $questionsPath)
    {
        $this->questionNormalizer = $questionNormalizer;
        $this->path = $questionsPath . '/questions.json';
    }

    public function parse(): QuestionList
    {
        $questionList = new QuestionList();

        $json = file_get_contents($this->path);
        $questions = json_decode($json, true);
        foreach ($questions as $questionData) {
            $question = $this->questionNormalizer->normalize($questionData);
            $questionList->addData($question);
        }

        return $questionList;
    }

    public function getType()
    {
        return 'json';
    }
}