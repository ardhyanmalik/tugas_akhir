<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class tb_users extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $fillable = ['id_user','id_contributor','name','email','username','password','password_temp','user_photo','code','role_id','status_user','remember_token','user_introduction','facebook_link','twitter_link','google_link'];
    public $primaryKey='id_user';
    protected $table = 'tb_users';


    public function hapus($id_user){
        self::find($id_user)->delete();
    }

    public function message(){
        return $this->hasMany('tb_message');
    }

    public function newMessage(){
        $message = new tb_message;
        $message->tb_users->associate($this);

        return $message;
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

}
