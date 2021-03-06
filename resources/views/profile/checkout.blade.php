@extends('layouts.app')
@section('content')
<title>{{ __('Checkout')}}</title>
<div class="container mb-30">
    <form method="POST" id='odemeForm' action="checkout" accept-charset="utf-8">
        @csrf
        <div class="col-md-12">

            <h4 class="urunDetayBaslik">{{ __('PRODUCT INFORMATION')}}</h4>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('Product')}}</th>
                                <th width="50" class="text-center">{{ __('Quantity')}}</th>
                                <th width="150" class="text-center">{{ __('Unit Price')}}</th>
                                <!-- <th width="150" class="text-center">{{ __('KDV')}}</th> -->
                                <th width="150" class="text-right">{{ __('Total')}}</th>
                            <tr>
                        </thead>
                        @if($all != null)
                        @foreach($all as $c)
                        @foreach($prod as $p)
                        @if($c[0]==$p->id)
                        <tbody>

                            <tr>
                                <td>
                                    <a href="{{ url(app()->getLocale(),'product') }}/{{$p->id}}">{{$p->name}}</a>
                                </td>

                                <td>
                                    <input type="number_format" id="quantity" style="background: transparent; border: none; width:30%; text-align: center;" name="{{$p->id}}" value={{$c[1]}} min="1" max="100" readonly />

                                </td>
                                <td class="text-center">{{$c[2]}} TL</td>
                                <!-- <td class="text-center">belmiorm TL</td> -->
                                <td class="text-right">
                                    <div id="individualPrice_{{$c[3]}}">
                                        {{$c[1]*$c[2]}} TL
                                    </div>
                                </td>


                            </tr>
                            @break
                            @endif
                            @endforeach
                            @endforeach


                        </tbody>
                        @endif

                        <tfoot>

                            <!-- <tr>
                                <td colspan="4" class="text-right"><strong>{{ __('First Order Discount')}} (%):</strong></td>
                                <td class="text-right">0,00 TL</td>
                            </tr> -->
                            <tr>
                                <td colspan="3" class="text-right"><strong>{{ __('Total')}}:</strong></td>
                                <td class="text-right" id="totalCost"> {{Session::get('price')}} TL </td>
                            </tr>
                        </tfoot>

                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="urunDetayBaslik">{{ __('ADDRESS INFORMATION')}}</h4>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="title" id="title" @if(isset($address->id)) value=" {{$address->title}}" @endif placeholder="{{__('Title')}}" class="form-control input-lg formIletisim" required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="lineOne" @if(isset($address->id)) value="{{$address->lineOne}}" @endif placeholder="{{__('Address')}}" class="form-control input-lg formIletisim" required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="lineTwo" id="lineTwo" @if(isset($address->id)) value="{{$address->lineTwo}}" @endif placeholder="{{__('Address')}}" class="form-control input-lg formIletisim" required />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        <select name="city" data-plugin-selectTwo class="form-control populate input-lg formIletisim" title="??ehir se??imi gereklidir" required>
                            @if(isset($address->id))
                            <option value="{{$address->city}}" selected>{{$address->city}}</option>
                            @endif
                            <option value="">{{__('City')}}</option>
                            <option value="Adana">Adana</option>
                            <option value="Ad??yaman">Ad??yaman</option>
                            <option value="Afyon">Afyon</option>
                            <option value="A??r??">A??r??</option>
                            <option value="Aksaray">Aksaray</option>
                            <option value="Amasya">Amasya</option>
                            <option value="Ankara">Ankara</option>
                            <option value="Antalya">Antalya</option>
                            <option value="Ardahan">Ardahan</option>
                            <option value="Artvin">Artvin</option>
                            <option value="Ayd??n">Ayd??n</option>
                            <option value="Bal??kesir">Bal??kesir</option>
                            <option value="Bart??n">Bart??n</option>
                            <option value="Batman">Batman</option>
                            <option value="Bayburt">Bayburt</option>
                            <option value="Bilecik">Bilecik</option>
                            <option value="Bing??l">Bing??l</option>
                            <option value="Bitlis">Bitlis</option>
                            <option value="Bolu">Bolu</option>
                            <option value="Burdur">Burdur</option>
                            <option value="Bursa">Bursa</option>
                            <option value="??anakkale">??anakkale</option>
                            <option value="??ank??r??">??ank??r??</option>
                            <option value="??orum">??orum</option>
                            <option value="Denizli">Denizli</option>
                            <option value="Diyarbak??r">Diyarbak??r</option>
                            <option value="D??zce">D??zce</option>
                            <option value="Edirne">Edirne</option>
                            <option value="Elaz????">Elaz????</option>
                            <option value="Erzincan">Erzincan</option>
                            <option value="Erzurum">Erzurum</option>
                            <option value="Eski??ehir">Eski??ehir</option>
                            <option value="Gaziantep">Gaziantep</option>
                            <option value="Giresun">Giresun</option>
                            <option value="G??m????hane">G??m????hane</option>
                            <option value="Hakk??ri">Hakk??ri</option>
                            <option value="Hatay">Hatay</option>
                            <option value="I??d??r">I??d??r</option>
                            <option value="Isparta">Isparta</option>
                            <option value="??stanbul">??stanbul</option>
                            <option value="??zmir">??zmir</option>
                            <option value="Kahramanmara??">Kahramanmara??</option>
                            <option value="Karab??k">Karab??k</option>
                            <option value="Karaman">Karaman</option>
                            <option value="Kars">Kars</option>
                            <option value="Kastamonu">Kastamonu</option>
                            <option value="Kayseri">Kayseri</option>
                            <option value="Kilis">Kilis</option>
                            <option value="K??r??kkale">K??r??kkale</option>
                            <option value="K??rklareli">K??rklareli</option>
                            <option value="K??r??ehir">K??r??ehir</option>
                            <option value="Kocaeli">Kocaeli</option>
                            <option value="Konya">Konya</option>
                            <option value="K??tahya">K??tahya</option>
                            <option value="Malatya">Malatya</option>
                            <option value="Manisa">Manisa</option>
                            <option value="Mardin">Mardin</option>
                            <option value="Mersin">Mersin</option>
                            <option value="Mu??la">Mu??la</option>
                            <option value="Mu??">Mu??</option>
                            <option value="Nev??ehir">Nev??ehir</option>
                            <option value="Ni??de">Ni??de</option>
                            <option value="Ordu">Ordu</option>
                            <option value="Osmaniye">Osmaniye</option>
                            <option value="Rize">Rize</option>
                            <option value="Sakarya">Sakarya</option>
                            <option value="Samsun">Samsun</option>
                            <option value="??anl??urfa">??anl??urfa</option>
                            <option value="Siirt">Siirt</option>
                            <option value="Sinop">Sinop</option>
                            <option value="Sivas">Sivas</option>
                            <option value="????rnak">????rnak</option>
                            <option value="Tekirda??">Tekirda??</option>
                            <option value="Tokat">Tokat</option>
                            <option value="Trabzon">Trabzon</option>
                            <option value="Tunceli">Tunceli</option>
                            <option value="U??ak">U??ak</option>
                            <option value="Van">Van</option>
                            <option value="Yalova">Yalova</option>
                            <option value="Yozgat">Yozgat</option>
                            <option value="Zonguldak">Zonguldak</option>
                        </select>

                    </div>


                    <div class="form-group">
                        <input type="text" name="township" @if(isset($address->id)) value="{{$address->township}}" @endif placeholder="{{__('Township')}}" class="form-control input-lg formIletisim" required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="postalcode" @if(isset($address->id)) value="{{$address->postalcode}}" @endif placeholder="{{__('Postal Code')}}" class="form-control input-lg formIletisim" required />
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-12 mt-20">
                    <h4 class="urunDetayBaslik">{{ __('PRE-INFORMATION')}}</h4>
                </div>

                <div class="col-md-12">
                    <div style="width:100%; max-height: 250px; overflow-y: scroll; background: #f4f4f4; padding: 10px;">
                        <p>1.KONU</p>

                        <p>????bu Sat???? S??zle??mesi ??n Bilgi Formu???nun konusu, SATICI' n??n, S??PAR???? VEREN/ALICI' ya sat??????n?? yapt??????, a??a????da nitelikleri ve sat???? fiyat?? belirtilen ??r??n/??r??nlerin sat?????? ve teslimi ile ilgili olarak 6502 say??l?? T??keticilerin Korunmas?? Hakk??ndaki Kanun - Mesafeli S??zle??meler Y??netmeli??i (RG:27.11.2014/29188) h??k??mleri gere??ince taraflar??n hak ve y??k??ml??l??klerini kapsamaktad??r. ???? bu ??n bilgilendirme formunu kabul etmekle ALICI, s??zle??me konusu sipari??i onaylad?????? takdirde sipari?? konusu bedeli ve varsa kargo ??creti, vergi gibi belirtilen ek ??cretleri ??deme y??k??ml??l?????? alt??na girece??ini ve bu konuda bilgilendirildi??ini pe??inen kabul eder.</p>

                        <p>2. SATICI B??LG??LER??</p>

                        <p>??nvan??: MCA Enerji Dan. ??n??. TAAH. DI??. T??C. GIDA TAR. VE HAYV. LTD. ??T??.</p>

                        <p>Adres: Etiler mah. B??y??kl?? Mehmet Pa??a sok. No:20 D:12 34337 Be??ikta?? / ??stanbul</p>

                        <p>Telefon: 0850 305 09 15</p>

                        <p>Faks: 0850 305 09 15</p>

                        <p>Eposta: info@aurachake.com.tr</p>

                        <p>3. ALICI B??LG??LER??(Bundan sonra ALICI olarak an??lacakt??r.)</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukar??da belirtilen adres esas olarak al??nacakt??r. Sipari?? tamamland??????nda e-posta ile g??nderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>4. S??PAR???? VEREN B??LG??LER??(Bundan sonra S??PAR???? VEREN olarak an??lacakt??r.)</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukar??da belirtilen adres esas olarak al??nacakt??r. Sipari?? tamamland??????nda e-posta ile g??nderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>5. S??ZLE??ME KONUSU ??R??N/??R??NLER B??LG??LER??</p>

                        <p>5.1Mal??n / ??r??n/??r??nlerin / Hizmetin temel ??zellikleri (t??r??, miktar??, marka/modeli, rengi, adedi) SATICI???ya ait internet sitesinde yer almaktad??r. ??r??n??n temel ??zelliklerini kampanya s??resince inceleyebilirsiniz. Kampanya tarihine kadar ge??erlidir.</p>

                        <p>5.2Listelenen ve sitede ilan edilen fiyatlar sat???? fiyat??d??r. ??lan edilen fiyatlar ve vaatler g??ncelleme yap??lana ve de??i??tirilene kadar ge??erlidir. S??reli olarak ilan edilen fiyatlar ise belirtilen s??re sonuna kadar ge??erlidir.</p>

                        <p>5.3S??zle??me konusu mal ya da hizmetin t??m vergiler d??hil sat???? fiyat?? a??a????daki tabloda g??sterilmi??tir.</p>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('Product')}}</th>
                                    <th width="50" class="text-center">{{ __('Quantity')}}</th>
                                    <th width="150" class="text-center">{{ __('Unit Price')}}</th>
                                    <!-- <th width="150" class="text-center">{{ __('KDV')}}</th> -->
                                    <th width="150" class="text-right">{{ __('Total')}}</th>
                                <tr>
                            </thead>
                            @if($all != null)
                            @foreach($all as $c)
                            @foreach($prod as $p)
                            @if($c[0]==$p->id)
                            <tbody>

                                <tr>
                                    <td>
                                        <a href="{{ url(app()->getLocale(),'product') }}/{{$p->id}}">{{$p->name}}</a>
                                    </td>

                                    <td>
                                        <input type="number_format" id="quantity" style="background: transparent; border: none; width:30%; text-align: center;" name="{{$p->id}}" value={{$c[1]}} min="1" max="100" readonly />

                                    </td>
                                    <td class="text-center">{{$c[2]}} TL</td>
                                    <!-- <td class="text-center">belmiorm TL</td> -->
                                    <td class="text-right">
                                        <div id="individualPrice_{{$c[3]}}">
                                            {{$c[1]*$c[2]}} TL
                                        </div>
                                    </td>


                                </tr>
                                @break
                                @endif
                                @endforeach
                                @endforeach


                            </tbody>
                            @endif

                            <tfoot>

                                <!-- <tr>
                                    <td colspan="4" class="text-right"><strong>{{ __('First Order Discount')}} (%):</strong></td>
                                    <td class="text-right">0,00 TL</td>
                                </tr> -->
                                <tr>
                                    <td colspan="3" class="text-right"><strong>{{ __('Total')}}:</strong></td>
                                    <td class="text-right" id="totalCost"> {{Session::get('price')}} TL </td>
                                </tr>
                            </tfoot>

                        </table>

                        <p>??deme ??ekli ve Plan??: Kredi kart?? ile ??deme</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukar??da belirtilen adres esas olarak al??nacakt??r. Sipari?? tamamland??????nda e-posta ile g??nderilecektir.</p>

                        <p>??r??n sevkiyat masraf?? olan kargo ??creti ALICI taraf??ndan ??denecektir.</p>

                        <p>6. GENEL H??K??MLER</p>

                        <p>6.1.ALICI, SATICI???ya ait internet sitesinde s??zle??me konusu ??r??n??n temel nitelikleri, sat???? fiyat?? ve ??deme ??ekli ile teslimata ili??kin ??n bilgileri okuyup, bilgi sahibi oldu??unu, elektronik ortamda gerekli teyidi verdi??ini kabul, beyan ve taahh??t eder. ALICININ; ??n Bilgilendirmeyi elektronik ortamda teyit etmesi, mesafeli sat???? s??zle??mesinin kurulmas??ndan evvel, SATICI taraf??ndan ALICI' ya verilmesi gereken adresi, sipari??i verilen ??r??nlere ait temel ??zellikleri, ??r??nlerin vergiler d??hil fiyat??n??, ??deme ve teslimat bilgilerini de do??ru ve eksiksiz olarak edindi??ini kabul, beyan ve taahh??t eder.</p>

                        <p>6.2.S??zle??me konusu her bir ??r??n, 30 g??nl??k yasal s??reyi a??mamak kayd?? ile ALICI' n??n yerle??im yeri uzakl??????na ba??l?? olarak internet sitesindeki ??n bilgiler k??sm??nda belirtilen s??re zarf??nda ALICI veya ALICI??? n??n g??sterdi??i adresteki ki??i ve/veya kurulu??a teslim edilir. Bu s??re i??inde ??r??n??n ALICI???ya teslim edilememesi durumunda, ALICI???n??n s??zle??meyi feshetme hakk?? sakl??d??r. </p>

                        <p>6.3.SATICI, s??zle??me konusu ??r??n?? eksiksiz, sipari??te belirtilen niteliklere uygun ve varsa garanti belgeleri, kullan??m k??lavuzlar?? ile teslim etmeyi, her t??rl?? ay??ptan ar?? olarak yasal mevzuat gereklerine sa??lam, standartlara uygun bir ??ekilde i??in gere??i olan bilgi ve belgeler ile i??i do??ruluk ve d??r??stl??k esaslar?? d??hilinde ifa etmeyi, hizmet kalitesini koruyup y??kseltmeyi, i??in ifas?? s??ras??nda gerekli dikkat ve ??zeni g??stermeyi, ihtiyat ve ??ng??r?? ile hareket etmeyi kabul, beyan ve taahh??t eder.</p>

                        <p>6.4.SATICI, s??zle??meden do??an ifa y??k??ml??l??????n??n s??resi dolmadan ALICI???y?? bilgilendirmek ve a????k??a onay??n?? almak suretiyle e??it kalite ve fiyatta farkl?? bir ??r??n tedarik edebilir.</p>

                        <p>6.5.SATICI, sipari?? konusu ??r??n veya hizmetin yerine getirilmesinin imk??ns??zla??mas?? halinde s??zle??me konusu y??k??ml??l??klerini yerine getiremezse, bu durumu, ????rendi??i tarihten itibaren 3 g??n i??inde yaz??l?? olarak t??keticiye bildirece??ini, 14 g??nl??k s??re i??inde toplam bedeli ALICI???ya iade edece??ini kabul, beyan ve taahh??t eder.</p>

                        <p>6.6.ALICI, s??zle??me konusu ??r??n??n teslimat?? i??in i??bu ??n Bilgilendirme Formunu elektronik ortamda teyit edece??ini, herhangi bir nedenle s??zle??me konusu ??r??n bedelinin ??denmemesi ve/veya banka kay??tlar??nda iptal edilmesi halinde, SATICI??? n??n s??zle??me konusu ??r??n?? teslim y??k??ml??l??????n??n sona erece??ini kabul, beyan ve taahh??t eder.</p>

                        <p>6.7.ALICI, S??zle??me konusu ??r??n??n ALICI veya ALICI???n??n g??sterdi??i adresteki ki??i ve/veya kurulu??a tesliminden sonra ALICI'ya ait kredi kart??n??n yetkisiz ki??ilerce haks??z kullan??lmas?? sonucunda s??zle??me konusu ??r??n bedelinin ilgili banka veya finans kurulu??u taraf??ndan SATICI'ya ??denmemesi halinde, ALICI S??zle??me konusu ??r??n?? 3 g??n i??erisinde nakliye gideri SATICI???ya ait olacak ??ekilde SATICI???ya iade edece??ini kabul, beyan ve taahh??t eder.</p>

                        <p>6.8.SATICI, taraflar??n iradesi d??????nda geli??en, ??nceden ??ng??r??lemeyen ve taraflar??n bor??lar??n?? yerine getirmesini engelleyici ve/veya geciktirici hallerin olu??mas?? gibi m??cbir sebepler halleri nedeni ile s??zle??me konusu ??r??n?? s??resi i??inde teslim edemez ise, durumu ALICI' ya bildirece??ini kabul, beyan ve taahh??t eder. ALICI da sipari??in iptal edilmesini, s??zle??me konusu ??r??n??n varsa emsali ile de??i??tirilmesini ve/veya teslimat s??resinin engelleyici durumun ortadan kalkmas??na kadar ertelenmesini SATICI??? dan talep etme hakk??na haizdir. ALICI taraf??ndan sipari??in iptal edilmesi halinde ALICI??? n??n nakit ile yapt?????? ??demelerde, ??r??n tutar?? 14 g??n i??inde kendisine nakden ve defaten ??denir. ALICI??? n??n kredi kart?? ile yapt?????? ??demelerde ise, ??r??n tutar??, sipari??in ALICI taraf??ndan iptal edilmesinden sonra 14 g??n i??erisinde ilgili bankaya iade edilir. ALICI, SATICI taraf??ndan kredi kart??na iade edilen tutar??n banka taraf??ndan ALICI hesab??na yans??t??lmas??na ili??kin ortalama s??recin 2 ile 3 haftay?? bulabilece??ini, bu tutar??n bankaya iadesinden sonra ALICI??? n??n hesaplar??na yans??mas?? halinin tamamen banka i??lem s??reci ile ilgili oldu??undan, ALICI, olas?? gecikmeler i??in SATICI??? y?? sorumlu tutamayaca????n?? kabul, beyan ve taahh??t eder.</p>

                        <p>7. FATURA B??LG??LER??</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukar??da belirtilen adres esas olarak al??nacakt??r. Sipari?? tamamland??????nda e-posta ile g??nderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>Fatura teslim : Fatura sipari?? tamamland??ktan sonra e-posta adresine g??nderilecektir.</p>


                        <p>8. CAYMA HAKKI</p>

                        <p>8.1.ALICI; mal sat??????na ili??kin mesafeli s??zle??melerde, ??r??n??n kendisine veya g??sterdi??i adresteki ki??i/kurulu??a teslim tarihinden itibaren 14 (on d??rt) g??n i??erisinde, SATICI???ya bildirmek ??art??yla hi??bir hukuki ve cezai sorumluluk ??stlenmeksizin ve hi??bir gerek??e g??stermeksizin mal?? reddederek s??zle??meden cayma hakk??n?? kullanabilir. Hizmet sunumuna ili??kin mesafeli s??zle??melerde ise, bu s??re s??zle??menin imzaland?????? tarihten itibaren ba??lar. Cayma hakk?? s??resi sona ermeden ??nce, t??keticinin onay?? ile hizmetin ifas??na ba??lanan hizmet s??zle??melerinde cayma hakk?? kullan??lamaz. Cayma hakk??n??n kullan??m??ndan kaynaklanan masraflar SATICI??? ya aittir.ALICI, i?? bu s??zle??meyi kabul etmekle, cayma hakk?? konusunda bilgilendirildi??ini pe??inen kabul eder.</p>

                        <p>8.2.Cayma hakk??n??n kullan??lmas?? i??in 14 (ond??rt) g??nl??k s??re i??inde SATICI' ya iadeli taahh??tl?? posta, faks veya eposta ile yaz??l?? bildirimde bulunulmas?? ve ??r??n??n i??bu s??zle??mede d??zenlenen d??zenlenen "Cayma Hakk?? Kullan??lamayacak ??r??nler" h??k??mleri ??er??evesinde kullan??lmam???? olmas?? ??artt??r. Bu hakk??n kullan??lmas?? halinde,</p>

                        <p>8.2.13. ki??iye veya ALICI??? ya teslim edilen ??r??n??n faturas??, (??ade edilmek istenen ??r??n??n faturas?? kurumsal ise, geri iade ederken kurumun d??zenlemi?? oldu??u iade faturas?? ile birlikte g??nderilmesi gerekmektedir. Faturas?? kurumlar ad??na d??zenlenen sipari?? iadeleri ??ADE FATURASI kesilmedi??i takdirde tamamlanamayacakt??r.)</p>

                        <p>8.2.2.??ade formu,</p>

                        <p>8.2.3.??ade edilecek ??r??nlerin kutusu, ambalaj??, varsa standart aksesuarlar?? ile birlikte eksiksiz ve hasars??z olarak teslim edilmesi gerekmektedir.</p>

                        <p>8.2.4.SATICI, cayma bildiriminin kendisine ula??mas??ndan itibaren en ge?? 10 g??nl??k s??re i??erisinde toplam bedeli ve ALICI??? y?? bor?? alt??na sokan belgeleri ALICI??? ya iade etmek ve 20 g??nl??k s??re i??erisinde mal?? iade almakla y??k??ml??d??r.</p>

                        <p>8.2.5.ALICI??? n??n kusurundan kaynaklanan bir nedenle mal??n de??erinde bir azalma olursa veya iade imk??ns??zla????rsa ALICI kusuru oran??nda SATICI??? n??n zararlar??n?? tazmin etmekle y??k??ml??d??r. Ancak cayma hakk?? s??resi i??inde mal??n veya ??r??n??n usul??ne uygun kullan??lmas??n sebebiyle meydana gelen de??i??iklik ve bozulmalardan ALICI sorumlu de??ildir.</p>

                        <p>8.2.6.Cayma hakk??n??n kullan??lmas?? nedeniyle SATICI taraf??ndan d??zenlenen kampanya limit tutar??n??n alt??na d??????lmesi halinde kampanya kapsam??nda faydalan??lan indirim miktar?? iptal edilir.</p>

                        <p>9. CAYMA HAKKI KULLANILAMAYACAK ??R??NLER</p>


                        <p>9.1.a) Fiyat?? finansal piyasalardaki dalgalanmalara ba??l?? olarak de??i??en ve sat??c?? veya sa??lay??c??n??n kontrol??nde olmayan mal veya hizmetlere ili??kin s??zle??meler.</p>

                        <p>b) T??keticinin istekleri veya ki??isel ihtiya??lar?? do??rultusunda haz??rlanan mallara ili??kin s??zle??meler.</p>

                        <p>c) ??abuk bozulabilen veya son kullanma tarihi ge??ebilecek mallar??n teslimine ili??kin s??zle??meler.</p>

                        <p>??) Tesliminden sonra ambalaj, bant, m??h??r, paket gibi koruyucu unsurlar?? a????lm???? olan mallardan; iadesi sa??l??k vehijyena????s??ndan uygun olmayanlar??n teslimine ili??kin s??zle??meler.</p>

                        <p>d) Tesliminden sonra ba??ka ??r??nlerle kar????an ve do??as?? gere??i ayr????t??r??lmas?? m??mk??n olmayan mallara ili??kin s??zle??meler.</p>

                        <p>e) Mal??n tesliminden sonra ambalaj, bant, m??h??r, paket gibi koruyucu unsurlar?? a????lm???? olmas?? halinde maddi ortamda sunulan kitap, dijital i??erik ve bilgisayar sarf malzemelerine, veri kaydedebilme ve veri depolama cihazlar??na ili??kin s??zle??meler.</p>

                        <p>f) Abonelik s??zle??mesi kapsam??nda sa??lananlar d??????nda, gazete ve dergi gibi s??reli yay??nlar??n teslimine ili??kin s??zle??meler.</p>

                        <p>g) Belirli bir tarihte veya d??nemde yap??lmas?? gereken, konaklama, e??ya ta????ma, araba kiralama, yiyecek-i??ecek tedariki ve e??lence veya dinlenme amac??yla yap??lan bo?? zaman??n de??erlendirilmesine ili??kin s??zle??meler.</p>

                        <p>??) Elektronik ortamda an??nda ifa edilen hizmetler veya t??keticiye an??nda teslim edilengayrimaddimallara ili??kin s??zle??meler.</p>

                        <p>h) Cayma hakk?? s??resi sona ermeden ??nce, t??keticinin onay?? ile ifas??na ba??lanan hizmetlere ili??kin s??zle??meler.</p>

                        <p>Kozmetik ve ki??isel bak??m ??r??nleri, i?? giyim ??r??nleri, mayo, bikini, kitap, kopyalanabilir yaz??l??m ve programlar, DVD, VCD, CD ve kasetler ile k??rtasiye sarf malzemeleri (toner, kartu??, ??erit vb.) iade edilebilmesi i??in ambalajlar??n??n a????lmam????, denenmemi??, bozulmam???? ve kullan??lmam???? olmalar?? gerekir.</p>

                        <p>9.2. ALICI, ??ik??yet ve itirazlar?? konusunda ba??vurular??n??, a??a????daki kanunda belirtilen parasal s??n??rlar d??hilinde t??keticinin yerle??im yerinin bulundu??u veya t??ketici i??leminin yap??ld?????? yerdeki t??ketici sorunlar?? hakem heyetine veya t??ketici mahkemesine yapabilir. Parasal s??n??ra ili??kin bilgiler a??a????dad??r:</p>

                        <p>01/01/2017 tarihinden itibaren ge??erli olmak ??zere, 2017 y??l?? i??in t??ketici hakem heyetlerine yap??lacak ba??vurularda de??eri:</p>

                        <p>a) 2.400 (iki bin d??rt y??z) T??rk Liras??n??n alt??nda bulunan uyu??mazl??klarda il??e t??ketici hakem heyetleri,</p>

                        <p>b) B??y??k??ehir stat??s??nde olan illerde 2.400 (iki bin d??rt y??z) T??rk Liras?? ile 3.610 (???? bin alt?? y??z on) T??rk Liras?? aras??ndaki uyu??mazl??klarda il t??ketici hakem heyetleri,</p>

                        <p>c) B??y??k??ehir stat??s??nde olmayan illerin merkezlerinde 3.610 (???? bin alt?? y??z on) T??rk Liras??n??n alt??nda bulunan uyu??mazl??klarda il t??ketici hakem heyetleri,</p>

                        <p>??) B??y??k??ehir stat??s??nde olmayan illere ba??l?? il??elerde 2.400 (iki bin d??rt y??z) T??rk Liras?? ile 3.610 (???? bin alt?? y??z on) T??rk Liras?? aras??ndaki uyu??mazl??klarda il t??ketici hakem heyetleri g??revli k??l??nm????lard??r.</p>

                        <p>????bu S??zle??me ticari ama??larla yap??lmaktad??r.</p>


                        <p>SATICI: MCA Enerji Dan. ??n??. TAAH. DI??. T??C. GIDA TAR. VE HAYV. LTD. ??T??.</p>

                        <p>ALICI: {{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>TAR??H: 15 Ocak 2021 </p>



                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-20">
                    <h4 class="urunDetayBaslik">{{ __('DISTANCE SALES AGREEMENT')}}</h4>
                </div>

                <div class="col-md-12 ">
                    <div style="width:100%; max-height: 250px; overflow-y: scroll; background: #f4f4f4; padding: 10px;">
                        <p> 1.TARAFLAR</p>

                        <p>????bu S??zle??me a??a????daki taraflar aras??nda a??a????da belirtilen h??k??m ve ??artlar ??er??evesinde imzalanm????t??r. </p>

                        <p>A.???ALICI??? ; (s??zle??mede bundan sonra "ALICI" olarak an??lacakt??r)</p>

                        <p>B.???SATICI??? ; (s??zle??mede bundan sonra "SATICI" olarak an??lacakt??r)</p>

                        <p>AD- SOYAD: {{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>ADRES: Yukar??da belirtilen adres esas olarak al??nacakt??r. Sipari?? tamamland??????nda e-posta ile g??nderilecektir.</p>

                        <p>???? bu s??zle??meyi kabul etmekle ALICI, s??zle??me konusu sipari??i onaylad?????? takdirde sipari?? konusu bedeli ve varsa kargo ??creti, vergi gibi belirtilen ek ??cretleri ??deme y??k??ml??l?????? alt??na girece??ini ve bu konuda bilgilendirildi??ini pe??inen kabul eder.</p>

                        <p>2.TANIMLAR</p>

                        <p>????bu s??zle??menin uygulanmas??nda ve yorumlanmas??nda a??a????da yaz??l?? terimler kar????lar??ndaki yaz??l?? a????klamalar?? ifade edeceklerdir.</p>

                        <p>BAKAN: G??mr??k ve Ticaret Bakan?????n??,</p>

                        <p>BAKANLIK: G??mr??k ve Ticaret Bakanl?????????n??,</p>

                        <p>KANUN: 6502 say??l?? T??keticinin Korunmas?? Hakk??nda Kanun???u,</p>

                        <p>Y??NETMEL??K: Mesafeli S??zle??meler Y??netmeli??i???ni (RG:27.11.2014/29188)</p>

                        <p>H??ZMET: Bir ??cret veya menfaat kar????l??????nda yap??lan ya da yap??lmas?? taahh??t edilen mal sa??lama d??????ndaki her t??rl?? t??ketici i??leminin konusunu ,</p>

                        <p>SATICI: Ticari veya mesleki faaliyetleri kapsam??nda t??keticiye mal sunan veya mal sunan ad??na veya hesab??na hareket eden ??irketi,</p>

                        <p>ALICI: Bir mal veya hizmeti ticari veya mesleki olmayan ama??larla edinen, kullanan veya yararlanan ger??ek ya da t??zel ki??iyi,</p>

                        <p>S??TE: SATICI???ya ait internet sitesini,</p>

                        <p>S??PAR???? VEREN: Bir mal veya hizmeti SATICI???ya ait internet sitesi ??zerinden talep eden ger??ek ya da t??zel ki??iyi,</p>

                        <p>TARAFLAR: SATICI ve ALICI???y??,</p>

                        <p>S??ZLE??ME: SATICI ve ALICI aras??nda akdedilen i??bu s??zle??meyi,</p>

                        <p>MAL: Al????veri??e konu olan ta????n??r e??yay?? ve elektronik ortamda kullan??lmak ??zere haz??rlanan yaz??l??m, ses, g??r??nt?? ve benzeri gayri maddi mallar?? ifade eder.</p>

                        <p>3.KONU</p>

                        <p>????bu S??zle??me, ALICI???n??n, SATICI???ya ait internet sitesi ??zerinden elektronik ortamda sipari??ini verdi??i a??a????da nitelikleri ve sat???? fiyat?? belirtilen ??r??n??n sat?????? ve teslimi ile ilgili olarak 6502 say??l?? T??keticinin Korunmas?? Hakk??nda Kanun ve Mesafeli S??zle??melere Dair Y??netmelik h??k??mleri gere??ince taraflar??n hak ve y??k??ml??l??klerini d??zenler.</p>

                        <p>Listelenen ve sitede ilan edilen fiyatlar sat???? fiyat??d??r. ??lan edilen fiyatlar ve vaatler g??ncelleme yap??lana ve de??i??tirilene kadar ge??erlidir. S??reli olarak ilan edilen fiyatlar ise belirtilen s??re sonuna kadar ge??erlidir.</p>

                        <p>4. SATICI B??LG??LER??</p>

                        <p>??nvan??: MCA Enerji Dan. ??n??. TAAH. DI??. T??C. GIDA TAR. VE HAYV. LTD. ??T??.</p>

                        <p>Adres: Etiler mah. B??y??kl?? Mehmet Pa??a sok. No:20 D:12 34337 Be??ikta?? / ??stanbul</p>

                        <p>Telefon: 0850 305 09 15</p>

                        <p>Faks: 0850 305 09 15</p>

                        <p>Eposta: info@aurachake.com.tr</p>

                        <p>5. ALICI B??LG??LER??</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukar??da belirtilen adres esas olarak al??nacakt??r. Sipari?? tamamland??????nda e-posta ile g??nderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>6. S??PAR???? VEREN K?????? B??LG??LER??</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukar??da belirtilen adres esas olarak al??nacakt??r. Sipari?? tamamland??????nda e-posta ile g??nderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>7. S??ZLE??ME KONUSU ??R??N/??R??NLER B??LG??LER??</p>

                        <p>1. Mal??n /??r??n/??r??nlerin/ Hizmetin temel ??zelliklerini (t??r??, miktar??, marka/modeli, rengi, adedi) SATICI???ya ait internet sitesinde yay??nlanmaktad??r. Sat??c?? taraf??ndan kampanya d??zenlenmi?? ise ilgili ??r??n??n temel ??zelliklerini kampanya s??resince inceleyebilirsiniz. Kampanya tarihine kadar ge??erlidir.</p>

                        <p>7.2. Listelenen ve sitede ilan edilen fiyatlar sat???? fiyat??d??r. ??lan edilen fiyatlar ve vaatler g??ncelleme yap??lana ve de??i??tirilene kadar ge??erlidir. S??reli olarak ilan edilen fiyatlar ise belirtilen s??re sonuna kadar ge??erlidir.</p>

                        <p>7.3. S??zle??me konusu mal ya da hizmetin t??m vergiler d??hil sat???? fiyat?? a??a????da g??sterilmi??tir.</p>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('Product')}}</th>
                                    <th width="50" class="text-center">{{ __('Quantity')}}</th>
                                    <th width="150" class="text-center">{{ __('Unit Price')}}</th>
                                    <!-- <th width="150" class="text-center">{{ __('KDV')}}</th> -->
                                    <th width="150" class="text-right">{{ __('Total')}}</th>
                                <tr>
                            </thead>
                            @if($all != null)
                            @foreach($all as $c)
                            @foreach($prod as $p)
                            @if($c[0]==$p->id)
                            <tbody>

                                <tr>
                                    <td>
                                        <a href="{{ url(app()->getLocale(),'product') }}/{{$p->id}}">{{$p->name}}</a>
                                    </td>

                                    <td>
                                        <input type="number_format" id="quantity" style="background: transparent; border: none; width:30%; text-align: center;" name="{{$p->id}}" value={{$c[1]}} min="1" max="100" readonly />

                                    </td>
                                    <td class="text-center">{{$c[2]}} TL</td>
                                    <!-- <td class="text-center">belmiorm TL</td> -->
                                    <td class="text-right">
                                        <div id="individualPrice_{{$c[3]}}">
                                            {{$c[1]*$c[2]}} TL
                                        </div>
                                    </td> TL
                    </div>
                    </td>


                    </tr>
                    @break
                    @endif
                    @endforeach
                    @endforeach


                    </tbody>
                    @endif

                    <tfoot>

                        <!-- <tr>
                            <td colspan="4" class="text-right"><strong>{{ __('First Order Discount')}} (%):</strong></td>
                            <td class="text-right">0,00 TL</td>
                        </tr> -->
                        <tr>
                            <td colspan="3" class="text-right"><strong>{{ __('Total')}}:</strong></td>
                            <td class="text-right" id="totalCost"> {{Session::get('price')}} TL </td>
                        </tr>
                    </tfoot>

                    </table>


                    <p>??deme ??ekli ve Plan??: Kredi kart?? ile ??deme</p>

                    <p>7.4. ??r??n sevkiyat masraf?? olan kargo ??creti ALICI taraf??ndan ??denecektir.</p>

                    <p>8. FATURA B??LG??LER??</p>

                    <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                    <p>Teslimat Adresi Yukar??da belirtilen adres esas olarak al??nacakt??r. Sipari?? tamamland??????nda e-posta ile g??nderilecektir.</p>

                    <p>{{Auth::user()->phone}} </p>

                    <p>{{Auth::user()->email}} </p>

                    <p>Fatura teslim : Fatura sipari?? tamamland??ktan sonra e-posta adresine g??nderilecektir.</p>


                    <p>9. GENEL H??K??MLER</p>

                    <p>9.1. ALICI, SATICI???ya ait internet sitesinde s??zle??me konusu ??r??n??n temel nitelikleri, sat???? fiyat?? ve ??deme ??ekli ile teslimata ili??kin ??n bilgileri okuyup, bilgi sahibi oldu??unu, elektronik ortamda gerekli teyidi verdi??ini kabul, beyan ve taahh??t eder. ALICI???n??n; ??n Bilgilendirmeyi elektronik ortamda teyit etmesi, mesafeli sat???? s??zle??mesinin kurulmas??ndan evvel, SATICI taraf??ndan ALICI' ya verilmesi gereken adresi, sipari??i verilen ??r??nlere ait temel ??zellikleri, ??r??nlerin vergiler d??hil fiyat??n??, ??deme ve teslimat bilgilerini de do??ru ve eksiksiz olarak edindi??ini kabul, beyan ve taahh??t eder.</p>

                    <p>9.2. S??zle??me konusu her bir ??r??n, 30 g??nl??k yasal s??reyi a??mamak kayd?? ile ALICI' n??n yerle??im yeri uzakl??????na ba??l?? olarak internet sitesindeki ??n bilgiler k??sm??nda belirtilen s??re zarf??nda ALICI veya ALICI???n??n g??sterdi??i adresteki ki??i ve/veya kurulu??a teslim edilir. Bu s??re i??inde ??r??n??n ALICI???ya teslim edilememesi durumunda, ALICI???n??n s??zle??meyi feshetme hakk?? sakl??d??r. </p>

                    <p>9.3. SATICI, S??zle??me konusu ??r??n?? eksiksiz, sipari??te belirtilen niteliklere uygun ve varsa garanti belgeleri, kullan??m k??lavuzlar?? i??in gere??i olan bilgi ve belgeler ile teslim etmeyi, her t??rl?? ay??ptan ar?? olarak yasal mevzuat gereklerine g??re sa??lam, standartlara uygun bir ??ekilde i??i do??ruluk ve d??r??stl??k esaslar?? d??hilinde ifa etmeyi, hizmet kalitesini koruyup y??kseltmeyi, i??in ifas?? s??ras??nda gerekli dikkat ve ??zeni g??stermeyi, ihtiyat ve ??ng??r?? ile hareket etmeyi kabul, beyan ve taahh??t eder.</p>

                    <p>9.4. SATICI, s??zle??meden do??an ifa y??k??ml??l??????n??n s??resi dolmadan ALICI???y?? bilgilendirmek ve a????k??a onay??n?? almak suretiyle e??it kalite ve fiyatta farkl?? bir ??r??n tedarik edebilir.</p>

                    <p>9.5. SATICI, sipari?? konusu ??r??n veya hizmetin yerine getirilmesinin imk??ns??zla??mas?? halinde s??zle??me konusu y??k??ml??l??klerini yerine getiremezse, bu durumu, ????rendi??i tarihten itibaren 3 g??n i??inde yaz??l?? olarak t??keticiye bildirece??ini, 14 g??nl??k s??re i??inde toplam bedeli ALICI???ya iade edece??ini kabul, beyan ve taahh??t eder. </p>

                    <p>9.6. ALICI, S??zle??me konusu ??r??n??n teslimat?? i??in i??bu S??zle??me???yi elektronik ortamda teyit edece??ini, herhangi bir nedenle s??zle??me konusu ??r??n bedelinin ??denmemesi ve/veya banka kay??tlar??nda iptal edilmesi halinde, SATICI???n??n s??zle??me konusu ??r??n?? teslim y??k??ml??l??????n??n sona erece??ini kabul, beyan ve taahh??t eder.</p>

                    <p>9.7. ALICI, S??zle??me konusu ??r??n??n ALICI veya ALICI???n??n g??sterdi??i adresteki ki??i ve/veya kurulu??a tesliminden sonra ALICI'ya ait kredi kart??n??n yetkisiz ki??ilerce haks??z kullan??lmas?? sonucunda s??zle??me konusu ??r??n bedelinin ilgili banka veya finans kurulu??u taraf??ndan SATICI'ya ??denmemesi halinde, ALICI S??zle??me konusu ??r??n?? 3 g??n i??erisinde nakliye gideri SATICI???ya ait olacak ??ekilde SATICI???ya iade edece??ini kabul, beyan ve taahh??t eder.</p>

                    <p>9.8. SATICI, taraflar??n iradesi d??????nda geli??en, ??nceden ??ng??r??lemeyen ve taraflar??n bor??lar??n?? yerine getirmesini engelleyici ve/veya geciktirici hallerin olu??mas?? gibi m??cbir sebepler halleri nedeni ile s??zle??me konusu ??r??n?? s??resi i??inde teslim edemez ise, durumu ALICI'ya bildirece??ini kabul, beyan ve taahh??t eder. ALICI da sipari??in iptal edilmesini, s??zle??me konusu ??r??n??n varsa emsali ile de??i??tirilmesini ve/veya teslimat s??resinin engelleyici durumun ortadan kalkmas??na kadar ertelenmesini SATICI???dan talep etme hakk??n?? haizdir. ALICI taraf??ndan sipari??in iptal edilmesi halinde ALICI???n??n nakit ile yapt?????? ??demelerde, ??r??n tutar?? 14 g??n i??inde kendisine nakden ve defaten ??denir. ALICI???n??n kredi kart?? ile yapt?????? ??demelerde ise, ??r??n tutar??, sipari??in ALICI taraf??ndan iptal edilmesinden sonra 14 g??n i??erisinde ilgili bankaya iade edilir. ALICI, SATICI taraf??ndan kredi kart??na iade edilen tutar??n banka taraf??ndan ALICI hesab??na yans??t??lmas??na ili??kin ortalama s??recin 2 ile 3 haftay?? bulabilece??ini, bu tutar??n bankaya iadesinden sonra ALICI???n??n hesaplar??na yans??mas?? halinin tamamen banka i??lem s??reci ile ilgili oldu??undan, ALICI, olas?? gecikmeler i??in SATICI???y?? sorumlu tutamayaca????n?? kabul, beyan ve taahh??t eder.</p>

                    <p>9.9. SATICININ, ALICI taraf??ndan siteye kay??t formunda belirtilen veya daha sonra kendisi taraf??ndan g??ncellenen adresi, e-posta adresi, sabit ve mobil telefon hatlar?? ve di??er ileti??im bilgileri ??zerinden mektup, e-posta, SMS, telefon g??r????mesi ve di??er yollarla ileti??im, pazarlama, bildirim ve di??er ama??larla ALICI???ya ula??ma hakk?? bulunmaktad??r. ALICI, i??bu s??zle??meyi kabul etmekle SATICI???n??n kendisine y??nelik yukar??da belirtilen ileti??im faaliyetlerinde bulunabilece??ini kabul ve beyan etmektedir.</p>

                    <p>9.10. ALICI, s??zle??me konusu mal/hizmeti teslim almadan ??nce muayene edecek; ezik, k??r??k, ambalaj?? y??rt??lm???? vb. hasarl?? ve ay??pl?? mal/hizmeti kargo ??irketinden teslim almayacakt??r. Teslim al??nan mal/hizmetin hasars??z ve sa??lam oldu??u kabul edilecektir. Teslimden sonra mal/hizmetin ??zenle korunmas?? borcu, ALICI???ya aittir. Cayma hakk?? kullan??lacaksa mal/hizmet kullan??lmamal??d??r. Fatura iade edilmelidir.</p>

                    <p>9.11. ALICI ile sipari?? esnas??nda kullan??lan kredi kart?? hamilinin ayn?? ki??i olmamas?? veya ??r??n??n ALICI???ya tesliminden evvel, sipari??te kullan??lan kredi kart??na ili??kin g??venlik a???????? tespit edilmesi halinde, SATICI, kredi kart?? hamiline ili??kin kimlik ve ileti??im bilgilerini, sipari??te kullan??lan kredi kart??n??n bir ??nceki aya ait ekstresini yahut kart hamilinin bankas??ndan kredi kart??n??n kendisine ait oldu??una ili??kin yaz??y?? ibraz etmesini ALICI???dan talep edebilir. ALICI???n??n talebe konu bilgi/belgeleri temin etmesine kadar ge??ecek s??rede sipari?? dondurulacak olup, mezkur taleplerin 24 saat i??erisinde kar????lanmamas?? halinde ise SATICI, sipari??i iptal etme hakk??n?? haizdir.</p>

                    <p>9.12. ALICI, SATICI???ya ait internet sitesine ??ye olurken verdi??i ki??isel ve di??er sair bilgilerin ger??e??e uygun oldu??unu, SATICI???n??n bu bilgilerin ger??e??e ayk??r??l?????? nedeniyle u??rayaca???? t??m zararlar??, SATICI???n??n ilk bildirimi ??zerine derhal, nakden ve defaten tazmin edece??ini beyan ve taahh??t eder.</p>

                    <p>9.13. ALICI, SATICI???ya ait internet sitesini kullan??rken yasal mevzuat h??k??mlerine riayet etmeyi ve bunlar?? ihlal etmemeyi ba??tan kabul ve taahh??t eder. Aksi takdirde, do??acak t??m hukuki ve cezai y??k??ml??l??kler tamamen ve m??nhas??ran ALICI???y?? ba??layacakt??r.</p>

                    <p>9.14. ALICI, SATICI???ya ait internet sitesini hi??bir ??ekilde kamu d??zenini bozucu, genel ahlaka ayk??r??, ba??kalar??n?? rahats??z ve taciz edici ??ekilde, yasalara ayk??r?? bir ama?? i??in, ba??kalar??n??n maddi ve manevi haklar??na tecav??z edecek ??ekilde kullanamaz. Ayr??ca, ??ye ba??kalar??n??n hizmetleri kullanmas??n?? ??nleyici veya zorla??t??r??c?? faaliyet (spam, virus, truva at??, vb.) i??lemlerde bulunamaz.</p>

                    <p>9.15. SATICI???ya ait internet sitesinin ??zerinden, SATICI???n??n kendi kontrol??nde olmayan ve/veya ba??kaca ??????nc?? ki??ilerin sahip oldu??u ve/veya i??letti??i ba??ka web sitelerine ve/veya ba??ka i??eriklere link verilebilir. Bu linkler ALICI???ya y??nlenme kolayl?????? sa??lamak amac??yla konmu?? olup herhangi bir web sitesini veya o siteyi i??leten ki??iyi desteklememekte ve Link verilen web sitesinin i??erdi??i bilgilere y??nelik herhangi bir garanti niteli??i ta????mamaktad??r.</p>

                    <p>9.16. ????bu s??zle??me i??erisinde say??lan maddelerden bir ya da birka????n?? ihlal eden ??ye i??bu ihlal nedeniyle cezai ve hukuki olarak ??ahsen sorumlu olup, SATICI???y?? bu ihlallerin hukuki ve cezai sonu??lar??ndan ari tutacakt??r. Ayr??ca; i??bu ihlal nedeniyle, olay??n hukuk alan??na intikal ettirilmesi halinde, SATICI???n??n ??yeye kar???? ??yelik s??zle??mesine uyulmamas??ndan dolay?? tazminat talebinde bulunma hakk?? sakl??d??r.</p>

                    <p>10. CAYMA HAKKI</p>

                    <p>10.1. ALICI; mesafeli s??zle??menin mal sat??????na ili??kin olmas?? durumunda, ??r??n??n kendisine veya g??sterdi??i adresteki ki??i/kurulu??a teslim tarihinden itibaren 14 (on d??rt) g??n i??erisinde, SATICI???ya bildirmek ??art??yla hi??bir hukuki ve cezai sorumluluk ??stlenmeksizin ve hi??bir gerek??e g??stermeksizin mal?? reddederek s??zle??meden cayma hakk??n?? kullanabilir. Hizmet sunumuna ili??kin mesafeli s??zle??melerde ise, bu s??re s??zle??menin imzaland?????? tarihten itibaren ba??lar. Cayma hakk?? s??resi sona ermeden ??nce, t??keticinin onay?? ile hizmetin ifas??na ba??lanan hizmet s??zle??melerinde cayma hakk?? kullan??lamaz. Cayma hakk??n??n kullan??m??ndan kaynaklanan masraflar SATICI??? ya aittir. ALICI, i?? bu s??zle??meyi kabul etmekle, cayma hakk?? konusunda bilgilendirildi??ini pe??inen kabul eder.</p>

                    <p>10.2. Cayma hakk??n??n kullan??lmas?? i??in 14 (ond??rt) g??nl??k s??re i??inde SATICI' ya iadeli taahh??tl?? posta, faks veya eposta ile yaz??l?? bildirimde bulunulmas?? ve ??r??n??n i??bu s??zle??mede d??zenlenen "Cayma Hakk?? Kullan??lamayacak ??r??nler" h??k??mleri ??er??evesinde kullan??lmam???? olmas?? ??artt??r. Bu hakk??n kullan??lmas?? halinde, </p>

                    <p>a) 3. ki??iye veya ALICI??? ya teslim edilen ??r??n??n faturas??, (??ade edilmek istenen ??r??n??n faturas?? kurumsal ise, iade ederken kurumun d??zenlemi?? oldu??u iade faturas?? ile birlikte g??nderilmesi gerekmektedir. Faturas?? kurumlar ad??na d??zenlenen sipari?? iadeleri ??ADE FATURASI kesilmedi??i takdirde tamamlanamayacakt??r.)</p>

                    <p>b) ??ade formu,</p>

                    <p>c) ??ade edilecek ??r??nlerin kutusu, ambalaj??, varsa standart aksesuarlar?? ile birlikte eksiksiz ve hasars??z olarak teslim edilmesi gerekmektedir.</p>

                    <p>d) SATICI, cayma bildiriminin kendisine ula??mas??ndan itibaren en ge?? 10 g??nl??k s??re i??erisinde toplam bedeli ve ALICI???y?? bor?? alt??na sokan belgeleri ALICI??? ya iade etmek ve 20 g??nl??k s??re i??erisinde mal?? iade almakla y??k??ml??d??r.</p>

                    <p>e) ALICI??? n??n kusurundan kaynaklanan bir nedenle mal??n de??erinde bir azalma olursa veya iade imk??ns??zla????rsa ALICI kusuru oran??nda SATICI??? n??n zararlar??n?? tazmin etmekle y??k??ml??d??r. Ancak cayma hakk?? s??resi i??inde mal??n veya ??r??n??n usul??ne uygun kullan??lmas?? sebebiyle meydana gelen de??i??iklik ve bozulmalardan ALICI sorumlu de??ildir. </p>

                    <p>f) Cayma hakk??n??n kullan??lmas?? nedeniyle SATICI taraf??ndan d??zenlenen kampanya limit tutar??n??n alt??na d??????lmesi halinde kampanya kapsam??nda faydalan??lan indirim miktar?? iptal edilir.</p>

                    <p>11. CAYMA HAKKI KULLANILAMAYACAK ??R??NLER</p>

                    <p>ALICI???n??n iste??i veya a????k??a ki??isel ihtiya??lar?? do??rultusunda haz??rlanan ve geri g??nderilmeye m??sait olmayan, i?? giyim alt par??alar??, mayo ve bikini altlar??, makyaj malzemeleri, tek kullan??ml??k ??r??nler, ??abuk bozulma tehlikesi olan veya son kullanma tarihi ge??me ihtimali olan mallar, ALICI???ya teslim edilmesinin ard??ndan ALICI taraf??ndan ambalaj?? a????ld?????? takdirde iade edilmesi sa??l??k ve hijyen a????s??ndan uygun olmayan ??r??nler, teslim edildikten sonra ba??ka ??r??nlerle kar????an ve do??as?? gere??i ayr????t??r??lmas?? m??mk??n olmayan ??r??nler, Abonelik s??zle??mesi kapsam??nda sa??lananlar d??????nda, gazete ve dergi gibi s??reli yay??nlara ili??kin mallar, Elektronik ortamda an??nda ifa edilen hizmetler veya t??keticiye an??nda teslim edilen gayrimaddi mallar, ile ses veya g??r??nt?? kay??tlar??n??n, kitap, dijital i??erik, yaz??l??m programlar??n??n, veri kaydedebilme ve veri depolama cihazlar??n??n, bilgisayar sarf malzemelerinin, ambalaj??n??n ALICI taraf??ndan a????lm???? olmas?? halinde iadesi Y??netmelik gere??i m??mk??n de??ildir. Ayr??ca Cayma hakk?? s??resi sona ermeden ??nce, t??keticinin onay?? ile ifas??na ba??lanan hizmetlere ili??kin cayma hakk??n??n kullan??lmas?? da Y??netmelik gere??i m??mk??n de??ildir.</p>

                    <p>Kozmetik ve ki??isel bak??m ??r??nleri, i?? giyim ??r??nleri, mayo, bikini, kitap, kopyalanabilir yaz??l??m ve programlar, DVD, VCD, CD ve kasetler ile k??rtasiye sarf malzemeleri (toner, kartu??, ??erit vb.) iade edilebilmesi i??in ambalajlar??n??n a????lmam????, denenmemi??, bozulmam???? ve kullan??lmam???? olmalar?? gerekir. </p>

                    <p>12. TEMERR??T HAL?? VE HUKUK?? SONU??LARI</p>

                    <p>ALICI, ??deme i??lemlerini kredi kart?? ile yapt?????? durumda temerr??de d????t?????? takdirde, kart sahibi banka ile aras??ndaki kredi kart?? s??zle??mesi ??er??evesinde faiz ??deyece??ini ve bankaya kar???? sorumlu olaca????n?? kabul, beyan ve taahh??t eder. Bu durumda ilgili banka hukuki yollara ba??vurabilir; do??acak masraflar?? ve vek??let ??cretini ALICI???dan talep edebilir ve her ko??ulda ALICI???n??n borcundan dolay?? temerr??de d????mesi halinde, ALICI, borcun gecikmeli ifas??ndan dolay?? SATICI???n??n u??rad?????? zarar ve ziyan??n?? ??deyece??ini kabul, beyan ve taahh??t eder</p>

                    <p>13. YETK??L?? MAHKEME</p>

                    <p>????bu s??zle??meden do??an uyu??mazl??klarda ??ikayet ve itirazlar, a??a????daki kanunda belirtilen parasal s??n??rlar d??hilinde t??keticinin yerle??im yerinin bulundu??u veya t??ketici i??leminin yap??ld?????? yerdeki t??ketici sorunlar?? hakem heyetine veya t??ketici mahkemesine yap??lacakt??r. Parasal s??n??ra ili??kin bilgiler a??a????dad??r:</p>

                    <p>01/01/2017 tarihinden itibaren ge??erli olmak ??zere, 2017 y??l?? i??in t??ketici hakem heyetlerine yap??lacak ba??vurularda de??eri:</p>

                    <p>a) 2.400 (iki bin d??rt y??z) T??rk Liras??n??n alt??nda bulunan uyu??mazl??klarda il??e t??ketici hakem heyetleri,</p>

                    <p>b) B??y??k??ehir stat??s??nde olan illerde 2.400 (iki bin d??rt y??z) T??rk Liras?? ile 3.610 (???? bin alt?? y??z on) T??rk Liras?? aras??ndaki uyu??mazl??klarda il t??ketici hakem heyetleri,</p>

                    <p>c) B??y??k??ehir stat??s??nde olmayan illerin merkezlerinde 3.610 (???? bin alt?? y??z on) T??rk Liras??n??n alt??nda bulunan uyu??mazl??klarda il t??ketici hakem heyetleri,</p>

                    <p>??) B??y??k??ehir stat??s??nde olmayan illere ba??l?? il??elerde 2.400 (iki bin d??rt y??z) T??rk Liras?? ile 3.610 (???? bin alt?? y??z on) T??rk Liras?? aras??ndaki uyu??mazl??klarda il t??ketici hakem heyetleri g??revli k??l??nm????lard??r.</p>

                    <p>????bu S??zle??me ticari ama??larla yap??lmaktad??r.</p>

                    <p>14. Y??R??RL??K</p>

                    <p>ALICI, Site ??zerinden verdi??i sipari??e ait ??demeyi ger??ekle??tirdi??inde i??bu s??zle??menin t??m ??artlar??n?? kabul etmi?? say??l??r. SATICI, sipari??in ger??ekle??mesi ??ncesinde i??bu s??zle??menin sitede ALICI taraf??ndan okunup kabul edildi??ine dair onay alacak ??ekilde gerekli yaz??l??msal d??zenlemeleri yapmakla y??k??ml??d??r. </p>

                    <p>SATICI: MCA Enerji Dan. ??n??. TAAH. DI??. T??C. GIDA TAR. VE HAYV. LTD. ??T??.</p>

                    <p>ALICI: {{Auth::user()->name}} {{Auth::user()->surname}}</p>

                    <p>TAR??H: 15 Ocak 2021 </p>
                </div>
            </div>

        </div>


</div>
<br>
<div class="col-md-12 mt-20">
    <input type="checkbox" required name="agreement" /> {{ __('I have read the Preliminary Information and Distance Sales Agreement, I accept it')}}
</div>

<div class='col-md-12 mt-20'>
    <button type='submit' class="btn btn-primary pull-right">{{ __('Checkout')}}</button>
</div>
</form>
</div>
</form>
</div>

@endsection