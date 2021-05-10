<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->hasOne(Role::class,'id','role_id');
    }

    ///////////////////// parent folder /////////////////////////
    public function privateParentFolder()
    {
        return $this->hasMany(Folder::class,'user_id','id')->where('parent_id',null)->where('shared','private')->where('archived',0);
    }

    public function privateParentFiles()
    {
        return $this->hasMany(File::class,'user_id','id')->where('folder_id',null)->where('archived',0)->where('shared','private');
    }


    //parent sub folder
    public function privateSubFolder($id)
    {
        return $this->hasMany(Folder::class,'user_id','id')->where('parent_id',$id)->where('shared','private')->where('archived',0);
    }

    public function privateSubFiles($id)
    {
        return $this->hasMany(File::class,'user_id','id')->where('folder_id',$id)->where('archived',0)->where('shared','private');
    }


    /////////////////////////////////////////// public folder /////////////////////////////////
    public function publicParentFolder()
    {
        return $this->hasMany(Folder::class,'user_id','id')->where('parent_id',null)->where('shared','public')->where('archived',0);
    }

    public function publicParentFiles()
    {
        return $this->hasMany(File::class,'user_id','id')->where('folder_id',null)->where('archived',0)->where('shared','public');
    }

    //public parent sub folder
    public function publicSubFolder($id)
    {
        return $this->hasMany(Folder::class,'user_id','id')->where('parent_id',$id)->where('shared','public')->where('archived',0);
    }

    public function publicSubFiles($id)
    {
        return $this->hasMany(File::class,'user_id','id')->where('folder_id',$id)->where('archived',0)->where('shared','public');
    }

}
