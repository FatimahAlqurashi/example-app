@props([
  'tweet',
])
<div class="card mb-9">
  <div class="card-body p-8 py-4 px-7">

    {{-- In reply to --}}
    @if ($tweet->parentTweet)
        <div class="text-sm text-gray-500 mb-2">
            In reply to 
            <a href="{{ route('twwet.view', $tweet->parentTweet->id) }}" class="text-primary font-semibold hover:underline">
                {{ $tweet->parentTweet->user->name }}
            </a>
            :
            <span class="italic">"{{ \Illuminate\Support\Str::limit($tweet->parentTweet->content, 50) }}"</span>
        </div>
    @endif

    <p class="mb-8 text-slate-600">{{ $tweet->content }}</p>

    <div class="flex justify-between items-center">
      <div class="flex items-center gap-2">
        @if(request()->routeIs('home'))
          <a 
            href="{{ route('twwet.view', $tweet->baseTweet->id) }}" 
            class="btn btn-soft btn-secondary flex items-center gap-2 text-purple-900" 
            aria-label="Comment"
          >
            <span class="icon-[tabler--message-circle] size-5"></span>
          </a>
        @else
          <button 
            onclick="document.querySelector(`input[name='parent_tweet_id']`).value = {{ $tweet->id }}"
            class="btn btn-soft btn-secondary flex items-center gap-2 text-purple-900" 
            aria-label="Comment"
          >
            <span class="icon-[tabler--message-circle] size-5"></span>
          </button>
        @endif

        <button class="btn btn-soft btn-secondary text-pink-600 flex items-center gap-2">
          <span class="icon-[tabler--heart] size-5"></span>
        </button>

        <button class="btn btn-soft btn-secondary text-blue-400 flex items-center gap-2" aria-label="Repost">
          <span class="icon-[tabler--repeat] size-5"></span>
        </button>
      </div>

      <button class="btn btn-text flex items-center gap-2 text-slate-600 text-lg px-4 py-3">
        <span>{{ $tweet->user->name }}</span>
        <div class="avatar">
          <div class="size-9 rounded-full">
            <img src="/storage/{{ $tweet->user->avatar }}" alt="avatar" />
          </div>
        </div>
      </button>
    </div>

    {{-- Collapse Replies Toggle --}}
    @if (request()->routeIs('twwet.view') && $tweet->childTweets->count())
      <div class="mt-4">
        <button 
          type="button" 
          class="btn btn-soft btn-secondary text-pink-400 text-sm" 
          id="toggle-replies-{{ $tweet->id }}" 
          aria-expanded="false" 
          aria-controls="replies-{{ $tweet->id }}"
        >
          Show replies
        </button>
      </div>

      <div 
        id="replies-{{ $tweet->id }}" 
        class="hidden mt-3 ms-6 ps-2 space-y-2 border-s-2 border-pink-400"
        aria-labelledby="toggle-replies-{{ $tweet->id }}"
      >
        @foreach ($tweet->childTweets as $childTweet)
          <x-tweet :tweet="$childTweet" />
        @endforeach
      </div>
    @endif

  </div>
</div>

{{-- JavaScript للـ Collapse --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('toggle-replies-{{ $tweet->id }}');
    const content = document.getElementById('replies-{{ $tweet->id }}');

    if (button && content) {
      button.addEventListener('click', () => {
        const isHidden = content.classList.contains('hidden');
        content.classList.toggle('hidden', !isHidden);
        button.setAttribute('aria-expanded', isHidden);
        button.textContent = isHidden ? 'Hide replies': 'Show replies'
      });
    }
  });
</script>
