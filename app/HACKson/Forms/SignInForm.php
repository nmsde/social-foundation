<?php namespace HACKson\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator {

    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

} 