<?php

namespace ProjetoAngular\Services;

use ProjetoAngular\Repositories\ClientRepository;
use ProjetoAngular\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Description of ClientService
 *
 * @author yasmany
 */
class ClientService {

    /**
     *
     * @var ClientRepository
     */
    protected $repository;

    /**
     *
     * @var ClientValidator
     */
    protected $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator) {
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
