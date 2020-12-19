<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;//ソート

class Book extends Model
{

    use Sortable;//ソート

    protected $fillable = ['item_name', 'item_number', 'item_amount', 'item_code', 'item_brand', 'item_maker','item_subtotal','item_image'];
    public $sortable = ['id', 'item_name', 'item_code'];//追記(ソートに使うカラムを指定
}
