<?php

namespace ProjetoAngular\Transformers;

use ProjetoAngular\Entities\Project;
use League\Fractal\TransformerAbstract;

/**
 * Description of ProjectTransformer
 *
 * @author yasmany
 */
class ProjectTransformer extends TransformerAbstract {

    protected $defaultIncludes = ['members'];

    public function transform(Project $project) {
        return [
            'project_id' => $project->project_id,
            'client_id' => $project->client_id,
            'owner_id' => $project->owner_id,
            'name' => $project->name,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date
        ];
    }

    public function includeMembers(Project $project) {
        
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

}
