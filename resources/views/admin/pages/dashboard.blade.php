@extends('admin.index')
@section('content')
    <div class="row my-3">
        <div class="col">
            <h4 class="heading">
                داشبورد
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-12">
            <div class="widget-info" data-color="blue">
                <div class="widget-info-icon">
                    <i class="material-icons">preview</i>
                    <h5>بازدید</h5>
                </div>
                <div class="widget-info-number">
                    <h3>
                        {{$visit_count}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-12">
            <div class="widget-info" data-color="green">
                <div class="widget-info-icon">
                    <i class="material-icons">mail</i>
                    <h5>پیام ها</h5>
                </div>
                <div class="widget-info-number">
                    <h3>
                        {{$messages_count}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-12">
            <div class="widget-info" data-color="red">
                <div class="widget-info-icon">
                    <i class="material-icons">person</i>
                    <h5>مشتریان</h5>
                </div>
                <div class="widget-info-number">
                    <h3>
                        {{$cliens_count}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-12">
            <div class="widget-info" data-color="yellow">
                <div class="widget-info-icon">
                    <i class="material-icons">support_agent</i>
                    <h5>خدمات</h5>
                </div>
                <div class="widget-info-number">
                    <h3>
                        {{$services_count}}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm col-12">
            <div class="row">
                <div class="col">
                    <div class="widget-progress">
                        <div class="widget-progress-header">
                            <h6>
                                مهارت ها
                            </h6>
                        </div>
                        <div class="widget-progress-body">
                            @foreach ($skills as $item)
                                <div class="widget-progress-body-item">
                                    <div class="w-browser-info d-flex justify-content-between">
                                        <h6>{{$item->title}}</h6>
                                        <p class="browser-count">
                                            {{$item->percentage}}%
                                        </p>
                                    </div>

                                    @php
                                        $class = '';
                                        if($item->percentage >= 0 && $item->percentage <= 25)
                                            $class = 'bg-gradient-danger';
                                        else if($item->percentage >= 26 && $item->percentage <= 50)
                                            $class = 'bg-gradient-warning';
                                        else if($item->percentage >= 51 && $item->percentage <= 75)
                                            $class = 'bg-gradient-primary';
                                        else if($item->percentage >= 76 && $item->percentage <= 100)
                                            $class = 'bg-gradient-success';
                                    @endphp
                                    <div class="w-browser-stats">
                                        <div class="progress" style="border-radius: 16px;">
                                            <div class="progress-bar {{$class}}" role="progressbar" style="width: {{$item->percentage}}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-sm col-12 my-1">
                    <div class="widget widget-table-one p-4">
                        <div class="widget-heading">
                            <h5 class="">نمونه کارها</h5>
                        </div>

                        <div class="widget-content">
                            @php
                                Illuminate\Support\Carbon::setLocale('fa_IR')
                            @endphp
                            @foreach ($portfoilo as $item)
                                <div class="transactions-list">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="icon" style="background-color: {{$item->categorey->color}};">
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4>{{$item->title}}</h4>
                                                <p class="meta-date">{{$item->categorey->title}}</p>
                                            </div>

                                        </div>
                                        <div class="t-rate rate-dec">
                                            <p><span>
                                                {{$item->created_at->diffForHumans()}}
                                            </span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm col-12 my-1">
                    <div class="widget-three">
                        <div class="widget-heading">
                            <h5 class="">تحصیلات</h5>
                        </div>
                        <div class="widget-content">

                            <div class="order-summary">

                                @foreach ($educations as $item)
                                    @php
                                        $class = '';
                                        if(!$item->to)
                                            $class = 'bg-gradient-primary';
                                        else
                                            $class = 'bg-gradient-danger';

                                    @endphp
                                    <div class="summary-list">
                                        <div class="w-summary-details">

                                            <div class="w-summary-info">
                                                <h6>{{$item->universityName}} , {{$item->fieldOfStudy}}</h6>
                                                <p class="summary-count">
                                                    {{$item->from}}
                                                    -
                                                    {{($item->to)? $item->to : 'تاکنون'}}
                                                </p>
                                            </div>

                                            <div class="w-summary-stats">
                                                <div class="progress">
                                                    <div class="progress-bar {{$class}}" role="progressbar" style="width: {{(!$item->to) ? 60 : 100}}%"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-12 my-2 my-sm-0">
            <div class="row">
                <div class="col">
                    <div class="widget-notification">
                        <div class="widget-notification-header">
                            <h6>
                                اعلامیه ها
                            </h6>
                        </div>
                        <div class="widget-notification-body widget-activity-three">
                            <div class="mt-container mx-auto">
                                <div class="timeline-line">
                                    @foreach ($messages as $item)
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot" data-original-title="" title="">
                                                <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>{{$item->name}}</h5>
                                                    <span class="">{{$item->created_at->diffForHumans()}}</span>
                                                </div>
                                                <p>{{substr($item->message,0,50)}} . . .</p>
                                                <div class="tags">
                                                    <div class="badge badge-primary my-1">مدیر سیستم</div>
                                                    <div class="badge badge-danger my-1">{{$item->email}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <div class="widget widget-card-four p-3">
                        <div class="widget-content">
                            <div class="w-content">
                                <div class="w-info">
                                    <h6 class="value">30</h6>
                                    <p class="">مدت زمان اعتبار محصول</p>
                                </div>
                                <div class="">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="widget d-flex flex-wrap justify-content-between px-4 py-3">
                        <div class="widget-profile">
                            <img src="http://localhost:3000/resume/public/tmp/profile/2023-05-03-20-20-29-339143103_1917546225298094_3947967846903806855_n.jpg" alt="">
                            <span>
                                سجاد پاسبان
                            </span>
                            <span class="role">
                                {{$profile->profession}} - {{$profile->expert}}
                            </span>
                        </div>
                        <div class="widget-icon">
                            <a href="{{route('logout')}}" class="logout-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            </a>
                        </div>
                        <div class="widget-menu justify-content-center">
                            <div class="widget-icon">
                                <a href="{{route('admin.profile.index')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                </a>
                            </div>
                            <div class="widget-icon">
                                <a href="{{route('home')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .heading{
            font-family: 'iransans',calibri;
        }
        .widget-info{
            display: flex;
            align-items: center;
            padding: 10px;
            margin: 5px 0;
            border-radius: 8px;
            transition: all 200ms;
            user-select: none;
        }
        .widget-info:hover{
            transform: scale(1.01);
            box-shadow: 0px 2px 4px rgb( 0 0 0 / 15%);
        }
        .widget-info[data-color='blue']{
            background-color: #c2d5ff;
        }
        .widget-info[data-color='blue'] .widget-info-icon i{
            color:#0081ff;
        }
        .widget-info[data-color='green']{
            background-color: #9EFF9F;
        }
        .widget-info[data-color='green'] .widget-info-icon i{
            color: #66BF49;
        }
        .widget-info[data-color='red']{
            background-color: #FBA297;
        }
        .widget-info[data-color='red'] .widget-info-icon i{
            color:#F06555;
        }
        .widget-info[data-color='yellow']{
            background-color: #FFA56D;
        }
        .widget-info[data-color='yellow'] .widget-info-icon i{
            color:#EE8748;
        }

        .widget-info-number{
            width: 60px;
            color: #515365;
            text-align: center;
            padding-top: 5px;
        }
        .widget-info-icon{
            width: calc(100% - 60px);
        }
        .widget-info-icon i{
            font-size: 40px;
        }
        .widget-info-icon h5{
            margin-top: 10px;
            color: #515365;
            font-family: iransans;
        }
        .widget-progress{
            background-color: #fff;
            border: 1px solid #e0e6ed;
            box-shadow: 0 0 40px 0 rgb(94 92 154 / 6%);
            border-radius: 6px;
            padding: 20px;
        }
        .widget-progress-header h6{
            font-family: iransans;
        }
        .widget-progress-body{
            padding-top: 20px;
        }
        .widget-notification{
            background-color: #fff;
            border: 1px solid #e0e6ed;
            box-shadow: 0 0 40px 0 rgb(94 92 154 / 6%);
            border-radius: 6px;
        }
        .widget-notification-header{
            border-bottom: 1px dotted #e0e6ed;
        }
        .widget-notification-header h6{
            font-family: iransans;
            margin: 20px;
        }
        .widget-notification-body{
            padding: 10px;
            margin: 10px;
            overflow-y: auto;
        }
        .widget-profile img{
            width: 45px;
            box-shadow: 0px 2px 4px rgb( 0 0 0 / 15%);
            border-radius: 50px;
            object-fit: cover;
        }
        .widget-profile span{
            font-family: 'vazir';
            font-size: 16px;
            margin-right: 10px;
            position: relative;
            bottom: 9px;
            color: #000;
        }
        .widget-profile span.role{
            font-size: 10px;
            position: relative;
            top: 10px;
            right: -102px;
            color: #888ea8;
        }
        .widget-icon{
            background-color: #e0e6ed;
            border-radius: 50px;
            transition: all 300ms;
        }
        .widget-icon:hover{
            transform: scale(1.05);
            box-shadow: 0px 2px 4px rgb( 0 0 0 / 15%);
        }
        .widget-icon svg{
            position: relative;
            top: 2.5px;
            height: 40px;
            width: 45px;
            padding: 8px;
            color: #56478e;
            fill: rgba(86, 71, 142, 0.34);
        }
        .widget-menu{
            display: flex;
            width: 100%;
            margin-top: 20px;

        }
        .widget-menu .widget-icon{
            margin: 0 5px;
        }
        .widget-menu .widget-icon svg{
            width: 45px;
            height: 45px;
            top: 0;
        }
    </style>
@endsection
