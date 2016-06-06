<?php

namespace ProjetoAngular\Repositories;

use ProjetoAngular\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;
use ProjetoAngular\Presenters\ClientPresenter;

/**
 * Description of ClientRepositoryEloquent
 *
 * @author yasmany
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository {

    public function model() {
        return Client::class;
    }

    public function presenter() {
        return ClientPresenter::class;
    }

}
