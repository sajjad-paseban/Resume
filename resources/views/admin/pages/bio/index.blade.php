@extends('admin.index')
@section('js')
    @include('admin.pages.bio.notification')
@endsection
@section('content')
    @php
        Form::macro('customReset', function()
        {
            return '<button type="reset" class="btn btn-sm btn-danger px-1 py-0"><i class="material-icons">refresh</i></button>';
        });
        Form::macro('customSubmit', function()
        {
            return '<button type="submit" class="btn btn-sm btn-info px-1 py-0"><i class="material-icons">add</i></button>';
        });
        Form::macro('customDelete', function()
        {
            return '<button type="submit" class="btn btn-sm btn-danger px-1 py-0"><i class="material-icons">delete</i></button>';
        });
    @endphp
    <x-admin-page-header title="بیوگرافی" />
    <div class="row mt-4">
        <div class="col-sm">
            @include('admin.pages.bio.create')
        </div>
        <div class="col-sm">

            @foreach ($bios as $item)
                <div class="bg-white rounded shadow-sm p-2 mb-2">
                    <div class="title mx-1 my-2 position-relative">
                        <h6>
                            {{$item->title}}
                        </h6>
                        <div class="left-side">
                            {!! Form::open(['method'=>'DELETE','route'=>['admin.bio.destroy',$item->id]]) !!}
                            {!! Form::customDelete() !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <p id="info" class="my-3 mx-2 text-muted text-justify">
                        {{$item->value}}
                    </p>
                </div>
            @endforeach

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
        #eduAddBtn{
            position: absolute;
            left: 0;
            top: 0;
        }
        #info::before{
            content: '-';
        }
    </style>
@endsection

