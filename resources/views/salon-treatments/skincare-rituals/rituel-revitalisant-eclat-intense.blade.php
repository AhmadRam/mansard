@extends('layouts.app')
@section('content')
<title>{{__('Intense Radiance Boost')}}</title>
<h1 class="title">{{__('Soins Professionnels - Rituels Visage')}}</h1>
<article class="item">
	<header>
		<h2 class="title">{{__('Intense Radiance Boost')}} </h2>
	</header>
	<div class="content clearfix">
		<div class="product_left">
			<p>{{__('An active care that helps to restore the brightness and glow of a face.')}}</p>
			<p>{{__('This facial invigorates the skin and helps to restore tone and vitality.')}}</p>
			<p>{{__('The skin is radiant, pores are visibly refined, and complexion is smooth.')}}</p>
			<p>&nbsp;</p>
			<p><strong>{{__('Benefits : ')}}</strong></p>
			<p>- {{__('Erases signs of fatigue and tension')}}</p>
			<p>- {{__('Oxygens and revitalizes')}}</p>
			<p>- {{__('Moisturizes and nourishes')}}</p>
			<p>- {{__('Restores radiance and freshness')}}</p>
		</div>
		<div class="product_right">
			<div class="product_img"><img src="../../../images/Bio_Visage/eclat.jpg" alt="eclat" width="300" height="450" /></div>
		</div>
	</div>
</article>
@endsection