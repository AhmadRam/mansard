@extends('layouts.app')
@section('content')
<title>{{Auth::user()->name}} {{ __('Profile')}}</title>
<div style="display: flex; justify-content:space-around;">
    <div class="contact-right" style="width: 400px;">
        <h4 class="urunDetayBaslik">{{ __('PROFILE INFORMATION')}}</h4>
        <table class="table table-striped urunDetayAciklama">
            <tr>
                <td><a href="">{{ __('Identity Number')}}:</a></td>
                <td>{{Auth::user()->identityNumber}}</td>
            </tr>
            <tr>
                <td><a href="">{{ __('Name')}} {{__('Surname')}}:</a></td>
                <td>{{Auth::user()->name}} {{Auth::user()->surname}}</td>
            </tr>
            <tr>
                <td><a href="">{{ __('E-Mail')}}:</a></td>
                <td>{{Auth::user()->email}}</td>
            </tr>
            <tr>
                <td><a href="">{{ __('Phone')}}:</a></td>
                <td>{{Auth::user()->phone}}</td>
            </tr>
            <tr>
                <td><a href="">{{ __('Gender')}}:</a></td>
                <td>{{__(Auth::user()->gender)}}</td>
            </tr>
            <tr>
                <td><a href="">{{ __('Birthday')}}:</a></td>
                <td>{{Auth::user()->birthday}}</td>
            </tr>



        </table>
        <a href="{{URL::route('edit.profile',[app()->getLocale(),Auth::user()->id])}}" class="button validate">{{ __('Edit Profile')}}</a>
    </div>

    <div class="contact-left text-right" style="width: 400px;">
        <h4 class="urunDetayBaslik text-right">
            {{ __('DEFAULT ADDRESS')}}
        </h4>
        @if(isset($ad))

        <div class="well ">
            <h4 class="urunDetayBaslik">{{$ad->title}}</h4>
            <p>{{$ad->lineOne}}</p>
            <p>{{$ad->postalcode}} {{$ad->township}} / {{$ad->city}}</p>
            <form method="post" action="{{url(app()->getLocale(),'profile/delete_address')}}/{{$ad->id}}">
                {{csrf_field()}}
                <a class="button validate btn-xs" href="{{URL::route('edit.address',[app()->getLocale(),$ad->id])}}">{{ __('Edit')}}</a>
                <button class="btn btn-danger btn-xs">{{ __('Delete')}}</button>
            </form>
        </div>

        @else

        <p>{{ __('No address information yet')}}</p>
        <p>{{ __('You can add your new address information')}} <a href="{{URL::route('add.address',app()->getLocale())}}">{{ __('here')}}</a> </p>
        @endif

        @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @endif

    </div>

</div>
@endsection