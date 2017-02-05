<?php

namespace App\Repositories\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ArticleValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'title' => 'required',
        	'author' => 'required|integer'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
