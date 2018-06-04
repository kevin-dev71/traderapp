<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Instrument
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $market_id
 * @property string $name
 * @property string $description
 * @property string $tick_size
 * @property string $point_value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Market $market
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Trade[] $trades
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instrument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instrument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instrument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instrument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instrument whereMarketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instrument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instrument wherePointValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instrument whereTickSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instrument whereUpdatedAt($value)
 * @property-read mixed $market_formatted
 */
class Instrument extends Model
{

    protected $appends = ['market_formatted'];

    public function trades(){
        return $this->hasMany(Trade::class)->select('id' , 'user_id', 'instrument_id' , 'point');
    }

    public function market(){
        return $this->belongsTo(Market::class);
    }

    public function getMarketFormattedAttribute(){
        return $this->market->pluck('name')->implode(', ');
    }
}
