@extends('layouts.app')
@section('content')
<title>{{__('Soothing Desensibilizing Ritual')}}</title>
<h1 class="title">{{__('Soins Professionnels - Rituels Visage')}}</h1>
<article class="item">
	<header>
		<h2 class="title">{{__('Soothing Desensibilizing Ritual')}}</h2>
	</header>
	<div class="content clearfix">
		<div class="product_left">
			<p>{{__('This soothing treatment designed to calm sensitive skin providing immediate comfort and protecting it.')}}</p>
			<p>{{__('The skin is revitalized, it regains softness, suppleness and radiance.')}}</p>
			<p><strong>{{__('Benefits : ')}}</strong></p>
			<p>- {{__('Calms')}}</p>
			<p>- {{__('Softens and sooths')}}</p>
			<p>- {{__('Reduces skin sensitivity')}}</p>
			<p>- {{__('Reduces redness')}}</p>
			<p>- {{__('Restored the natural defense')}}</p>
		</div>
		<div class="product_right">
			<p><img src="../../../images/Bio_Visage/apaisant.jpg" alt="apaisant" width="300" height="412" /></p>
		</div>
	</div>
</article>
@endsection