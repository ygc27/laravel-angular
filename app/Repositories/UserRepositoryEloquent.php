<?php

namespace ProjetoAngular\Repositories;

use ProjetoAngular\Entities\User;
use Prettus\Repository\Eloquent\BaseRepository;

//use ProjetoAngular\Presenters\ClientPresenter;

/**
 * Description of UserRepositoryEloquent
 *
 * @author yasmany
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository {

    public function model() {
        return User::class;
    }

}
