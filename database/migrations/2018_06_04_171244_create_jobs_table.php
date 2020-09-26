<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Job;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');

            $table->text('title');

            $table->string('slug')->nullable();

            $table->unsignedInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');

            $table->mediumText('job_description');
            $table->mediumText('job_requirement');
            $table->integer('total_positions');

            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('job_locations')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('job_categories')->onUpdate('cascade')->onDelete('cascade');

            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });

        $company = Company::first();
        $jobs = Job::whereNull('company_id')->update(['company_id' => $company->id]);

        $data = [
            [
                'id' => 1,
                'title' => 'Computer Engineer',
                'slug' => 'computer-engineer-california',
                'company_id' => 1,
                'job_description' => 'Computer Engineer Description',
                'job_requirement' => 'Computer Engineer Requirement',
                'total_positions' => 1,
                'location_id' => 1,
                'category_id' => 9,
                'start_date' => '2020-07-15 00:00:00',
                'end_date' => '2020-12-31 00:00:00',
                'status' => 'active',
                'created_at' => '2020-07-15 23:20:52',
                'updated_at' => '2020-07-15 23:20:52',
            ],
            [
                'id' => 2,
                'title' => 'Guide',
                'slug' => 'guide-california',
                'company_id' => 1,
                'job_description' => 'Guide Description',
                'job_requirement' => 'Guide Requirement',
                'total_positions' => 1,
                'location_id' => 1,
                'category_id' => 10,
                'start_date' => '2020-07-01 00:00:00',
                'end_date' => '2020-12-31 00:00:00',
                'status' => 'active',
                'created_at' => '2020-07-01 23:45:33',
                'updated_at' => '2020-07-01 23:45:33',
            ],
            [
                'id' => 3,
                'title' => 'Flutter Developer',
                'slug' => 'flutter-developer-california',
                'company_id' => 1,
                'job_description' => 'Flutter Developer Description',
                'job_requirement' => 'Flutter Developer Requirement',
                'total_positions' => 2,
                'location_id' => 2,
                'category_id' => 11,
                'start_date' => '2020-07-20 00:00:00',
                'end_date' => '2020-12-31 00:00:00',
                'status' => 'active',
                'created_at' => '2020-07-24 11:53:32',
                'updated_at' => '2020-07-24 11:53:32',
            ],
        ];

        DB::table('jobs')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
