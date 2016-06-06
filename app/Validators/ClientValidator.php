<?php

namespace ProjetoAngular\Validators;

use Prettus\Validator\LaravelValidator;

/**
 * Description of ClientValidator
 *
 * @author yasmany
 */
class ClientValidator extends LaravelValidator {

    protected $rules = [
        'name' => 'required:max:255',
        'responsible' => 'required:max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required'
    ];

}
