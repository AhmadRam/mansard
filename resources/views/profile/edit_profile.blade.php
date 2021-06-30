@extends('layouts.app')
@section('content')
<title>{{__('Edit Profile')}}</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card center">
                <div class="card-header center">{{ __('Edit Profile')}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url(app()->getLocale(),'profile/edit_profile') }}/{{Auth::user()->id}}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="identityNumber" class="col-md-4 col-form-label text-md-right">{{ __('Identity Number') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="identityNumber" id="identityNumber" class="form-control input-lg formIletisim" value="{{$user->identityNumber}}" autocomplete="off" value="" />
                            </div>
                        </div>
                        <div class="clear clearfix"></div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control input-lg formIletisim" value="{{$user->name}}" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="surname" id="surname" class="form-control input-lg formIletisim" value="{{$user->surname}}" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control input-lg formIletisim" value="{{$user->email}}" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                <div class="col-md-6">
                                    <input id="phoneNumber" type="text" name="phone" value="{{$user->phone}}" class="form-control input-lg formIletisim" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>
                                <div class="col-md-6">
                                    <input data-provide="datepicker" type="text" name="birthday" id="birthday" class="form-control input-lg tarihSec formIletisim" value="{{$user->birthday}}" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <select name="gender" id="gender" class="form-control input-lg formIletisim">
                                        <option value="">{{ __('Gender')}}</option>
                                        <option value="Male" @if($user->gender == 'Male') selected @endif>{{ __('Male')}}</option>
                                        <option value="Female" @if($user->gender == 'Female') selected @endif>{{ __('Female')}}</option>
                                    </select>

                                </div>
                            </div>



                            <div class="col-md-12">
                                <button class="btn btn-primary mt-20" type="submit">{{ __('Save')}}</button>
                            </div>
                            <div class="col-md-12 text-center text-danger">
                            </div>
                    </form>
                    <br>
                    @if(session('success'))

                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    <br>
                    @endif
                    @if($errors->any())


                    <ul>
                        @foreach($errors->all() as $err)
                        <tr>
                            <td>
                                <li>{{$err}}</li>
                            </td>
                        </tr>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection