<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //$this->call(MdlUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ThreadSeeder::class);
        // $this->call(StatusItemSeeder::class);
        // $this->call(StatusRequestSeeder::class);
        // $this->call(RequestItemSeeder::class);
        // $this->call(RequestItemDetailSeeder::class);
    }
}
