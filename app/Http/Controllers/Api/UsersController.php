<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Models\UserView;
use App\Services\UsersService;
use App\Traits\ReturnJsonTrait;
use Fc9\Api\Facade\Http;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    use ReturnJsonTrait;

//    private $usersService;
//
//    public function __construct(UsersService $service)
//    {
//        $this->usersService = $service;
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = UsersService::all();

        return response()->json(['data' => $data], $this->statusCode('ok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateUserRequest $request)
    {
        $data = UsersService::create($request->all());

        return response()->json(['data' => $data], $this->statusCode('create'));
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * Display the specified resource.
     *
     * @param string $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($uuid)
    {
        return response()->json(['data' => UserView::where(['uuid' => $uuid])->first()], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        //
    }

//    /**
//     * Update the specified resource in storage.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @param \App\Models\User $fc9AuthEntitiesUser
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function update(Request $request)
//    {
//        $this->validate($request, []);
//        $user = User::fill($request->all());
//        return response()->json(['data' => $user]);
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($uuid)
    {
        User::where(['uuid' => $uuid])->softdelete();

        return response()->json(['deleted' => true]);
    }
}
