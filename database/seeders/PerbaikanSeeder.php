<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Faker\Provider\id_ID\Address;

class PerbaikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('perbaikans')->insert([
                'id_pelanggan'=>$faker->numberBetween($min = 123456, $max = 999999),
    			'nama' => $faker->name,
    			'alamat' => $faker->address,
                'telepon'=>$faker->numberBetween($min = 81111, $max = 89999),
                'kodepos'=>$faker->numberBetween($min = 11110, $max = 14540),
                'description'=> $faker->text($maxNbChars = 200),
                'created_at'=>$faker->dateTimeThisMonth($max = 'now',$timezone=null),
                'updated_at'=>$faker->dateTimeThisMonth($max = 'now',$timezone=null)
                


    		]);
 
    	}
    }
}
