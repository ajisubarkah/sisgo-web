<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Goods;
use App\ImageGoods;

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
            'username'=>'subarkah',
            'name'=>'Mohammad Aji Subarkah',
            'password'=>bcrypt('gausah'),
            'email'=>'ajisubarkah99@gmail.com',
            'photo'=>'storage/profiles/1.jpg',
            'api_token'=>bcrypt('gausah')
        ]);
        
        User::create([
            'username'=>'hendry',
            'name'=>'Hendry Nurcahyo',
            'password'=>bcrypt('123456'),
            'email'=>'hendry@email.com',
            'photo'=>'storage/profiles/2.jpg',
            'api_token'=>bcrypt('123456')
        ]);

        User::create([
            'username'=>'dina',
            'name'=>'Dina Pitri Masruhan',
            'password'=>bcrypt('123456'),
            'email'=>'dina@emial.com',
            'api_token'=>bcrypt('123456')
        ]);

        Goods::create([
            'name'=>'Kursi Kayu',
            'barcode'=>'999234567812',
            'purchase'=>40000,
            'selling'=>50000,
            'stock'=>0
        ]);

        Goods::create([
            'name'=>'Kursi Plastik',
            'barcode'=>'999234567811',
            'purchase'=>25000,
            'selling'=>32500,
            'stock'=>0,
        ]);
    }
}
