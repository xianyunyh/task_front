<?php

namespace App\Http\Controllers\Api;

use App\Models\HostsModel;
use Illuminate\Support\Facades\Validator;

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
        $posts    = collect(request()->json())->toArray();
        $validate = Validator::make($posts, [
            'name' => "required",
            'host' => "required"
        ]);
        if ($validate->fails()) {
            return $this->error($validate->errors()->first(), 30002);
        }
        $insert = $this->model->create($posts)->save();
        if (false === $insert) {
            return $this->error('add error', 30004);
        }
        return $this->success();
    }


    public function index()
    {
        return $this->success($this->model->all());
    }

    public function show(int $id)
    {
        $data = $this->model->find($id) ?: [];
        return $this->success($data);
    }

    public function update(int $id)
    {
        $data = collect(request()->json())->toArray();
        $host = $this->model->find($id);
        if(empty($host))  {
            return $this->error('host不存在');
        }
        $this->model->where(['id'=>$id])->update($data);
        return $this->success();
    }
    /**
     * @api DELETE /hosts/:id
     */
    public function destroy(int $id)
    {
        if (!$this->model->find($id)) {
            return $this->error('host is not found', 30001);
        }
        $res = $this->model->where('id', $id)->delete();
        return $this->success([], 'ok');
    }
}