<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("DROP VIEW IF EXISTS cart_items");
        DB::statement("create view cart_items as
        select i.item_name,i.item_id,i.price,i.size,i.unit,i.category,i.short
        ,i.supplier_email,c.user_ip
        from items i inner join carts c on i.item_id=c.item_id");
      
       
    }
     
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS cart_items");
    }
}
