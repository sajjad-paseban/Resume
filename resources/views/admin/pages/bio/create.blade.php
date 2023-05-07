<div class="bg-white rounded shadow-sm p-2">
    {!! Form::open(['method'=>'POST','route'=>'admin.bio.store']) !!}
    <div class="title mx-1 my-2 position-relative">
        <h6>
            دریافت اطلاعات کاربر
        </h6>
        <div class="left-side">
            {!! Form::customSubmit() !!}
            {!! Form::customReset() !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('title','عنوان',['class'=>'']) !!}
        {!! Form::text('title',null,['class'=>'form-control form-control-sm'.($errors->has('title')? ' is-invalid':'')]) !!}
        @error('title')
            <p class="text-danger mt-2">
                {{$errors->first('title')}}
            </p>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('value','اطلاعات',['class'=>'']) !!}
        {!! Form::textarea('value',null,['class'=>'form-control form-control-sm'.($errors->has('value')? ' is-invalid':'')]) !!}
        @error('value')
            <p class="text-danger mt-2">
                {{$errors->first('value')}}
            </p>
        @enderror
    </div>
    {!! Form::close() !!}
</div>
