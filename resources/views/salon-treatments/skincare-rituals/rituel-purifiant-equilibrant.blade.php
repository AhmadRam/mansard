@extends('layouts.app')
@section('content')
<title>{{__('Balancing Purifying Ritual')}}</title>
<h1 class="title">{{__('Soins Professionnels - Rituels Visage')}}</h1>
<article class="item">
	<header>
		<h2 class="title">{{__('Balancing Purifying Ritual')}}</h2>
	</header>
	<div class="content clearfix">
		<div class="product_left">
			<p>{{__('An intensive corrective treatment, focused on the imperfections associated with excess sebum: oily or combination skin, irritation, pimples, blackheads, enlarged pores.')}}</p>
			<p>{{__('It restores the skin giving it a healthy glow. The skin is fresh, detoxified and gently cleansed without drying.')}}</p>
			<p>&nbsp;</p>
			<p><strong>{{__('Benefits : ')}}</strong></p>
			<p>- {{__('Purifies and makes healthier')}}</p>
			<p>- {{__('Detoxifies - Matifies')}}</p>
			<p>- {{__('Reduces inflammation and blemishes')}}</p>
			<p>- {{__('Heals')}}</p>
		</div>
		<div class="product_right">
			<p><img src="../../../images/Bio_Visage/purete.jpg" alt="purete" width="300" height="450" />&nbsp;</p>
		</div>
	</div>
</article>
@endsection