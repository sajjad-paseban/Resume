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
    <x-admin-page-header title="مهارت ها جدید">
        <li class="breadcrumb-item"><a href="{{route('admin.skills.index')}}">برگشت</a></li>
    </x-admin-page-header>
    <div class="row my-4">
        <div class="col-sm my-1">
            <div class="bg-white rounded shadow-sm p-3">
                {!! Form::open(['id'=>'skillsInsertForm','method'=>'POST','route'=>'admin.skills.store']) !!}
                    <div class="title mx-1 my-1 position-relative">
                        <h6>
                            اضافه کردن به مهارت ها
                        </h6>
                        <div class="btn-group" id="skillsAddBtn" role="group" aria-label="Basic example">
                            {!! Form::customReset() !!}
                            {!! Form::customSubmit() !!}
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    {!! Form::label('title','عنوان مهارت') !!}
                                    {!! Form::text('title',null,['id'=>'title','class'=>'form-control form-control-sm '.($errors->has('title')? 'is-invalid':''),'placeholder'=>'مثال: bootstrap']) !!}
                                    @error('title')
                                        <p class="text-danger mt-2">{{$errors->first('title')}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="custom-progress bottom-right progress-down">
                                        {!! Form::label('percentage','سطح مهارت(درصدی)') !!}
                                        {!! Form::range('percentage',0,['min'=>'0','max'=>'100','id'=>'percentage','class'=>'custom-range progress-range-counter '.($errors->has('percentage')? 'is-invalid':'')]) !!}
                                        <div class="range-count"><span class="range-count-number" data-rangecountnumber="0">0</span> <span class="range-count-unit">%</span></div>
                                        <script>
                                            $('#percentage').on('input',(item)=>{
                                                $('.range-count-number').text(item.target.value)
                                            })
                                        </script>
                                        @error('percentage')
                                            <p class="text-danger mt-2">{{$errors->first('percentage')}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <script>

                </script>
            </div>
        </div>
    </div>
    <style>
        #skillsAddBtn{
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
@endsection
