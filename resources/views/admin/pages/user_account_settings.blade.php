@extends('admin.index')

@section('js')
    @include('admin.pages.notification')
@endsection

@section('content')
    <x-admin-page-header title="مدیریت پروفایل" />

    {!! Form::model($profile,['method'=>'PUT','route'=>['admin.profile.update',$profile->id],'files'=>true]) !!}
    <div class="row bg-white rounded shadow-sm my-3" style="min-height: 62px;">
        <div class="col">
            <button class="btn btn-primary shadow-none px-2 py-1 save-btn">
                <span>
                    ذخیره
                </span>
                <i class="material-icons">
                    save
                </i>
            </button>
        </div>
    </div>
    <div class="row bg-white rounded shadow-sm my-3 py-4">
        <div class="col">
            <div class="row title">
                <div class="col">
                    <h5>
                        <b>
                            - اطلاعات فرد
                        </b>
                    </h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-auto">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="image_file_card p-3 rounded m-3">
                                @if ($profile->image_path)
                                    <img id="img" src="{{asset('tmp/profile/'.$profile->image_path)}}" alt="">
                                @else
                                    <img id="img" src="data:image/png;base64,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" alt="">
                                @endif
                                {!! Form::file('image_path',['class'=>'d-none','id'=>'image_path']) !!}

                                <label for="image_path" class="text-primary">
                                    آپلود تصویر پروفایل
                                    <i class="material-icons">
                                        upload
                                    </i>
                                </label>
                                <script>
                                    $('#image_path').on('change',()=>{
                                        document.getElementById('img').src = URL.createObjectURL(document.getElementById('image_path').files[0]);
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('firstname','نام') !!}
                                {!! Form::text('firstname',null,['class'=>'form-control form-control-sm'.(($errors->has('firstname')) ? " is-invalid" : "")]) !!}
                                @error('firstname')
                                    <p class="text-danger mt-2 text-left">{{$errors->first('firstname')}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('lastname','نام خانوادگی') !!}
                                {!! Form::text('lastname',null,['class'=>'form-control form-control-sm'.(($errors->has('lastname')) ? " is-invalid" : "")]) !!}
                                @error('lastname')
                                    <p class="text-danger mt-2 text-left">{{$errors->first('lastname')}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('description','توصیف') !!}
                                {!! Form::text('description',null,['class'=>'form-control form-control-sm']) !!}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('expert','متخصص') !!}
                                {!! Form::text('expert',null,['class'=>'form-control form-control-sm']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('profession','حرفه') !!}
                                {!! Form::text('profession',null,['class'=>'form-control form-control-sm']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row bg-white rounded shadow-sm my-3 py-4">
        <div class="col">
            <div class="row title">
                <div class="col">
                    <h5>
                        <b>
                            - ارتباط با ما
                        </b>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('telephone','شماره تماس') !!}
                        {!! Form::text('telephone',null,['class'=>'form-control form-control-sm']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('email','پست الکترونیکی') !!}
                        {!! Form::text('email',null,['class'=>'form-control form-control-sm']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('address','آدرس') !!}
                        {!! Form::textarea('address',null,['class'=>'form-control form-control-sm']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row bg-white rounded shadow-sm my-3 py-4">
        <div class="col">
            <div class="row title">
                <div class="col">
                    <h5>
                        <b>
                            - درباره من
                        </b>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('aboutMe','درباره من') !!}
                        {!! Form::textarea('aboutMe',null,['class'=>'form-control form-control-sm']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row bg-white rounded shadow-sm my-3 py-4">
        <div class="col">
            <div class="row title">
                <div class="col">
                    <h5>
                        <b>
                            - فضای مجازی
                        </b>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group my-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon5">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/WhatsApp_icon.png/598px-WhatsApp_icon.png" width="29" alt="">
                          </span>
                        </div>
                        {!! Form::text('whatsapp',null,['class'=>'form-control form-control-sm','placeholder'=>'واتساپ']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="input-group my-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon5">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Telegram_logo.svg/2048px-Telegram_logo.svg.png" width="29" alt="">
                        </span>
                    </div>
                    {!! Form::text('telegram',null,['class'=>'form-control form-control-sm','placeholder'=>'تلگرام']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon5">
                            <img src="https://www.edigitalagency.com.au/wp-content/uploads/Twitter-logo-png.png" width="29" alt="">
                          </span>
                        </div>
                        {!! Form::text('twitter',null,['class'=>'form-control form-control-sm','placeholder'=>'توییتر']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="input-group my-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon5">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/2048px-Instagram_icon.png" width="29" alt="">
                            </span>
                        </div>
                        {!! Form::text('instagram',null,['class'=>'form-control form-control-sm','placeholder'=>'اینستاگرام']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <style>
        .save-btn{
            float: left;
            position: relative;
            top: 10px;
            font-family: 'vazir';

        }
        .save-btn span{
            position: relative;
            bottom: 4px;
            font-size: 14px;
        }

        .title h5{
            font-family: 'vazir';
        }

        .image_file_card{
            border: 1px solid #e0e6ed;
        }

        .image_file_card img{
            height: 150px;
            width: 150px;
            object-fit: cover;
            object-position: top;
            border-radius: 60%;
        }

        .image_file_card label{
            display: block;
            font-family: 'yekan';
            font-size: 13px;
            text-align: center;
            margin-top: 12px;
            font-weight: bold;
            cursor: pointer;
        }
        .image_file_card label i{
            position: relative;
            top: 6px;
        }
    </style>
@endsection
