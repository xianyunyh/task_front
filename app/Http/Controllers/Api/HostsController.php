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

    public function store()
    {

    }


    public function index()
    {
        return $this->succes($this->model->all());
    }

    public function show(int $id)
    {
        $data = $this->model->find($id) ?: [];
        return $this->succes($data);
    }

    /**
     * @api DELETE /hosts/:id
     */
    public function delete(int $id)
    {
        $res = $this->model->where('id', $id)->delete();
        return response(['data' => [], 'code' => 20000]);
    }
}