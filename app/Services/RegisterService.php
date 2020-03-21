<?php

namespace App\Services;

use App\Repositories\RegisterRepository;
//use App\Repositories\RegisterRepository;

class RegisterService
{
    public function register(array $data)
    {
//        $account = auth()->getCurrentUser();
//        $account->checkPermission('users.create');

        $user = RegisterRepository::register($data);

        //$node = $this->networkRepository->create($user);
        //$costumer = $this->bankRepository->create($user);

        //dispatch(new \App\Events\RegistrationDone($user));

        return $user;
    }

}