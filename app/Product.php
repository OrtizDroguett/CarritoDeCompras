<?php

namespace App;
use App\Image;
use App\Cart;
use App\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];
    public function carts()
    {
        return $this->morphedByMany(Cart::class,'productable')->withPivot('quantity');
    }
    public function orders()
    {
        return $this->morphedByMany(Order::class,'productable')->withPivot('quantity');
    }
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function scopeAvailable($query)
    {

        $query->where('status','Disponible');
    }
    public function getTotalAttribute()
    {
        return $this->pivot->quantity * $this->price;
    }

}
