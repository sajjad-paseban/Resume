<x-admin-modal-box linkName="categorey_new_modal" title="دسته بندی جدید" method="post" route="admin.portifoilo-categorey.store">
    <div class="form-group m-0">
        {!! Form::label('title','عنوان',['class'=>'float-left']) !!}
        {!! Form::text('title',null,['class'=>'form-control form-control-sm'.(($errors->has('title')) ? " is-invalid" : "")]) !!}
        @error('title')
            <p class="text-danger mt-2 text-left">{{$errors->first('title')}}</p>
        @enderror
    </div>
    <div class="form-group mt-2">
        {!! Form::label('color','رنگ نوار دسته بندی',['class'=>'float-left']) !!}
        {!! Form::color('color',null,['class'=>'form-control form-control-sm'.(($errors->has('color')) ? " is-invalid" : "")]) !!}
        @error('color')
                <p class="text-danger mt-2 text-left">{{$errors->first('color')}}</p>
        @enderror
    </div>
</x-admin-modal-box>
