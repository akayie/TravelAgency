<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Destination;
use App\Models\Payment;
use App\Models\Package;
use App\Models\Review;
use App\Models\Booking;

use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Destination::factory(20)->create();
        Payment::factory(10)->create();
        Package::factory(10)->create();
        Review::factory(10)->create();
        Booking::factory(15)->create();

        // User::create([
        //     'name' => 'Super Admin',
        //     'phone' => '123456789',
        //     'profile'=>'/images/profiles/sa.png',
        //     'email' => 'superadmin@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'role' => 'Super Admin',
        // ]);
    }
}
     