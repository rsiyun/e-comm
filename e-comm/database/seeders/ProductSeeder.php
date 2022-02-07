<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Pubg Mobile',
                'price' => '300',
                'description' => 'this is a game that will make you have a high iq',
                'category' => 'mobile',
                'gallery' => 'https://i.pinimg.com/736x/78/93/33/789333b3f6c7beab43b7c92f0081172c.jpg'
            ],
            [
                'name' => 'Lenovo L340',
                'price' => '500',
                'description' => 'this is Laptop for you',
                'category' => 'Laptop',
                'gallery' => 'https://i.ytimg.com/vi/rg15imGBJ5Q/maxresdefault.jpg'
            ],
            [
                'name' => 'Poco M3 5g',
                'price' => '300',
                'description' => 'this is phone for you',
                'category' => 'mobile',
                'gallery' => 'https://www.hallogsm.com/wp-content/uploads/2021/04/Harga-HP-Xiaomi-Poco-M3-Pro-5G.jpg'
            ],
        ]);
    }
}
