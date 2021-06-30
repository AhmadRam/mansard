@extends('layouts.app')
@section('content')
<title>{{__('Highly Moisturizing Ritual')}}</title>
<h1 class="title">{{__('Soins Professionnels - Rituels Visage')}}</h1>
<article class="item">
	<header>
		<h2 class="title">{{__('Highly Moisturizing Ritual')}} </h2>
	</header>
	<div class="content clearfix">
		<div class="product_left">
			<p>{{__('This treatment restores optimal moisture balance making the skin soft, supple and elastic.')}}</p>
			<p>{{__('Fully hydrated the skin is glowing and youthfull.')}}</p>
			<p>{{__('Perfect to keep skin plumpy and delay the effects of aging.')}}</p>
			<p><strong>{{__('Benefits : ')}}</strong></p>
			<p>- {{__('Moisturizes and nourishes')}}</p>
			<p>- {{__('Makes supple')}}</p>
			<p>- {{__('Attenuates small wrinkles')}}</p>
			<p>- {{__('Restores radiance and freshness')}}</p>
		</div>
		<div class="product_right">
			<div class="product_img"><img src="../../../images/Bio_Visage/hydratattion.jpg" alt="hydratattion" width="300" height="436" /></div>
		</div>
	</div>
</article>
@endsection