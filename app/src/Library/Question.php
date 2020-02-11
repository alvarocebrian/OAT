<?php

namespace App\Library;


/**
 * Question
 */
class Question
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var array
     */
    protected $choices;


    public function __construct()
    {
        $this->choices = [];
    }


    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return array
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * @param array $choices
     *
     * @return self
     */
    public function setChoices(array $choices)
    {
        $this->choices = $choices;

        return $this;
    }

    public function addChoice(Choice $choice)
    {
        $this->choices[] = $choice;

        return $this;
    }
}