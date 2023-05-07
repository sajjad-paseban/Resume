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
    <x-admin-page-header title="خدمات جدید">
        <li class="breadcrumb-item"><a href="{{route('admin.services.index')}}">برگشت</a></li>
    </x-admin-page-header>
    <div class="row my-4">
        <div class="col-sm my-1">
            <div class="bg-white rounded shadow-sm p-3">
                {!! Form::open(['id'=>'servicesInsertForm','method'=>'POST','route'=>'admin.services.store']) !!}
                    <div class="title mx-1 my-1 position-relative">
                        <h6>
                            اضافه کردن به خدمات
                        </h6>
                        <div class="btn-group" id="servicesAddBtn" role="group" aria-label="Basic example">
                            {!! Form::customReset() !!}
                            {!! Form::customSubmit() !!}
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    {!! Form::label('title','عنوان خدمات') !!}
                                    {!! Form::text('title',null,['id'=>'title','class'=>'form-control form-control-sm '.($errors->has('title')? 'is-invalid':''),'placeholder'=>'مثال: طراحی سایت']) !!}
                                    @error('title')
                                        <p class="text-danger mt-2">{{$errors->first('title')}}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    {!! Form::label('price','شروع مبلغ از(تومان)') !!}
                                    {!! Form::text('price',null,['id'=>'price','class'=>'form-control form-control-sm '.($errors->has('price')? 'is-invalid':''),'placeholder'=>'مثال: 5000000']) !!}
                                    @error('price')
                                        <p class="text-danger mt-2">{{$errors->first('price')}}</p>
                                    @enderror
                                    <script>
                                        $('#price').on('keyup',(item)=>{
                                            let val = item.target.value.replaceAll(',','')
                                            item.target.value = Number(val).toLocaleString();
                                        })
                                    </script>
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
        #servicesAddBtn{
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
@endsection

