@extends('layouts.app')
@section('content')
<title>{{ __('My Cart')}}</title>
<div class="container mb-30">
    <div class="col-md-12">
        <h4 class="urunDetayBaslik">{{ __('Cart')}}</h4>
        @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @endif

        <table class="table table-hover table-striped">

            <thead>
                <tr>
                    <th width="50"><i class="fa fa-times"></i></th>
                    <th>{{ __('Product')}}</th>
                    <th width="200" class="text-center">{{ __('Quantity')}}</th>
                    <th width="200" class="text-center">{{ __('Unit Price')}}</th>
                    <!-- <th width="150" class="text-center">{{ __('KDV')}}</th> -->
                    <th width="150" class="text-right">{{ __('Total')}}</th>
                <tr>
            </thead>
            @if($all != null)
            @foreach($all as $c)
            @foreach($prod as $p)
            @if($c[0]==$p->id)
            <tbody>

                <tr>
                    <td>
                        <div class="rTableCell" id="deleteItem_{{$c[3]}}">
                            <button style="padding: 0;border: none;background: none;" class="delete_item" id="delete_item" value="{{$c[3]}}" name="delete_item"><i class="fa fa-times" style="color:red;"></i></button>
                        </div>
                    </td>
                    <td>
                    <a href="{{ url(app()->getLocale(),'product') }}/{{$p->id}}">{{$p->name}}</a>
                    </td>

                    <td class="text-center">
                        <div class="rTableCell">
                            <button type="button" id="sub" value="{{$p->id}}" data-rel="{{$c[3]}}" data-rel2="{{$c[2]}}" class="btn btn-xs btn-success sub">-</button>
                            <input type="number_format" id="quantity" style="background: transparent; border: none; width:20%; text-align: center;" name="{{$p->id}}" value={{$c[1]}} min="1" max="100" readonly />
                            <button type="button" id="add" value="{{$p->id}}" data-rel="{{$c[3]}}" data-rel2="{{$c[2]}}" class="btn btn-xs btn-success add">+</button>
                        </div>
                    </td>
                    <td class="text-center"> {{$c[2]}} TL</td>
                    <!-- <td class="text-center">54,15 TL</td> -->
                    <td class="text-right">
                        <div id="individualPrice_{{$c[3]}}">
                             {{$c[1]*$c[2]}} TL</div>
                    </td>


                </tr>
                @break
                @endif
                @endforeach
                @endforeach


            </tbody>
            @else

            <tr>
                <td colspan="6">{{ __('There are no products in your cart.')}}</td>
            </tr>
            @endif

            <tfoot>

                <!-- <tr>
                    <td colspan="5" class="text-right"><strong>{{ __('First Order Discount')}} (%):</strong></td>
                    <td class="text-right">0,00 TL</td>
                </tr> -->
                <tr>
                    <td colspan="4" class="text-right"><strong>{{ __('Total')}}:</strong></td>
                    <td class="text-right" id="totalCost"> {{Session::get('price')}} TL </td>
                </tr>
            </tfoot>

        </table>
        @if($all != null)
            <a class="btn btn-primary pull-right" type="submit" href="{{route('cart.confirm',app()->getLocale())}}">{{ __('Checkout')}}</a>
        @endif

    </div>
</div>


<script type="text/javascript">
    $('.add').click(function() {

        var url = "{{route('user.editCart',app()->getLocale())}}";
        var product_id = $(this).val();
        $(this).prev().val(+$(this).prev().val() + 1);
        var x = $(this).prev().val();
        var token = $("input[name=_token]").val();
        var order_serial = this.getAttribute('data-rel');
        var product_price = this.getAttribute('data-rel2');

        $.ajax({
            type: 'post',
            url: url,
            dataType: "JSON",
            async: false,
            data: {
                pid: product_id,
                newQ: x,
                oSerial: order_serial,
                _token: token
            },
            success: function(msg) {
                document.getElementById("individualPrice_" + order_serial).innerHTML = x * product_price + " TL";
                document.getElementById("totalCost").innerHTML = msg[2] + " TL";
            }
        });

    });
    $('.sub').click(function() {

        var url = "{{route('user.editCart',app()->getLocale())}}";
        var product_id = $(this).val();
        var order_serial = this.getAttribute('data-rel');
        var product_price = this.getAttribute('data-rel2');
        if ($(this).next().val() > 1) {
            $(this).next().val(+$(this).next().val() - 1);
            var x = $(this).next().val();
            var token = $("input[name=_token]").val();


            $.ajax({
                type: 'post',
                url: url,
                dataType: "JSON",
                async: false,
                data: {
                    pid: product_id,
                    newQ: x,
                    oSerial: order_serial,
                    _token: token
                },
                success: function(msg) {
                    document.getElementById("individualPrice_" + order_serial).innerHTML = x * product_price + " TL";
                    document.getElementById("totalCost").innerHTML = msg[2] + " TL";

                }
            });


        }
    });

    $('.delete_item').click(function() {
        var url = "{{route('user.deleteCartItem',app()->getLocale())}}";
        var serial = $(this).val(); //serial is the forth element of sale coloumn
        var id_holder = "deleteItem_" + serial;

        $.ajax({
            type: 'post',
            url: url,
            dataType: "JSON",
            async: false,
            data: {
                serial: serial,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                document.getElementById(id_holder).innerHTML = "";
                document.getElementById("totalCost").innerHTML = response[2];
                window.location.reload();
            }

        });
    });
</script>

@endsection