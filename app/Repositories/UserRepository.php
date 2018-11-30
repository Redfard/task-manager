<?php

namespace App\Repositories;

use App\Entities\User;

class UserRepository {

    public function getUsers()
    {
        return User::paginate(10);
    }

    public function update($request, $id)
    {
        $data = $request->except('_token', '_method');

        if ($data['password']) {
            $data['password'] = \Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        User::where('id', $id)->update($data);
    }

    public function add($request)
    {
        $data = $request->except('_token');
        $data['password'] = \Hash::make($data['password']);

        User::create($data);
    }

    public function destroy($id)
    {
        User::destroy($id);
    }
}