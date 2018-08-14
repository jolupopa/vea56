<?php

namespace App\Http\Controllers;

use App\CartDetail;

class CartController extends Controller {
	public function update() {
		// verificar si cart->id == $cartDetail->cart_id
		$cart_id = (auth()->user()->cart->id);

		$numberCartDetail = CartDetail::where('cart_id', $cart_id)->count();
		//dd($numberCartDetail); verificamos que existen productos en el cart activo
		if ($numberCartDetail > 0) {
			$cart = auth()->user()->cart;
			$cart->status = 'Pending';
			$cart->save(); //UPDATE
			$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto via Email';

			return back()->with(compact('notification'));
		} else {
			$notification = 'Tu carrito no tiene productos añadelos. ';

			return back()->with(compact('notification'));
		}
	}
}
