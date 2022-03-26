<?php

namespace App;
use App\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'payed_at',
        'order_id',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @deprecated Use the "casts" property
     *
     * @var array
     */
    protected $casts = [
        'payed_at'=>'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
