<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Details
        $AdminUserDetail = 
        [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => date('Y-m-d'),
            'is_email_verified' => 1,
            'password' => Hash::make("Admin@123#"),
        ];
        $AdminUser = User::create($AdminUserDetail);
        $AdminUser->assignRole('Admin');
         
        //Publisher Details
        $PublisherUserDetail = 
        [
            'name' => 'publisher',
            'email' => 'publisher@publisher.com',
            'email_verified_at' => date('Y-m-d'),
            'is_email_verified' => 1,
            'password' => Hash::make("publisher@123#"),
        ];
        $PublisherUser = User::create($PublisherUserDetail);
        $PublisherUser->assignRole('Publisher');
    
    
    
    
    }
}
