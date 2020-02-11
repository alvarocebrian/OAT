<?php

namespace App\Service\Normalizer;

use App\Library\Question;
use App\Library\Choice;
use App\Library\Normalizer\QuestionNormalizerInterface;

class QuestionNormalizer implements QuestionNormalizerInterface
{
    public function normalize($questionData): Question
    {
        $question = new Question();
        $question
            ->setText($questionData['text'])
            ->setCreatedAt(new \DateTime($questionData['createdAt']))
        ;

        foreach ($questionData['choices'] as $choiceData) {
            $choice = new Choice();
            $choice->setText($choiceData['text']);

            $question->addChoice($choice);
        }

        return $question;
    }
}