@if (session()->has('message'))
    {{-- alpine js used --}}
    <div x-data="{show :true}" x-init="setTimeout(() => show = false, 3000)" x-show = "show" class="fixed left-1/2 top-0 translate-x-1/2 py-36 px-3 bg-laravel text-white">
        <p>{{session('message')}}</p>
    </div>
@endif