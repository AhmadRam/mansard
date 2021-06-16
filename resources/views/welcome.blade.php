@extends('layouts.app')
@section('content')

<title>{{__('French cosmetic manufacturer and distributor')}}</title>

<div id="main" class="grid-block">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images\banners\groupe.jpg')}}" class="d-block w-100" alt="groupe">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images\banners\delenergie-_eng.jpg')}}" class="d-block w-100" alt="delenergie">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images\banners\Bio_Visage-_eng.jpg')}}" class="d-block w-100" alt="Bio_Visage">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images\banners\groupespa.jpg')}}" class="d-block w-100" alt="groupespa">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images\banners\products.jpg')}}" class="d-block w-100" alt="products">
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

@endsection