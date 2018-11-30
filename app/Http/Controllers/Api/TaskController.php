<?php

namespace App\Http\Controllers\Api;

use App\Entities\Tasks;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $repo;

    public function __construct(TaskRepository $repository)
    {
        $this->repo = $repository;
    }

    public function getTasks(Request $request)
    {
        return $this->repo->getTasks($request)->items();
    }

    public function getTask(Tasks $task)
    {
        return $task;
    }

    public function updateStatus(Request $request)
    {
        if (!$request->task || !$request->status) {
            return ['status' => 'err', 'msg' => 'Invalid arguments'];
        }

        try {
            $this->repo->updateStatus($request);
            return ['status' => 'ok'];
        } catch (\Exception $e) {
            return ['status' => 'err', 'msg' => $e->getMessage()];
        }
    }
}
