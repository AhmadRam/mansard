@extends('layouts.app')
@section('content')
<title>{{__('Special Anti-Wrinkles Ritual')}}</title>
<h1 class="title">{{__('Soins Professionnels - Rituels Visage')}}</h1>
<article class="item">
	<header>
		<h2 class="title">{{__('Special Anti-Wrinkles Ritual')}}</h2>
	</header>
	<div class="content clearfix">
		<div class="product_left">
			<p style="text-align: justify;">{{__('A specific treatment that helps to relax the skin micro tension, improves the wrinkles, tightens the skin and brighten the face.')}}</p>
			<p style="text-align: justify;">{{__('Emerging wrinkles are perfectly smoothed, installed wrinkles are plumped.')}}</p>
			<p style="text-align: justify;">{{__('The skin is uniform, bright, radiant, visibly rejuvenated.')}}</p>
			<p>&nbsp;</p>
			<p><strong>{{__('Benefits : ')}}</strong></p>
			<p>- {{__('Hydrates and plumps')}}</p>
			<p>- {{__('Improves the tone')}}</p>
			<p>- {{__('Relaxes the features')}}</p>
			<p>- {{__('Smoothes fine lines and wrinkles')}}</p>
			<p>- {{__('Fight against the signs of aging')}}</p>
		</div>
		<div class="product_right">
			<div class="product_img"><img src="../../../images/Bio_Visage/rides_dexpression.jpg" alt="rides dexpression" width="300" height="450" /></div>
		</div>
	</div>
</article>
@endsection