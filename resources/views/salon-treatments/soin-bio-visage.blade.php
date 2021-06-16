@extends('layouts.app')
@section('content')
<title>{{__('Bio Visage Face treatment')}}</title>
<h1 class="title">{{__('Salon treatments')}}</h1>
<article class="item">
	<header>
		<h2 class="title">{{__('Bio Visage Face Treatment')}}</h2>
	</header>
	<div class="content clearfix">
		<div class="product_left">
			<p style="text-align: justify;">{{__('Our unique Bio Visage therapy helps detoxify, nourish, and tone the skin, through the unique combination of natural botanical extracts and currents. It is comfortable, non-invasive and pain free.')}}</p>
			<p style="text-align: justify;">{{__('During the treatment, the cellular activity is reactivated, the level of oxygen is increased and the skin functions are restored. Bio Visage provides an immediate lift effect and restores muscle fibre contraction. The face will appear more toned with visibly fewer wrinkles, promoting a younger, firmer and brighter complexion')}}</p>
			<p><strong><span class="font_color">{{__('Our 40-minute treatment helps to obtain the following results:')}}</span></strong></p>
			<ul>
				<li>{{__('Appearance of fine lines and wrinkles is improving')}}</li>
				<li>{{__('Skin is firmer and toned up')}}</li>
				<li>{{__('Skin is detoxified')}}</li>
				<li>{{__('Pimples, redness and dark circles are fading away')}}</li>
				<li>{{__('Pigmentation of the skin is being ameliorated')}}</li>
				<li>{{__('Skin texture is smooth with even skin tone')}}</li>
			</ul>
			<p style="text-align: justify;">{{__("!! During the Bio Visage course of treatments, it is strictly recommended to use Mansard's cosmetic products which are specifically adapted to the skin's condition. This will optimise results.")}}</p>
			<p style="text-align: justify;">{{__("A course of 10 treatments once a week will help to restore the skin's elasticity, firmness and tone. This is followed by a maintenance treatment once a month, together with Mansard's cosmetic products, which will ensure amazing long-lasting results.")}}</p>
		</div>
		<div class="product_right">
			<div class="product_img"><img src="../../images/Bio_Visage/IMG_0695.jpg" alt="IMG 0695" width="300" height="387" /></div>
		</div>
	</div>
</article>
@endsection