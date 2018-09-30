<?php

namespace App\Http\Controllers\Api;

use App\Models\HostsModel;
use App\Rules\HostValidator;
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

    /**
     * @api  POST /hosts/
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store()
    {
        $posts    = collect(request()->json())->toArray();
        $validate = Validator::make($posts, [
            'name' => "required",
            'host' => ['required', 'string', new HostValidator()]
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


    /**
     * @api GET /hosts/
     * @return
     */
    public function index()
    {
        return $this->success($this->model->all());
    }

    /**
     * @api  GET /hosts/:id
     * @param int $id
     *
     */
    public function show(int $id)
    {
        $data = collect($this->model->find($id))
            ->except(['created_at', 'updated_ats']) ?: [];
        return $this->success($data);
    }

    /**
     * @api  PUT /hosts/:id
     * @param int $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $data = collect(request()->json())->toArray();
        $host = $this->model->find($id);
        if (empty($host)) {
            return $this->error('host不存在');
        }
        $this->model->create($data)->whereId($id)->update($data);
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
        $res = $this->model->whereId($id)->delete();
        return $this->success([], 'ok');
    }
}