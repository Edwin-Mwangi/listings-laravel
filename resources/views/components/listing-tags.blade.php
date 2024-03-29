{{-- comma separated tags from db in the prop --}}
@props(['tagsCsv'])

{{-- convert the str to array based on the commas --}}
@php
    $tags = explode(',', $tagsCsv);
@endphp

{{-- loop thru array tags in ul --}}
<ul class="flex">
    @foreach ($tags as $tag)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
    >
        {{-- since will be clicking on each tag we also change href to tag query--}}
        <a href="/listings/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
  