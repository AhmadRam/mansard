@extends('layouts.app')
@section('content')
<title>Face</title>

<h1 class="title">Face care</h1>
<ul>
	@foreach($cat as $c)
	<li>
		<a>{{__($c->name)}}</a>
		<small>({{$c->getproducts()->count()}})</small>
		<ul>
			@foreach($c->getproducts() as $s)
			<li>
				@if(app()->getLocale() == 'en')
				<a href="{{URL::route('product',[app()->getLocale(),$s->id])}}">{{$s->name}}</a>
				@else
				<a href="{{URL::route('product',[app()->getLocale(),$s->id])}}">{{$s->name_tr}}</a>
				@endif
			</li>
			@endforeach
		</ul>
		<br>
	</li>
	@endforeach

</ul>
@endsection