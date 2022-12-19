{{-- defining slot --}}
{{-- this slot is used by listing.blade.php check --}}

{{-- <div class="bg-gray-50 border border-gray-200 p-10 rounded">
    {{$slot}}
</div> --}}

{{-- for when we'll add custom classed in other files,they'll be merged here --}}
<div {{$attributes->merge(['class'=>'bg-gray-50 border border-gray-200 p-10 rounded'])}}>
    {{$slot}}
</div>
