<?php
namespace App\Library\Normalizer;

use App\Library\Question;

interface QuestionNormalizerInterface
{
    public function normalize($questionData): Question;
}