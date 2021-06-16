@extends('layouts.app')
@section('content')

<title>{{ __('Addres')}}</title>
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(isset($ad))
    <div class="col-md-12 mb-20 ">
        <div class="well ">
            <div class="row">
                <div class="col-md-7">
                    <h4 class="urunDetayBaslik">{{$ad->title}} </h4>
                    <p>{{$ad->lineOne}}
                    </p>
                    <p>{{$ad->postalcode}} {{$ad->township}} / {{$ad->city}}</p>
                </div>

                <div class="col-md-5 text-right">
                    <a class="btn btn-danger btn-xs mt-30" role="button" data-toggle="modal" data-target="#silAdres41">{{ __('Delete')}}</a>
                    <a class="btn btn-info btn-xs mt-30" href="{{url(app()->getLocale())}}/profile/edit_address/{{$ad->id}}">{{ __('Edit')}}</a>
                </div>

            </div>


        </div>
    </div>

    <div id="silAdres41" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title urunDetayBaslik">{{ __('Confirmation')}}</h4>
                </div>
                <div class="modal-body ">
                    <p class="urunDetayAciklama">{{ __('Your address will be deleted. Do you confirm?')}}</p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{url(app()->getLocale(),'profile/delete_address')}}/{{$ad->id}}">
                        {{csrf_field()}}
                        <button class="btn btn-danger" type="submit">{{ __('Delete')}}</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel')}}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @else
    <div class="col-md-12 text-center">
        <p class="urunDetayAciklama">{{__('No address information yet')}}</p>
        <a href="{{URL::route('add.address',app()->getLocale())}}" class="btn btn-success btn-lg">{{ __('Add New Address')}}</a>
    </div>
    @endif

    @endsection