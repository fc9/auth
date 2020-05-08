<?php

namespace App\Services;

use App\Models\UserView;
use App\Repositories\UsersRepository;

//use App\Repositories\RegisterRepository;

class UsersService
{
    public static function all()
    {
        return UserView::all();
    }

    public static function create(array $data)
    {
        return $data;

//        $client = auth()->user();
//        $client->checkPermission('users.create');

        $user = UsersRepository::create($data);

        //$node = $this->networkRepository->create($user);
        //$costumer = $this->bankRepository->create($user);

        //dispatch(new \App\Events\UserWasCreated($user));

        return $user;
    }

}