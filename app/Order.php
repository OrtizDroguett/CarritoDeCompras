<?php

namespace App;
use App\Product;
use App\Payment;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'customer_id',
    ];
    public function payment()
    {
        //order tiene un  pago
        return $this->hasOne(Payment::class);
    }
    public function user()
    {
        //en el segundo parametro asignamos el nombre de la clave foranea, si no lo hacemos laravel segun el nombre
        //crea  la clave foranea, por ejemplo user_id
        return $this->belongsTo(User::class,'customer_id');
    }
    public function products()
    {
        return $this->morphToMany(Product::class,'productable')->withPivot('quantity');
    }
    public function getTotalAttribute()
    {
        return $this->products->pluck('total')->sum();
    }
}
