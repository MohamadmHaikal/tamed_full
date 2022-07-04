<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Sentinel;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getAllRoles()
    {
        $results = DB::table('roles')->get();
        return (is_object($results) && $results->count()) ? $results : null;
    }
    public function getUserRole($user_id)
    {
        $query = DB::table('roles')->selectRaw('roles.id, roles.slug, roles.name')->join('role_users', 'roles.id', '=', 'role_users.role_id')->where('role_users.user_id', $user_id);
        $result = $query->get()->first();
        return (is_object($result)) ? $result : null;
    }
    public function getRoleByName($role_name = 'customer')
    {
        $role = DB::table('roles')->where('slug', $role_name)->get()->first();
        return (is_object($role)) ? $role : null;
    }
    public function updateUserRole($user_id, $role_id)
    {
        DB::table('role_users')->where('user_id', $user_id)->delete();
        $user = get_user_by_id($user_id);
        $role = Sentinel::findRoleById($role_id);
        if ($role && $user) {
            $role->users()->attach($user);
            return true;
        }
        return false;
    }

}
