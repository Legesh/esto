<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The user repository instance.
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepositoryInterface  $users
     * @return void
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function store(UserRequest $request)
    {
        try{
            $this->users->store($request->all());
            return \response('User created', Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return \response($e->getMessage(), 200);
        }
    }

    public function find($id)
    {
        try{
            $user = $this->users->findById($id);
            return \response()->json($user);
        } catch (\Exception $e) {
            return \response($e->getMessage(), 200);
        }
    }

    public function getAll()
    {
        try{
            $users = $this->users->getAll();
            return \response()->json($users);
        } catch (\Exception $e) {
            return \response($e->getMessage(), 200);
        }
    }
}
