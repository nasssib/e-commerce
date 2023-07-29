<?php

use App\Products;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Products::class,30)->create();
        /*
       $P1=[
        'name'=>'e-comemerce',
        'image'=>'uploads\products\p1.jpg',
        'price'=>'1000',
        'description'=>'nice t-shirt'
       ];

       $P2=[
        'name'=>'e-comemerce',
        'image'=>'uploads\products\p2.jpg',
        'price'=>'2000',
        'description'=>'nice t-shirt'
       ];

       App\Products::create($P1);
       App\Products::create($P2);
       */

    }
}
