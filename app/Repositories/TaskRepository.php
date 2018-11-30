<?php

namespace App\Repositories;

use App\Entities\Tasks;

class TaskRepository {

    public function getTasks($requestWithFilter = null)
    {
        $query = Tasks::query();

        if ($requestWithFilter) {
            $query = $this->getQueryWithFilterTasks($query, $requestWithFilter);
        }

        return $query->with('status')->paginate(10);
    }

    public function update($request, $id)
    {
        Tasks::where('id', $id)->update($request->except('_method', '_token'));
    }

    public function updateStatus($request)
    {
        Tasks::where('id', $request->task)->update([
            'status_id' => $request->status
        ]);
    }

    public function add($request)
    {
        Tasks::create($request->except('_token'));
    }

    public function destroy($id)
    {
        Tasks::destroy($id);
    }

    protected function getQueryWithFilterTasks($query, $request)
    {
        if ($request->title) {
            $query->where('title', $request->title);
        }

        if ($request->status) {
            $query->where('status_id', $request->status);
        }

        if ($request->taskTime) {
            $query->whereTime('time', $request->taskTime);
        }

        if ($request->taskDate) {
            $query->whereDate('time', $request->taskDate);
        }

        if ($request->createdAtDate) {
            $query->whereDate('created_at', $request->createdAtDate);
        }

        if ($request->createdAtTime) {
            $query->whereTime('created_at', $request->createdAtTime);
        }

        if ($request->updatedAtDate) {
            $query->whereDate('updated_at', $request->updatedAtDate);
        }

        if ($request->updatedAtTime) {
            $query->whereTime('updated_at', $request->updatedAtTime);
        }

        return $query;
    }

    protected function formatDateForDb($time)
    {
        return (new \DateTime($time))->format('Y-m-d H:i:s');
    }

}