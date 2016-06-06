<?php

namespace ProjetoAngular\Services;

use ProjetoAngular\Repositories\ProjectRepository;
use ProjetoAngular\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;

/**
 * Description of ProjectService
 *
 * @author yasmany
 */
class ProjectService {

    /**
     *
     * @var ProjectRepository
     */
    protected $repository;

    /**
     *
     * @var ProjectValidator
     */
    protected $validator;

    /**
     *
     * @var Filesystem
     */
    protected $filesystem;

    /**
     *
     * @var Storage
     */
    protected $storage;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Storage $storage) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function create(array $data) {

        try {

            $this->validator->with($data)->passesOrFail();

            $cadastro = $this->repository->create($data);

            if ($cadastro) {
                return 'Dados cadastrados com sucesso.';
            } else {
                return 'Erro ao cadastrar os dados.';
            }
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id) {

        try {

            $this->validator->with($data)->passesOrFail();

            $atualiza = $this->repository->update($data, $id);

            if ($atualiza) {
                return 'Dados atualizados com sucesso.';
            } else {
                return 'Erro ao atualizar os dados.';
            }
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function createFile(array $data) {
        
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        
        //dd($project);
        
        $projectFile = $project->files()->create($data);
        
        $this->storage->put($projectFile->id . "." . $data['extension'], $this->filesystem->get($data['file']));
    }

}
