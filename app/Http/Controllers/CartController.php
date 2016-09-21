<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cart;
use App\Products;
use App\User;
use Session;

class CartController extends Controller
{
    public function index(){
    	$UserID = \Auth::user()->id;
    	$user = User::where('id', '=', $UserID)->firstOrFail();
    	$Cart = $user->Usercart;
    	return view('cart.index', compact('Cart'));

    }

    	public function add(Request $request, $id){
    		$this->validate($request, [
    			'size' => 'required',
    			'quantity' => 'required|numeric',
    		]);

    		if( isset($_POST['addtocart']) ){

    			
    			$product = Products::findOrFail($id);

    			// Check to see if there is stock
    			if($request->quantity > $product['quantity']){
    				Session::flash('LowStock', 'Sorry there is not enough stock left');
    				return redirect("/Shop/$id");
    			}

    			// Check to see if the product is found in the database
    			$productFound = false;

    			// Get user id
    			$UserID = \Auth::user()->id;
    			// Get the subtotal
    			$Subtotal = $request->quantity * $product['price'];

    			// Check to see if the product is already in the database
    			$cart = Cart::where('user_id', '=', $UserID)->get();
    			foreach($cart as $cartItem){
    				if( ($cartItem['product_id'] == $id) & ($cartItem['size'] == $request->size) ){
    					$productFound = true;
    				}
    			}

    			// Change the stock quantity of the products
    			$product->quantity = $product['quantity'] - $request->quantity;
    			$product->save();

    			if($productFound == true){
    				// Update the quantity of the cart item
    				foreach($cart as $cartItem){
    					if( ($cartItem['product_id'] == $id) & ($cartItem['size'] == $request->size) ){
    						$cartItem->quantity = $cartItem['quantity'] + $request->quantity;
    						$cartItem->subtotal = $cartItem['subtotal'] + $Subtotal;
    						$cartItem->save();
    						break;
    					}

    				}
    			} else {

    			// Change the stock of the product

    			//Add product to cart
    			$Cart = new Cart();
    			$Cart->user_id = $UserID;
    			$Cart->product_id = $id;
    			$Cart->size = $request->size;
    			$Cart->quantity = $request->quantity;
    			$Cart->subtotal = $Subtotal;
    			$Cart->save();
    			}

    	


    			






    		};


    		return redirect("/Cart");














    	}

    	public function remove($id){
    		$cartItem = Cart::where('id', '=', $id)->firstOrFail();
    		$product = Products::where('id', '=', $cartItem['product_id'])->firstOrFail();
    		$product->quantity = $product['quantity'] + $cartItem['quantity'];
    		$product->save();
    		$cartItem->delete();

    		Session::flash('RemoveCart', 'Item was succesfully removed from your cart');
    		return redirect('/Cart');
    	}
    
}
