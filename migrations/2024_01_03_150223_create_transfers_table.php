<?php

use Core\Enums\TransferStatus;
use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('from_id');
            $table->unsignedInteger('to_id');
            $table->decimal('amount', 15, 2)->default(0.0);
            $table->string('status', 20)->default(TransferStatus::Await->value);
            $table->string('transfer_type', 20);
            $table->string('message', 100)->nullable();
            $table->foreign('from_id')->references('id')->on('users');
            $table->foreign('to_id')->references('id')->on('users');

            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
}
