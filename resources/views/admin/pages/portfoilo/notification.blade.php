@if (session()->has('portfoilo'))
    @if (session()->get('portfoilo') == 1)
        <script>
            new Toast({
                message:'نمونه کار شما با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @endif
@endif

@if (session()->has('portfoilo'))
    @if (session()->get('portfoilo') == 0)
        <script>
            new Toast({
                message:'نمونه کار شما با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @endif
@endif

@if (session()->has('portfoilo_categorey'))
    @if (session()->get('portfoilo_categorey') == 1)
        <script>
            new Toast({
                message:'دسته بندی نمونه کار با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @endif
@endif

@if (session()->has('portfoilo_categorey'))
    @if (session()->get('portfoilo_categorey') == 0)
        <script>
            new Toast({
                message:'دسته بندی نمونه کار با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @endif
@endif

@if (session()->has('portfoilo_categorey'))
    @if (session()->get('portfoilo_categorey')[0] == -1)
        <script>
            new Toast({
                message:"{{session()->get('portfoilo_categorey')[1]}}",
                type:'danger'
            })
        </script>
    @endif
@endif
