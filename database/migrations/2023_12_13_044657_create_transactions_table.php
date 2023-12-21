<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table
                ->foreignUuid('user_id')
                ->nullable()
                ->references('id')
                ->on('users');
            $table->string('code')->nullable();
            $table
                ->foreignUuid('loan_id')
                ->nullable()
                ->references('id')
                ->on('loans');
            $table->string('loan_date')->nullable();
            $table->date('expected_return')->nullable();
            $table
                ->foreignUuid('admin_id')
                ->nullable()
                ->references('id')
                ->on('users');
            $table
                ->foreignUuid('returning_id')
                ->nullable()
                ->references('id')
                ->on('returnings');
            $table->string('returning_code')->nullable();
            $table->date('returning_date')->nullable();
            $table->string('condition')->nullable();
            $table->string('fine')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
};
