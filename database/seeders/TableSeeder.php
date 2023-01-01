<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no = [1,2,3,4,5];
        for($i=0;$i<5;$i++){
            DB::table('tables')->insert([
                'number' => $no[$i]
            ]);
        }

    }
}
