<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email' => 'admin@test.com',
            'phone' => '212000000000',
            'identity' => '00000000',
            'first_name' => 'john',
            'last_name' => 'doe',
            'address' => 'address',
            'state' => 'state',
            'city' => 'city',
            'zipcode' => '000000',
            'birth_date' => '2000-01-01',
            'gender' => 'male',
            'nationality' => 'test'
        ]);

        $arr = [
            ['name' => 'Sigma', 'price' => '0.670', 'discount' => '0.535'],
            ['name' => 'Stone', 'price' => '0.804', 'discount' => '0.670'],
            ['name' => 'Lime', 'price' => '0.714', 'discount' => '0.580']
        ];

        foreach ($arr as $row) Type::create($row);
    }
}
