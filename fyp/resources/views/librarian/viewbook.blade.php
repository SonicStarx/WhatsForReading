
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Library - Book Details') }}
    </h2>
  </x-slot>
  <a href="{{ route('librarymain') }}" class="p-5 ml-32 underline text-gray-600 hover:text-gray-900 flex"> Return to Library </a>
  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif

  <div class="row justify-content-center pl-56 pt-10 w-1/2">
    <div class="underline text-3xl leading-relaxed">
    <h1>{{$book->book_title}}</h1>
  </div>
    <div class="text-xl leading-relaxed">
    <p><strong>Book ID: </strong>{{$book->bookid}}</p>
    <p><strong>Author: </strong>{{$book->author}}</p>
    <p><strong>Category: </strong>{{$book->category}}</p>
    @if(isset($book->phonics_level))
    <p><strong>Phonics Level: </strong>{{$book->phonics_level}}</p>
    @else
    <p><strong>Phonics Level: </strong>Not assigned</p>
    @endif

    @if(isset($book->book_band))
    <p><strong>Book Band: </strong>{{$book->book_band}}</p>
    @else
    <p><strong>Book Band: </strong>Not assigned</p>
    @endif

    <p><strong>Available Quantity: </strong>{{$book->available_quantity}}</p>
    <p><strong>On Loan: </strong>{{$book->on_loan}}</p>

  </div>

  <div class="flex space-x-4 items-center justify-end mt-4">
    <a href="{{ route('editbook', [$book->bookid]) }}">
    <x-button class="ml-4">
      {{ __('Update') }}
    </x-button>
  </a>

    <a href="{{ route('deletebook', [$book->bookid]) }}" onclick="return confirm('Are you sure you would like to delete this book?')">
    <button class="items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 transition ease-in-out duration-150">
      {{ __('Delete') }}
    </button>
  </a>
  </div>
</div>

  </x-app-layout>
