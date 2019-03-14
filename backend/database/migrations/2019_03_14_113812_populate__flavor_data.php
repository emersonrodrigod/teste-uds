<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Flavor;
use Illuminate\Support\Facades\DB;

class PopulateFlavorData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $flavors = [
            [
                'name' => 'Calabresa',
                'additional_time' => 0
            ],
            [
                'name' => 'Marguerita',
                'additional_time' => 0
            ],
            [
                'name' => 'Portuguesa',
                'additional_time' => 5
            ],
            
        ];

        foreach($flavors as $flavor)
        {
            Flavor::create($flavor);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('flavors')->truncate();
    }
}
