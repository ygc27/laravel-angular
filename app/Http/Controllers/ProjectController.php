<?php

namespace ProjetoAngular\Http\Controllers;

use Illuminate\Http\Request;
use ProjetoAngular\Repositories\ProjectRepository;
use ProjetoAngular\Services\ProjectService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ProjectController extends Controller {

    /**
     *
     * @var ProjectRepository
     */
    private $repository;

    /**
     *
     * @var ProjectService
     */
    private $service;

    public function __construct(ProjectRepository $repository, ProjectService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return $this->repository->all();
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->findWhere(['owner_id' => $userId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        if ($this->checkProjectPermissions($id) == false) {
            return ['error' => 'Access Forbidden.'];
        }

        return $this->repository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        if ($this->checkProjectOwner($id) == false) {
            return ['error' => 'Access Forbidden.'];
        }

        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {

            if ($this->checkProjectOwner($id) == false) {
                return ['error' => 'Access Forbidden.'];
            }

            $deletado = $this->repository->find($id)->delete();
            if ($deletado) {
                return 'Registro removido com sucesso.';
            } else {
                return 'Erro ao remover o registro.';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    private function checkProjectOwner($projectId) {
        $userId = Authorizer::getResourceOwnerId();

        return $this->repository->isOwner($projectId, $userId);
    }

    private function checkProjectMember($projectId) {
        $userId = Authorizer::getResourceOwnerId();

        return $this->repository->hasMember($projectId, $userId);
    }

    private function checkProjectPermissions($projectId) {

        if ($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)) {
            return $projectId;
        }

        return false;
    }

}
