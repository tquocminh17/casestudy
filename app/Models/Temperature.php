<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\CarbonImmutable|null $recorded_at
 * @property string $device_id
 * @property float $value
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Temperature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Temperature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Temperature query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Temperature whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Temperature whereRecordedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Temperature whereValue($value)
 *
 * @mixin \Eloquent
 */
class Temperature extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'recorded_at' => 'datetime',
    ];
}
