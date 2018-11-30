<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $repo;

    public function __construct(UserRepository $repository)
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
        $users = $this->repo->getUsers();

        return view('admin/user/list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserAddRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddRequest $request)
    {
        $this->repo->add($request);

        return redirect()->route('users.index')->with('alert_success', 'Пользователь добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin/user/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin/user/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserAddRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $this->repo->update($request, $id);

        return redirect()->route('users.show', $id)->with('alert_success', 'Пользователь обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::user()->id == $id) {
            return redirect()->route('users.index')->with('alert_danger', 'Невозможно удалить текущего пользователя');
        }

        $this->repo->destroy($id);

        return redirect()->route('users.index')->with('alert_success', 'Пользователь удален');
    }
}
