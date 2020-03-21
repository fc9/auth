<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Models\UserView;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(['data' => UserView::all()], \Fc9\Api\Facade\Http::status('ok')->code);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\UsersRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UsersRequest $request)
    {
        return response()->json(['data' => $request->all()]);
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
