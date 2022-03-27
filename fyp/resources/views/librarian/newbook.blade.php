<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Library - Add new book') }}
    </h2>
  </x-slot>

  <a href="{{ route('librarymain') }}" class="p-5 ml-32 underline text-gray-600 hover:text-gray-900 flex"> Return to Library </a>
  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif

  <div class=" w-1/2 p-5 m-auto">
    <form method="POST" enctype="multipart/form-data" action="{{ route('storebook') }}">
      @method('PUT')
      @csrf

      <!-- Book Title -->
      <div class="book_title">
        <x-label for="book_title" :value="__('Book Title')" />
        <x-input id="book_title" class="block mt-1 w-full" type="text" name="book_title" :value="old('book_title')" required autofocus />
      </div>

      <!-- Author -->
      <div class="author mt-3">
        <x-label for="author" :value="__('Author')" />
        <x-input id="author" class="block mt-1 w-full" type="text" name="author" :value="old('author')" required autofocus />
      </div>

      <!-- Category -->
      <div class="category mt-3">
        <x-label for="category" :value="__('Category')" />
        <select id="category" name='category' class="block mt-1 w-full" required>
          <option value="Fiction">Fiction</option>
          <option value="Non-Fiction">Non-Fiction</option>
          <option value="Phonics">Phonics</option>
        </select>
      </div>

      <!-- Phonics Level -->
      <div class="phonics_level mt-3">
        <x-label for="phonics_level" :value="__('Phonics Level')"/>
        <select id="phonics_level" name='phonics_level' class="block mt-1 w-full">
          <option value=" ">N/A</option>
          <option value="Stage 1">Stage 1</option>
          <option value="Stage 2">Stage 2</option>
          <option value="Stage 3">Stage 3</option>
          <option value="Stage 4">Stage 4</option>
          <option value="Stage 5">Stage 5</option>
          <option value="Stage 6">Stage 6</option>
        </select>
      </div>

      <!-- Book Band -->
      <div class="book_band mt-3">
        <x-label for="book_band" :value="__('Book Band')"/>
        <select id="book_band" name='book_band' class="block mt-1 w-full">
          <option value=" ">N/A</option>
          <option value="Lilac">Lilac</option>
          <option value="Pink">Pink</option>
          <option value="Red">Red</option>
          <option value="Yellow">Yellow</option>
          <option value="Light Blue">Light Blue</option>
          <option value="Green">Green</option>
          <option value="Orange">Orange</option>
          <option value="Turquoise">Turquoise</option>
          <option value="Purple">Purple</option>
          <option value="Gold">Gold</option>
          <option value="White">White</option>
          <option value="Lime">Lime</option>
          <option value="Lime +">Lime +</option>
          <option value="Brown">Brown</option>
          <option value="Grey">Grey</option>
          <option value="Dark Blue">Dark Blue</option>
          <option value="Dark Red">Dark Red</option>
        </select>
      </div>

      <!-- Available Quantity -->
      <div class="available_quantity mt-3">
        <x-label for="available_quantity" :value="__('Book Quantity')"/>
        <x-input id="available_quantity" class="block mt-1 w-full" type="number" min="1" name="available_quantity" required autofocus />
      </div>

        <div class="flex items-center justify-end mt-4">
          <x-button class="ml-4">
            {{ __('Add Book') }}
          </x-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
