
@if (session()->has('bio'))
    @if (session()->get('bio') == 1)
        <script>
            new Toast({
                message:'اطلاعات به بیوگرافی کاربر اضافه شد',
                type:'s'
            })
        </script>
    @endif
@endif


@if (session()->has('bio'))
    @if (session()->get('bio') == 0)
        <script>
            new Toast({
                message:'اطلاعات از بیوگرافی کاربر حذف شد',
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


