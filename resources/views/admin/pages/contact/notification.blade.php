
@if (session()->has('contact'))
    @if (session()->get('contact') == 0)
        <script>
            new Toast({
                message:'پیام با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @endif
@endif

@if (session()->has(''))
    @if (session()->get(''))
        <script>
            new Toast({
                message:'',
                type:'s'
            })
        </script>
    @endif
@endif

