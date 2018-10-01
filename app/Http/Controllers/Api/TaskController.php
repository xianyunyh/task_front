<?php


namespace App\Http\Controllers\Api;


use App\Models\TaskModel;

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
        return $this->success($this->model->all);
    }

    public function show(int $id)
    {

    }

    public function update(int $id)
    {

    }

    public function destroy(int $id)
    {

    }

}