<?php

namespace App\Http\Controllers\Api;

use App\Models\HostsModel;

class HostsController extends BaseController
{
    /**
     * @var HostsModel
     */
    private $model;

    public function __construct(HostsModel $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return response(['data' => $this->model->all(), 'code' => 20000]);
    }

    public function show(int $id)
    {
        return response(['data' => $this->model->find($id), 'code' => 20000]);
    }

    /**
     * @api DELETE /hosts/:id
     * @param int $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $res = $this->model->where('id', $id)->delete();
        return response(['data' => [], 'code' => 20000]);
    }
}