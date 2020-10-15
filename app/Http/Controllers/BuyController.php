<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Cart;
use App\Mail\Buy;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
   public function index()
   {
       $cartlessons = Cart::select('cart_lessons.*', 'lessons.name', 'lessons.amount')
       ->where('user_id', Auth::id())
       ->join('lessons', 'lessons.id', '=', 'cart_lessons.lesson_id')
       ->get();
       $subtotal = 0;
       foreach($cartlessons as $cartlesson) {
           $subtotal += $cartlesson->amount * $cartlesson->quantity;
       }
       return view('purchase/index', ['cartlessons' => $cartlessons, 'subtotal' => $subtotal]);
   }  

   public function store (Request $request )
    {
        if( $request->has('post') ){
            Mail::to(Auth::user()->email)->send(new Buy());
            Cart::where('user_id' , Auth::id())->delete();
            return view ( 'purchase/complete');
        }
        $request -> flash();
        return $this->index();
    }

   
}
