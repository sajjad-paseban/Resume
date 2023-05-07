@extends('admin.index')
@section('js')
    @include('admin.pages.skills.notification')
@endsection
@section('content')
    <x-admin-page-header title="مهارت ها"/>
    <div class="row my-4">
        <div class="col-sm my-1">
            <div class="bg-white rounded shadow-sm p-3">
                <div class="title mx-1 my-1 position-relative">
                    <h6>
                        جدول مهارت ها
                    </h6>
                    <div class="left-side">
                        <a href="{{route('admin.skills.create')}}" class="btn btn-primary shadow-none">مهارت جدید</a>
                    </div>
                </div>
                <div class="form-content">
                    @if (count($skillsList) > 0)
                        <div class="table-responsive mt-4">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>عنوان مهارت</th>
                                        <th>سطح مهارت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach ($skillsList as $item)
                                        @php
                                            $counter++;
                                        @endphp
                                        <tr>
                                            <td class="text-center" style="font-family: 'yekan'">{{$counter}}</td>
                                            <td class="text-primary">{{$item->title}}</td>
                                            <td style="font-family: 'yekan'">%{{$item->percentage}}</td>
                                            <td class="actions">
                                                <a href="{{route('admin.skills.edit',$item->id)}}" class="btn btn-outline-warning px-3 py-1">
                                                    <span class="material-icons" id="trashButton">edit</span>
                                                </a>
                                                {!! Form::open(['method'=>'DELETE','route'=>['admin.skills.destroy',$item->id]]) !!}
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

