<x-app-layout>
  <x-slot name="header">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/accordion.css') }}">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Topics & Objectives') }}
    </h2>
  </x-slot>

  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <a href="{{ route('new_topic') }}">
            <x-button type="submit" style="float:right; margin:25px"> Add Topic </x-button>
          </a>
          <a href="{{ route('new_objective') }}">
            <x-button type="submit" style="float:right; margin:25px"> Add Objective </x-button>
          </a>
          <a href="{{ route('objectiveshome') }}">
            <x-button type="submit" style="float:left; margin:25px" onclick="LOView()"> View all Learning Objectives </x-button>
          </a>
          <div class=" mt-10">
            @if($Topics->isNotEmpty())
            @foreach($Topics as $topic)
            <div class="menu" style="width:100%">
              <li class="menu-item" id="{{ $topic->topic_title }}">
                <a href="#{{ $topic->topic_title }}" class="btn">
                  <i class="far fa-user"></i>
                  {{ $topic->topic_title }} &emsp; Scheduled Teaching: {{ $topic-> scheduled_teaching->format('d/m/Y')}}
                </a>
                <div class="menu-item__sub">
                  @foreach($LOs as $LO)
                    @if($topic->topicLO == $LO->LO_id)
                    <div class="inline">
                      <a value="{{ $topic->topicLO }}" href="{{ route('editobjective', [$LO->LO_id])}}">Learning Objective: {{ $LO->LO_title }}
                      <x-button type="submit" style="float:right; margin-bottom:0px"> Edit Objective </x-button>
                      </a>
                    </div>
                      <div class="inline">
                      <a style="float:right"value="{{ $topic->topicid}}" href="{{route('deletetopic', [$topic->id])}}"
                        onclick="return confirm('Are you sure you would like to delete this topic?')">
                      Delete Topic
                      </a>
                      <a style="float:right"value="{{ $topic->topicid}}" href="{{route('edittopic', [$topic->id])}}">
                      Edit Topic
                    </a>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endforeach
              </li>
            </div>
            @else
            <br>
            <br>
              <p class="text-xl" style="margin-left:25px"> No topics stored </p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
