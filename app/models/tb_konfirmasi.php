<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class tb_konfirmasi extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $primaryKey='id_konfirmasi';
    protected $table = 'tb_konfirmasi';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
    protected $fillable = array('id_transaksi','id_user','bankpengirim','nomor_rekening','bank_tujuan','nominal','file_transaksi','created_at','updated_at');


    public function user() {
        return $this->hasMany('tb_user');
    }
    public function transaksi(){
        return $this->hasMany('tb_transaksi');
    }

}
