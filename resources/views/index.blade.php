<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{$profile->description}}">
        <meta name="keywords" content="{{$profile->firstname . ' ' . $profile->lastname}}, {{$profile->expert}}, {{$profile->profession}}, {{$profile->email}}">
        <meta name="author" content="{{$profile->firstname . ' ' . $profile->lastname}}">
        <meta name="application-name" content="برنامه رزومه ساز">
        <meta name="creator" content="سجاد پاسبان رضوی">
        <meta name="publisher" content="گروه برنامه نویسی پارسیان">
        <meta name="robots" content="index">
        <meta name="color-scheme" content="only light">


        {{-- @vite(['resources/scss/app.scss']) --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/Toast.css')}}">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
        <!-- /Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- Styles -->
        <title>
            رزومه کاری - {{$profile->firstname . ' ' . $profile->lastname}}

        </title>
    </head>
    <body class="light" data-dir="rtl">


        <div class="deebo_fn_main">

            <!-- Light/Dark Switcher -->
            <div class="deebo_fn_switcher_wrap">
                <label onclick="location.replace('{{route('home')}}')">
                    <i class="material-icons">home</i>
                </label>
                <label onclick="location.replace('{{route('admin.dashboard')}}')">
                    <i class="material-icons">key</i>
                </label>
            </div>

            <!-- /Light/Dark Switcher -->

            <!-- Overlay -->
            <div class="right_bar_overlay"></div>
            <!--/ Overlay -->

            <!-- MODALBOX -->
            <div class="deebo_fn_modalbox">
                <a class="extra_closer" href="#"></a>
                <div class="box_inner">
                    <a class="closer" href="#"><span></span></a>
                    <div class="modal_content">

                        <div class="modal_in">
                            <!-- Content comes from JS -->
                        </div>

                        <div class="fn__nav" data-from="" data-index="">
                            <a href="#" class="prev">
                                <span class="text">Prev</span>
                                <span class="arrow_wrapper"><span class="arrow"></span></span>
                            </a>
                            <a href="#" class="next">
                                <span class="text">Next</span>
                                <span class="arrow_wrapper"><span class="arrow"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /MODALBOX -->

            <!-- Overlay -->
            <div class="right_bar_overlay"></div>
            <!--/ Overlay -->

            <!-- MODALBOX -->
            <div class="deebo_fn_modalbox">
                <a class="extra_closer" href="#"></a>
                <div class="box_inner">
                    <a class="closer" href="#"><span></span></a>
                    <div class="modal_content">

                        <div class="modal_in">
                            <!-- Content comes from JS -->
                        </div>

                        <div class="fn__nav" data-from="" data-index="">
                            <a href="#" class="prev">
                                <span class="text">Prev</span>
                                <span class="arrow_wrapper"><span class="arrow"></span></span>
                            </a>
                            <a href="#" class="next">
                                <span class="text">Next</span>
                                <span class="arrow_wrapper"><span class="arrow"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /MODALBOX -->

            <!-- Modal CV Card -->
            <div class="deebo_fn_cv">

                <!-- CV Inner -->
                <div class="deebo_fn__cv">

                    <!-- CV Background -->
                    <div class="cv__bg"></div>
                    <div class="cv__bg2"></div>
                    <!-- /CV Background -->

                    <!-- CV Left Side -->
                    <div class="cv__header">
                        <div class="in">
                            <x-profile-box :src="asset('tmp/profile/'.$profile->image_path)" :firstname="$profile->firstname" :lastname="$profile->lastname"/>
                            <x-description>
                                {{$profile->description}}
                            </x-description>
                            <ul class="contact_info">
                                <x-contact-info-item src="https://cdn-icons-png.flaticon.com/512/3082/3082383.png" :text="$profile->address"/>
                                <x-contact-info-item src="https://cdn-icons-png.flaticon.com/512/5068/5068731.png" :text="$profile->telephone"/>
                                <x-contact-info-item src="https://icon-library.com/images/email-icon-black/email-icon-black-27.jpg" :text="$profile->email"/>
                            </ul>
                            <ul class="social">
                                <x-social-item :to='$profile->twitter' title='twitter.com' src="https://www.edigitalagency.com.au/wp-content/uploads/Twitter-logo-png.png" />
                                <x-social-item :to='$profile->whatsapp' title='whatsapp.com' src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/WhatsApp_icon.png/598px-WhatsApp_icon.png" />
                                <x-social-item :to='$profile->telegram' title='telegram.com' src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Telegram_logo.svg/2048px-Telegram_logo.svg.png" />
                                <x-social-item :to='$profile->instagram' title='instagram.com' src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/2048px-Instagram_icon.png" />
                            </ul>
                        </div>
                    </div>
                    <!-- /CV Left Side -->

                    <!-- /CV Content Side -->
                    <div class="cv__content">

                        <section id="hero-header" class="section_header">
                            <div class="content">
                                <div class="left_hero_header">
                                    <div class="circle">
                                        <div class="bg_img" data-bg-img="{{asset('tmp/profile/'.$profile->image_path)}}"></div>
                                        <img src="tmp/images/thumb/square.jpg" alt="" />
                                        <div class="circle_holder_blue"><span></span></div>
                                        <div class="circle_holder_orange"><span></span></div>
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="right_hero_header">
                                    <div class="my_self">
                                        <h4>درود! من یک</h4>
                                        <h2>
                                            <!-- It is animation title. You can change animation variation by changing extra class to one of next classes: zoom, rotate-1, letters type, letters rotate-2, loading-bar, slide, clip, letters rotate-3, letters scale, push. cd-headline class can not be removed.  -->
                                            <span class="cd-headline clip">
                                                <span class="cd-words-wrapper">
                                                  <b class="is-visible">{{$profile->expert}}</b>
                                                  <b>{{$profile->profession}}</b>
                                                </span>
                                            </span>
                                        </h2>
                                        <h4>هستم.</h4>
                                    </div>
                                </div>
                            </div>
                        </section>


                        <!-- CV: Biography Section -->

                        <x-cart id="cv_biography" title="بیوگرافی">
                            <p>{{$profile->aboutMe}}</p>
                            <div class="fn_cs_info_items">
                                <ul>
                                    @foreach ($bio as $item)
                                        <x-cs-info-item :title="$item->title" :value="$item->value" />
                                    @endforeach
                                </ul>
                            </div>
                        </x-cart>
                        <!-- /CV: Biography Section -->


                        <!-- CV: Education Section -->
                        @if(count($edu) > 0)
                            <x-cart id="cv_education" title="تحصیلات">
                                <div class="fn_cs_boxed_list">
                                    <ul>
                                        @foreach ($edu as $item)
                                            <li>
                                                <x-education-item :universityName='$item->universityName' :from='$item->from' :to='$item->to' :fieldOfStudy='$item->fieldOfStudy' :content='$item->description' />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </x-cart>
                        @endif
                        <!-- /CV: Education Section -->

                        <!-- CV: Experience Section -->
                        @if (count($exp) > 0)
                            <x-cart id="cv_experience" title="تجربه کاری">
                                <div class="fn_cs_boxed_list">
                                    <ul>
                                        @foreach ($exp as $item)
                                            <li>
                                                <x-experience-item :companyName='$item->companyName' :from='$item->from' :to='$item->to' :role='$item->role' :content='$item->content' />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </x-cart>
                        @endif
                        <!-- /CV: Experience Section -->


                        <!-- CV: Skills Section -->
                        @if (count($skills) > 0)
                            <x-cart id="cv_skills" title="مهارت ها">
                                <div class="fn_cs_progress_bar">
                                    @foreach ($skills as $item)
                                        <x-skill-item :skillName='$item->title' :percentage='$item->percentage' />
                                    @endforeach
                                </div>
                            </x-cart>
                        @endif
                        <!-- /CV: Skills Section -->


                        <!-- CV: Services Section -->
                        @if (count($services) > 0)
                            <x-cart id="cv_services" title="خدمات">
                                {{-- <p>I help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers and growing overall sales.</p> --}}
                                <div class="fn_cs_service_list">
                                    <ul>
                                        @foreach ($services as $item)
                                            <li>
                                                <x-service-item
                                                    :serviceName='$item->title'
                                                    :description='$item->description'
                                                    :price='$item->price' />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </x-cart>
                        @endif
                        <!-- /CV: Services Section -->


                        <!-- CV: Portfolio Section-->
                        @if ($portfoilo > 0)
                            <section id="cv_portfolio">
                                <div class="section_title">
                                    <h3>نمونه کارها</h3>
                                </div>

                                <!-- Portfolio Shortcode -->
                                <div class="fn_cs_portfolio">

                                    <!-- Portfolio Filter -->
                                    <div class="portfolio_filter">
                                        <ul>
                                            <li><a href="#" class="current" data-categorey-id="0">همه</a></li>
                                            @foreach ($portfoilo_categorey as $item)
                                                <li><a href="#" class="" data-categorey-id="{{$item->id}}">{{$item->title}}</a></li>
                                            @endforeach
                                            {{-- <li><a href="#" data-filter=".vimeo">Vimeo</a></li>
                                            <li><a href="#" data-filter=".soundcloud">Soundcloud</a></li>
                                            <li><a href="#" data-filter=".popup">Popup</a></li> --}}
                                        </ul>
                                    </div>
                                    <!-- /Portfolio Filter -->


                                    <!-- Portfolio List -->
                                    <div class="portfolio_list">
                                        <ul class="gallery_zoom grid">
                                        </ul>
                                    </div>
                                    <!-- /Portfolio List -->

                                </div>
                                <!-- /Portfolio Shortcode -->

                            </section>
                        @endif
                        <!-- /CV: Portfolio Section-->

                        <!-- CV: Clients Section -->
                        @if (count($clients) > 0)
                            <x-cart id="clients" title="مشتریان">
                                <div class="clients_wrapper">
                                    <ul>
                                        @foreach ($clients as $item)
                                            <li>
                                                <x-client-item :to='$item->link' src="{{asset('tmp/clients/'.$item->image_path)}}" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </x-cart>
                        @endif
                        <!-- /CV: Clients Section -->


                        <!-- CV: Contact Section -->
                        <x-cart id="contact" class="section_contact" title="ارتباط با من">

                            {!! Form::open(['class'=>'contact_form','method'=>'POST','route'=>'admin.contact.store']) !!}

                                <div class="items_wrap">
                                    <div class="items">
                                        <div class="item half">
                                            <div class="input_wrapper">
                                                {!! Form::text('name',null,['id'=>'name','placeholder'=>'نام و نام خانوادگی']) !!}
                                                @error('name')
                                                    <p style="color: red; font-size: 14px;">{{$errors->first('name')}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="item half">
                                            <div class="input_wrapper">
                                                {!! Form::text('email',null,['id'=>'email','placeholder'=>'پست الکترونیکی']) !!}
                                                @error('email')
                                                    <p style="color: red; font-size: 14px;">{{$errors->first('email')}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="input_wrapper">
                                            {!! Form::text('phone',null,['id'=>'phone','placeholder'=>'شماره تماس']) !!}
                                            @error('phone')
                                                    <p style="color: red; font-size: 14px;">{{$errors->first('phone')}}</p>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="input_wrapper">
                                                {!! Form::textarea('message',null,['id'=>'message','placeholder'=>'پیام']) !!}
                                                @error('message')
                                                    <p style="color: red; font-size: 14px;">{{$errors->first('message')}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="item">
                                            {!! Form::submit('ارسال پیام',null,['id'=>'send_message'])!!}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </x-cart>
                        <!-- CV: Contact Section -->


                    </div>
                    <!-- /CV Content Side -->

                </div>
                <!-- CV Inner -->
            </div>
            <!-- /Modal CV Card -->



        </div>


        @stack('script')

        <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/isotope.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/magnific.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/animated-headlines.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/waypoints.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/init.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/Toast.js')}}"></script>

        @if (session()->has('contact'))
            @if (session()->get('contact') == 1)
                <script>
                    new Toast({
                        message:'پیام شما با موفقیت ارسال شد',
                        type:'s'
                    })
                </script>
            @endif
        @endif
    </body>
</html>
