@extends('admin.index')

@section('content')
    @php
        Form::macro('customReset', function()
        {
            return '<button type="reset" class="btn btn-sm btn-danger"><i class="material-icons">refresh</i></button>';
        });
        Form::macro('customSubmit', function()
        {
            return '<button type="submit" class="btn btn-sm btn-info"><i class="material-icons">add</i></button>';
        });
    @endphp
    <x-admin-page-header title="تجربه های کاری جدید">
        <li class="breadcrumb-item"><a href="{{route('admin.experience.index')}}">برگشت</a></li>
    </x-admin-page-header>
    <div class="row my-4">
        <div class="col-sm my-1">
            <div class="bg-white rounded shadow-sm p-3">
                {!! Form::open(['id'=>'expInsertForm','method'=>'POST','route'=>'admin.experience.store']) !!}
                    <div class="title mx-1 my-1 position-relative">
                        <h6>
                            اضافه کردن به تجربه های کاری
                        </h6>
                        <div class="btn-group" id="expAddBtn" role="group" aria-label="Basic example">
                            {!! Form::customReset() !!}
                            {!! Form::customSubmit() !!}
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    {!! Form::label('companyName','نام شرکت') !!}
                                    {!! Form::text('companyName',null,['id'=>'companyName','class'=>'form-control form-control-sm '.($errors->has('companyName')? 'is-invalid':''),'placeholder'=>'مثال: گراف ']) !!}
                                    @error('companyName')
                                        <p class="text-danger mt-2">{{$errors->first('companyName')}}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    {!! Form::label('role','سمت') !!}
                                    {!! Form::text('role',null,['id'=>'role','class'=>'form-control form-control-sm '.($errors->has('role')? 'is-invalid':''),'placeholder'=>'مثال: برنامه نویس']) !!}
                                    @error('role')
                                        <p class="text-danger mt-2">{{$errors->first('role')}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    {!! Form::label('from','از سال') !!}
                                    {!! Form::Number('from',null,['id'=>'from','class'=>'form-control form-control-sm '.($errors->has('universityName')? 'is-invalid':''),'placeholder'=>'مثال: 1398']) !!}
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
        #expAddBtn{
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
@endsection
