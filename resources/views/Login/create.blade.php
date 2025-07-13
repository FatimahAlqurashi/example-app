<x-layouts.auth>
<form method="post" class="space-y-4">
  @csrf
 <div class="relative input-floating w-96">
  <span class="absolute inset-y-0 left-0 flex items-center pl-3">
    <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" stroke-width="1.5"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m0 0L12 13.5l9.75-6.75M2.25 6.75L12 13.5l9.75-6.75"/>
    </svg>
  </span>
  <input
    type="email"
    name="email"
    placeholder="eg.reemayasser@gmail.com"
    class="input pl-10"
    id="floatingEmail"
    value="{{ old('email') }}"
    required
  />
  <label class="input-floating-label pl-6" for="floatingEmail">Email</label>
  @error('email')
    <div class="text-sm text-pink-400 mt-1">{{ $message }}</div>
  @enderror
</div>
<div class="relative input-floating w-96 bg-transparent">
  <span class="absolute inset-y-0 left-0 flex items-center pl-3">
    <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" stroke-width="1.5"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M16.5 10.5V7.5a4.5 4.5 0 00-9 0v3M4.5 10.5h15v9a1.5 1.5 0 01-1.5 1.5h-12A1.5 1.5 0 014.5 19.5v-9z" />
    </svg>
  </span>


  <input
    type="password"
    name="password"
    placeholder="Enter your password"
    class="input pl-10"
    id="floatingInput"
    required
    minlength="8"
  />

 
  <label class="input-floating-label pl-6" for="floatingInput">Password</label>
</div>

  <button type="submit" class="btn btn-soft btn-primary waves waves-primary w-full mt-5">
    Log in
  </button>

  <span class="helper-text text-pink-400">
    Don't have an account?
    <a href="/register" class="link link-hover text-pink-400">Sign up</a>
  </span>
</form>

</x-layouts.auth>
