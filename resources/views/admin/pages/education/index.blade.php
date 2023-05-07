@extends('admin.index')
@section('js')
    @include('admin.pages.education.notification')
@endsection
@section('content')
    <x-admin-page-header title="تحصیلات"/>
    <div class="row my-4">
        <div class="col-sm my-1">
            <div class="bg-white rounded shadow-sm p-3">
                <div class="title mx-1 my-1 position-relative">
                    <h6>
                        جدول تحصیلات
                    </h6>
                    <div class="left-side">
                        <a href="{{route('admin.education.create')}}" class="btn btn-primary shadow-none">تحصیلات جدید</a>
                    </div>
                </div>
                <div class="form-content">
                    @if (count($educationList) > 0)
                        <div class="table-responsive mt-4">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>نام دانشگاه</th>
                                        <th>مقطع و رشته تحصیلی</th>
                                        <th class="">از سال</th>
                                        <th>تا سال</th>
                                        <th>توضیحات بیشتر</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach ($educationList as $item)
                                        @php
                                            $counter++;
                                        @endphp
                                        <tr>
                                            <td class="text-center" style="font-family: 'yekan'">{{$counter}}</td>
                                            <td class="text-primary">{{$item->universityName}}</td>
                                            <td>{{$item->fieldOfStudy}}</td>
                                            <td style="font-family: 'yekan'">{{$item->from}}</td>
                                            <td style="font-family: 'yekan'">{{($item->to)? $item->to : 'تا به الان'}}</td>
                                            <td>{{($item->description)? $item->description : '-'}}</td>
                                            <td class="actions">
                                                <a class="btn btn-outline-warning px-3 py-1" href="{{route('admin.education.edit',$item->id)}}">
                                                    <span class="material-icons" id="trashButton">edit</span>
                                                </a>
                                                {!! Form::open(['method'=>'DELETE','route'=>['admin.education.destroy',$item->id]]) !!}
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

