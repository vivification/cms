<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('f_account_name');
            $table->integer('f_account_type');
            $table->integer('f_account_contact_primary');
            $table->string('f_account_phone_primary');
            $table->string('f_account_email_primary');
            $table->string('f_account_fax');
            $table->string('f_account_website');
            $table->integer('f_account_industry');
            $table->string('f_account_referred_by');
            $table->integer('f_account_price_level');
            $table->integer('f_account_currency');
            $table->integer('f_account_terms');
            $table->integer('f_account_area_manager');
            $table->string('f_account_address_street');
            $table->string('f_account_address_street_locale');
            $table->string('f_account_address_mailing');
            $table->string('f_account_address_mailing_locale');
            $table->integer('f_account_status');
            $table->string('f_account_parent');
            $table->integer('f_account_reference');
            $table->dateTime('f_account_created');
            $table->integer('f_account_created_by');
            $table->dateTime('f_account_modified');
            $table->integer('f_account_modified_by');
            $table->string('f_account_vendor');
            $table->string('f_account_abn');
            $table->string('f_account_description');
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
        Schema::dropIfExists('accounts');
    }
}
