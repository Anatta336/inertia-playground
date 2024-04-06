<?php

namespace App\Orders\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model representing a line that makes up an order.
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $net_pence
 * @property int $quantity
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Orders\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereNetPence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine withoutTrashed()
 * @mixin \Eloquent
 */
class OrderLine extends Model
{
    use Timestamp;
    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'net_pence',
        'quantity',
        'name',
    ];

    /**
     * Relationship to the order this belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
