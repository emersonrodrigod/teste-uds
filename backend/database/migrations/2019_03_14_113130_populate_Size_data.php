<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class PopulateSizeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sizes=[
		    [
			    'name' => 'Pequena',
			    'price' => 20,
			    'preparation_time' => 15
            ],
            [
			    'name' => 'Média',
			    'price' => 30,
			    'preparation_time' => 20
            ],
            [
			    'name' => 'Grande',
			    'price' => 40,
			    'preparation_time' => 25
		    ],
        ];
        
	    foreach ($sizes as $size){
            Size::create($size);
	    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('sizes')->truncate();
    }
}
