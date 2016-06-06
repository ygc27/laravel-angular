<?php

namespace ProjetoAngular\Transformers;

use ProjetoAngular\Entities\User;
use League\Fractal\TransformerAbstract;

/**
 * Description of ProjectTransformer
 *
 * @author yasmany
 */
class ProjectMemberTransformer extends TransformerAbstract {

    public function transform(User $member) {
        return [
            'member_id' => $member->id,
            'name' => $member->name
        ];
    }

}
