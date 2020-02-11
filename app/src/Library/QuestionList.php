<?php
namespace App\Library;

class QuestionList
{
    /**
    * @var array
    */
    protected $data;


    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return self
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    public function addData(Question $question)
    {
        $this->data[] = $question;
    }
}