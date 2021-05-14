<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AuditingInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Trigger for inserts
        DB::unprepared('
        CREATE TRIGGER `increment_insert_ug` AFTER INSERT ON `user_games` FOR EACH ROW BEGIN
        UPDATE auditing
            SET auditing.inserts = auditing.inserts+1
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
        DB::unprepared('DROP TRIGGER `increment_insert_ug`');
    }
}
