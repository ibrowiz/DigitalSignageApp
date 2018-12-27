<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json=file_get_contents("https://restcountries.eu/rest/v2/all");
        
        $countries =  json_decode($json);

		DB::table('countries')->delete();
        

         if (count($countries)) 
         {
       
        	foreach ($countries as $index => $country) 
        		{

        			$ctry = 

		        		[	

		        			['name'=>$country->name,'sortname'=>$country->alpha2Code]

		        		];

		        		 DB::table('countries')->insert($ctry);

        		}

    	}
	}
}