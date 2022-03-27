<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Create new reading list
    </h2>
  </x-slot>

  <a href="{{ route('newlist') }}" class="p-5  underline text-gray-600 hover:text-gray-900 flex"> Return to previous page </a>
  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif
  @if(Session::has('fail'))
  <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-8 py-3" role="alert">
    {{Session::get('fail')}}
  </div>
  @endif

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-1 bg-white border-b border-gray-200">
          <div class="row justify-content-center">

            @method('PUT')
            @csrf
            <p> Select a book for {{$pupil->first_name}} {{$pupil->last_name}} to read for the week </p>
            <div class="w-full md:w-1/2 px-3">
              <div class="flex flex-wrap -mx-3 mb-6">
                  <p> This pupil is currently reading <strong>{{$pupilp->reading_level}}</strong>
                              band books </p>
                  <p> This pupil is currently reading <strong>{{$pupilp->phonics_level}}</strong>
                              phonics books </p>
                </div>
              </div>

              <form method="POST" action=" {{ route('savenewlist', $pupil->pupilid) }}" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
                    <x-label class=" uppercase  text-gray-700   mb-2">
                      reading list for next 7 days from:
                    </x-label>
                    <div class="">
                      <x-input id="assigned_week" class="block mt-1 mb-5 md:w-30" type="date" name="assigned_week" :value="old('assigned_week')" required autofocus />
                    </div>

                  </div>
                </div>
              </div>
              @livewire('bookselection') <!--- this is what allows the category filter to change the books
                field depending on its selection--->

                <x-button  class="my-9" style="float:right"> Save Reading Entry </x-button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    @livewireScripts

@stack('scripts')

  </x-app-layout>
