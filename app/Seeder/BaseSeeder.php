<?php

namespace App\Seeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseSeeder extends Seeder 
{
    
    protected $tbl = 'migrations';

    /*
     * check exists seeder
     */
    public function checkSeeder($key = null) {
        if (!$key) {
            $key = get_class($this);
        }
        $hasSeeder = DB::table($this->tbl)
                ->where('migration', $key)
                ->first();
        if (!$hasSeeder) {
            return false;
        }
        return true;
    }
    
    /*
     * insert seeder
     */
    public function insertSeeder($key = null) {
        if (!$key) {
            $key = get_class($this);
        }
        DB::table($this->tbl)
                ->insert(['migration' => $key, 'batch' => 1]);
    }
    
}

