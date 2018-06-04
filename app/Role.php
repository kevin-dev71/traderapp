<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Role
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name Users Roles, Admin or User
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
class Role extends Model
{
    const ADMIN = 1;
    const USER_BASIC = 2;

    public function users(){
        return $this->hasMany(User::class)->select('id' , 'role_id', 'name' , 'last_name' , 'email' , 'picture');
    }
}
