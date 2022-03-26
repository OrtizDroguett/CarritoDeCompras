<?php
namespace App\Services;

use App\Cart;
use Illuminate\Support\Facades\Cookie;
class CartService
{
    protected $cookiename = 'cart';
    public function getFromCookie()
    {
        $cartId = Cookie::get($this->cookiename);
        $cart = Cart::find($cartId);
        return $cart;
    }
    public function getFromCookieOrCreate()
    {
        $cart= $this->getFromCookie();
        return $cart ?? Cart::Create();
    }
    public function makeCookie(Cart $cart)
    {
        return $cookie= cookie::make($this->cookiename,$cart->id,7*24*60);
    }
    public function contarProductos()
    {

        $cart=$this->getFromCookie();
        if($cart!=null)
        {
            return $cart->products->pluck('pivot.quantity')->sum();
        }
        return 0;
    }
}