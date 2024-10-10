@extends('layouts.master')

@section('content')
<div class="container">
   <div class="card mb-4">
      <div class="ms-4 mt-2">
         <h4>Address</h4>
      </div>
      <div>
         <p>
         </p>
      </div>
   </div>

   <div class="row mb-5">
      <form class="col-md-12" method="post" action="{{ route('checkout') }}">
         @csrf
         <div class="site-blocks-table">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="product-thumbnail">Image</th>
                     <th class="product-name">Product</th>
                     <th class="product-price">Price</th>
                     <th class="product-quantity">Quantity</th>
                     <th class="product-total">Total</th>
                     <th class="product-remove">Remove</th>
                  </tr>
               </thead>
               <tbody>
                  @if(session('cart'))
                  @foreach(session('cart') as $id => $details)
                  <tr>
                     <td class="product-thumbnail">
                        <img src="{{ $details['photo'] }}" alt="Image" class="img-fluid">
                     </td>
                     <td class="product-name">
                        <h2 class="h5 text-black">{{ $details['name'] }}</h2>
                     </td>
                     <td>{{ number_format($details['price'], 0, ',', '.') }}</td>
                     <td>
                        <div class="input-group mb-3" style="max-width: 120px;">
                           <div class="input-group-prepend">
                              <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                           </div>
                           <input type="text" class="form-control text-center" value="{{ $details['quantity'] }}"
                              placeholder="" aria-label="Example text with button addon"
                              aria-describedby="button-addon1">
                           <div class="input-group-append">
                              <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                           </div>
                        </div>
                     </td>
                     <td>{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                     <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <td colspan="6" class="text-center">Your cart is empty!</td>
                  </tr>
                  @endif
               </tbody>
            </table>
         </div>
      </form>
   </div>

   <div class="row">
      <div class="col-md-6">
         <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
               <button class="btn btn-primary btn-md btn-block" form="update-cart-form">Update Cart</button>
            </div>
            <div class="col-md-6">
               <a href="/medicine" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <label class="text-black h4" for="coupon">Coupon</label>
               <p>Enter your coupon code if you have one.</p>
            </div>
            <div class="col-md-8 mb-3 mb-md-0">
               <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
            </div>
            <div class="col-md-4">
               <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
            </div>
         </div>
      </div>
      <div class="col-md-6 pl-5">
         <div class="row justify-content-end">
            <div class="col-md-7">
               <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                     <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                     <strong class="text-black">
                        {{ number_format(session('cart') ? array_sum(array_map(function($details) { return
                        $details['price'] * $details['quantity']; }, session('cart'))) : 0, 0, ',', '.') }}
                     </strong>
                  </div>
               </div>
               <div class="row mb-5">
                  <div class="col-md-6">
                     <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                     <strong class="text-black">
                        {{ number_format(session('cart') ? array_sum(array_map(function($details) { return
                        $details['price'] * $details['quantity']; }, session('cart'))) : 0, 0, ',', '.') }}
                     </strong>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12">
                     <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed To Checkout</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection