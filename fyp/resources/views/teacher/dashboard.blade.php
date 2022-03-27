<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-lg p-6 bg-white border-b border-gray-200">
                    You're logged in. What would you like to do today?
                    <ul class="list-disc ml-10">
                      <br>
                      <li class="underline hover:text-blue-700"><a href="{{ route('classperformance') }}">View class performance </a></li>
                      <li class="underline hover:text-blue-700"><a href="{{ route('topicshome') }}">View or set topics </a></li>
                      <li class="underline hover:text-blue-700"><a href="{{ route('objectiveshome') }}">View learning objectives </a></li>
                      <li class="underline hover:text-blue-700"><a href="{{ route('readingrecords') }}">Check class reading records</a></li>
                      <li class="underline hover:text-blue-700"><a href="{{ route('newlist') }}">Create new reading list for this week </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
