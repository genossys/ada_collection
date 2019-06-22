<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class salesModel extends Model
{
    //
    protected $table = 'tb_sales';
    protected $fillable = ['kdSales', 'namaSales', 'nohp', 'target', 'diskon'];
    protected $primaryKey = 'kdSales';
    public $incrementing = false;
    public $timestamps = false;
}
