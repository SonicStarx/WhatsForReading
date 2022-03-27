<div>
    <div class="form-group mb-5">
      <x-label for="category" class="block uppercase tracking-wide text-gray-700
       text-xs font- mb-2"> Filter books by category </x-label>

      <div>
        <select wire:model="selectedCategory"  class"form-control" wire:ignore>
          <option value="" selected> Choose category</option>
            <option value="Phonics"> Phonics </option>
            <option value="Fiction"> Fiction </option>
            <option value="Non-Fiction"> Non-Fiction </option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div>
        <select  class="livesearch form-control p-3"  id="livesearch" name="bookid" required>
          @if(!is_null($books))
          <option value="" selected> Choose book</option>
          @foreach ($books as $book)

            @if($book->category == "Phonics")
              <option name="bookid"value="{{$book->bookid}} ">
                [{{$book->phonics_level}}] {{$book->book_title}}</option>

            @elseif($book->category == "Fiction" || $book->category == "Non-Fiction")
              <option name="bookid"value="{{$book->bookid}} ">
                [{{$book->book_band}} band] {{$book->book_title}}</option>

            @endif

          @endforeach
          @else
          <option value="" selected> No books available</option>
          @endif
        </select>
      </div>
    </div>

</div>
@push('scripts')
<script>
$(document).ready(function() {
            window.initSelectStationDrop=()=>{
$('#livesearch').select2();
}
initSelectStationDrop();
            window.livewire.on('select2',()=>{
                initSelectStationDrop();
            });

        });

</script>
@endpush
