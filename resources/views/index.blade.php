<x-layouts.app>
<div class="space-y-8">
  @foreach ($tweets as $tweet)
   <x-tweet :tweet="$tweet" />
  @endforeach
 
</div>

</x-layouts.app>
