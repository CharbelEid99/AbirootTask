<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $position=new Position() ;
        $position->Name='CCE' ;
        $position->Available='1' ;
        $position->save() ;

        $position=new Position() ;
        $position->Name='MobileApp' ;
        $position->Available='1' ;
        $position->save() ;

        $position=new Position() ;
        $position->Name='Manager' ;
        $position->Available='0' ;
        $position->save() ;


    }
}
