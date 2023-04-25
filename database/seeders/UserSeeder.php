<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'address_one' => 'Jl. Terate 3 No. 11',
                'address_two' => 'RT. 007 RW. 004',
                'provinces_id' => Null,
                'regencies_id' => Null,
                'zip_code' => 11250,
                'country' => 'Indonesia',
                'phone_number' => '+6283891733380',
                'store_name' => 'Yoh Shop',
                'categories_id' => Null,
                'store_status' => Null,
                'roles' => 'ADMIN'
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
                'address_one' => 'Jl. Terate 3 No. 11',
                'address_two' => 'RT. 007 RW. 004',
                'provinces_id' => Null,
                'regencies_id' => Null,
                'zip_code' => 11250,
                'country' => 'Indonesia',
                'phone_number' => '+6283891733380',
                'store_name' => 'Tes Shop',
                'categories_id' => Null,
                'store_status' => Null,
                'roles' => 'USER'
            ],
        ];

        foreach ($data as $item) {
            User::insert([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => $item['password'],
                'address_one' => $item['address_one'],
                'address_two' => $item['address_two'],
                'provinces_id' => $item['provinces_id'],
                'regencies_id' => $item['regencies_id'],
                'zip_code' => $item['zip_code'],
                'country' => $item['country'],
                'phone_number' => $item['phone_number'],
                'store_name' => $item['store_name'],
                'categories_id' => $item['categories_id'],
                'store_status' => $item['store_status'],
                'roles' => $item['roles'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
