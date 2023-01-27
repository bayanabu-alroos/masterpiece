<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        DB::table('users')->insert([
            'firstname' => 'admin',
            'lastname'=> 'admin',
            'skin_allergy' => 'no',
            'phone' => '0782562696',
            'address' => 'Amman',
            'age'=> '25',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'admin',
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);


        DB::table('users')->insert([
            'firstname' => 'reception',
            'lastname'=> 'reception',
            'skin_allergy' => 'no',
            'phone' => '07889714695',
            'address' => 'Amman',
            'age'=> '25',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'reception',
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);


        DB::table('users')->insert([
            'firstname' => 'nurse',
            'lastname'=> 'nurse',
            'skin_allergy' => 'no',
            'phone' => '079999692',
            'address' => 'Amman',
            'age'=> '25',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'nurse',
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'user',
            'lastname'=> 'user',
            'skin_allergy' => 'no',
            'phone' => '0782869254',
            'address' => 'Amman',
            'age'=> '25',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'patient',
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);
    }
}
