<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(User::query()->where('email','admin@admin.com')->exists())
            return;

         User::query()->create([
            'name' => 'iStoria Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('4HZ^16N2rJfrEF9wnAwo^'),
            'email_verified_at' => now(),
         ]);

         Setting::query()->create([
             'key' => 'general_rating',
             'title' => 'التقييم العام',
             'description' => 'التحكم في التقييم العام للتطبيق',
             'value' => [5],
             'created_at' => now(),
         ]);
    }
}
