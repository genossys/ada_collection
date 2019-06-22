<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class customerModel extends Model
{
    //
    protected $table = 'tb_customer';
    protected $fillable = ['kdCustomer', 'namaCustomer'];
    protected $primaryKey = 'kdCustomer';
    public $incrementing = false;
    public $timestamps = false;
}
