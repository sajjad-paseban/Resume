@extends('admin.index')

@section('content')
    @php
        Form::macro('customSubmit', function()
        {
            return '<button type="submit" class="btn btn-sm btn-warning"><i class="material-icons">edit</i></button>';
        });
    @endphp
    <x-admin-page-header title="ویرایش خدمات">
        <li class="breadcrumb-item"><a href="{{route('admin.services.index')}}">برگشت</a></li>
    </x-admin-page-header>
    <div class="row my-4">
        <div class="col-sm my-1">
            <div class="bg-white rounded shadow-sm p-3">
                {!! Form::model($service,['method'=>'PUT','route'=>['admin.services.update',$service->id]]) !!}
                    <div class="title mx-1 my-1 position-relative">
                        <h6>
                            ویرایش خدمت فعلی
                        </h6>
                        <div class="btn-group" id="servicesAddBtn" role="group" aria-label="Basic example">
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
                                    {!! Form::text('price',number_format($service->price),['id'=>'price','class'=>'form-control form-control-sm '.($errors->has('price')? 'is-invalid':''),'placeholder'=>'مثال: 5000000']) !!}
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

