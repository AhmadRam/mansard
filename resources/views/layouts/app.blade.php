<!DOCTYPE HTML>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="30" />
    <meta name="author" content="mansard" />
    <meta name="keywords" content="face , body , spa" />
    <meta name="description" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{asset('../css/app.css') }}" rel="stylesheet">
    <link href="{{asset('../templates/yoo_master/favicon.ico') }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link href="{{asset('../cache/template/gzip3d40.css?widgetkit-564c16b7-df9920a2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../plugins/system/jce/css/content00c7.css?1f9be42a721c35e62e7367483666a9d9') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../cache/template/gzipfb2a.css?bootstrap-5ebeb66d.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../media/mod_languages/css/template00c7.css?1f9be42a721c35e62e7367483666a9d9') }}" rel="stylesheet" type="text/css" />
    <link href="../../media/tabs/css/style.min617c.css?v=7.1.7.p" rel="stylesheet" type="text/css" />

    <link href="{{asset('../js/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('../js/bootstrap-datepicker/locales/bootstrap-datepicker.tr.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('../js/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

    <script type="application/json" class="joomla-script-options new">
        {
            "csrf.token": "9a3ebb515bd8a2bb8002de30d0b7150d",
            "system.paths": {
                "root": "",
                "base": ""
            }
        }
    </script>
    <script src="{{asset('../cache/template/gzip6b25.js?jquery.min-65962342.js') }}" type="text/javascript"></script>
    <script src="{{asset('../cache/template/gzip87b0.js?jquery-noconflict-0932c23f.js') }}" type="text/javascript"></script>
    <script src="{{asset('../cache/template/gzipcf1e.js?jquery-migrate.min-af1fdba5.js') }}" type="text/javascript"></script>
    <script src="{{asset('../cache/template/gzip9f8e.js?widgetkit-cbf26af4-bc29274c.js') }}" type="text/javascript"></script>
    <script src="{{asset('../cache/template/gzipd91e.js?bootstrap.min-efb981dc.js') }}" type="text/javascript"></script>
    <script src="{{asset('../cache/template/gzip77e4.js?core-0f04dba1.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
    </script>
    <link href="{{asset('fr/index.html') }}" rel="alternate" hreflang="x-default" />

    <link rel="apple-touch-icon-precomposed" href="{{asset('../templates/yoo_master/apple_touch_icon.png') }}" />
    <link rel="stylesheet" href="{{asset('../cache/template/gzipae8f.css?template-ec521a7d.css') }}" />
    <script src="{{asset('../cache/template/gzip8ea0.js?template-33d4dffc.js') }}"></script>
</head>

<body id="page" class="page  isblog " data-config='{"twitter":0,"plusone":0,"facebook":0}'>
    <div class="wrapper clearfix">
        <header id="header">
            <div id="headerbar" class="clearfix">
                <a id="logo" href="{{route('index',app()->getLocale())}}">
                    <img alt="Logo Mansard" src="{{asset('images/deco-site/Logo_Mansard.jpg') }}" class="size-auto" height="80" width="250" /></a>
            </div>
            <div id="menubar" class="clearfix">
                <nav id="menu">
                    <ul class="menu menu-dropdown">
                        <li class="level1 item191 {{Route::is('index') ? 'active' : ''}} current"><a href="{{route('index',app()->getLocale())}}" class="level1 active current"><span>{{__('Home')}}</span></a></li>
                        <li class="level1 item192 {{Route::is('face') || isset($product->category_id) && $product->category_id !== 9 && $product->category_id !== 10 ? 'active' : ''}} parent"><a href="{{route('face',app()->getLocale())}}" class="level1 parent"><span>{{__('Face')}}</span></a>
                            <div class="dropdown columns3">
                                <div class="dropdown-bg">
                                    <div>
                                        <div class="width33 column">
                                            <ul class="nav-child unstyled small level2">
                                                <li class="level2 item193 parent"><span class="separator level2 parent"><span>{{__('CLEANSING')}}</span></span>
                                                    <ul class="nav-child unstyled small level3">
                                                        @foreach($Product as $Pro)
                                                        @if($Pro->category_id == 2)
                                                        @if(app()->getLocale() == 'en')
                                                        <li class="level3 item194"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name}}</span></a></li>
                                                        @else
                                                        <li class="level3 item194"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name_tr}}</span></a></li>
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                </li>
                                            </ul>
                        </li>
                        <li class="level2 item197 parent"><span class="separator level2 parent"><span>{{__('CREAMS')}}</span></span>
                            <ul class="nav-child unstyled small level3">
                                @foreach($Product as $Pro)
                                @if($Pro->category_id == 3)
                                @if(app()->getLocale() == 'en')
                                <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name}}</span></a></li>
                                @else
                                <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name_tr}}</span></a></li>
                                @endif
                                @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
            </div>
            <div class="width33 column">
                <ul class="level2">
                    <li class="level2 item206 parent"><span class="separator level2 parent"><span>{{__('MASKS AND EXFOLIANTS')}}</span></span>
                        <ul class="nav-child unstyled small level3">
                            @foreach($Product as $Pro)
                            @if($Pro->category_id == 4)
                            @if(app()->getLocale() == 'en')
                            <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name}}</span></a></li>
                            @else
                            <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name_tr}}</span></a></li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="level2 item697 parent"><span class="separator level2 parent"><span>{{__('LIGHT WEIGHT CREAMS')}}</span></span>
                        <ul class="nav-child unstyled small level3">
                            @foreach($Product as $Pro)
                            @if($Pro->category_id == 6)
                            @if(app()->getLocale() == 'en')
                            <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name}}</span></a></li>
                            @else
                            <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name_tr}}</span></a></li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="width33 column">
                <ul class="level2">
                    <li class="level2 item211 parent"><span class="separator level2 parent"><span>{{__('SPECIFICS SKIN CARE')}}</span></span>
                        <ul class="nav-child unstyled small level3">
                            @foreach($Product as $Pro)
                            @if($Pro->category_id == 7)
                            @if(app()->getLocale() == 'en')
                            <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name}}</span></a></li>
                            @else
                            <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name_tr}}</span></a></li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="level2 item215 parent"><span class="separator level2 parent"><span>{{__('SERUMS')}}</span></span>
                        <ul class="nav-child unstyled small level3">
                            @foreach($Product as $Pro)
                            @if($Pro->category_id == 8)
                            @if(app()->getLocale() == 'en')
                            <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name}}</span></a></li>
                            @else
                            <li class="level3 item198"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level3"><span>{{$Pro->name_tr}}</span></a></li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
    </div>
    </div>
    </div>
    </li>
    <li class="level1 item327 {{isset($product->category_id) && $product->category_id == 9 ? 'active' : ''}} parent"><span class="separator level1 parent"><span>{{__('SPA')}}</span></span>
        <div class="dropdown columns1">
            <div class="dropdown-bg">
                <div>
                    <div class="width100 column">
                        <ul class="nav-child unstyled small level2">
                            @foreach($Product as $Pro)
                            @if($Pro->category_id == 9)
                            @if(app()->getLocale() == 'en')
                            <li class="level2 item329"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level2"><span>{{$Pro->name}}</span></a></li>
                            @else
                            <li class="level2 item329"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level2"><span>{{$Pro->name_tr}}</span></a></li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="level1 item222 {{isset($product->category_id) && $product->category_id == 10 ? 'active' : ''}} parent"><span class="separator level1 parent"><span>{{__('Body')}}</span></span>
        <div class="dropdown columns1">
            <div class="dropdown-bg">
                <div>
                    <div class="width100 column">
                        <ul class="nav-child unstyled small level2">
                            @foreach($Product as $Pro)
                            @if($Pro->category_id == 10)
                            @if(app()->getLocale() == 'en')
                            <li class="level2 item329"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level2"><span>{{$Pro->name}}</span></a></li>
                            @else
                            <li class="level2 item329"><a href="{{URL::route('product',[app()->getLocale(),$Pro->id])}}" class="level2"><span>{{$Pro->name_tr}}</span></a></li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="level1 item229 {{Route::is('rituel-fermete-anti-age') || Route::is('rituel-correcteur-rides-ciblees') || Route::is('rituel-revitalisant-eclat-intense') || Route::is('rituel-hydratant-repulpant') || Route::is('rituel-purifiant-equilibrant') || Route::is('rituel-apaisant-desensibilisant') || Route::is('french-riviera') || Route::is('discovery-rythmes-of-brazil') || Route::is('walk-in-the-kyoto-imperial-garden') || Route::is('exploration-of-the-siberian-taiga') || Route::is('stopover-at-taraho-i-garden') || Route::is('soin-cellu-tonic') || Route::is('soin-bio-energie') || Route::is('escape-in-the-moroccan-garden') ? 'active' : ''}} parent"><span class="separator level1 parent"><span>{{__('Salon treatments')}}</span></span>
        <div class="dropdown columns1">
            <div class="dropdown-bg">
                <div>
                    <div class="width100 column">
                        <ul class="nav-child unstyled small level2">
                            <li class="level2 item230"><a href="{{route('soin-bio-visage',app()->getLocale())}}" class="level2"><span>{{__('Soin Bio Visage')}}</span></a></li>
                            <li class="level2 item348 parent"><span class="separator level2 parent"><span>{{__('Skincare Rituals')}}</span></span>
                                <ul class="nav-child unstyled small level3">
                                    <li class="level3 item349"><a href="{{route('rituel-fermete-anti-age',app()->getLocale())}}" class="level3"><span>{{__('Anti Aging Firming Ritual')}}</span></a></li>
                                    <li class="level3 item350"><a href="{{route('rituel-correcteur-rides-ciblees',app()->getLocale())}}" class="level3"><span>{{__('Special Anti-Wrinkles Ritual')}}</span></a></li>
                                    <li class="level3 item351"><a href="{{route('rituel-revitalisant-eclat-intense',app()->getLocale())}}" class="level3"><span>{{__('Rituel Revitalisant Eclat Intense')}}</span></a></li>
                                    <li class="level3 item352"><a href="{{route('rituel-hydratant-repulpant',app()->getLocale())}}" class="level3"><span>{{__('Highly Moisturizing Ritual')}}</span></a></li>
                                    <li class="level3 item353"><a href="{{route('rituel-purifiant-equilibrant',app()->getLocale())}}" class="level3"><span>{{__('Balancing Purifying Ritual')}}</span></a></li>
                                    <li class="level3 item354"><a href="{{route('rituel-apaisant-desensibilisant',app()->getLocale())}}" class="level3"><span>{{__('Soothing Desensibilizing Ritual')}}</span></a></li>
                                </ul>
                            </li>
                            <li class="level2 item470 parent"><span class="separator level2 parent">
                                    <span>{{__('Spa Rituals')}}
                                    </span>
                                    <ul class="nav-child unstyled small level3">
                                        <li class="level3 item465"><a href="{{route('french-riviera',app()->getLocale())}}" class="level3"><span>{{__('French Riviera')}}</span></a></li>
                                        <li class="level3 item472"><a href="{{route('discovery-rythmes-of-brazil',app()->getLocale())}}" class="level3"><span>{{__('Rythmes of Brazil')}}</span></a></li>
                                        <li class="level3 item473"><a href="{{route('walk-in-the-kyoto-imperial-garden',app()->getLocale())}}" class="level3"><span>{{__('Walk in the Kyoto Imperial garden')}}</span></a></li>
                                        <li class="level3 item474"><a href="{{route('escape-in-the-moroccan-garden',app()->getLocale())}}" class="level3"><span>{{__('Escape in the Moroccan garden')}}</span></a></li>
                                        <li class="level3 item475"><a href="{{route('exploration-of-the-siberian-taiga',app()->getLocale())}}" class="level3"><span>{{__('Exploration of the Siberian taiga')}}</span></a></li>
                                        <li class="level3 item476"><a href="{{route('stopover-at-taraho-i-garden',app()->getLocale())}}" class="level3"><span>{{__('Stopover at Taraho’i Garden')}}</span></a></li>
                                    </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="level1 item233 {{Route::is('our-values') || Route::is('history') ? 'active' : ''}} parent"><span class="separator level1 parent"><span>{{ __('Brand') }}</span></span>
        <div class="dropdown columns1">
            <div class="dropdown-bg">
                <div>
                    <div class="width100 column">
                        <ul class="nav-child unstyled small level2">
                            <li class="level2 item235"><a href="{{route('our-values',app()->getLocale())}}" class="level2"><span>{{ __('Our Values') }}</span></a></li>
                            <li class="level2 item234"><a href="{{route('history',app()->getLocale())}}" class="level2"><span>{{ __('Beauty Advice') }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="level1 item236 {{Route::is('contact') ? 'active' : ''}}"><a href="{{route('contact',app()->getLocale())}}" class="level1"><span>{{ __('Contact') }}</span></a></li>

    @guest
    <li class="level1 item233 {{Route::is('login') ? 'active' : ''}}">
        <a class="level1" href="{{ route('login',app()->getLocale()) }}"><span>{{ __('Login') }}</span></a>
    </li>
    @if (Route::has('register'))
    <li class="level1 item236 {{Route::is('register') ? 'active' : ''}}">
        <a class="level1" href="{{ route('register',app()->getLocale()) }}"><span>{{ __('Register') }}</span></a>
    </li>
    @endif
    @else
    <li class="level1 item233 {{Route::is('show.profile') || Route::is('change.pass') || Route::is('myorder') || Route::is('addres') ? 'active' : ''}} parent"><span class="separator level1 parent"><span>{{ Auth::user()->name }}</span></span>
        <div class="dropdown columns1">
            <div class="dropdown-bg">
                <div>
                    <div class="width100 column">
                        <ul class="nav-child unstyled small level2">
                            <li class="level2 item363"><a href="{{URL::route('show.profile',[app()->getLocale(),Auth::user()->address_id])}}" class="level2"><span>{{ __('Profile')}}</span></a></li>
                            <li class="level2 item363"><a href="{{route('change.pass',app()->getLocale())}}" class="level2"><span>{{__('Password')}}</span></a></li>
                            <li class="level2 item363"><a href="{{route('myorder',app()->getLocale())}}" class="level2"><span>{{ __('My Orders')}}</span></a></li>
                            <li class="level2 item363"><a href="{{URL::route('addres',[app()->getLocale() , Auth::user()->address_id])}}" class="level2"><span>{{ __('Address')}}</span></a></li>
                            <li class="level2 item329"><a href="{{ route('logout',app()->getLocale()) }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="level2"><span> {{ __('Logout') }}</span></a></li>
                            <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    @endguest

    </ul>



    </nav>


    <div id="language">
        <div class="module deepest">

            <div class="mod-languages">

                <ul class="lang-inline" dir="ltr">
                    <li class="level1 item236"><a href="{{ route('cart',app()->getLocale()) }}" class="text-685f52"><i class="fa ft-18 fa-shopping-cart"></i>(<span data-sayi="0" id="sepetAdet">@if(null !== session('cart')){{ session('orderCounter') }} @else 0 @endif</span>)</a></li>
                    <li>
                        <a href="{{ route(Route::currentRouteName(), ['tr',is_numeric(request()->segment(count(request()->segments()))) ? request()->segment(count(request()->segments())) : '']) }}">
                            <img src="{{asset('media/mod_languages/images/tr.gif') }}" alt="Turkça (TR)" title="Turkça (TR)" /> </a>
                    </li>
                    <li class="lang-active">
                        <a href="{{ route(Route::currentRouteName(), ['en',is_numeric(request()->segment(count(request()->segments()))) ? request()->segment(count(request()->segments())) : '']) }}">
                            <img src="{{asset('media/mod_languages/images/en.gif') }}" alt="English (UK)" title="English (UK)" /> </a>
                    </li>
                </ul>

            </div>

        </div>
    </div>

    </div>



    </header>
    <div id="main" class="grid-block">
        <div id="maininner" class="grid-box">
            <section id="content" class="grid-block">
                <div id="system-message-container">
                </div>
                <div id="system">

                    @yield('content')

                </div>
            </section>
        </div>
        <!-- maininner end -->
    </div>
    <footer id="footer">
        <div class="module deepest">

            <div style="width:100%;display:flex;">
                <div class="text-left" style="width:50%;">
                    <h3>BİLGİLER</h3>
                    <ul class="list-unstyled">
                        <li><a class="level1 item237" href="{{ route('about-us', app()->getLocale()) }}">Hakkımızda</a>
                        </li>
                        <li><a class="level1 item237"
                                href="{{ route('delivery-and-returns', app()->getLocale()) }}">Teslimat ve İade</a></li>
                        <li><a class="level1 item237"
                                href="{{ route('distance-sales-agreement', app()->getLocale()) }}">Mesafeli Satış
                                Sözleşmesi</a></li>
                        <li><a class="level1 item237" href="{{ route('contact', app()->getLocale()) }}">iletişim</a>
                        </li>
    
                    </ul>
                </div>
                <div style="width:50%;margin-top:40px;">
                    <img width="75%" src="{{ asset('../images/pay.png') }}" class="m-auto img-responsive">
                </div>
            </div>

            <ul class="menu menu-line">
                <li class="level1 item237"><span class="separator level1"><span>Copyright © Mansard</span>
                    </span>
                </li>
                <li class="level1 item489"><a href="https://www.instagram.com/mansard_france/" title="Suivez-nous sur Facebook" class="facebook level1" target="_blank" rel="noopener noreferrer"><span><span class="icon" style="background-image: url('{{asset('../images/deco-site/instagram.png') }}');">
                            </span>
                        </span>
                    </a>
                </li>
                <li class="level1 item467"><a href="https://www.facebook.com/pages/Laboratoires-Mansard/217222181774754?ref=hl" title="Suivez-nous sur Facebook" class="facebook level1" target="_blank" rel="noopener noreferrer"><span><span class="icon" style="background-image: url('{{asset('../images/deco-site/facebook.png') }}');">
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    </div>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-40667613-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script src="https://unpkg.com/imask"></script>
    <script type="text/javascript">
        var phoneMask = IMask(
            document.getElementById('phoneNumber'), {
                mask: '0 (000) 000 00 00'
            });
    </script>
</body>

<!-- Mirrored from www.mansard.com/en/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 21:40:06 GMT -->

</html>