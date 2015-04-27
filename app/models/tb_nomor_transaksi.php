<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class tb_nomor_transaksi extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $fillable = ['id_nomor_transaksi','nomor_transaksi','total_transaksi','status_pembayaran','created_at'];
    public $primaryKey='id_nomor_transaksi';
    protected $table = 'tb_nomor_transaksi';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function transaksi() {
        return $this->hasMany('tb_transaksi');
    }

}
