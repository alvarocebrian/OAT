<?php
namespace App\Library\Parser;

use App\Library\QuestionList;

interface ParserInterface
{
    public function parse(): QuestionList;
    public function getType();
}