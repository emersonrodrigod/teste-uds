<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Option;
use Illuminate\Support\Facades\DB;

class PopulateOptionData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $options = [
            [
                'name' => 'Extra bacon',
                'additional_time' => 0,
                'additional_value' => 3
            ],
            [
                'name' => 'Sem cebola',
                'additional_time' => 0,
                'additional_value' => 0
            ],
            [
                'name' => 'Borda recheada',
                'additional_time' => 5,
                'additional_value' => 5
            ],
            
        ];

        foreach($options as $option)
        {
            Option::create($option);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('options')->truncate();
    }
}
