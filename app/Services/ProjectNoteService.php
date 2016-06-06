<?php

namespace ProjetoAngular\Services;

use ProjetoAngular\Repositories\ProjectNoteRepository;
use ProjetoAngular\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Description of ProjectNoteService
 *
 * @author yasmany
 */
class ProjectNoteService {

    /**
     *
     * @var ProjectNoteRepository
     */
    protected $repository;

    /**
     *
     * @var ProjectNoteValidator
     */
    protected $validator;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
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

}
