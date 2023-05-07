<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'iransans';
            src: url('../../../../resume/public/fonts/Sans a4fran3.ttf');
        }

        @font-face {
            font-family: 'tanha';
            src: url('../../../../resume/public/fonts/Tanha.ttf');
        }

        @font-face {
            font-family: 'vazir';
            src: url('../../../../resume/public/fonts/Vazir.ttf');
        }

        @font-face {
            font-family: 'yekan';
            src: url('../../../../resume/public/fonts/Yekan.ttf');
        }
        .background{
            background-image: url('https://wallpaperaccess.com/full/1409589.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .dark{
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8)
        }
        .content{
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }
        .content .title{
            display: flex;
            justify-content: end;
            align-items: flex-start;
            color: #fff;
            font-size: 50px;
            font-family: vazir;
            position: relative;
            top: 100px;
            right: 190px;
        }
        .content .title img{
            position: relative;
            top: 15px;
            margin-left: 10px;
        }
        .content .login{
            position: relative;
            top: 200px;
            left: 150px;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            font-family: vazir;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(255, 255, 255, 0.08)
        }
        .content .login form label{
            color: #fff;
            float: right;
            margin-bottom: 5px;
        }
        .content .login form a{
            font-size: 14px;
            text-decoration: none;
            display: block;
            text-align: right;
        }
        .content .login form a::after{
            content: '-';
        }
        .content .login form button{
            font-family: vazir;
            width: 100%;
        }
        .content .login form h5{
            color: #fff;
            text-align: center;
            font-family: yekan;
        }
        @media only screen and (min-width:0) and (max-width: 1000px){
            .content .login{
                position: absolute;
                width: 400px;
                left: 0;
                right: 0;
                margin: 0 auto;
            }
            .content .title{
                left: 0;
                top: 70px;
                justify-content: center;
                font-size: 30px;

            }
            .content .title img{
                top: 2px;
            }
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="dark"></div>
    </div>
    <div class="content">
        <div class="title">
            ورود به بخش مدیریت سامانه
            <img src="{{asset('admin/images/logo.png')}}" width="50" alt="">
        </div>
        <div class="login">
            {!! Form::open(['method'=>'POST','route'=>'login.check']) !!}
                <h5>
                    ورود به سامانه
                </h5>
                <div class="form-group my-3">
                    {!! Form::label('username','نام کاربری') !!}
                    {!! Form::text('username',null,['class'=>'form-control']) !!}
                    @error('username')
                        <p class="text-danger mt-2" style="text-align: right;">{{$errors->first('username')}}</p>
                    @enderror
                </div>
                <div class="form-group my-3">
                    {!! Form::label('password','گذرواژه') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                    @error('password')
                        <p class="text-danger mt-2" style="text-align: right;">{{$errors->first('password')}}</p>
                    @enderror
                </div>
                <a href="">
                    ارتباط با پشتیبانی
                </a>
                <a href="">
                    گذرواژه خود را فراموش کرده اید؟
                </a>
                <button class="btn btn-outline-primary mt-4">ورود به پنل مدیریت</button>
            {!! Form::close() !!}
        </div>
    </div>
</body>
</html>
