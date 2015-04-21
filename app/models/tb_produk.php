<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class tb_produk extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $primaryKey='id_produk';
    protected $table = 'tb_produk';
    protected $fillable = ['id_produk','id_user','id_category','version_available','produk_title','produk_type','produk_harga','produk_status','produk_downloaded','user_rate_total','produk_rate_total'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

     public function user() {
        return $this->hasMany('tb_user');
    }
     public function category() {
        return $this->hasMany('tb_category');
    }



}
