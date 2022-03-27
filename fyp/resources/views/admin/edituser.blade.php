<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Existing User') }}
    </h2>
  </x-slot>

<a href="{{ route('admindash') }}" class="p-5 ml-32 underline text-gray-600 hover:text-gray-900 flex"> Return to all users </a>
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form method="POST" action="{{ route('update', [$user->id]) }}">
    @method('PUT')
    @csrf
    <div class="block w-80 p-5 m-auto">
      <!-- First Name -->
      <div>
        <x-label for="first_name" :value="__('First name')" />
        <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ $user->first_name }}" required autofocus />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
          <x-label for="Last Name" :value="__('Last name')" />
          <x-input id="last_name" class="block mt-1 w-auto w-full" type="text" name="last_name" value="{{ $user->last_name }}" required autofocus />
          </div>

          <!-- User Role -->
          <div class="mt-4">
            <x-label for="Role" :value="__('User Role')" />
            <select id="Role" name='role' class="block mt-1 w-full">
              <option value="Admin" @if('Admin' == $user->role) selected @endif >Admin</option>
              <option value="Teacher"@if('Teacher' == $user->role) selected @endif >Teacher</option>
              <option value="Parent" @if('Parent' == $user->role) selected @endif>Parent</option>
              <option value="Librarian" @if('Librarian' == $user->role) selected @endif>Librarian</option>
            </select>
          </div>

          <!-- Email Address -->
          <div class="mt-4">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
              {{ __('Update User') }}
            </x-button>
          </div>
          </div>
        </form>
</x-app-layout>
