<?php

namespace ProjetoAngular\Validators;

use Prettus\Validator\LaravelValidator;

/**
 * Description of ProjectNoteValidator
 *
 * @author yasmany
 */
class ProjectNoteValidator extends LaravelValidator {

    protected $rules = [
        'project_id' => 'required',
        'title' => 'required',
        'note' => 'required'
    ];

}
