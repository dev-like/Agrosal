<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // DB::table('users')->insert([
      //   'nome' => 'João',
      //   'email' => 'joao@gmail.com',
      //   'password' => bcrypt('secret'),
      //   'nivel' => 0,
      // ]);
       DB::table('users')->insert([
         'nome' => 'Marcos Vinícius',
         'email' => 'marcos@likepublicidade.com',
         'password' => bcrypt('marcos1234'),
         'nivel' => 1,
       ]);

    }
}
