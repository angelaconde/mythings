<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AuditingUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Trigger for updates
        DB::unprepared('
        CREATE TRIGGER `increment_update_ug` AFTER UPDATE ON `user_games` FOR EACH ROW BEGIN
        UPDATE auditing
            SET auditing.updates = auditing.updates+1
            WHERE auditing.user_id = NEW.user_id;
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
        DB::unprepared('DROP TRIGGER `increment_update_ug`');
    }
}
