<?php

namespace ProjetoAngular\Http\Controllers;

use Illuminate\Http\Request;
use ProjetoAngular\Http\Controllers\Controller;
use ProjetoAngular\Repositories\ProjectRepository;
use ProjetoAngular\Services\ProjectService;

class ProjectFileController extends Controller {

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();

        $data = [
            'file' => $file,
            'extension' => $extension,
            'name' => $request->name,
            'project_id' => $request->project_id,
            'description' => $request->description
        ];

        $this->service->createFile($data);
    }

}
