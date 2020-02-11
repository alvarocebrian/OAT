<?php
namespace App\Service\Entity;

use App\Library\QuestionList;
use Stichoza\GoogleTranslate\GoogleTranslate as Translator;

class QuestionListService
{
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function translate(QuestionList $questionList, $language)
    {
        $translator = new Translator($language);

        foreach ($questionList->getData() as $question){
            $question->setText($translator->translate($question->getText()));
            foreach ($question->getChoices() as $choice) {
                $choice->setText($translator->translate($choice->getText()));
            }
        }
    }
}