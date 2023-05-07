@extends('admin.index')

@section('content')
    @php
        Form::macro('customSubmit', function()
        {
            return '<button type="submit" class="btn btn-sm btn-warning"><i class="material-icons">edit</i></button>';
        });
    @endphp
    <x-admin-page-header title="ویرایش مشتریان">
        <li class="breadcrumb-item"><a href="{{route('admin.clients.index')}}">برگشت</a></li>
    </x-admin-page-header>
    <div class="row my-4">
        <div class="col-sm my-1">
            <div class="bg-white rounded shadow-sm p-3">
                {!! Form::model($client,['id'=>'clientsInsertForm','files'=>true,'method'=>'PUT','route'=>['admin.clients.update',$client->id]]) !!}
                    <div class="title mx-1 my-1 position-relative">
                        <h6>
                            ویرایش مشتری فعلی
                        </h6>
                        <div class="btn-group" id="clientsAddBtn" role="group" aria-label="Basic example">
                            {!! Form::customSubmit() !!}
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    {!! Form::label('title','عنوان') !!}
                                    {!! Form::text('title',null,['id'=>'title','class'=>'form-control form-control-sm '.($errors->has('title')? 'is-invalid':''),'placeholder'=>'مثال: وبسایت چوبیران - آقای سرمدی']) !!}
                                    @error('title')
                                        <p class="text-danger mt-2">{{$errors->first('title')}}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    {!! Form::label('link','پیوند به') !!}
                                    {!! Form::text('link',null,['id'=>'link','class'=>'form-control form-control-sm '.($errors->has('link')? 'is-invalid':''),'placeholder'=>'مثال: https://google.com']) !!}
                                    @error('link')
                                        <p class="text-danger mt-2">{{$errors->first('link')}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    {!! Form::label('image_path','آپلود تصویر') !!}
                                    <div class="custom-file">
                                        {!! Form::file('image_path',['id'=>'image_path','class'=>'custom-file-input']) !!}
                                        <label class="custom-file-label" for="image_path">Choose file</label>
                                        <script>
                                            $('#image_path').on('change',(item)=>{
                                                $('.custom-file-label').text(item.target.files[0].name);
                                            })
                                        </script>
                                    </div>
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
        #clientsAddBtn{
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
@endsection

