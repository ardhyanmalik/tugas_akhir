<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class tb_transaksi extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $fillable = ['id_transaksi','id_user','id_produk','quantity','total_harga','alamat','status','created_at','updated_at'];
    public $primaryKey='id_transaksi';
    protected $table = 'tb_transaksi';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function user() {
        return $this->hasMany('tb_user');
    }
     public function produk() {
        return $this->hasMany('tb_produk');
    }

}
