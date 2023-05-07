
@if (session()->has('profile'))
    @if (session()->get('profile') == 2)
        <script>
            new Toast({
                message:'اطلاعات شما با موفقیت بروزرسانی شد',
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

