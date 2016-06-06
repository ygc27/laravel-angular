<?php

namespace ProjetoAngular\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use ProjetoAngular\Transformers\ProjectNoteTransformer;

/**
 * Description of ProjectNotePresenter
 *
 * @author yasmany
 */
class ProjectNotePresenter extends FractalPresenter {

    public function getTransformer() {
        return new ProjectNoteTransformer();
    }

}
