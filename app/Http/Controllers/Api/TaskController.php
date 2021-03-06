<?php

namespace App\Http\Controllers\Api;

use App\Models\TaskModel;
use Illuminate\Support\Facades\Validator;

class TaskController extends BaseController
{
    /**
     * @var TaskModel
     */
    private $model;

    public function __construct(TaskModel $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->success($this->model->all());
    }

    public function store()
    {
        $posts    = collect(request()->json())->toArray();

        $insert = $this->model->create($posts)->save();
        if (false === $insert) {
            return $this->error('add error', 30004);
        }
        return $this->success();
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if (collect($this->model->with('host')->find($id))
            ->except(['created_at', 'updated_ats'])
        ) {
            $data = collect($this->model->with('host')->find($id))
                ->except(['created_at', 'updated_ats']);
        } else {
            $data = [];
        }
        return $this->success($data);

    }

    public function update(int $id)
    {
        $data = collect(request()->json())->toArray();
        $host = $this->model->find($id);
        if (empty($host)) {
            return $this->error('task is not found');
        }
        $this->model->whereId($id)->update($data);
        return $this->success();

    }

    public function destroy(int $id)
    {
        if (!$this->model->find($id)) {
            return $this->error('task is not found', 30001);
        }
        $res = $this->model->whereId($id)->delete();
        return $this->success([], 'ok');
    }

}