<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add New User') }}
    </h2>
  </x-slot>

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="block w-80 p-5 m-auto">
      <!-- First Name -->
      <div>
        <x-label for="first_name" :value="__('First name')" />

        <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
      </div>

      <!-- Last Name -->
      <div class="mt-4">
        <x-label for="Last Name" :value="__('Last name')" />

        <x-input id="last_name" class="block mt-1 w-auto w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
      </div>

      <!-- User Role -->
      <div class="mt-4">
        <x-label for="Role" :value="__('User Role')" />
        <select id="Role" name='role' class="block mt-1 w-full">
          <option value="Admin">Admin</option>
          <option value="Teacher">Teacher</option>
          <option value="Parent">Parent</option>
          <option value="Librarian">Librarian</option>
        </select>
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full"
        type="password"
        name="password"
        required autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" class="block mt-1 w-full"
        type="password"
        name="password_confirmation" required />
      </div>

      <div class="flex items-center justify-end mt-4">

        <x-button class="ml-4">
          {{ __('Add User') }}
        </x-button>
      </div>
    </div>
  </form>
</x-app-layout>
