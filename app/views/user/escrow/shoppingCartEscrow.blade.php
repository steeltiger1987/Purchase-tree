@extends('user.escrow.layout')
@section('custom-styles')
    {{HTML::style('/assets/asset_view/css/forestchange.css')}}
@stop
@section('body')
    <div class="container content">
        <div class="col-md-12 text-center margin-bottom-30">
            <h2>{{Lang::get('cart.purchasetree_shopping_cart_escrow')}}</h2>
            <p>{{$cart->invoice_number}}</p>
        </div>
        <div class="col-md-12">
            @if($escrowID == 0)
                <?php $cartProducts = $cart->shoppingCartItems; ?>
                @if(count($cartProducts)>0)
                    @foreach($cartProducts as $key =>$cartProduct)
                        <div class="row margin-bottom-40">
                            <div class="col-md-2 col-sm-2 col-xs-4">
                                <img src="{{$cartProduct->image_url}}" class="image-responsive" style="width: 100%">
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <p><span style="color:red">Product Name: </span> {{$cartProduct->product->product_name}}</p>
                                <p><span style="color:red">Size: </span> {{$cartProduct->size}}</p>
                                <p><span style="color:red">Color: </span> {{$cartProduct->color}}</p>
                                <p><span style="color:red">Qty: </span> {{$cartProduct->qty." ".$cartProduct->unit}}</p>
                                <p><span style="color:red">Price: </span> {{$cartProduct->product_price." $"}}</p>
                                @if($cartProduct->shipping_price !="")
                                    <p><span style="color:red">Shipping Price: </span> {{$cartProduct->shipping_price." $"}}</p>
                                @endif
                                <p><span style="color: red">Product Total Price: </span> {{$cartProduct->sub_total . " $" }} </p>
                                <p><span style="color: red">Escrow Fee: </span> {{round($cartProduct->sub_total*$fee,2) . " $" }}</p>
                                <p><span style="color: red">Sub Total: </span> {{round($cartProduct->sub_total*(1+$fee),2)." $"}}</p>
                                <p><span style="color: red">Status :</span>
                                    @if($cartProduct->status == 2)
                                        Product pending
                                    @elseif($cartProduct->status == 3)
                                        Send Product
                                    @elseif($cartProduct->status == 4)
                                        Seller Send Product
                                    @elseif($cartProduct->status == 5)
                                        Buyer Get Product
                                    @elseif($cartProduct->status == 7)
                                        Payment cancelled
                                    @elseif($cartProduct->status == 8)
                                        Payment disputed
                                    @elseif($cartProduct->status == 9)
                                        Payment Released
                                    @elseif($cartProduct->status == 9)
                                        Admin send funds to seller
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <h4>Seller</h4>
                                        <?php $user = $cartProduct->product->member;?>
                                        <p>{{$user->firstname." ". $user->lastname}}</p>
                                        <p>{{$user->street}}</p>
                                        <p>
                                            {{$user->city }} ,
                                            @if($user->state != "") {{$user->state}} @endif
                                            {{$user->zipcode}}
                                        </p>
                                        <p>{{$user->country->country_name}}</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h4>Buyer</h4>
                                        <?php $buyer = $cart->member;?>
                                        <p>{{$buyer->firstname." ". $buyer->lastname}}</p>
                                        <p>{{$buyer->street}}</p>
                                        <p>
                                            {{$buyer->city }} ,
                                            @if($buyer->state != "") {{$buyer->state}} @endif
                                            {{$buyer->zipcode}}
                                        </p>
                                        <p>{{$buyer->country->country_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @if($cart->status == 2)
                                            @if(Session::get('user_id') == $cart->buyer_id)
                                                @if($cartProduct->status == 5)
                                                    <a href="javascript:void(0)" class="btn-u btn-u-blue" style="float: right; margin-left:10px;">Release Payment</a>
                                                    <a href="javascript:void(0)" class="btn-u btn-u-green" style="float: right; margin-left:10px;">Dispute Payment</a>
                                                @endif
                                                <a href="javascript:void(0)" class="btn-u btn-u-red" style="float: right">Cancel Payment</a>
                                            @elseif($user->id == $cart->buyer_id)
                                                {{Lang::get('user.the_money_was_put_in_the_escrow')}} <br>
                                                <a href="javascript:void(0)" class="btn-u btn-u-red">Cancel Payment</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row margin-bottom-40">
                        <div class="col-md-4 col-md-offset-2">
                            <p><span style="color:red;">Sub Total Price  :</span>  {{$cart->subTotal ." $"}}</p>
                            <p><span style="color:red;">Escrow Fee :</span>  {{$cart->escrowFee ." $"}}</p>
                            <p><span style="color: red">Total Price :</span>  {{$cart->total ." $"}}</p>
                        </div>
                    </div>
                @endif
            @else
                <div class="row margin-bottom-40">
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <img src="{{$cartProductList->image_url}}" class="image-responsive" style="width: 100%">
                    </div>
                    <div class="col-md-4">
                        <p><span style="color:red">Product Name: </span> {{$cartProductList->product->product_name}}</p>
                        <p><span style="color:red">Size: </span> {{$cartProductList->size}}</p>
                        <p><span style="color:red">Color: </span> {{$cartProductList->color}}</p>
                        <p><span style="color:red">Qty: </span> {{$cartProductList->qty." ".$cartProductList->unit}}</p>
                        <p><span style="color:red">Price: </span> {{$cartProductList->product_price." $"}}</p>
                        @if($cartProductList->shipping_price !="")
                            <p><span style="color:red">Shipping Price: </span> {{$cartProductList->shipping_price." $"}}</p>
                        @endif
                        <p><span style="color: red">Sub Total</span> {{$cartProductList->sub_total . " $" }} </p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h4>Seller</h4>
                                <?php $user = $cartProductList->product->member;?>
                                <p>{{$user->firstname." ". $user->lastname}}</p>
                                <p>{{$user->street}}</p>
                                <p>
                                    {{$user->city }} ,
                                    @if($user->state != "") {{$user->state}} @endif
                                    {{$user->zipcode}}
                                </p>
                                <p>{{$user->country->country_name}}</p>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h4>Buyer</h4>
                                <?php $buyer = $cart->member;?>
                                <p>{{$buyer->firstname." ". $buyer->lastname}}</p>
                                <p>{{$buyer->street}}</p>
                                <p>
                                    {{$buyer->city }} ,
                                    @if($buyer->state != "") {{$buyer->state}} @endif
                                    {{$buyer->zipcode}}
                                </p>
                                <p>{{$buyer->country->country_name}}</p>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="row margin-bottom-40">
                    <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-5">
                        <p><span style="color:red">SubTotal Price: </span>  {{$cartProductList->sub_total . " $" }} </p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-7">
                        @if($cart->status ==2)
                            {{Lang::get('user.the_money_was_put_in_the_escrow')}} <br>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
@stop