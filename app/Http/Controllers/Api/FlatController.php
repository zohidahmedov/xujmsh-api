<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Flat\StoreRequest;
use App\Services\FlatService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FlatController extends Controller
{
    protected $service;

    public function __construct(FlatService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
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
     * @param  StoreRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(StoreRequest $request, int $id)
    {
        $params = $request->validated();
        $model = $this->service->update($params, $id);
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
    public function service(int $id)
    {
        $user = $this->service->service($id);
        if($user)
            return response()->successJson($user);
        else
            return response()->errorJson('Object not found', 404);
    }
}
