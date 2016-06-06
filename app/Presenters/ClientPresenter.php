<?php

namespace ProjetoAngular\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use ProjetoAngular\Transformers\ClientTransformer;

/**
 * Description of ClientPresenter
 *
 * @author yasmany
 */
class ClientPresenter extends FractalPresenter {

    public function getTransformer() {
        return new ClientTransformer();
    }

}
