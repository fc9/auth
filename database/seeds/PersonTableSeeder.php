<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = improve(config('auth::parameters.person.type'));
        $datedIn = date('Y/m/d H:i:s');

        Person::insert([
//            [
//                'id' => 1,
//                'user_id' => 1,
//                'first_name' => 'More',
//                'last_name' => 'Marketing Network',
//                'birth_date' => null,
//                'type' => $type->juridical,
//                'created_at' => $datedIn,
//                'updated_at' => $datedIn,
//            ],

//            [
//                'id' => 2,
//                'user_id' => 2,
//                'first_name' => 'Admin',
//                'last_name' => 'ADM',
//                'birth_date' => null,
//                'type' => $type->juridical,
//                'created_at' => $datedIn,
//                'updated_at' => $datedIn,
//            ],

            [
                'id' => 3,
                'user_id' => 3,
                'first_name' => 'Company',
                'last_name' => 'Foundation',
                'birth_date' => null,
                'type' => $type->juridical,
                'created_at' => $datedIn,
                'updated_at' => $datedIn,
            ],

            [
                'id' => 4,
                'user_id' => 4,
                'first_name' => 'Bruna',
                'last_name' => 'Souza',
                //'birth_date' => date('Y/m/d H:i:s', strtotime('-18 years')),
                'birth_date' => \Faker\Provider\DateTime::date('Y/m/d H:i:s', '-18 years'),
                'type' => $type->artificial,
                'created_at' => $datedIn,
                'updated_at' => $datedIn,
            ],
        ]);

    }
}
