<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class tb_reversioning extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $primaryKey='id_reversioning';
    protected $table = 'tb_reversioning';
    protected $fillable = ['id_reversioning','id_produk','id_user_owner','id_user_offer','id_category','produk_version','produk_title','produk_type','reversioning_produk_status','produk_ava','produk_introduction','produk_file','produk_link','produk_pict_1','produk_pict_2','produk_pict_3','produk_pict_4','produk_pict_5','produk_video_youtube','produk_desc'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

}
