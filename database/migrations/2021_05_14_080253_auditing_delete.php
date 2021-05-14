<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AuditingDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Trigger for deletes
        DB::unprepared('
        CREATE TRIGGER `increment_delete_ug` AFTER DELETE ON `user_games` FOR EACH ROW BEGIN
        UPDATE auditing
            SET auditing.deletes = auditing.deletes+1
            WHERE auditing.user_id = OLD.user_id;
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
        DB::unprepared('DROP TRIGGER `increment_delete_ug`');
    }
}
