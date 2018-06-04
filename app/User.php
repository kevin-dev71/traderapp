<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @property string $role_id
 * @property string|null $last_name
 * @property string|null $picture
 * @property-read \App\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Trade[] $trades
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pathAttachment(){
        return "/images/users/" . $this->picture;
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function trades(){
        return $this->hasMany(Trade::class)->select('id' , 'user_id', 'instrument_id' , 'point');
    }

    public function getPointStatsByUserId($id){
        return array(
            'total_win' => Trade::where('point' , '>', '0')
                ->where('user_id' , $id)
                ->sum('point'),
            'total_lose' => Trade::where('point' , '<', '0')
                ->where('user_id' , $id)
                ->sum('point')
        );
    }

    public function getTradesByUserIdByMonth($id, $month){
        
        /*return array(
            'total_win' => Trade::where('point' , '>', '0')
                ->where('user_id' , $id)
                ->sum('point')
        );*/
    }
}
