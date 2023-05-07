
<x-admin-modal-box linkName='portfoilo_create_modal' title='نمونه کار جدید' method='POST' route='admin.portfoilo.store' files=true>
    <div class="form-group mt-0">
        {!! Form::label('title','عنوان',['class'=>'float-left']) !!}
        {!! Form::text('title',null,['class'=>'form-control form-control-sm'.(($errors->has('title')) ? " is-invalid" : "")]) !!}
        @error('title')
                <p class="text-danger mt-2 text-left">{{$errors->first('title')}}</p>
        @enderror
    </div>
    <div class="form-group mt-0">
        {!! Form::label('categorey_id','دسته بندی',['class'=>'float-left']) !!}
        <select class="form-control form-control-sm @if($errors->has('categorey_id')) is-invalid @endif" name="categorey_id">
            <option value=''>لطفا یک گزینه را انتخاب نمایید</option>
            @foreach ($portfoilo_categorey as $item)
                <option value={{$item->id}}>{{$item->title}}</option>
            @endforeach
        </select>
        @error('categorey_id')
                <p class="text-danger mt-2 text-left">{{$errors->first('categorey_id')}}</p>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('image_sample','آپلود تصویر',['class'=>'float-left']) !!}
        {!! Form::file('image_sample',['class'=>'form-control form-control-sm'.(($errors->has('image_sample')) ? " is-invalid" : "")]) !!}
        @error('image_sample')
                <p class="text-danger mt-2 text-left">{{$errors->first('image_sample')}}</p>
        @enderror
    </div>
</x-admin-modal-box>
