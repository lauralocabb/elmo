<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
			[
				'name' 		=> 'Oved', 
				'last_name' => 'FiSo', 
				'email' 	=> 'ovedfs@gmail.com', 
				'user' 		=> 'ovedfs',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'admin',
				'active' 	=> 1,
				'telefono'	=> '',
				'celular' 	=> '',
				'info_visible' => 1,
				'address' 	=> 'San Cosme 290, Cuauhtemoc, D.F.',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Adela', 
				'last_name' => 'Flores', 
				'email' 	=> 'adela@gmail.com', 
				'user' 		=> 'adela',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'user',
				'active' 	=> 1,
				'telefono'	=> '5555-4444',
				'celular' 	=> '5521-4444',
				'info_visible' => 0,
				'address' 	=> 'Tonala 321, Jalisco',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Sofia', 
				'last_name' => 'Torres', 
				'email' 	=> 'sofia@gmail.com', 
				'user' 		=> 'sofia',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'publisher',
				'active' 	=> 1,
				'telefono'	=> '5555-5555',
				'celular' 	=> '5521-5555',
				'info_visible' => 1,
				'address' 	=> 'Portales 21, Distrito Federal',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],

		);

		User::insert($data);
    }
}
