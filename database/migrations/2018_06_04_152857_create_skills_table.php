<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('job_categories')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        $data = [
            [
                'id' => 1,
                'name' => 'MVC',
                'category_id' => 9,
                'created_at' => '2019-12-19 00:19:44',
                'updated_at' => '2019-12-19 00:19:44',
            ],
            [
                'id' => 2,
                'name' => 'Trekking',
                'category_id' => 10,
                'created_at' => '2019-12-19 00:45:00',
                'updated_at' => '2019-12-19 00:45:46',
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'category_id' => 9,
                'created_at' => '2020-07-05 17:29:49',
                'updated_at' => '2020-07-05 17:29:49',
            ],
            [
                'id' => 4,
                'name' => 'Flutter',
                'category_id' => 11,
                'created_at' => '2020-07-24 07:51:43',
                'updated_at' => '2020-07-24 07:52:40',
            ],
        ];

        DB::table('skills')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
