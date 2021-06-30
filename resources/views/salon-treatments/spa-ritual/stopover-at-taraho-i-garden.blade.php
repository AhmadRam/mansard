@extends('layouts.app')
@section('content')
<title>{{__("Stopover in the garden of Taraho'i")}}</title>
<h1 class="title">{{__('Soins du Visage - Crèmes')}}</h1>
<article class="item">
	<header>
		<h2 class="title">{{__("Stopover in the garden of Taraho'i")}}</h2>
	</header>
	<div class="content clearfix">
		<div class="product_left">
			<p>&nbsp;</p>
			<p>{{__("The garden of Taraho'i is a synonym of the beauty and legends of Tahiti.")}}</p>
			<p>{{__('One of them is a well known power of the coconut, a nutritious fruit with regenerative properties for the most fragile and damaged skin.')}}</p>
			<p>{{__('The ritual full of pleasure is devided in three parts:')}}</p>
			<p>{{__('irst renew your skin with a coconut and lychee scrub, then enjoy hydrating and highly nutritious properties of a cocooning body wrap.')}}</p>
			<p>{{__('Finally, enjoy a relaxing body massage with the coconut oil and the most beautiful tiare flowers. The skin is hydrated, nourished and protected for a long time.')}}</p>
			<p style="text-align: justify;">&nbsp;</p>
			<p><span class="font_color"><b>{{__('Results')}}</b> :</span></p>
			<ul>
				<li><span lang="RU">{{__('Nourishing')}}</span></li>
				<li><span lang="RU">{{__('Moisturizing')}}</span></li>
				<li><span lang="RU">{{__('Protective')}}</span></li>
				<li><span lang="RU">{{__('Soothing Ritual')}}</span></li>
			</ul>
		
		</div>
		<div class="product_right">
			<div class="product_img"><img src="../../../images/catalogue/corps/Spa/Depositphotos_201342166_l-2015.jpg" alt="Depositphotos 201342166 l 2015" width="500" height="500" /></div>
		</div>
	</div>
</article>
@endsection