<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartlessons = Cart::select( 'cart_lessons.*' , 'lessons.name', 'lessons.amount' )
        ->where('user_id' , Auth::id())
        ->join('lessons', 'lessons.id','=','cart_lessons.lesson_id')
        ->get();
        $subtotal = 0;
        foreach($cartlessons as $cartlesson){
            $subtotal += $cartlesson->amount * $cartlesson->quantity;
        }
        return view('cart.index', ['cartlessons' => $cartlessons, 'subtotal' => $subtotal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'lesson_id' => $request->post('lesson_id'),
            ],
            [
                'quantity' => \DB::raw ('quantity +' . $request -> post('quantity')),
            ]
            );

            return redirect ( '/' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cartlesson)
    {
        $cartlesson->quantity = $request->post('quantity');
        $cartlesson->save();
        return redirect('purchase')->with('flash_message','カートを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cartlesson)
    {
        $cartlesson->delete();
        return redirect('/purchase');
    }
}
