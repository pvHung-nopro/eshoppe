<div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
            <tr class="cart_menu">
                <td class="image">Item</td>
                <td class="description"></td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Total</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($allCart as $cart)
        <form action="{{Route('frontend.cart.update',$cart->id)}}" method="post">
            @csrf
            <tr>
                <td class="cart_product">
                    <a href=""><img src="{{asset('frontend/images/cart/one.png')}}" alt=""></a>
                </td>
                <td class="cart_description">
                    <h4><a href="">{{$cart->name}}</a></h4>
                <p>Web ID: {{$cart->id}}</p>
                </td>
                <td class="cart_price">
                <p>${{floatval($cart->price) ?? null }}</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">


                    <input class="cart_quantity_input  number_qty" type="number" name="quantity" value="{{$cart->qty}}" autocomplete="off" size="2">


                    </div>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">${{floatval($cart->price * $cart->qty)}}</p>
                </td>
                    <td>

                       <button class="cart_quantity_delete sumit_cart sumit_cart_deit">
                        <i class="fas fa-edit"></i>
                        </button>

                    </td>


                <td >
                <a class="cart_quantity_delete deleted_cart" href="{{Route('frontend.cart.destroy',$cart->id)}}"><i class="fa fa-times"></i></a>
                </td>
            </form>
            </tr>
            @endforeach

        </tbody>

    </table>
<div class="cart_deleted_all"><a href="{{Route('frontend.cart.deleted_all')}}">deleted all</a> </div>
</div>
