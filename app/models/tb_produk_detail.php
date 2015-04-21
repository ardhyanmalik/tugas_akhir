<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class tb_produk_detail extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $primaryKey='id_produk_detail';
    protected $table = 'tb_produk_detail';
    protected $fillable = ['id_produk_detail','id_produk','id_user','reversioning_by','produk_ava','produk_introduction','produk_file','produk_link','produk_version','produk_pict_1','produk_pict_2','produk_pict_3','produk_pict_4','produk_pict_5','produk_video_youtube','produk_desc','available','produk_main'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');



}
