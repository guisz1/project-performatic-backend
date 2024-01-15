<?php

use Core\Enums\UserRole;
use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('document', 60)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 60);
            $table->string('role', 20)->default(UserRole::Commom->value);
            $table->decimal('amount', 15, 2)->default(0);
            $table->boolean('active')->default(1);
            
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
