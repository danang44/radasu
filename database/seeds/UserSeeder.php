<?php
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Sewain',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin->assignRole('admin');

        $suplier = User::create([
            'name' => 'Suplier 1',
            'email' => 'suplier@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $suplier->assignRole('suplier');
        
        $user = User::create([
            'name' => 'User 1',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('user');
    }
    }

