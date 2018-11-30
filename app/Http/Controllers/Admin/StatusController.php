<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Status;
use App\Http\Requests\StatusRequest;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    protected $repo;

    public function __construct(StatusRepository $repository)
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
        $statuses = $this->repo->getStatuses();

        return view('admin/status/list', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/status/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        $this->repo->add($request);

        return redirect()->route('status.index')->with('alert_success', 'Статус добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return view('admin/status/show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('admin/status/edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, Status $status)
    {
        $this->repo->update($request, $status);

        return redirect()
            ->route('status.show', $status->id)
            ->with(['alert_success' => 'Статус обновлён']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Status $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $this->repo->destroy($status);

        return redirect()->route('status.index')->with('alert_success', 'Статус удален');
    }
}
