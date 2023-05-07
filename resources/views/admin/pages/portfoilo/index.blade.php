@extends('admin.index')
@section('js')
    @include('admin.pages.portfoilo.notification')
@endsection
@section('content')
    <x-admin-page-header title="نمونه کار" />
    <div class="row">
        <div class="col">
            <div class="main-panel shadow-sm rounded">
                <div class="panel-right">
                    <ul>
                        <li>
                            <x-admin-modal-button class="btn btn-primary btn-sm shadow-sm px-2 py-1" linkName='portfoilo_create_modal'>
                                <i class="material-icons text-white">
                                    add
                                </i>
                            </x-admin-modal-button>
                            @include('admin.pages.portfoilo.create')
                        </li>
                        <li>
                            <div class="categorey-list">
                                <h6>دسته بندی</h6>
                                <i class="material-icons categorey-icon">
                                    widgets
                                </i>
                                @include('admin.pages.portfoilo.portfoilo_categorey.index')
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-left">
                    <div class="portfoilo-list">
                        @foreach ($portfoilo as $item)
                            <div class="portfoilo-item">
                                <img src="{{asset('tmp/portfoilo/'.$item->image_path)}}" alt="">
                                <div class="portfoilo-item-cover">
                                    <h6>{{$item->categorey->title}}</h6>
                                    <span class="small">{{$item->title}}</span>
                                    {!! Form::open(['method'=>'DELETE','route'=>['admin.portfoilo.destroy',$item->id]]) !!}
                                    <button class="btn btn-danger btn-sm px-1 py-0 delete-btn" type="submit">
                                        <i class="material-icons">
                                            delete
                                        </i>
                                    </button>
                                    {!! Form::close() !!}
                                    <a href="{{asset('tmp/portfoilo/'.$item->image_path)}}" class="btn btn-info btn-sm px-1 py-0 visibility-btn" target="blank">
                                        <i class="material-icons position-relative" style="top: 2.5px;">
                                            visibility
                                        </i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .categorey-list{
            position: relative;
            font-family: yekan;
        }
        .categorey-list h6{
            font-size: 15px;
            font-weight: bold;
        }
        .categorey-icon{
            position: absolute;
            top: -3px;
            right: 0;
            font-size: 20px;
            color: #474fb1;
            opacity: 0.6;
        }
        .portfoilo-list{
            display: flex;
            flex-wrap: wrap;
        }
        .portfoilo-item{
            width: calc(25% - 40px);
            height: 220px;
            margin: 20px;
            position: relative;
            overflow: hidden;
        }
        .portfoilo-item-cover{
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8) !important;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            border-radius: 10px;
            overflow: hidden;
            display: none;
        }
        .portfoilo-item:hover .portfoilo-item-cover{
            display: block;
        }
        .portfoilo-item img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
        .portfoilo-item-cover span{
            position: absolute;
            color: #fff;
            bottom: 15px;
            right: 12px;
            font-size: 12px;
            font-family: yekan,calibri;

        }
        .portfoilo-item-cover h6{
            position: absolute;
            color: #fff;
            font-weight: bold;
            bottom: 28px;
            right: 10px;
            font-size: 18px;
            font-family: yekan,calibri;
        }
        .portfoilo-item-cover button.delete-btn{
            position: absolute;
            bottom: 10px;
            left: 10px;

        }
        .portfoilo-item-cover a.visibility-btn{
            position: absolute;
            bottom: 10px;
            left: 50px;
        }
        .categorey-list-item-color{
            width: 8px;
            height: 8px;
            display: inline-block;
            border-radius: 50%;
            position: relative;
            top: 1px;
        }
    </style>
@endsection
