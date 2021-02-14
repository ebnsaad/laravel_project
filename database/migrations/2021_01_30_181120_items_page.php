<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class ItemsPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS item_page_view");
        DB::statement("create view item_page_view as
        select i.item_name,i.item_id,i.price,i.size,
     i.unit,i.category,i.short,i.full,i.viewed_number,i.supplier_email,i.t_date,
      (select img_url from item_images where 
     item_images.item_id = i.item_id limit 1) AS img_url 
     from  items i
      
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS item_page_view");
    }
}
