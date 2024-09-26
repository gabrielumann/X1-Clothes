<?php

namespace Source\Models\Faq;

use CoffeeCode\DataLayer\DataLayer;

class Question extends DataLayer
{
    private $message;
    public function __construct()
    {
        parent::__construct("faq_questions", ["category_id", "question", "answer"],  timestamps: false);
    }

    public function getMessage()
    {
        return $this->message;
    }
}