@extends('admin.index')
@section('js')
    @include('admin.pages.clients.notification')
@endsection
@section('content')
    <x-admin-page-header title="مشتریان"/>
    <div class="row my-4">
        <div class="col-sm my-1">
            <div class="bg-white rounded shadow-sm p-3">
                <div class="title mx-1 my-1 position-relative">
                    <h6>
                        جدول مشتریان
                    </h6>
                    <div class="left-side">
                        <a href="{{route('admin.clients.create')}}" class="btn btn-primary shadow-none">مشتری جدید</a>
                    </div>
                </div>
                <div class="form-content">
                    @if (count($clientsList) > 0)
                        <div class="table-responsive mt-4">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>عنوان</th>
                                        <th>پیوند به</th>
                                        <th class="">تصویر</th>
                                        <th>توضیحات بیشتر</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach ($clientsList as $item)
                                        @php
                                            $counter++;
                                        @endphp
                                        <tr>
                                            <td class="text-center" style="font-family: 'yekan'">{{$counter}}</td>
                                            <td class="text-primary">{{$item->title}}</td>
                                            <td>
                                                @if ($item->link)
                                                    <a href={{$item->link}} target="_blank">باز کردن</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->image_path)
                                                    <a href="{{asset('tmp/clients/'.$item->image_path)}}" target="_blank">بازکردن</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{($item->description)? $item->description : '-'}}</td>
                                            <td class="actions">
                                                <a href="{{route('admin.clients.edit',$item->id)}}" class="btn btn-outline-warning px-3 py-1">
                                                    <span class="material-icons" id="trashButton">edit</span>
                                                </a>
                                                {!! Form::open(['method'=>'DELETE','route'=>['admin.clients.destroy',$item->id]]) !!}
                                                    <button class="btn btn-outline-danger px-3 py-1">
                                                        <span class="material-icons" id="trashButton">delete</span>
                                                    </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <style>
        #trashButton{
            position: relative;
            top: 3px;
        }
        .actions form{
            display: inline !important;
        }
        .left-side{
            position: absolute;
            left: 0;
            top: -5px;
        }
    </style>
@endsection

