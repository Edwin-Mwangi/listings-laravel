<h1>{{$heading}}</h1>
@foreach ($listings as $listing)
<h2>
   <a href="/examples/{{$listing['id']}}">{{$listing['type']}}</a> 
</h2>
<p>{{$listing['base']}}</p>
@endforeach

<!-- many directives @foreach, @if, @unless -->