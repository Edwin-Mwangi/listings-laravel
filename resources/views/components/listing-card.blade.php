{{-- a component --}}
{{-- must pass prop from parent similar to vue,props are in arrays --}}
@props(['listing'])

{{-- custom attr defined in the slot --}}
<x-card class="p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            {{-- asset helper used to show image assets from public --}}
            {{-- similar to url() from anchor tags --}}
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
             <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a> 
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            {{-- tags component called $ prop bound--}}
                <x-listing-tags :tagsCsv="$listing->tags"></x-listing-tags>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>{{$listing->location}}
            </div>
        </div>
    </div>
</x-card>