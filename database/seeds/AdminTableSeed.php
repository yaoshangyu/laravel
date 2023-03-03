<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
       DB::table("admin")->insert([
          'name'=>Str::random(10),
          'password'=>bcrypt("123"),
          'depart_id'=>1,
          'sex'=>1,
          'create_time'=>date('Y-m-d H:i:s')
       ]);

    }
}
