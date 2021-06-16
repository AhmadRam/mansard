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

                        <select name="city" data-plugin-selectTwo class="form-control populate input-lg formIletisim" title="Şehir seçimi gereklidir" required>
                            @if(isset($address->id))
                            <option value="{{$address->city}}" selected>{{$address->city}}</option>
                            @endif
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

                        <p>İşbu Satış Sözleşmesi Ön Bilgi Formu’nun konusu, SATICI' nın, SİPARİŞ VEREN/ALICI' ya satışını yaptığı, aşağıda nitelikleri ve satış fiyatı belirtilen ürün/ürünlerin satışı ve teslimi ile ilgili olarak 6502 sayılı Tüketicilerin Korunması Hakkındaki Kanun - Mesafeli Sözleşmeler Yönetmeliği (RG:27.11.2014/29188) hükümleri gereğince tarafların hak ve yükümlülüklerini kapsamaktadır. İş bu ön bilgilendirme formunu kabul etmekle ALICI, sözleşme konusu siparişi onayladığı takdirde sipariş konusu bedeli ve varsa kargo ücreti, vergi gibi belirtilen ek ücretleri ödeme yükümlülüğü altına gireceğini ve bu konuda bilgilendirildiğini peşinen kabul eder.</p>

                        <p>2. SATICI BİLGİLERİ</p>

                        <p>Ünvanı: MCA Enerji Dan. İnş. TAAH. DIŞ. TİC. GIDA TAR. VE HAYV. LTD. ŞTİ.</p>

                        <p>Adres: Etiler mah. Bıyıklı Mehmet Paşa sok. No:20 D:12 34337 Beşiktaş / İstanbul</p>

                        <p>Telefon: 0850 305 09 15</p>

                        <p>Faks: 0850 305 09 15</p>

                        <p>Eposta: info@aurachake.com.tr</p>

                        <p>3. ALICI BİLGİLERİ(Bundan sonra ALICI olarak anılacaktır.)</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukarıda belirtilen adres esas olarak alınacaktır. Sipariş tamamlandığında e-posta ile gönderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>4. SİPARİŞ VEREN BİLGİLERİ(Bundan sonra SİPARİŞ VEREN olarak anılacaktır.)</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukarıda belirtilen adres esas olarak alınacaktır. Sipariş tamamlandığında e-posta ile gönderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>5. SÖZLEŞME KONUSU ÜRÜN/ÜRÜNLER BİLGİLERİ</p>

                        <p>5.1Malın / Ürün/Ürünlerin / Hizmetin temel özellikleri (türü, miktarı, marka/modeli, rengi, adedi) SATICI’ya ait internet sitesinde yer almaktadır. Ürünün temel özelliklerini kampanya süresince inceleyebilirsiniz. Kampanya tarihine kadar geçerlidir.</p>

                        <p>5.2Listelenen ve sitede ilan edilen fiyatlar satış fiyatıdır. İlan edilen fiyatlar ve vaatler güncelleme yapılana ve değiştirilene kadar geçerlidir. Süreli olarak ilan edilen fiyatlar ise belirtilen süre sonuna kadar geçerlidir.</p>

                        <p>5.3Sözleşme konusu mal ya da hizmetin tüm vergiler dâhil satış fiyatı aşağıdaki tabloda gösterilmiştir.</p>

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

                        <p>Ödeme Şekli ve Planı: Kredi kartı ile ödeme</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukarıda belirtilen adres esas olarak alınacaktır. Sipariş tamamlandığında e-posta ile gönderilecektir.</p>

                        <p>Ürün sevkiyat masrafı olan kargo ücreti ALICI tarafından ödenecektir.</p>

                        <p>6. GENEL HÜKÜMLER</p>

                        <p>6.1.ALICI, SATICI’ya ait internet sitesinde sözleşme konusu ürünün temel nitelikleri, satış fiyatı ve ödeme şekli ile teslimata ilişkin ön bilgileri okuyup, bilgi sahibi olduğunu, elektronik ortamda gerekli teyidi verdiğini kabul, beyan ve taahhüt eder. ALICININ; Ön Bilgilendirmeyi elektronik ortamda teyit etmesi, mesafeli satış sözleşmesinin kurulmasından evvel, SATICI tarafından ALICI' ya verilmesi gereken adresi, siparişi verilen ürünlere ait temel özellikleri, ürünlerin vergiler dâhil fiyatını, ödeme ve teslimat bilgilerini de doğru ve eksiksiz olarak edindiğini kabul, beyan ve taahhüt eder.</p>

                        <p>6.2.Sözleşme konusu her bir ürün, 30 günlük yasal süreyi aşmamak kaydı ile ALICI' nın yerleşim yeri uzaklığına bağlı olarak internet sitesindeki ön bilgiler kısmında belirtilen süre zarfında ALICI veya ALICI’ nın gösterdiği adresteki kişi ve/veya kuruluşa teslim edilir. Bu süre içinde ürünün ALICI’ya teslim edilememesi durumunda, ALICI’nın sözleşmeyi feshetme hakkı saklıdır. </p>

                        <p>6.3.SATICI, sözleşme konusu ürünü eksiksiz, siparişte belirtilen niteliklere uygun ve varsa garanti belgeleri, kullanım kılavuzları ile teslim etmeyi, her türlü ayıptan arî olarak yasal mevzuat gereklerine sağlam, standartlara uygun bir şekilde işin gereği olan bilgi ve belgeler ile işi doğruluk ve dürüstlük esasları dâhilinde ifa etmeyi, hizmet kalitesini koruyup yükseltmeyi, işin ifası sırasında gerekli dikkat ve özeni göstermeyi, ihtiyat ve öngörü ile hareket etmeyi kabul, beyan ve taahhüt eder.</p>

                        <p>6.4.SATICI, sözleşmeden doğan ifa yükümlülüğünün süresi dolmadan ALICI’yı bilgilendirmek ve açıkça onayını almak suretiyle eşit kalite ve fiyatta farklı bir ürün tedarik edebilir.</p>

                        <p>6.5.SATICI, sipariş konusu ürün veya hizmetin yerine getirilmesinin imkânsızlaşması halinde sözleşme konusu yükümlülüklerini yerine getiremezse, bu durumu, öğrendiği tarihten itibaren 3 gün içinde yazılı olarak tüketiciye bildireceğini, 14 günlük süre içinde toplam bedeli ALICI’ya iade edeceğini kabul, beyan ve taahhüt eder.</p>

                        <p>6.6.ALICI, sözleşme konusu ürünün teslimatı için işbu Ön Bilgilendirme Formunu elektronik ortamda teyit edeceğini, herhangi bir nedenle sözleşme konusu ürün bedelinin ödenmemesi ve/veya banka kayıtlarında iptal edilmesi halinde, SATICI’ nın sözleşme konusu ürünü teslim yükümlülüğünün sona ereceğini kabul, beyan ve taahhüt eder.</p>

                        <p>6.7.ALICI, Sözleşme konusu ürünün ALICI veya ALICI’nın gösterdiği adresteki kişi ve/veya kuruluşa tesliminden sonra ALICI'ya ait kredi kartının yetkisiz kişilerce haksız kullanılması sonucunda sözleşme konusu ürün bedelinin ilgili banka veya finans kuruluşu tarafından SATICI'ya ödenmemesi halinde, ALICI Sözleşme konusu ürünü 3 gün içerisinde nakliye gideri SATICI’ya ait olacak şekilde SATICI’ya iade edeceğini kabul, beyan ve taahhüt eder.</p>

                        <p>6.8.SATICI, tarafların iradesi dışında gelişen, önceden öngörülemeyen ve tarafların borçlarını yerine getirmesini engelleyici ve/veya geciktirici hallerin oluşması gibi mücbir sebepler halleri nedeni ile sözleşme konusu ürünü süresi içinde teslim edemez ise, durumu ALICI' ya bildireceğini kabul, beyan ve taahhüt eder. ALICI da siparişin iptal edilmesini, sözleşme konusu ürünün varsa emsali ile değiştirilmesini ve/veya teslimat süresinin engelleyici durumun ortadan kalkmasına kadar ertelenmesini SATICI’ dan talep etme hakkına haizdir. ALICI tarafından siparişin iptal edilmesi halinde ALICI’ nın nakit ile yaptığı ödemelerde, ürün tutarı 14 gün içinde kendisine nakden ve defaten ödenir. ALICI’ nın kredi kartı ile yaptığı ödemelerde ise, ürün tutarı, siparişin ALICI tarafından iptal edilmesinden sonra 14 gün içerisinde ilgili bankaya iade edilir. ALICI, SATICI tarafından kredi kartına iade edilen tutarın banka tarafından ALICI hesabına yansıtılmasına ilişkin ortalama sürecin 2 ile 3 haftayı bulabileceğini, bu tutarın bankaya iadesinden sonra ALICI’ nın hesaplarına yansıması halinin tamamen banka işlem süreci ile ilgili olduğundan, ALICI, olası gecikmeler için SATICI’ yı sorumlu tutamayacağını kabul, beyan ve taahhüt eder.</p>

                        <p>7. FATURA BİLGİLERİ</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukarıda belirtilen adres esas olarak alınacaktır. Sipariş tamamlandığında e-posta ile gönderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>Fatura teslim : Fatura sipariş tamamlandıktan sonra e-posta adresine gönderilecektir.</p>


                        <p>8. CAYMA HAKKI</p>

                        <p>8.1.ALICI; mal satışına ilişkin mesafeli sözleşmelerde, ürünün kendisine veya gösterdiği adresteki kişi/kuruluşa teslim tarihinden itibaren 14 (on dört) gün içerisinde, SATICI’ya bildirmek şartıyla hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı reddederek sözleşmeden cayma hakkını kullanabilir. Hizmet sunumuna ilişkin mesafeli sözleşmelerde ise, bu süre sözleşmenin imzalandığı tarihten itibaren başlar. Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile hizmetin ifasına başlanan hizmet sözleşmelerinde cayma hakkı kullanılamaz. Cayma hakkının kullanımından kaynaklanan masraflar SATICI’ ya aittir.ALICI, iş bu sözleşmeyi kabul etmekle, cayma hakkı konusunda bilgilendirildiğini peşinen kabul eder.</p>

                        <p>8.2.Cayma hakkının kullanılması için 14 (ondört) günlük süre içinde SATICI' ya iadeli taahhütlü posta, faks veya eposta ile yazılı bildirimde bulunulması ve ürünün işbu sözleşmede düzenlenen düzenlenen "Cayma Hakkı Kullanılamayacak Ürünler" hükümleri çerçevesinde kullanılmamış olması şarttır. Bu hakkın kullanılması halinde,</p>

                        <p>8.2.13. kişiye veya ALICI’ ya teslim edilen ürünün faturası, (İade edilmek istenen ürünün faturası kurumsal ise, geri iade ederken kurumun düzenlemiş olduğu iade faturası ile birlikte gönderilmesi gerekmektedir. Faturası kurumlar adına düzenlenen sipariş iadeleri İADE FATURASI kesilmediği takdirde tamamlanamayacaktır.)</p>

                        <p>8.2.2.İade formu,</p>

                        <p>8.2.3.İade edilecek ürünlerin kutusu, ambalajı, varsa standart aksesuarları ile birlikte eksiksiz ve hasarsız olarak teslim edilmesi gerekmektedir.</p>

                        <p>8.2.4.SATICI, cayma bildiriminin kendisine ulaşmasından itibaren en geç 10 günlük süre içerisinde toplam bedeli ve ALICI’ yı borç altına sokan belgeleri ALICI’ ya iade etmek ve 20 günlük süre içerisinde malı iade almakla yükümlüdür.</p>

                        <p>8.2.5.ALICI’ nın kusurundan kaynaklanan bir nedenle malın değerinde bir azalma olursa veya iade imkânsızlaşırsa ALICI kusuru oranında SATICI’ nın zararlarını tazmin etmekle yükümlüdür. Ancak cayma hakkı süresi içinde malın veya ürünün usulüne uygun kullanılmasın sebebiyle meydana gelen değişiklik ve bozulmalardan ALICI sorumlu değildir.</p>

                        <p>8.2.6.Cayma hakkının kullanılması nedeniyle SATICI tarafından düzenlenen kampanya limit tutarının altına düşülmesi halinde kampanya kapsamında faydalanılan indirim miktarı iptal edilir.</p>

                        <p>9. CAYMA HAKKI KULLANILAMAYACAK ÜRÜNLER</p>


                        <p>9.1.a) Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve satıcı veya sağlayıcının kontrolünde olmayan mal veya hizmetlere ilişkin sözleşmeler.</p>

                        <p>b) Tüketicinin istekleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallara ilişkin sözleşmeler.</p>

                        <p>c) Çabuk bozulabilen veya son kullanma tarihi geçebilecek malların teslimine ilişkin sözleşmeler.</p>

                        <p>ç) Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan mallardan; iadesi sağlık vehijyenaçısından uygun olmayanların teslimine ilişkin sözleşmeler.</p>

                        <p>d) Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan mallara ilişkin sözleşmeler.</p>

                        <p>e) Malın tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf malzemelerine, veri kaydedebilme ve veri depolama cihazlarına ilişkin sözleşmeler.</p>

                        <p>f) Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli yayınların teslimine ilişkin sözleşmeler.</p>

                        <p>g) Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma, araba kiralama, yiyecek-içecek tedariki ve eğlence veya dinlenme amacıyla yapılan boş zamanın değerlendirilmesine ilişkin sözleşmeler.</p>

                        <p>ğ) Elektronik ortamda anında ifa edilen hizmetler veya tüketiciye anında teslim edilengayrimaddimallara ilişkin sözleşmeler.</p>

                        <p>h) Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile ifasına başlanan hizmetlere ilişkin sözleşmeler.</p>

                        <p>Kozmetik ve kişisel bakım ürünleri, iç giyim ürünleri, mayo, bikini, kitap, kopyalanabilir yazılım ve programlar, DVD, VCD, CD ve kasetler ile kırtasiye sarf malzemeleri (toner, kartuş, şerit vb.) iade edilebilmesi için ambalajlarının açılmamış, denenmemiş, bozulmamış ve kullanılmamış olmaları gerekir.</p>

                        <p>9.2. ALICI, şikâyet ve itirazları konusunda başvurularını, aşağıdaki kanunda belirtilen parasal sınırlar dâhilinde tüketicinin yerleşim yerinin bulunduğu veya tüketici işleminin yapıldığı yerdeki tüketici sorunları hakem heyetine veya tüketici mahkemesine yapabilir. Parasal sınıra ilişkin bilgiler aşağıdadır:</p>

                        <p>01/01/2017 tarihinden itibaren geçerli olmak üzere, 2017 yılı için tüketici hakem heyetlerine yapılacak başvurularda değeri:</p>

                        <p>a) 2.400 (iki bin dört yüz) Türk Lirasının altında bulunan uyuşmazlıklarda ilçe tüketici hakem heyetleri,</p>

                        <p>b) Büyükşehir statüsünde olan illerde 2.400 (iki bin dört yüz) Türk Lirası ile 3.610 (üç bin altı yüz on) Türk Lirası arasındaki uyuşmazlıklarda il tüketici hakem heyetleri,</p>

                        <p>c) Büyükşehir statüsünde olmayan illerin merkezlerinde 3.610 (üç bin altı yüz on) Türk Lirasının altında bulunan uyuşmazlıklarda il tüketici hakem heyetleri,</p>

                        <p>ç) Büyükşehir statüsünde olmayan illere bağlı ilçelerde 2.400 (iki bin dört yüz) Türk Lirası ile 3.610 (üç bin altı yüz on) Türk Lirası arasındaki uyuşmazlıklarda il tüketici hakem heyetleri görevli kılınmışlardır.</p>

                        <p>İşbu Sözleşme ticari amaçlarla yapılmaktadır.</p>


                        <p>SATICI: MCA Enerji Dan. İnş. TAAH. DIŞ. TİC. GIDA TAR. VE HAYV. LTD. ŞTİ.</p>

                        <p>ALICI: {{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>TARİH: 15 Ocak 2021 </p>



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

                        <p>İşbu Sözleşme aşağıdaki taraflar arasında aşağıda belirtilen hüküm ve şartlar çerçevesinde imzalanmıştır. </p>

                        <p>A.‘ALICI’ ; (sözleşmede bundan sonra "ALICI" olarak anılacaktır)</p>

                        <p>B.‘SATICI’ ; (sözleşmede bundan sonra "SATICI" olarak anılacaktır)</p>

                        <p>AD- SOYAD: {{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>ADRES: Yukarıda belirtilen adres esas olarak alınacaktır. Sipariş tamamlandığında e-posta ile gönderilecektir.</p>

                        <p>İş bu sözleşmeyi kabul etmekle ALICI, sözleşme konusu siparişi onayladığı takdirde sipariş konusu bedeli ve varsa kargo ücreti, vergi gibi belirtilen ek ücretleri ödeme yükümlülüğü altına gireceğini ve bu konuda bilgilendirildiğini peşinen kabul eder.</p>

                        <p>2.TANIMLAR</p>

                        <p>İşbu sözleşmenin uygulanmasında ve yorumlanmasında aşağıda yazılı terimler karşılarındaki yazılı açıklamaları ifade edeceklerdir.</p>

                        <p>BAKAN: Gümrük ve Ticaret Bakanı’nı,</p>

                        <p>BAKANLIK: Gümrük ve Ticaret Bakanlığı’nı,</p>

                        <p>KANUN: 6502 sayılı Tüketicinin Korunması Hakkında Kanun’u,</p>

                        <p>YÖNETMELİK: Mesafeli Sözleşmeler Yönetmeliği’ni (RG:27.11.2014/29188)</p>

                        <p>HİZMET: Bir ücret veya menfaat karşılığında yapılan ya da yapılması taahhüt edilen mal sağlama dışındaki her türlü tüketici işleminin konusunu ,</p>

                        <p>SATICI: Ticari veya mesleki faaliyetleri kapsamında tüketiciye mal sunan veya mal sunan adına veya hesabına hareket eden şirketi,</p>

                        <p>ALICI: Bir mal veya hizmeti ticari veya mesleki olmayan amaçlarla edinen, kullanan veya yararlanan gerçek ya da tüzel kişiyi,</p>

                        <p>SİTE: SATICI’ya ait internet sitesini,</p>

                        <p>SİPARİŞ VEREN: Bir mal veya hizmeti SATICI’ya ait internet sitesi üzerinden talep eden gerçek ya da tüzel kişiyi,</p>

                        <p>TARAFLAR: SATICI ve ALICI’yı,</p>

                        <p>SÖZLEŞME: SATICI ve ALICI arasında akdedilen işbu sözleşmeyi,</p>

                        <p>MAL: Alışverişe konu olan taşınır eşyayı ve elektronik ortamda kullanılmak üzere hazırlanan yazılım, ses, görüntü ve benzeri gayri maddi malları ifade eder.</p>

                        <p>3.KONU</p>

                        <p>İşbu Sözleşme, ALICI’nın, SATICI’ya ait internet sitesi üzerinden elektronik ortamda siparişini verdiği aşağıda nitelikleri ve satış fiyatı belirtilen ürünün satışı ve teslimi ile ilgili olarak 6502 sayılı Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmelere Dair Yönetmelik hükümleri gereğince tarafların hak ve yükümlülüklerini düzenler.</p>

                        <p>Listelenen ve sitede ilan edilen fiyatlar satış fiyatıdır. İlan edilen fiyatlar ve vaatler güncelleme yapılana ve değiştirilene kadar geçerlidir. Süreli olarak ilan edilen fiyatlar ise belirtilen süre sonuna kadar geçerlidir.</p>

                        <p>4. SATICI BİLGİLERİ</p>

                        <p>Ünvanı: MCA Enerji Dan. İnş. TAAH. DIŞ. TİC. GIDA TAR. VE HAYV. LTD. ŞTİ.</p>

                        <p>Adres: Etiler mah. Bıyıklı Mehmet Paşa sok. No:20 D:12 34337 Beşiktaş / İstanbul</p>

                        <p>Telefon: 0850 305 09 15</p>

                        <p>Faks: 0850 305 09 15</p>

                        <p>Eposta: info@aurachake.com.tr</p>

                        <p>5. ALICI BİLGİLERİ</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukarıda belirtilen adres esas olarak alınacaktır. Sipariş tamamlandığında e-posta ile gönderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>6. SİPARİŞ VEREN KİŞİ BİLGİLERİ</p>

                        <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                        <p>Teslimat Adresi Yukarıda belirtilen adres esas olarak alınacaktır. Sipariş tamamlandığında e-posta ile gönderilecektir.</p>

                        <p>{{Auth::user()->phone}} </p>

                        <p>{{Auth::user()->email}} </p>

                        <p>7. SÖZLEŞME KONUSU ÜRÜN/ÜRÜNLER BİLGİLERİ</p>

                        <p>1. Malın /Ürün/Ürünlerin/ Hizmetin temel özelliklerini (türü, miktarı, marka/modeli, rengi, adedi) SATICI’ya ait internet sitesinde yayınlanmaktadır. Satıcı tarafından kampanya düzenlenmiş ise ilgili ürünün temel özelliklerini kampanya süresince inceleyebilirsiniz. Kampanya tarihine kadar geçerlidir.</p>

                        <p>7.2. Listelenen ve sitede ilan edilen fiyatlar satış fiyatıdır. İlan edilen fiyatlar ve vaatler güncelleme yapılana ve değiştirilene kadar geçerlidir. Süreli olarak ilan edilen fiyatlar ise belirtilen süre sonuna kadar geçerlidir.</p>

                        <p>7.3. Sözleşme konusu mal ya da hizmetin tüm vergiler dâhil satış fiyatı aşağıda gösterilmiştir.</p>

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


                    <p>Ödeme Şekli ve Planı: Kredi kartı ile ödeme</p>

                    <p>7.4. Ürün sevkiyat masrafı olan kargo ücreti ALICI tarafından ödenecektir.</p>

                    <p>8. FATURA BİLGİLERİ</p>

                    <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>

                    <p>Teslimat Adresi Yukarıda belirtilen adres esas olarak alınacaktır. Sipariş tamamlandığında e-posta ile gönderilecektir.</p>

                    <p>{{Auth::user()->phone}} </p>

                    <p>{{Auth::user()->email}} </p>

                    <p>Fatura teslim : Fatura sipariş tamamlandıktan sonra e-posta adresine gönderilecektir.</p>


                    <p>9. GENEL HÜKÜMLER</p>

                    <p>9.1. ALICI, SATICI’ya ait internet sitesinde sözleşme konusu ürünün temel nitelikleri, satış fiyatı ve ödeme şekli ile teslimata ilişkin ön bilgileri okuyup, bilgi sahibi olduğunu, elektronik ortamda gerekli teyidi verdiğini kabul, beyan ve taahhüt eder. ALICI’nın; Ön Bilgilendirmeyi elektronik ortamda teyit etmesi, mesafeli satış sözleşmesinin kurulmasından evvel, SATICI tarafından ALICI' ya verilmesi gereken adresi, siparişi verilen ürünlere ait temel özellikleri, ürünlerin vergiler dâhil fiyatını, ödeme ve teslimat bilgilerini de doğru ve eksiksiz olarak edindiğini kabul, beyan ve taahhüt eder.</p>

                    <p>9.2. Sözleşme konusu her bir ürün, 30 günlük yasal süreyi aşmamak kaydı ile ALICI' nın yerleşim yeri uzaklığına bağlı olarak internet sitesindeki ön bilgiler kısmında belirtilen süre zarfında ALICI veya ALICI’nın gösterdiği adresteki kişi ve/veya kuruluşa teslim edilir. Bu süre içinde ürünün ALICI’ya teslim edilememesi durumunda, ALICI’nın sözleşmeyi feshetme hakkı saklıdır. </p>

                    <p>9.3. SATICI, Sözleşme konusu ürünü eksiksiz, siparişte belirtilen niteliklere uygun ve varsa garanti belgeleri, kullanım kılavuzları işin gereği olan bilgi ve belgeler ile teslim etmeyi, her türlü ayıptan arî olarak yasal mevzuat gereklerine göre sağlam, standartlara uygun bir şekilde işi doğruluk ve dürüstlük esasları dâhilinde ifa etmeyi, hizmet kalitesini koruyup yükseltmeyi, işin ifası sırasında gerekli dikkat ve özeni göstermeyi, ihtiyat ve öngörü ile hareket etmeyi kabul, beyan ve taahhüt eder.</p>

                    <p>9.4. SATICI, sözleşmeden doğan ifa yükümlülüğünün süresi dolmadan ALICI’yı bilgilendirmek ve açıkça onayını almak suretiyle eşit kalite ve fiyatta farklı bir ürün tedarik edebilir.</p>

                    <p>9.5. SATICI, sipariş konusu ürün veya hizmetin yerine getirilmesinin imkânsızlaşması halinde sözleşme konusu yükümlülüklerini yerine getiremezse, bu durumu, öğrendiği tarihten itibaren 3 gün içinde yazılı olarak tüketiciye bildireceğini, 14 günlük süre içinde toplam bedeli ALICI’ya iade edeceğini kabul, beyan ve taahhüt eder. </p>

                    <p>9.6. ALICI, Sözleşme konusu ürünün teslimatı için işbu Sözleşme’yi elektronik ortamda teyit edeceğini, herhangi bir nedenle sözleşme konusu ürün bedelinin ödenmemesi ve/veya banka kayıtlarında iptal edilmesi halinde, SATICI’nın sözleşme konusu ürünü teslim yükümlülüğünün sona ereceğini kabul, beyan ve taahhüt eder.</p>

                    <p>9.7. ALICI, Sözleşme konusu ürünün ALICI veya ALICI’nın gösterdiği adresteki kişi ve/veya kuruluşa tesliminden sonra ALICI'ya ait kredi kartının yetkisiz kişilerce haksız kullanılması sonucunda sözleşme konusu ürün bedelinin ilgili banka veya finans kuruluşu tarafından SATICI'ya ödenmemesi halinde, ALICI Sözleşme konusu ürünü 3 gün içerisinde nakliye gideri SATICI’ya ait olacak şekilde SATICI’ya iade edeceğini kabul, beyan ve taahhüt eder.</p>

                    <p>9.8. SATICI, tarafların iradesi dışında gelişen, önceden öngörülemeyen ve tarafların borçlarını yerine getirmesini engelleyici ve/veya geciktirici hallerin oluşması gibi mücbir sebepler halleri nedeni ile sözleşme konusu ürünü süresi içinde teslim edemez ise, durumu ALICI'ya bildireceğini kabul, beyan ve taahhüt eder. ALICI da siparişin iptal edilmesini, sözleşme konusu ürünün varsa emsali ile değiştirilmesini ve/veya teslimat süresinin engelleyici durumun ortadan kalkmasına kadar ertelenmesini SATICI’dan talep etme hakkını haizdir. ALICI tarafından siparişin iptal edilmesi halinde ALICI’nın nakit ile yaptığı ödemelerde, ürün tutarı 14 gün içinde kendisine nakden ve defaten ödenir. ALICI’nın kredi kartı ile yaptığı ödemelerde ise, ürün tutarı, siparişin ALICI tarafından iptal edilmesinden sonra 14 gün içerisinde ilgili bankaya iade edilir. ALICI, SATICI tarafından kredi kartına iade edilen tutarın banka tarafından ALICI hesabına yansıtılmasına ilişkin ortalama sürecin 2 ile 3 haftayı bulabileceğini, bu tutarın bankaya iadesinden sonra ALICI’nın hesaplarına yansıması halinin tamamen banka işlem süreci ile ilgili olduğundan, ALICI, olası gecikmeler için SATICI’yı sorumlu tutamayacağını kabul, beyan ve taahhüt eder.</p>

                    <p>9.9. SATICININ, ALICI tarafından siteye kayıt formunda belirtilen veya daha sonra kendisi tarafından güncellenen adresi, e-posta adresi, sabit ve mobil telefon hatları ve diğer iletişim bilgileri üzerinden mektup, e-posta, SMS, telefon görüşmesi ve diğer yollarla iletişim, pazarlama, bildirim ve diğer amaçlarla ALICI’ya ulaşma hakkı bulunmaktadır. ALICI, işbu sözleşmeyi kabul etmekle SATICI’nın kendisine yönelik yukarıda belirtilen iletişim faaliyetlerinde bulunabileceğini kabul ve beyan etmektedir.</p>

                    <p>9.10. ALICI, sözleşme konusu mal/hizmeti teslim almadan önce muayene edecek; ezik, kırık, ambalajı yırtılmış vb. hasarlı ve ayıplı mal/hizmeti kargo şirketinden teslim almayacaktır. Teslim alınan mal/hizmetin hasarsız ve sağlam olduğu kabul edilecektir. Teslimden sonra mal/hizmetin özenle korunması borcu, ALICI’ya aittir. Cayma hakkı kullanılacaksa mal/hizmet kullanılmamalıdır. Fatura iade edilmelidir.</p>

                    <p>9.11. ALICI ile sipariş esnasında kullanılan kredi kartı hamilinin aynı kişi olmaması veya ürünün ALICI’ya tesliminden evvel, siparişte kullanılan kredi kartına ilişkin güvenlik açığı tespit edilmesi halinde, SATICI, kredi kartı hamiline ilişkin kimlik ve iletişim bilgilerini, siparişte kullanılan kredi kartının bir önceki aya ait ekstresini yahut kart hamilinin bankasından kredi kartının kendisine ait olduğuna ilişkin yazıyı ibraz etmesini ALICI’dan talep edebilir. ALICI’nın talebe konu bilgi/belgeleri temin etmesine kadar geçecek sürede sipariş dondurulacak olup, mezkur taleplerin 24 saat içerisinde karşılanmaması halinde ise SATICI, siparişi iptal etme hakkını haizdir.</p>

                    <p>9.12. ALICI, SATICI’ya ait internet sitesine üye olurken verdiği kişisel ve diğer sair bilgilerin gerçeğe uygun olduğunu, SATICI’nın bu bilgilerin gerçeğe aykırılığı nedeniyle uğrayacağı tüm zararları, SATICI’nın ilk bildirimi üzerine derhal, nakden ve defaten tazmin edeceğini beyan ve taahhüt eder.</p>

                    <p>9.13. ALICI, SATICI’ya ait internet sitesini kullanırken yasal mevzuat hükümlerine riayet etmeyi ve bunları ihlal etmemeyi baştan kabul ve taahhüt eder. Aksi takdirde, doğacak tüm hukuki ve cezai yükümlülükler tamamen ve münhasıran ALICI’yı bağlayacaktır.</p>

                    <p>9.14. ALICI, SATICI’ya ait internet sitesini hiçbir şekilde kamu düzenini bozucu, genel ahlaka aykırı, başkalarını rahatsız ve taciz edici şekilde, yasalara aykırı bir amaç için, başkalarının maddi ve manevi haklarına tecavüz edecek şekilde kullanamaz. Ayrıca, üye başkalarının hizmetleri kullanmasını önleyici veya zorlaştırıcı faaliyet (spam, virus, truva atı, vb.) işlemlerde bulunamaz.</p>

                    <p>9.15. SATICI’ya ait internet sitesinin üzerinden, SATICI’nın kendi kontrolünde olmayan ve/veya başkaca üçüncü kişilerin sahip olduğu ve/veya işlettiği başka web sitelerine ve/veya başka içeriklere link verilebilir. Bu linkler ALICI’ya yönlenme kolaylığı sağlamak amacıyla konmuş olup herhangi bir web sitesini veya o siteyi işleten kişiyi desteklememekte ve Link verilen web sitesinin içerdiği bilgilere yönelik herhangi bir garanti niteliği taşımamaktadır.</p>

                    <p>9.16. İşbu sözleşme içerisinde sayılan maddelerden bir ya da birkaçını ihlal eden üye işbu ihlal nedeniyle cezai ve hukuki olarak şahsen sorumlu olup, SATICI’yı bu ihlallerin hukuki ve cezai sonuçlarından ari tutacaktır. Ayrıca; işbu ihlal nedeniyle, olayın hukuk alanına intikal ettirilmesi halinde, SATICI’nın üyeye karşı üyelik sözleşmesine uyulmamasından dolayı tazminat talebinde bulunma hakkı saklıdır.</p>

                    <p>10. CAYMA HAKKI</p>

                    <p>10.1. ALICI; mesafeli sözleşmenin mal satışına ilişkin olması durumunda, ürünün kendisine veya gösterdiği adresteki kişi/kuruluşa teslim tarihinden itibaren 14 (on dört) gün içerisinde, SATICI’ya bildirmek şartıyla hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı reddederek sözleşmeden cayma hakkını kullanabilir. Hizmet sunumuna ilişkin mesafeli sözleşmelerde ise, bu süre sözleşmenin imzalandığı tarihten itibaren başlar. Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile hizmetin ifasına başlanan hizmet sözleşmelerinde cayma hakkı kullanılamaz. Cayma hakkının kullanımından kaynaklanan masraflar SATICI’ ya aittir. ALICI, iş bu sözleşmeyi kabul etmekle, cayma hakkı konusunda bilgilendirildiğini peşinen kabul eder.</p>

                    <p>10.2. Cayma hakkının kullanılması için 14 (ondört) günlük süre içinde SATICI' ya iadeli taahhütlü posta, faks veya eposta ile yazılı bildirimde bulunulması ve ürünün işbu sözleşmede düzenlenen "Cayma Hakkı Kullanılamayacak Ürünler" hükümleri çerçevesinde kullanılmamış olması şarttır. Bu hakkın kullanılması halinde, </p>

                    <p>a) 3. kişiye veya ALICI’ ya teslim edilen ürünün faturası, (İade edilmek istenen ürünün faturası kurumsal ise, iade ederken kurumun düzenlemiş olduğu iade faturası ile birlikte gönderilmesi gerekmektedir. Faturası kurumlar adına düzenlenen sipariş iadeleri İADE FATURASI kesilmediği takdirde tamamlanamayacaktır.)</p>

                    <p>b) İade formu,</p>

                    <p>c) İade edilecek ürünlerin kutusu, ambalajı, varsa standart aksesuarları ile birlikte eksiksiz ve hasarsız olarak teslim edilmesi gerekmektedir.</p>

                    <p>d) SATICI, cayma bildiriminin kendisine ulaşmasından itibaren en geç 10 günlük süre içerisinde toplam bedeli ve ALICI’yı borç altına sokan belgeleri ALICI’ ya iade etmek ve 20 günlük süre içerisinde malı iade almakla yükümlüdür.</p>

                    <p>e) ALICI’ nın kusurundan kaynaklanan bir nedenle malın değerinde bir azalma olursa veya iade imkânsızlaşırsa ALICI kusuru oranında SATICI’ nın zararlarını tazmin etmekle yükümlüdür. Ancak cayma hakkı süresi içinde malın veya ürünün usulüne uygun kullanılması sebebiyle meydana gelen değişiklik ve bozulmalardan ALICI sorumlu değildir. </p>

                    <p>f) Cayma hakkının kullanılması nedeniyle SATICI tarafından düzenlenen kampanya limit tutarının altına düşülmesi halinde kampanya kapsamında faydalanılan indirim miktarı iptal edilir.</p>

                    <p>11. CAYMA HAKKI KULLANILAMAYACAK ÜRÜNLER</p>

                    <p>ALICI’nın isteği veya açıkça kişisel ihtiyaçları doğrultusunda hazırlanan ve geri gönderilmeye müsait olmayan, iç giyim alt parçaları, mayo ve bikini altları, makyaj malzemeleri, tek kullanımlık ürünler, çabuk bozulma tehlikesi olan veya son kullanma tarihi geçme ihtimali olan mallar, ALICI’ya teslim edilmesinin ardından ALICI tarafından ambalajı açıldığı takdirde iade edilmesi sağlık ve hijyen açısından uygun olmayan ürünler, teslim edildikten sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan ürünler, Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli yayınlara ilişkin mallar, Elektronik ortamda anında ifa edilen hizmetler veya tüketiciye anında teslim edilen gayrimaddi mallar, ile ses veya görüntü kayıtlarının, kitap, dijital içerik, yazılım programlarının, veri kaydedebilme ve veri depolama cihazlarının, bilgisayar sarf malzemelerinin, ambalajının ALICI tarafından açılmış olması halinde iadesi Yönetmelik gereği mümkün değildir. Ayrıca Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile ifasına başlanan hizmetlere ilişkin cayma hakkının kullanılması da Yönetmelik gereği mümkün değildir.</p>

                    <p>Kozmetik ve kişisel bakım ürünleri, iç giyim ürünleri, mayo, bikini, kitap, kopyalanabilir yazılım ve programlar, DVD, VCD, CD ve kasetler ile kırtasiye sarf malzemeleri (toner, kartuş, şerit vb.) iade edilebilmesi için ambalajlarının açılmamış, denenmemiş, bozulmamış ve kullanılmamış olmaları gerekir. </p>

                    <p>12. TEMERRÜT HALİ VE HUKUKİ SONUÇLARI</p>

                    <p>ALICI, ödeme işlemlerini kredi kartı ile yaptığı durumda temerrüde düştüğü takdirde, kart sahibi banka ile arasındaki kredi kartı sözleşmesi çerçevesinde faiz ödeyeceğini ve bankaya karşı sorumlu olacağını kabul, beyan ve taahhüt eder. Bu durumda ilgili banka hukuki yollara başvurabilir; doğacak masrafları ve vekâlet ücretini ALICI’dan talep edebilir ve her koşulda ALICI’nın borcundan dolayı temerrüde düşmesi halinde, ALICI, borcun gecikmeli ifasından dolayı SATICI’nın uğradığı zarar ve ziyanını ödeyeceğini kabul, beyan ve taahhüt eder</p>

                    <p>13. YETKİLİ MAHKEME</p>

                    <p>İşbu sözleşmeden doğan uyuşmazlıklarda şikayet ve itirazlar, aşağıdaki kanunda belirtilen parasal sınırlar dâhilinde tüketicinin yerleşim yerinin bulunduğu veya tüketici işleminin yapıldığı yerdeki tüketici sorunları hakem heyetine veya tüketici mahkemesine yapılacaktır. Parasal sınıra ilişkin bilgiler aşağıdadır:</p>

                    <p>01/01/2017 tarihinden itibaren geçerli olmak üzere, 2017 yılı için tüketici hakem heyetlerine yapılacak başvurularda değeri:</p>

                    <p>a) 2.400 (iki bin dört yüz) Türk Lirasının altında bulunan uyuşmazlıklarda ilçe tüketici hakem heyetleri,</p>

                    <p>b) Büyükşehir statüsünde olan illerde 2.400 (iki bin dört yüz) Türk Lirası ile 3.610 (üç bin altı yüz on) Türk Lirası arasındaki uyuşmazlıklarda il tüketici hakem heyetleri,</p>

                    <p>c) Büyükşehir statüsünde olmayan illerin merkezlerinde 3.610 (üç bin altı yüz on) Türk Lirasının altında bulunan uyuşmazlıklarda il tüketici hakem heyetleri,</p>

                    <p>ç) Büyükşehir statüsünde olmayan illere bağlı ilçelerde 2.400 (iki bin dört yüz) Türk Lirası ile 3.610 (üç bin altı yüz on) Türk Lirası arasındaki uyuşmazlıklarda il tüketici hakem heyetleri görevli kılınmışlardır.</p>

                    <p>İşbu Sözleşme ticari amaçlarla yapılmaktadır.</p>

                    <p>14. YÜRÜRLÜK</p>

                    <p>ALICI, Site üzerinden verdiği siparişe ait ödemeyi gerçekleştirdiğinde işbu sözleşmenin tüm şartlarını kabul etmiş sayılır. SATICI, siparişin gerçekleşmesi öncesinde işbu sözleşmenin sitede ALICI tarafından okunup kabul edildiğine dair onay alacak şekilde gerekli yazılımsal düzenlemeleri yapmakla yükümlüdür. </p>

                    <p>SATICI: MCA Enerji Dan. İnş. TAAH. DIŞ. TİC. GIDA TAR. VE HAYV. LTD. ŞTİ.</p>

                    <p>ALICI: {{Auth::user()->name}} {{Auth::user()->surname}}</p>

                    <p>TARİH: 15 Ocak 2021 </p>
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