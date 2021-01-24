<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birthday', 'phone', 'country', 'city', 'address', 'zipcode', 'sex', 'activiti',
        'moderation_activiti', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $rules = array(
        'title'=> 'required|min:10'
    );

    public function validate($inputs) {
        $v = Validator::make($inputs, $this->rules);
        if($v->passes()) return true;
        $this->errors = $v->messages();
        return false;
    }

    public function user_tags()
    {
        $this->hasMany('App\Model\UserTags');
    }


}
