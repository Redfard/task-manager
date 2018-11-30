<?php

namespace App\Repositories;

use App\Entities\Status;

class StatusRepository {

    public function getStatuses()
    {
        return Status::orderBy('sort')->get();
    }

    public function update($request, $status)
    {
        $status->insertAt($request->sort);

        $status->update([
            'title' => $request->title
        ]);
    }

    public function add($request)
    {
        $status = Status::create(['title' => $request->title]);

        $status->insertAt($request->sort);
    }

    public function destroy($status)
    {
        $status->tasks()->update(['status_id' => null]);
        $status->delete();
    }
}