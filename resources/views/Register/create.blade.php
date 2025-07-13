<x-layouts.auth>
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endforeach
<form method="post" enctype="multipart/form-data" class="space-y-3">
  @csrf
  <div class="max-w-sm input-floating">
  <input type="file" required accept="image/*" class="input" id="avatar" name="avatar" />
  <label class="input-floating-label" for="avatar">profile picture</label>
  @error('avatar')
  <div class ="text-error helper-text ps-3 mb-2">
    {{ $message }}
  </div>
  @enderror
</div>
<div class="relative input-floating w-96">
  <span class="absolute inset-y-0 left-0 flex items-center pl-3">
    <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" stroke-width="1.5"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0"/>
    </svg>
  </span>
  <input
    type="text"
    name="name"
    placeholder="eg.reemaishere"
    class="input pl-10"
    id="floatingUserName"
    value="{{ old('username') }}"
    required
  />
  <label class="input-floating-label pl-6" for="floatingUserName">User Name</label>
  @error('name')
    <div class="text-sm text-pink-400 mt-1">{{ $message }}</div>
  @enderror
</div>

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
<div class="relative input-floating w-96">
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
    id="floatingPassword"
    required
    minlength="8"
  />
  <label class="input-floating-label pl-6" for="floatingPassword">Password</label>
</div>
<span class="helper-text text-sm text-pink-400">Must be at least 8 characters.</span>
@error('password')
  <div class="text-sm text-pink-400 mt-1">{{ $message }}</div>
@enderror
<div class="relative input-floating w-96">
  <span class="absolute inset-y-0 left-0 flex items-center pl-3">
    <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" stroke-width="1.5"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 3l7.5 4.5v4.749a8.25 8.25 0 01-4.92 7.524l-2.58 1.227-2.58-1.227a8.25 8.25 0 01-4.92-7.524V7.5L12 3z" />
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 12l2 2 4-4" />
    </svg>
  </span>
  <input
    type="password"
    name="password_confirmation"
    placeholder="Confirm your password"
    class="input pl-10"
    id="floatingConfirmPassword"
    required
  />
  <label class="input-floating-label pl-6" for="floatingConfirmPassword">Confirm Password</label>
</div>
<span class="helper-text text-sm text-pink-400 ">Must match the password.</span>
@error('password_confirmation')
  <div class="text-sm text-pink-400 mt-1">{{ $message }}</div>
@enderror

<button type="submit" class="btn btn-soft btn-primary waves waves-primary w-full mt-5">
  Create account
</button>

<span class="helper-text text-pink-400 ">
  Already have an account?
  <a href="/login" class="link link-hover text-pink-400">Log in</a>
</span>
</form>
</x-layouts.auth>

