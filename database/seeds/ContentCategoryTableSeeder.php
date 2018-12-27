<?php

use Illuminate\Database\Seeder;

class ContentCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('content_categories')->delete();
     	$categories = [

     	['id'=>'1','name'=>'Health, pharmaceuticals and biotech','description'=>NULL,'tag'=>NULL],

     	['id'=>'2','name'=>'Real Estate and Construction','description'=>NULL,'tag'=>NULL],

     	['id'=>'3','name'=>'Education','description'=>NULL, 'tag'=>NULL],

     	['id'=>'4','name'=>'Agriculture and Mining','description'=>NULL,'tag'=>NULL],

		['id'=>'5','name'=>'Business Services','description'=>NULL,'tag'=>NULL],
        
		['id'=>'6','name'=>'Computer and Electronics','description'=>NULL,'tag'=>NULL],

		['id'=>'7','name'=>'Consumer Services','description'=>NULL,'tag'=>NULL],

		['id'=>'8','name'=>'Energy and Utilities','description'=>NULL,'tag'=>NULL],

		['id'=>'9','name'=>'Financial Services','description'=>NULL,'tag'=>NULL],

		['id'=>'10','name'=>'Government','description'=>NULL,'tag'=>NULL],

		['id'=>'11','name'=>'Manufacturing','description'=>NULL,'tag'=>NULL],

		['id'=>'12','name'=>'Media and Entertainment','description'=>NULL,'tag'=>NULL],

		['id'=>'13','name'=>'Non-profit','description'=>NULL,'tag'=>NULL],

		['id'=>'14','name'=>'Other','description'=>NULL,'tag'=>NULL],

		['id'=>'15','name'=>'Retail','description'=>NULL,'tag'=>NULL],

		['id'=>'16','name'=>'Software and Internet','description'=>NULL,'tag'=>NULL],

		['id'=>'17','name'=>'Telecommunications','description'=>NULL,'tag'=>NULL],

		['id'=>'18','name'=>'Transportation and Storage','description'=>NULL,'tag'=>NULL],

		['id'=>'19','name'=>'Travel Recreation and Leisure','description'=>NULL,'tag'=>NULL],

		['id'=>'20','name'=>'Wholesale and Distribution','description'=>NULL,'tag'=>NULL]
     	
     ];

     DB::table('content_categories')->insert($categories);
    
    }
}
