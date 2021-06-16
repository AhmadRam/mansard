@extends('layouts.app')
@section('content')
<title>{{ __('Add New Addres')}}</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header center">{{ __('Add New Address')}}</div>
                <div class="card-body">
                    <form method="POST" action="{{URL::route('store.address',[app()->getLocale(),Auth::user()->id])}}">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="title" placeholder="{{__('Title')}}" class="form-control input-lg formIletisim" />
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('Address 1') }}</label>
                                    <input type="text" name="lineOne" placeholder="{{__('Address')}}" class="form-control input-lg formIletisim" />
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('Address 2') }}</label>
                                    <input type="text" name="lineTwo" id="lineTwo" placeholder="{{__('Address')}}" class="form-control input-lg formIletisim" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="email" class="col-form-label">{{ __('City') }}</label>
                                    <select name="city" data-plugin-selectTwo class="form-control populate input-lg formIletisim" required="" title="Şehir seçimi gereklidir">
                                        <option value="">{{__('City')}}</option>
                                        <option value="Adana">Adana</option>
                                        <option value="Adıyaman">Adıyaman</option>
                                        <option value="Afyon">Afyon</option>
                                        <option value="Ağrı">Ağrı</option>
                                        <option value="Aksaray">Aksaray</option>
                                        <option value="Amasya">Amasya</option>
                                        <option value="Ankara">Ankara</option>
                                        <option value="Antalya">Antalya</option>
                                        <option value="Ardahan">Ardahan</option>
                                        <option value="Artvin">Artvin</option>
                                        <option value="Aydın">Aydın</option>
                                        <option value="Balıkesir">Balıkesir</option>
                                        <option value="Bartın">Bartın</option>
                                        <option value="Batman">Batman</option>
                                        <option value="Bayburt">Bayburt</option>
                                        <option value="Bilecik">Bilecik</option>
                                        <option value="Bingöl">Bingöl</option>
                                        <option value="Bitlis">Bitlis</option>
                                        <option value="Bolu">Bolu</option>
                                        <option value="Burdur">Burdur</option>
                                        <option value="Bursa">Bursa</option>
                                        <option value="Çanakkale">Çanakkale</option>
                                        <option value="Çankırı">Çankırı</option>
                                        <option value="Çorum">Çorum</option>
                                        <option value="Denizli">Denizli</option>
                                        <option value="Diyarbakır">Diyarbakır</option>
                                        <option value="Düzce">Düzce</option>
                                        <option value="Edirne">Edirne</option>
                                        <option value="Elazığ">Elazığ</option>
                                        <option value="Erzincan">Erzincan</option>
                                        <option value="Erzurum">Erzurum</option>
                                        <option value="Eskişehir">Eskişehir</option>
                                        <option value="Gaziantep">Gaziantep</option>
                                        <option value="Giresun">Giresun</option>
                                        <option value="Gümüşhane">Gümüşhane</option>
                                        <option value="Hakkâri">Hakkâri</option>
                                        <option value="Hatay">Hatay</option>
                                        <option value="Iğdır">Iğdır</option>
                                        <option value="Isparta">Isparta</option>
                                        <option value="İstanbul">İstanbul</option>
                                        <option value="İzmir">İzmir</option>
                                        <option value="Kahramanmaraş">Kahramanmaraş</option>
                                        <option value="Karabük">Karabük</option>
                                        <option value="Karaman">Karaman</option>
                                        <option value="Kars">Kars</option>
                                        <option value="Kastamonu">Kastamonu</option>
                                        <option value="Kayseri">Kayseri</option>
                                        <option value="Kilis">Kilis</option>
                                        <option value="Kırıkkale">Kırıkkale</option>
                                        <option value="Kırklareli">Kırklareli</option>
                                        <option value="Kırşehir">Kırşehir</option>
                                        <option value="Kocaeli">Kocaeli</option>
                                        <option value="Konya">Konya</option>
                                        <option value="Kütahya">Kütahya</option>
                                        <option value="Malatya">Malatya</option>
                                        <option value="Manisa">Manisa</option>
                                        <option value="Mardin">Mardin</option>
                                        <option value="Mersin">Mersin</option>
                                        <option value="Muğla">Muğla</option>
                                        <option value="Muş">Muş</option>
                                        <option value="Nevşehir">Nevşehir</option>
                                        <option value="Niğde">Niğde</option>
                                        <option value="Ordu">Ordu</option>
                                        <option value="Osmaniye">Osmaniye</option>
                                        <option value="Rize">Rize</option>
                                        <option value="Sakarya">Sakarya</option>
                                        <option value="Samsun">Samsun</option>
                                        <option value="Şanlıurfa">Şanlıurfa</option>
                                        <option value="Siirt">Siirt</option>
                                        <option value="Sinop">Sinop</option>
                                        <option value="Sivas">Sivas</option>
                                        <option value="Şırnak">Şırnak</option>
                                        <option value="Tekirdağ">Tekirdağ</option>
                                        <option value="Tokat">Tokat</option>
                                        <option value="Trabzon">Trabzon</option>
                                        <option value="Tunceli">Tunceli</option>
                                        <option value="Uşak">Uşak</option>
                                        <option value="Van">Van</option>
                                        <option value="Yalova">Yalova</option>
                                        <option value="Yozgat">Yozgat</option>
                                        <option value="Zonguldak">Zonguldak</option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('TownShip') }}</label>

                                    <input type="text" name="township" placeholder="{{__('Township')}}" class="form-control input-lg formIletisim" />
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('Postal Code') }}</label>
                                    <input type="text" name="postalcode" placeholder="{{__('Postal Code')}}" class="form-control input-lg formIletisim" />
                                </div>

                            </div>

                            <div class="center">
                                <button class="btn btn-primary" type="submit">{{ __('Save')}}</button>
                            </div>

                        </div>
                    </form>
                    <br>

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