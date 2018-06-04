<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Market
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Instrument[] $instruments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Market whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Market whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Market whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Market whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Market whereUpdatedAt($value)
 */
class Market extends Model
{
    public function instruments(){
        return $this->hasMany(Instrument::class)->select('id' , 'market_id', 'name' , 'description' , 'tick_size' , 'point_value' , 'created_at');
    }
}
