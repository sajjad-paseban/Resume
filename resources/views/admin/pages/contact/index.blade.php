@extends('admin.index')
@section('js')
    @include('admin.pages.contact.notification')
@endsection
@section('content')
    <x-admin-page-header title="مدیریت پیام ها" />
    <div class="row justify-content-center my-4">
        <div class="col-md-10 p-0">
            <table class="msg-table">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>نام و نام خانوادگی</th>
                        <th>پست الکترونیکی</th>
                        <th>پیام</th>
                        <th>حذف پیام</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <x-admin-modal-button class="mr-2 btn btn-primary RTL btn-sm shadow-sm px-2 py-1" linkName='contact-message-{{$item->id}}'>
                                    <i class="material-icons text-white">
                                        visibility
                                    </i>
                                </x-admin-modal-button>
                                <div class="modal fade" id="contact-message-{{$item->id}}" role="dialog" aria-labelledby="contact-messageLabel-{{$item->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    نمایش پیام
                                                </h5>
                                                <button type="button" class="close position-relative" style="top: 10px;" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">
                                                        close
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="modal-body text-justify">
                                                {{$item->message}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','route'=>['admin.contact.destroy',$item->id]]) !!}
                                    <button type="submit" class="btn btn-danger shadow-sm px-2 py-1">
                                        <i class="material-icons" style="position: relative;top: 3px;">
                                            delete
                                        </i>
                                    </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <style>
        .msg-table{
            width: 100%;
        }
        thead{
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            background-color: #fff;
            color: #000;
            padding: 20px 0 !important;
            border-radius: 3px;
            box-shadow: 0px 2px 4px rgb(0 0 0 / 6%)
        }
        tbody
        {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
        tr{
            display: inline-flex;
            width: 100%;
        }
        tr th{
            display: inline-flex;
            width: 100%;
            justify-content: center;
        }
        tr td{
            display: inline-flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        tbody tr{
            background-color: #fff;
            border-radius: 3px;
            padding: 10px 0 !important;
            margin-top: 20px;
            box-shadow: 0px 2px 4px rgb(0 0 0 / 6%)
        }
    </style>
@endsection

