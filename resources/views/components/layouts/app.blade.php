<x-layouts.default>
      <nav class="navbar bg-base-100 rounded-box shadow-base-300/20 shadow-sm border-b-2 border-pink-300 ">
  <div class="flex flex-1 items-center">
    <a class="link text-pink-400 link-neutral text-xl font-bold no-underline " href="/">
      Echolet
    </a>
  </div>
  <div class="navbar-end flex items-center gap-4 sticky top-0 z-50 ">
<button class="btn btn-text square text-pink-400">
  <span class="icon-[tabler--search] size-7"></span>
</button>

    @if (Auth::check())
          <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
      <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        <div class="avatar">
          <div class="size-9.5 rounded-full">
          <img src="/storage/{{ Auth::user()->avatar }}" alt="avatar 1" />
          </div>
        </div>
      </button>
      <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-avatar">
        <li>
          <a class="dropdown-item text-pink-400" >
            <span class="icon-[tabler--user]"></span>
            My Profile
          </a>
        </li>

        <li class="dropdown-footer gap-2">
         <form method="post" action= "{{ route('logout') }}" class="w-full">
          @csrf
            <button type = "submit" class="btn btn-soft btn-block text-pink-400">
            <span class="icon-[tabler--logout]"></span>
            Sign out
         </button>
         </form>
        </li>
      </ul>
    </div>
    @else
    <a href="{{ route('login') }}">
          <button class="btn btn-text btn-square text-pink-400">
    <span class="icon-[tabler--login] size-7 "></span>
    </button>
    </a>
    @endif
      </div>
      </button>
      <div class="dropdown-menu dropdown-open:opacity-100 hidden" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-scrollable">
        <div class="dropdown-header justify-center">
          <h6 class="text-base-content text-base">Notifications</h6>
        </div>
        <div class="overflow-auto text-base-content/80 max-h-56 max-md:max-w-60">
          <div class="dropdown-item">
            <div class="avatar avatar-away-bottom">
              <div class="w-10 rounded-full">
                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
              </div>
            </div>
            <div class="w-60">
              <h6 class="truncate text-base">Charles Franklin</h6>
              <small class="text-base-content/50 truncate">Accepted your connection</small>
            </div>
          </div>
          <div class="dropdown-item">
            <div class="avatar">
              <div class="size-9.5 rounded-box">
                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-2.png" alt="avatar 2" />
              </div>
            </div>
            <div class="w-60">
              <h6 class="truncate text-base">Martian added moved Charts & Maps task to the done board.</h6>
              <small class="text-base-content/50 truncate">Today 10:00 AM</small>
            </div>
          </div>
          <div class="dropdown-item">
            <div class="avatar avatar-online-bottom">
              <div class="w-10 rounded-full">
                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-8.png" alt="avatar 8" />
              </div>
            </div>
            <div class="w-60">
              <h6 class="truncate text-base">New Message</h6>
              <small class="text-base-content/50 truncate">You have new message from Natalie</small>
            </div>
          </div>
          <div class="dropdown-item">
            <div class="avatar avatar-placeholder">
              <div class="bg-neutral text-neutral-content w-10 rounded-full p-2">
                <span class="icon-[tabler--user] size-full"></span>
              </div>
            </div>
            <div class="w-60">
              <h6 class="truncate text-base">Application has been approved 🚀</h6>
              <small class="text-base-content/50 text-wrap">Your ABC project application has been approved.</small>
            </div>
          </div>
          <div class="dropdown-item">
            <div class="avatar">
              <div class="w-10 rounded-full">
                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-10.png" alt="avatar 10" />
              </div>
            </div>
            <div class="w-60">
              <h6 class="truncate text-base">New message from Jane</h6>
              <small class="text-base-content/50 text-wrap">Your have new message from Jane</small>
            </div>
          </div>
          <div class="dropdown-item">
            <div class="avatar">
              <div class="w-10 rounded-full">
                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-3.png" alt="avatar 3" />
              </div>
            </div>
            <div class="w-60">
              <h6 class="truncate text-base">Barry Commented on App review task.</h6>
              <small class="text-base-content/50 truncate">Today 8:32 AM</small>
            </div>
          </div>
        </div>
        <a href="#" class="dropdown-footer justify-center gap-1">
          <span class="icon-[tabler--eye] size-4"></span>
          View all
        </a>
      </div>
    </div>
  </div>
</nav>
<div class="mt-8 flex-1">
    {{ $slot }}
</div>
<form method="post" action="{{ route('tweet.create') }}" class="border border-base-200 border-t-2 border-t-primary rounded-field sticky bottom-4 drop-shadow-2xl bg-base-100">
    @csrf
    <input type="hidden" name="parent_tweet_id" value="{{ request()->tweet?->id }}"/>

    <div class="textarea-floating">
        <textarea class="textarea border-0 resize-none" placeholder="Share your thoughts" id="content" name="content"></textarea>
        <label class="textarea-floating-label" for="content">What’s happening?</label>
    </div>

    <div class="p-2 pt-0">
        @error('content')
            <div class="text-pink-500 text-sm mb-2">{{ $message }}</div>
        @enderror

        @if (!Auth::check())
            <div class="text-pink-500 text-sm mb-3">
                You must be logged in to post a tweet.
            </div>
        @endif

        <button type="submit" class="btn btn-primary btn-soft text-pink-400" @if (!Auth::check())  @endif>
            Post
        </button>
    </div>
</form>
</x-layouts.default>

