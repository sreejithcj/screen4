<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
              'name' => 'Api',
              'email'=>'api@orchidapps.com',
              'password'=>'$2y$10$AlDV9iTVX6H1wRc9AhDTwepNO6z7EX6fpe2GGAku7wg.VTezwKM1O',
              'remember_token'=>'B9SE1MQOkuDcPNZ72uhTrfqZeoueKAPEwHJ7EqFP5Asyc7AMhtRoc4QiYHFD',
              'api_token'=>str_random(60)
          ]);
    }
}
