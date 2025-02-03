<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement('
            ALTER TABLE `erp`.`transactions`
            CHANGE COLUMN `batch_id` `batch_id` BIGINT NULL,
            DROP INDEX `transactions_batch_id_foreign`;
        ');
    }

    /**
     * Revertir las migraciones.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('
            ALTER TABLE `erp`.`transactions`
            CHANGE COLUMN `batch_id` `batch_id` BIGINT NOT NULL,
            ADD CONSTRAINT `transactions_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches`(`id`) ON DELETE CASCADE;
        ');
    }
};
