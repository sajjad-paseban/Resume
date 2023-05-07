<section id="{{$id}}" @isset($class)class="{{$class}}"@endisset>
    <div class="section_title">
        <h3>{{$title}}</h3>
    </div>
    {{$slot}}
</section>
