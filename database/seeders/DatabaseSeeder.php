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

         User::query()->updateOrCreate(['email'=>'admin@admin.com'],[
            'name' => 'iStoria Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('4HZ^16N2rJfrEF9wnAwo^'),
            'email_verified_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'general_rating'],[
             'key' => 'general_rating',
             'title' => 'التقييم العام',
             'description' => 'التحكم في التقييم العام للتطبيق',
             'value' => [5],
             'created_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'seo_title'],[
             'key' => 'seo_title',
             'title' => 'العنوان الترويجي',
             'description' => 'العنوان الترويجي للتطبيق',
             'value' => ['iStoria - التطبيق الرائع للتعلم الإلكتروني'],
             'created_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'seo_description'],[
             'key' => 'seo_description',
             'title' => 'الوصف الترويجي',
             'description' => 'الوصف الترويجي للتطبيق',
             'value' => ['iStoria - التطبيق الرائع للتعلم الإلكتروني'],
             'created_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'seo_keywords'],[
             'key' => 'seo_keywords',
             'title' => 'الكلمات المفتاحية',
             'description' => 'الكلمات المفتاحية للتطبيق',
             'value' => ['iStoria', 'التطبيق الرائع للتعلم الإلكتروني', 'التعلم الإلكتروني', 'التعلم الإلكتروني', 'التعلم الإلكتروني'],
             'created_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'seo_image'],[
             'key' => 'seo_image',
             'title' => 'صورة التطبيق',
             'description' => 'صورة التطبيق',
             'value' => [asset('images/seo-image.png')],
             'created_at' => now(),
         ]);
    }
}
