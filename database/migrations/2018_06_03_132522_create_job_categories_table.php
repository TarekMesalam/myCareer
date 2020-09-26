<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateJobCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->string('photo')->nullable();
            $table->timestamps();
        });

        $data = [
            [
                'id' => 9,
                'name' => 'IT & Telecommunication',
                'photo' => 'bc8241bfe37810f16fe02873f6d80554.jpeg',
                'created_at' => '2019-12-19 00:16:55',
                'updated_at' => '2020-07-22 15:33:29',
            ],
            [
                'id' => 10,
                'name' => 'Guide',
                'photo' => '506e516691bc696cc7d45401fe730101.jpeg',
                'created_at' => '2019-12-19 00:44:46',
                'updated_at' => '2020-07-02 15:12:01',
            ],
            [
                'id' => 11,
                'name' => 'Flutter Developer',
                'photo' => '0682be04ef5b794b847912384abaeee6.jpeg',
                'created_at' => '2020-07-22 16:08:56',
                'updated_at' => '2020-07-22 16:09:15',
            ],
        ];

        DB::table('job_categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_categories');
    }
}
