<?php

namespace ProjetoAngular\Transformers;

use ProjetoAngular\Entities\ProjectNote;
use League\Fractal\TransformerAbstract;

/**
 * Description of ProjectNoteTransformer
 *
 * @author yasmany
 */
class ProjectNoteTransformer extends TransformerAbstract {

    public function transform(ProjectNote $o) {
        return [
            'id' => $o->id,
            'project_id' => $o->project_id,
            'title' => $o->title,
            'note' => $o->note
        ];
    }

}
