<?php
namespace App\Service\Parser;

use App\Library\Choice;
use App\Library\Question;
use App\Library\QuestionList;
use App\Service\Normalizer\QuestionNormalizer;
use App\Library\Parser\ParserInterface;
use Symfony\Component\Serializer\SerializerInterface;

class CSVParser implements ParserInterface
{
    protected $serializer;
    protected $questionsPath;

    public function __construct(SerializerInterface $serializer, $questionsPath)
    {
        $this->serializer = $serializer;
        $this->path = $questionsPath . '/questions.csv';
    }

    public function parse(): QuestionList
    {
        $questionsList = new QuestionList();

        $data = file_get_contents($this->path);
        $questions = $this->serializer->decode($data, 'csv');
        foreach ($questions as $questionData) {
            $question = new Question();
            $question
                ->setText($questionData['Question text'])
                ->setCreatedAt(new \DateTime($questionData['Created At']))
            ;

            $choice = new Choice();
            $choice->settext($questionData['Choice 1']);
            $question->addChoice($choice);
            $choice = new Choice();
            $choice->settext($questionData['Choice']);
            $question->addChoice($choice);
            $choice = new Choice();
            $choice->settext($questionData['Choice 3']);
            $question->addChoice($choice);

            $questionsList->addData($question);
        }

        return $questionsList;
    }

    public function getType()
    {
        return 'csv';
    }
}