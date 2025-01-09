<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Bek',
            'email' => 'bek@sungroup.co.th',
            'password' => bcrypt('12312344'),
            'role' => 'admin'
        ]);
        // $admin->assignRole('admin');
    }
}
