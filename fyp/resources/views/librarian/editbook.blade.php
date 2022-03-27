<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Library - Add new book') }}
    </h2>
  </x-slot>

  <a href="{{ route('viewbook', [$book->bookid]) }}" class="p-5 ml-32 underline text-gray-600 hover:text-gray-900 flex"> Return to Book Details </a>
  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  <div class=" w-1/2 p-5 m-auto">
    <form method="POST" action="{{ route('updatebook', [$book->bookid]) }}">
      @method('PUT')
      @csrf

      <!-- Book Title -->
      <div class="book_title">
        <x-label for="book_title" :value="__('Book Title')" />
        <x-input id="book_title" class="block mt-1 w-full" type="text" name="book_title" value="{{$book->book_title}}" required autofocus />
      </div>

      <!-- Author -->
      <div class="author mt-3">
        <x-label for="author" :value="__('Author')" />
        <x-input id="author" class="block mt-1 w-full" type="text" name="author" value="{{$book->author}}" required autofocus />
      </div>

      <!-- Category -->
      <div class="category mt-3">
        <x-label for="category" :value="__('Category')" />
        <select id="category" name='category' class="block mt-1 w-full" required>
          <option value="Fiction" @if('Fiction' == $book->category) selected @endif> Fiction</option>
          <option value="Non-Fiction" @if('Non-Fiction' == $book->category) selected @endif> Non-Fiction</option>
          <option value="Phonics" @if('Phonics' == $book->category) selected @endif> Phonics</option>
        </select>
      </div>

      <!-- Phonics Level -->
      <div class="phonics_level mt-3">
        <x-label for="phonics_level" :value="__('Phonics Level')"/>
        <select id="phonics_level" name='phonics_level' class="block mt-1 w-full">
          <option value=" ">N/A</option>
          <option value="Stage 1" @if('Stage 1' == $book->phonics_level) selected @endif> Stage 1</option>
          <option value="Stage 2" @if('Stage 2' == $book->phonics_level) selected @endif> Stage 2</option>
          <option value="Stage 3" @if('Stage 3' == $book->phonics_level) selected @endif> Stage 3</option>
          <option value="Stage 4" @if('Stage 4' == $book->phonics_level) selected @endif> Stage 4</option>
          <option value="Stage 5" @if('Stage 5' == $book->phonics_level) selected @endif> Stage 5</option>
          <option value="Stage 6" @if('Stage 6' == $book->phonics_level) selected @endif> Stage 6</option>
        </select>
      </div>

      <!-- Book Band -->
      <div class="book_band mt-3">
        <x-label for="book_band" :value="__('Book Band')"/>
        <select id="book_band" name='book_band' class="block mt-1 w-full" >
          <option value="Lilac" @if('Lilac' == $book->book_band) selected @endif>Lilac</option>
          <option value="Pink" @if('Pink' == $book->book_band) selected @endif>Pink</option>
          <option value="Red" @if('Red' == $book->book_band) selected @endif>Red</option>
          <option value="Yellow" @if('Yellow' == $book->book_band) selected @endif>Yellow</option>
          <option value="Light Blue" @if('Light Blue' == $book->book_band) selected @endif>Light Blue</option>
          <option value="Green" @if('Green' == $book->book_band) selected @endif>Green</option>
          <option value="Orange" @if('Orange' == $book->book_band) selected @endif>Orange</option>
          <option value="Turquoise" @if('Turquoise' == $book->book_band) selected @endif>Turquoise</option>
          <option value="Purple" @if('Purple' == $book->book_band) selected @endif>Purple</option>
          <option value="Gold" @if('Gold' == $book->book_band) selected @endif>Gold</option>
          <option value="White" @if('White' == $book->book_band) selected @endif>White</option>
          <option value="Lime" @if('Lime' == $book->book_band) selected @endif>Lime</option>
          <option value="Lime +" @if('Lime +' == $book->book_band) selected @endif>Lime +</option>
          <option value="Brown" @if('Brown' == $book->book_band) selected @endif>Brown</option>
          <option value="Grey" @if('Grey' == $book->book_band) selected @endif>Grey</option>
          <option value="Dark Blue" @if('Dark Blue' == $book->book_band) selected @endif>Dark Blue</option>
          <option value="Dark Red" @if('Dark Red' == $book->book_band) selected @endif >Dark Red</option>
        </select>
      </div>

      <!-- Available Quantity -->
      <div class="available_quantity mt-3">
        <x-label for="available_quantity" :value="__('Available Book Quantity')"/>
        <x-input id="available_quantity" class="block mt-1 w-full" type="number" min="1" name="available_quantity" value="{{$book->available_quantity}}" required autofocus />
      </div>

      <!-- Loan Quantity -->
      <div class="on_loan mt-3">
        <x-label for="on_loan" :value="__('On Loan Quantity')"/>
        <x-input onclick="quantityChange()" id="on_loan" class="block mt-1 w-full" type="number" min="0" name="on_loan" value="{{$book->on_loan}}" required autofocus />
      </div>

        <div class="flex items-center justify-end mt-4">
          <x-button class="ml-4">
            {{ __('Update Book') }}
          </x-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
