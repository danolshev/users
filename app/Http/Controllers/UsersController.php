<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entities\UserEntity;
use App\Http\Requests\UsersPostRequest;
use App\Models\Users;
use App\Repository\UserRepository;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    public function __construct(private UserRepository $repository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->find();

        return view('users.index', compact('users'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsersPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersPostRequest $request)
    {
        $validatedData = $request->validated();

        $userEntity = new UserEntity($validatedData['name'], $validatedData['email'], $validatedData['notes']);

        $this->repository->create($userEntity);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UsersPostRequest  $request
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UsersPostRequest $request, Users $user)
    {
        $validated = $request->validated();

        $userEntity = new UserEntity($validated['name'], $validated['email'], $validated['notes'], $user->id);

        $this->repository->update($userEntity);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
