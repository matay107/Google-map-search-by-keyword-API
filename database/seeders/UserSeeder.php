<?php

    namespace Database\Seeders;

    use App\Models\Country;
    use App\Models\System;
    use App\Models\User;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;

    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $user_data = array(
                'username'   => 'pixilla',
                'first_name' => 'Pixilla',
                'last_name'  => 'Admin',
                'site_name'  => 'bangkok',
                'password'   => Hash::make('Admin9977'),
            );
            $user = User::create($user_data);

            $system_data[] = array(
                'code'         => 'master_data',
                'display_name' => 'MASTER DATA',
            );
            $system_data[] = array(
                'code'         => 'yard',
                'display_name' => 'YARD ONly',
            );
            $system_data[] = array(
                'code'         => 'transport',
                'display_name' => 'TRANSPORT ONLY',
            );
            $system_data[] = array(
                'code'         => 'yard_transport',
                'display_name' => 'YARD AND TRANSPORT',
            );

            $system = System::insert($system_data);


            $country_data = array(
                'code'         => 'THAILAND',
                'display_name' => 'THAILAND',
            );
            $country = Country::create($country_data);


            $data_relation_system = array(
                'user_id'   => $user->id,
                'system_id' => '1'
            );
            DB::table('system_user')->insert($data_relation_system);

            $data_relation_country = array(
                'user_id'    => $user->id,
                'country_id' => $country->id
            );
            DB::table('country_user')->insert($data_relation_country);

            $data_relation_role = array(
                'user_id'   => $user->id,
                'role_id'   => '1',
                'user_type' => User::class
            );
            DB::table('role_user')->insert($data_relation_role);
        }
    }
