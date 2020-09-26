<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCompanySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_phone');
            $table->string('logo')->nullable();
            $table->text('address');
            $table->string('website');
            $table->string('timezone');
            $table->string('locale');
            $table->decimal('latitude', 10,8);
            $table->decimal('longitude', 11,8);
            $table->timestamps();
        });

        $data = [
            'company_name' => 'NCMS',
            'company_email' => 'info@NCMS.com',
            'company_phone' => '0000000000',
            'address' => 'US',
            'website' => 'https://www.NCMS.com',
            'locale' => 'en',
            'timezone' => 'UTC',
            'latitude' => '34.12737260',
            'longitude' => '-118.21247020'
        ];

        DB::table('company_settings')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_settings');
    }
}
