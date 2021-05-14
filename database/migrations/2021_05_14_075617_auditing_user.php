<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AuditingUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Trigger to add user
        DB::unprepared('
        CREATE TRIGGER `add_new_audit_user` AFTER INSERT ON `users` FOR EACH ROW BEGIN
           INSERT INTO auditing
           VALUES (null, NEW.id, 0, 0, 0);
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_new_audit_user`');
    }
}
