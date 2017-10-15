<?php

namespace Cerpus\CoreClient\DataObjects;

use Illuminate\Support\Collection;

abstract class Question
{
    public $text;
    protected $type;

    private $answers;

    const H5P_MULTICHOICE = "H5P.MultiChoice";

    public function __construct()
    {
        $this->answers = collect();
    }

    public function addAnswer(Answer $answer){
        $this->answers->push($answer);
    }

    public function addAnswers(Collection $answers)
    {
        $that = $this;
        $answers->each(function($answer) use ($that){
            $that->addAnswer($answer);
        });
    }
}