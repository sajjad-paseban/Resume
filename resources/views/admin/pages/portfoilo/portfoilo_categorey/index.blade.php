<ul>
    <li class="position-relative">
        <a href="">
            <span style="background-color: #05a;" class="categorey-list-item-color"></span>
            همه
        </a>
    </li>
    @foreach ($portfoilo_categorey as $item)
        <li class="position-relative">
            <a href="">
                <span style="background-color: {{$item->color}};" class="categorey-list-item-color"></span>
                {{$item->title}}
            </a>
            {!! Form::open(['method'=>'DELETE','route'=>['admin.portifoilo-categorey.destroy',$item->id]]) !!}
                <button class="position-absolute" style="background-color: transparent; outline: none;border: none;left:-5px;bottom:6px;padding: 0 !important;" type="submit">
                    <i class="material-icons text-danger" style="font-size: 20px;">
                        delete
                    </i>
                </button>
            {!! Form::close() !!}
        </li>
    @endforeach
</ul>
<x-admin-modal-button class="btn btn-sm btn-primary pt-2 mt-5" linkName="categorey_new_modal">
    دسته بندی جدید
</x-admin-modal-button>
@include('admin.pages.portfoilo.portfoilo_categorey.create')
