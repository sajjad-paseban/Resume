<!-- Modal -->
@php
    $form[] = (isset($method)) ? $method : null;
    $form[] = (isset($route)) ? $route : null;
    $form[] = (isset($files)) ? $files : null;

@endphp
<div class="modal fade" id="{{$linkName}}" role="dialog" aria-labelledby="{{$linkName}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['method'=>$form[0],'route'=>$form[1],'files'=>$form[2]]) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
                <button type="button" class="close position-relative" style="top: 10px;" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">
                        close
                    </i>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="material-icons">
                        add
                    </i>
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
