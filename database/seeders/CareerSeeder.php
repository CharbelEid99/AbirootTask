<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $career=new Career() ;
       $career->id=1 ;
       $career->first_name='Admin' ;
       $career->last_name='Admin' ;
       $career->email='charbel.eid@hotmail.co.uk' ;
       $career->cv='' ;
       $career->description='Admin' ;
       $career->position_id='3' ;
       $career->save() ;
    }
}
