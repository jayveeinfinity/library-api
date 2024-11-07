<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatronsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrons', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birthday');
            $table->enum('sex', ['male', 'female', 'others'])->nullable();
            
            // Address fields
            $table->string('house_no')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('zip');

            // Contact information
            $table->string('phone_number', 11);
            $table->string('secondary_phone', 11)->nullable();
            $table->string('other_phone', 11)->nullable();
            $table->string('email')->unique();
            $table->string('secondary_email')->nullable();
            $table->enum('primary_contact', ['phone', 'email', 'secondary_phone', 'secondary_email', 'other_phone']);

            // School information
            $table->string('card_number', 9)->unique();
            $table->string('college');
            $table->string('course');

            // Dates
            $table->date('registration_date');
            $table->date('expiry_date');

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
        Schema::dropIfExists('patrons');
    }
}
