<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Status;
use App\Entities\Tasks;
use App\Http\Requests\TaskRequest;
use App\Repositories\StatusRepository;
use App\Repositories\TaskRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    protected $repo;

    public function __construct(TaskRepository $repository)
    {
        $this->repo = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->repo->getTasks();

        return view('admin/task/list', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StatusRepository $statusRepository)
    {
        $statuses = $statusRepository->getStatuses();

        return view('admin/task/add', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $this->repo->add($request);

        return redirect()->route('tasks.index')->with('alert_success', 'Задача добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param Tasks $task
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $task)
    {
        return view('admin/task/show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tasks  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $task, StatusRepository $statusRepository)
    {
        $statuses = $statusRepository->getStatuses();

        return view('admin/task/edit', compact('task', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TaskRequest $request
     * @param  int  $id
     * @returnN \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $this->repo->update($request, $id);

        return redirect()->route('tasks.show', $id)->with('alert_success', 'Сохранено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->destroy($id);

        return redirect()->route('tasks.index')->with('alert_success', 'Задача удалена');
    }
}
