<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Membership;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use MenaraSolutions\Geographer\Earth;

class UsersRepository //extends Repository
{
    public static function create(array $data)
    {
        DB::beginTransaction();

        try
        {
            $data['indicator_id'] = User::where('username', $data['indicator'])->first()->id;
            $user = User::create($data);

            $data['id'] = $user->id;
            $data['user_id'] = $user->id;
            Person::create($data);

            $data['person_id'] = $user->id;
            Membership::create($data);

            $earth = new Earth();
            $country = $earth->findOne(['code' => $data['country']]);
            $state = $country->getStates()->first();
            $capital = $country->getCapital();

            # TODO: get country's capital and city's state.
            $data['country'] = $country->getGeonamesCode();
            $data['state'] = $state->getGeonamesCode();
            $data['city'] = $capital !== false ? $capital->getGeonamesCode() : 0;
            $data['zip_code'] = '0';
            $data['street'] = 'Street';
            $data['number'] = '0';
            Address::create($data);

        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();

        return $user;
    }
}