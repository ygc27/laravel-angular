<?php

namespace ProjetoAngular\Repositories;

use ProjetoAngular\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Description of ClientRepositoryEloquent
 *
 * @author yasmany
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository{
    
    public function model(){
        return Client::class;
    }
}
