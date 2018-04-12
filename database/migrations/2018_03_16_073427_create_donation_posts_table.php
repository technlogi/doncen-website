<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('post_no');
            $table->integer('user_id')->comment('FK_users');
            $table->integer('specification_id')->comment('FK_specifications');
            $table->integer('user_type_id')->comment('FK_user_types');
            $table->string('title');
            $table->string('description');
            $table->tinyInteger('condition')->comment('1-new | 2-old');
            $table->string('address')->nullable();
            $table->integer('city_id')->comment('FK_cities');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('system_code');
            $table->integer('donation_type_id')->comment('FK_donation_types');
            $table->integer('donation_type_other')->nullable();
            $table->tinyInteger('preference')->default(1)->comment('0-new | 1-anyone');
            $table->string('preference_gender')->nullable()->comment('1-male | 2-female | 3-other');
            $table->string('preference_age')->nullable()->comment('1-0to14 | 2-14to30 | 3-30to60 | 4-above60');
            $table->tinyInteger('preference_is_handicap')->nullable()->comment('0-no | 1-yes');
            $table->tinyInteger('consideration')->default(0)->comment('0-free | 1-Non-Monetary | 2-Monetary');
            $table->string('consideration_detail')->nullable();
            $table->tinyInteger('is_urgent')->default(0)->comment('0-no | 1-yes');
            $table->string('urgent_reason')->nullable();
            $table->tinyInteger('d_status')->default(0)->comment('0-Individual | 1-Organization');
            $table->string('d_name');
            $table->string('d_email');
            $table->string('d_contact');
            $table->integer('d_city_id')->comment('FK_cities');
            $table->string('d_address');
            $table->tinyInteger('helper_status')->nullable()->comment('0-Individual | 1-Organization');
            $table->string('helper_name')->nullable();
            $table->string('helper_email')->nullable();
            $table->string('helper_contact')->nullable();
            $table->integer('helper_city_id')->nullable()->comment('FK_cities');
            $table->string('helper_address')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0-deactive | 1-active');
            $table->tinyInteger('is_complete')->default(0)->comment('0-pandding | 1-complete');
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
        Schema::dropIfExists('donation_posts');
    }
}
