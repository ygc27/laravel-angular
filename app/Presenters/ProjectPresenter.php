<?php

namespace ProjetoAngular\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use ProjetoAngular\Transformers\ProjectTransformer;

/**
 * Description of ProjectPresenter
 *
 * @author yasmany
 */
class ProjectPresenter extends FractalPresenter {

    public function getTransformer() {
        return new ProjectTransformer();
    }

}
