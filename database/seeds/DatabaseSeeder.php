<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'nama_user' => 'admin',
            'id_level' => '1',
			]);*/
		
		DB::table('level')->insert([
            'nama_level' => 'pelanggan',
            ]);
    }
}
