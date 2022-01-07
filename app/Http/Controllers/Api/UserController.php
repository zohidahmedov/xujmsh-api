<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Services\UserService;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexRequest $request
     * @return Response
     */
    public function index(IndexRequest $request)
    {
        $params = $request->validated();
        $lists = $this->service->get($params);
        if($lists)
            return response()->successJson($lists);
        else
            return response()->errorJson('Object not found', 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $params = $request->validated();
        $model = $this->service->create($params);
        return response()->successJson($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id)
    {
        $user = $this->service->show($id);
        if($user)
            return response()->successJson($user);
        else
            return response()->errorJson('Object not found', 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateRequest $request, int $id)
    {
        $params = $request->validated();
        $model = $this->service->edit($params, $id);
        if($model)
            return response()->successJson($model);
        else
            return response()->errorJson('Object not found', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $model = $this->service->delete($id);
        if($model){
            return response()->successJson('Successfully deleted');
        }
        else{
            return response()->errorJson('Object not found', 404);
        }
    }
}
