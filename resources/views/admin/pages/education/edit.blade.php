@extends('admin.index')

@section('content')
    @php
        Form::macro('customSubmit', function()
        {
            return '<button type="submit" title="ویرایش اطلاعات" class="btn btn-sm btn-warning shadow-none"><i class="material-icons">save</i></button>';
        });
    @endphp
    <x-admin-page-header title="ویرایش تحصیل">
        <li class="breadcrumb-item"><a href="{{route('admin.education.index')}}">برگشت</a></li>
    </x-admin-page-header>
    <div class="row my-4">
        <div class="col-sm my-1">
            <div class="bg-white rounded shadow-sm p-3">
                {!! Form::model($edu,['id'=>'eduInsertForm','method'=>'PUT','route'=>['admin.education.update',$edu->id]]) !!}
                    <div class="title mx-1 my-1 position-relative">
                        <h6>
                            ویرایش کردن تحصیلات
                        </h6>
                        <div class="btn-group" id="eduAddBtn" role="group" aria-label="Basic example">
                            {!! Form::customSubmit() !!}
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    {!! Form::label('universityName','نام دانشگاه') !!}
                                    {!! Form::text('universityName',null,['id'=>'universityName','class'=>'form-control form-control-sm '.($errors->has('universityName')? 'is-invalid':''),'placeholder'=>'مثال: دانشگاه شریف']) !!}
                                    @error('universityName')
                                        <p class="text-danger mt-2">{{$errors->first('universityName')}}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    {!! Form::label('fieldOfStudy','مقطع و رشته تحصیلی') !!}
                                    {!! Form::text('fieldOfStudy',null,['id'=>'fieldOfStudy','class'=>'form-control form-control-sm '.($errors->has('fieldOfStudy')? 'is-invalid':''),'placeholder'=>'مثال: کارشناسی - مهندسی نرم افزار']) !!}
                                    @error('fieldOfStudy')
                                        <p class="text-danger mt-2">{{$errors->first('fieldOfStudy')}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    {!! Form::label('from','از سال') !!}
                                    {!! Form::Number('from',null,['id'=>'from','class'=>'form-control form-control-sm '.($errors->has('from')? 'is-invalid':''),'placeholder'=>'مثال: 1398']) !!}
                                    @error('from')
                                        <p class="text-danger mt-2">{{$errors->first('from')}}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    {!! Form::label('to','تا سال') !!}
                                    {!! Form::Number('to',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: 1400']) !!}
                                    <p class="point">خالی گذاشتن فیلد "تا سال" نشان دهنده این هست که شما در حال حاضر مشغول تحصیل هستید.</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description','توضیحات بیشتر') !!}
                            {!! Form::textarea('description',null,['class'=>'form-control form-control-sm']) !!}
                        </div>
                    </div>
                </form>
                <script>

                </script>
            </div>
        </div>
    </div>
    <style>
        #eduAddBtn{
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
@endsection
