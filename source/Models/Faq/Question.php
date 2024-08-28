<?php

namespace Source\Models\Faq;

use CoffeeCode\DataLayer\DataLayer;

class Question extends DataLayer
{
    public function __construct()
    {
        parent::__construct("faq_questions", ["question", "answer"], "", false);
    }
}