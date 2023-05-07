@if (session()->has('clients'))
    @if (session()->get('clients') == 1)
        <script>
            new Toast({
                message:'اطلاعات با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @endif
@endif
@if (session()->has('clients'))
    @if (session()->get('clients') == 0)
        <script>
            new Toast({
                message:'اطلاعات با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @endif
@endif
@if (session()->has('clients'))
    @if (session()->get('clients') == 2)
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
