@extends('layouts.app')
@section('content')
<title>{{__('Anti Aging Firming Ritual')}}</title>
<h1 class="title">{{__('Soins Professionnels - Rituels Visage')}}</h1>
<article class="item">
	<header>
		<h2 class="title">{{__('Anti Aging Firming Ritual')}} </h2>
	</header>
	<div class="content clearfix">
		<div class="product_left">
			<p>{{__('This treatment helps to firm and tighten the skin giving it youthfull appearance.')}}</p>
			<p>{{__('The facial features are liften dramatically while the oval face is redesigned. More smooth, more toned, your skin is glowing with vitality.')}}</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p><strong>{{__('Benefits : ')}}</strong></p>
			<p>- {{__('Redefines facial contours')}}</p>
			<p>- {{__('Increases tone and firmness of tissue')}}</p>
			<p>- {{__('Protects against the aging')}}</p>
			<p>- {{__('Attenuates lines and wrinkles')}}</p>
			<p>- {{__('Makes the skin look younger and smother')}}</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>
		<div class="product_right">
			<div class="product_img"><img src="../../../images/Bio_Visage/caviar.jpg" alt="caviar" width="300" height="427" /></div>
		</div>
	</div>
</article>
@endsection