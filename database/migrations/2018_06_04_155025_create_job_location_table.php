<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateJobLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');

            $table->unsignedInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        $data = [
            [
                'id' => 1,
                'location' => 'California',
                'country_id' => 230,
                'created_at' => '2019-12-19 00:20:05',
                'updated_at' => '2020-07-22 15:32:53',
            ],
            [
                'id' => 2,
                'location' => 'New York',
                'country_id' => 230,
                'created_at' => '2019-12-19 00:25:15',
                'updated_at' => '2020-07-22 15:37:23',
            ],
        ];

        DB::table('job_locations')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_locations');
    }
}
