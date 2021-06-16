@extends('layouts.app')
@section('content')
@if(app()->getLocale() == 'en')
<title>{{$product->name}}</title>
@else
<title>{{$product->name_tr}}</title>
@endif
<style>
    .value-button {
        display: inline-block;
        border: 1px solid #ddd;
        margin: 0px;
        width: 40px;
        height: 20px;
        text-align: center;
        vertical-align: middle;
        padding: 11px 0;
        background: #eee;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .value-button:hover {
        cursor: pointer;
    }

    form #decrease {
        margin-right: 4px;
        border-radius: 8px 0 0 8px;
    }

    form #increase {
        margin-left: 4px;
        border-radius: 0 8px 8px 0;
    }

    form #input-wrap {
        margin: 0px;
        padding: 0px;
    }

    input#number {
        text-align: center;
        border: none;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        margin: 0px;
        width: 40px;
        height: 40px;
        background: transparent;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<h1 class="title">{{__($cat->type)}}</h1>
@if($cat->id != 9)
<article class="item">
    <header>
        @if(app()->getLocale() == 'en')
        <h2 class="title">{{$product->name}}</h2>
        @else
        <h2 class="title">{{$product->name_tr}}</h2>
        @endif
    </header>
    <div class="content clearfix">
        <div class="product_left">
            @if($product->get_Price()->visible == 1)
            <p>{{$product->get_Price()->value}} TL</p>
            @else
            <p>{{__('Contact with us to know the price')}}</p>
            @endif
            <p>{{$product->get_quantity()->value}} ml</p>
            @if(app()->getLocale() == 'en')
            <p style="text-align: justify;">{{$product->get_description()->value}}</p>
            @else
            <p style="text-align: justify;">{{$product->get_descriptionTR()->value}}</p>
            @endif
            <p class="font_color" style="text-align: justify;"><strong>{{__('Properties')}}</strong> :</p>
            @if(app()->getLocale() == 'en')
            <ul>
                @foreach($product->propertie() as $pro)
                <li>{{$pro->title}}</li>
                @endforeach
            </ul>
            @else
            <ul>
                @foreach($product->propertie() as $pro)
                <li>{{$pro->title_tr}}</li>
                @endforeach
            </ul>
            @endif

            <!-- START: Tabs -->
            <div class="rl_tabs-responsive nn_tabs-responsive">
                <ul class="nav nav-tabs nav-stacked rl_tabs-sm nn-tabs-sm" id="set-rl_tabs-sm-1">
                    <li class="rl_tabs-tab-sm nn_tabs-tab-sm active">
                        <a href="#how-to-use" class="rl_tabs-toggle-sm nn_tabs-toggle-sm"><span class="rl_tabs-sm-inner nn_tabs-sm-inner">{{__('How to use')}}</span></a>
                    </li>
                    <li class="rl_tabs-tab-sm nn_tabs-tab-sm">
                        <a href="#active-ingredients" class="rl_tabs-toggle-sm nn_tabs-toggle-sm"><span class="rl_tabs-sm-inner nn_tabs-sm-inner">{{__('Active ingredients')}}</span></a>
                    </li>
                    <li class="rl_tabs-tab-sm nn_tabs-tab-sm">
                        <a href="#formulated-without" class="rl_tabs-toggle-sm nn_tabs-toggle-sm"><span class="rl_tabs-sm-inner nn_tabs-sm-inner">{{__('Formulated')}} <span style="text-decoration: underline;"><strong>{{__('without')}}</strong></span></span></a>
                    </li>
                </ul>
                <div class="rl_tabs nn_tabs outline_handles outline_content top align_left rl_tabs-responsive nn_tabs-responsive">
                    <!--googleoff: index-->
                    <a id="rl_tabs-scrollto_1" class="anchor rl_tabs-scroll nn_tabs-scroll"></a>
                    <ul class="nav nav-tabs" id="set-rl_tabs-1" role="tablist">
                        <li class="rl_tabs-tab nn_tabs-tab nav-item active" role="presentation"><a href="#how-to-use" class="rl_tabs-toggle nn_tabs-toggle nav-link" id="tab-how-to-use" data-toggle="tab" data-id="how-to-use" role="tab" aria-controls="how-to-use" aria-selected="true"><span class="rl_tabs-toggle-inner nn_tabs-toggle-inner">{{__('How to use')}}</span></a></li>
                        <li class="rl_tabs-tab nn_tabs-tab nav-item" role="presentation"><a href="#active-ingredients" class="rl_tabs-toggle nn_tabs-toggle nav-link" id="tab-active-ingredients" data-toggle="tab" data-id="active-ingredients" role="tab" aria-controls="active-ingredients" aria-selected="false"><span class="rl_tabs-toggle-inner nn_tabs-toggle-inner">{{__('Active ingredients')}}</span></a></li>
                        <li class="rl_tabs-tab nn_tabs-tab nav-item" role="presentation"><a href="#formulated-without" class="rl_tabs-toggle nn_tabs-toggle nav-link" id="tab-formulated-without" data-toggle="tab" data-id="formulated-without" role="tab" aria-controls="formulated-without" aria-selected="false"><span class="rl_tabs-toggle-inner nn_tabs-toggle-inner">{{__('Formulated')}} <span style="text-decoration: underline;"><strong>{{__('without')}}</strong></span></span></a></li>
                    </ul>
                    <!--googleon: index-->
                    <div class="tab-content">
                        <div class="tab-pane rl_tabs-pane nn_tabs-pane active fade in" id="how-to-use" role="tabpanel" aria-labelledby="tab-how-to-use" aria-hidden="false">
                            <h2 class="rl_tabs-title nn_tabs-title"><a id="anchor-how-to-use" class="anchor rl_tabs-sm-scroll nn_tabs-sm-scroll"></a>{{__('How to use')}}</h2>
                            @if(app()->getLocale() == 'en')
                            <p>{{$product->get_how_use()->value}}</p>
                            @else
                            <p>{{$product->get_how_useTR()->value}}</p>
                            @endif

                        </div>
                        <div class="tab-pane rl_tabs-pane nn_tabs-pane fade" id="active-ingredients" role="tabpanel" aria-labelledby="tab-active-ingredients" aria-hidden="true">
                            <h2 class="rl_tabs-title nn_tabs-title"><a id="anchor-active-ingredients" class="anchor rl_tabs-sm-scroll nn_tabs-sm-scroll"></a>{{__('Active ingredients')}}</h2>
                            @if(app()->getLocale() == 'en')
                            <p>{{$product->get_active_ingredients()->value}}</p>
                            @else
                            <p>{{$product->get_active_ingredientsTR()->value}}</p>
                            @endif

                        </div>
                        <div class="tab-pane rl_tabs-pane nn_tabs-pane fade" id="formulated-without" role="tabpanel" aria-labelledby="tab-formulated-without" aria-hidden="true">
                            <h2 class="rl_tabs-title nn_tabs-title"><a id="anchor-formulated-without" class="anchor rl_tabs-sm-scroll nn_tabs-sm-scroll"></a>{{__('Formulated without')}}</h2>
                            <p>{{$product->get_formulated_without()->value}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @if($product->get_Price()->visible == 1)
            <form id="my_form1" action="{{$product->id}}" method="post">
                {{csrf_field()}}
                @if (Auth::check())
                <input type="hidden" name="price" value="{{$product->get_Price()->value}}" />
                <input type="hidden" id="number" name="quantity" value="1" min="1" max="100" />
                <br>
                <a class="fa fa-cart-plus fa-2x" href="javascript:{}" onclick="document.getElementById('my_form1').submit();"></a>
                @else
                <div class="alert alert-danger">
                    {{ __('you did not login')}}
                </div>
                @endif

            </form>
            @endif
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            @else

            <article class="item">
                <header>
                    @if(app()->getLocale() == 'en')
                    <h2 class="title">{{$product->name}}</h2>
                    @else
                    <h2 class="title">{{$product->name_tr}}</h2>
                    @endif
                </header>
                <div class="content clearfix">
                    <div class="product_left">
                        <p><b style="color: #98a103; font-size: 12pt;">{{__('Body scrub')}}</b><span style="color: #98a103; font-size: 12pt;"> :</span></p>
                        @if(app()->getLocale() == 'en')
                        <p>{{$product->get_BodyscrubDescription()->value}}</p>
                        @else
                        <p>{{$product->get_BodyscrubDescriptionTR()->value}}</p>
                        @endif
                        <p style="text-align: justify;"><span style="font-size: 8pt; background-color: transparent;">{{__('Available in')}} {{$product->get_BodyscrubQuantity()->value}}ml</span></p>
                        @if($product->get_BodyscrubPrice()->visible == 1)
                        <p>{{$product->get_BodyscrubPrice()->value}} TL</p>
                        <form id="my_form" action="{{$product->id}}" method="post">
                            {{csrf_field()}}
                            @if (Auth::check())
                            <input type="hidden" name="price" value="{{$product->get_BodyscrubPrice()->value}}" />
                            <input type="hidden" id="number" name="quantity" value="1" min="1" max="100" />
                            <br>
                            <a class="fa fa-cart-plus fa-2x" href="javascript:{}" onclick="document.getElementById('my_form').submit();"></a>
                            @else
                            <div class="alert alert-danger">
                                {{ __('you did not login')}}
                            </div>
                            @endif

                        </form>
                        @else
                        <p>{{__('Contact with us to know the price')}}</p>
                        @endif

                        <hr />
                        <p style="text-align: justify;">&nbsp;<span style="color: #98a103; font-size: 12pt;"><strong>{{__('Body oil')}}:</strong></span></p>
                        @if(app()->getLocale() == 'en')
                        <p>{{$product->get_BodyoilDescription()->value}}</p>
                        @else
                        <p>{{$product->get_BodyoilDescriptionTR()->value}}</p>
                        @endif
                        <p style="text-align: justify;"><span style="font-size: 11px; text-align: justify;">{{__('Available in')}} {{$product->get_BodyoilQuantity()->value}}ml</span></p>
                        @if($product->get_BodyoilPrice()->visible == 1)
                        <p>{{$product->get_BodyoilPrice()->value}} TL</p>
                        <form id="my_form2" action="{{$product->id}}" method="post">
                            {{csrf_field()}}
                            @if (Auth::check())
                            <input type="hidden" name="price" value="{{$product->get_BodyoilPrice()->value}}" />
                            <input type="hidden" id="number" name="quantity" value="1" min="1" max="100" />
                            <br>
                            <a class="fa fa-cart-plus fa-2x" href="javascript:{}" onclick="document.getElementById('my_form2').submit();"></a>
                            @else
                            <div class="alert alert-danger">
                                {{ __('you did not login')}}
                            </div>
                            @endif

                        </form>
                        @else
                        <p>{{__('contact with us to know the price')}}</p>
                        @endif

                        <hr />
                        <p style="text-align: justify;">&nbsp;<span style="color: #98a103; font-size: 12pt;"><strong>{{__('Body milk')}}:</strong></span></p>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        @if(app()->getLocale() == 'en')
                                        <p>{{$product->get_BodymilkDescription()->value}}</p>
                                        @else
                                        <p>{{$product->get_BodymilkDescriptionTR()->value}}</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p><span style="font-size: 11px; text-align: justify; background-color: transparent;">{{__('Available in')}}</span><span style="font-size: 11px; text-align: justify; background-color: transparent;"> {{$product->get_BodymilkQuantity()->value}}ml</span></p>
                        @if($product->get_BodymilkPrice()->visible == 1)
                        <p>{{$product->get_BodymilkPrice()->value}} TL</p>
                        <form id="my_form3" action="{{$product->id}}" method="post">
                            {{csrf_field()}}
                            @if (Auth::check())
                            <input type="hidden" id="number" name="quantity" value="1" min="1" max="100" />
                            <input type="hidden" name="price" value="{{$product->get_BodymilkPrice()->value}}" />
                            <br>
                            <a class="fa fa-cart-plus fa-2x" href="javascript:{}" onclick="document.getElementById('my_form3').submit();"></a>
                            @else
                            <div class="alert alert-danger">
                                {{ __('you did not login')}}
                            </div>
                            @endif

                        </form>
                        @else
                        <p>{{__('contact with us to know the price')}}</p>
                        @endif


                        @endif



                        <br>
                        @if(session('success'))

                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        @endif
                    </div>
                    <div class="product_right">
                        <div class="product_img"><img src="/uploads/products/{{$product->id}}/{{$product->image_name}}" alt="{{$product->image_tag}}" width="300" height="385" /></div>
                    </div>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>

            </article>
            @endsection