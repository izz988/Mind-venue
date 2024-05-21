<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Thread;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thread = [
            [
                'title' => 'Harga mixue kok bisa murah?',
                'body' => 'Mixue ada dimana mana terus murah lagi, apa yang kurang coba?',
                'user_id' => '4',
            ],
            [
                'title' => 'Rekomendasi nama channel youtube',
                'body' => 'Mau bikin channel youtube baru tapi gatau nih mau dinamain apa',
                'user_id' => '5',
            ],
            [
                'title' => 'Ciri-ciri bibit stroberi unggul?',
                'body' => 'Mau nanem stroberi tapi ngga tau bibit yang bagus kaya gimana, masukan dong',
                'user_id' => '6',
            ],
            [
                'title' => 'Harga Motherboard Asus mahal',
                'body' => 'Udah lama ngga cek harga komponen PC, kok harganya pada naik derastis?',
                'user_id' => '7',
            ],
        ];

        foreach ($thread as $key => $value) {
            Thread::create($value);
        }
    }
}
