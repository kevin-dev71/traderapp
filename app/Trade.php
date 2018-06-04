<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Trade
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $instrument_id
 * @property string $point
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Instrument $instrument
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trade whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trade whereInstrumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trade wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trade whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trade whereUserId($value)
 * @property-read mixed $market_id
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Trade onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Trade withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Trade withoutTrashed()
 * @property-read mixed $point_stats
 */
class Trade extends Model
{

    use SoftDeletes;

    protected $fillable = ['user_id' , 'point', 'instrument_id'];

    protected $appends = ['market_id'];

    /**
     * @return $this
     */
    public function instrument(){
        return $this->belongsTo(Instrument::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getMarketIdAttribute(){
        return $this->instrument->market_id;
    }

    /*public function getPointStatsAttribute(){
        return array(
            'total_win' => self::where('point' , '>', '0')->sum('point'),
            'total_lose' => self::where('point' , '<', '0')->sum('point'),
            'total' => self::sum('point')
        );
    }*/

}
