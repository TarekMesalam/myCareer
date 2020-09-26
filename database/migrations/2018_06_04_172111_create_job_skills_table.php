<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateJobSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_skills', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('skill_id')->nullable();
            $table->foreign('skill_id')->references('id')->on('skills')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('job_id')->nullable();
            $table->foreign('job_id')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        $data = [
            [
                'id' => 6,
                'skill_id' => 2,
                'job_id' => 2,
                'created_at' => '2020-07-02 14:58:52',
                'updated_at' => '2020-07-02 14:58:52',
            ],
            [
                'id' => 7,
                'skill_id' => 1,
                'job_id' => 1,
                'created_at' => '2020-07-05 17:30:30',
                'updated_at' => '2020-07-05 17:30:30',
            ],
            [
                'id' => 8,
                'skill_id' => 3,
                'job_id' => 1,
                'created_at' => '2020-07-05 17:30:30',
                'updated_at' => '2020-07-05 17:30:30',
            ],
            [
                'id' => 9,
                'skill_id' => 4,
                'job_id' => 3,
                'created_at' => '2020-07-24 11:53:32',
                'updated_at' => '2020-07-24 11:53:32',
            ],
        ];

        DB::table('job_skills')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_skills');
    }
}
