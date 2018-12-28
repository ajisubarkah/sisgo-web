<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Goods;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'username'=>'subarkah',
            'name'=>'Mohammad Aji Subarkah',
            'password'=>bcrypt('gausah'),
            'email'=>'ajisubarkah99@gmail.com',
            'api_token'=>bcrypt('gausah')
        ]);
        User::create([
            'username'=>'hendry',
            'name'=>'Hendry Nurcahyo',
            'password'=>bcrypt('123456'),
            'email'=>'hendry@gmail.com',
            'api_token'=>bcrypt('123456')
        ]);

        DB::table('goods')->delete();
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
            'purchase'=>13500,
            'selling'=>15000,
            'stock'=>0
        ]);
    }
}
