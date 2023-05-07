@php
    $where_to_go = "#";
@endphp
@isset($to)
    @php
        $where_to_go = $to;
    @endphp
@endisset
<a href="{{$where_to_go}}">
    <img src="{{$src}}" alt="colorlib">
</a>
