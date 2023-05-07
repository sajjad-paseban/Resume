

@if (session()->has('skill'))
    @if (session()->get('skill') == 1)
        <script>
            new Toast({
                message:'اطلاعات با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @endif
@endif




@if (session()->has('skill'))
    @if (session()->get('skill') == 0)
        <script>
            new Toast({
                message:'اطلاعات با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @endif
@endif




@if (session()->has('skill'))
    @if (session()->get('skill') == 2)
        <script>
            new Toast({
                message:'اطلاعات با موفقیت ویرایش شد',
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

