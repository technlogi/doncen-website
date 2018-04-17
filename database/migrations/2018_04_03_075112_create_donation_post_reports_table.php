<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationPostReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_post_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->integer('donation_post_id')->comment('FK_donation_posts');
            $table->integer('user_id')->comment('FK_users');
            $table->string('report_subject');
            $table->string('report');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_post_reports');
    }
}
