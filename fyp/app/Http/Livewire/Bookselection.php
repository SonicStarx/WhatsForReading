<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;

class Bookselection extends Component
{
    public $category;
    public $books;

    public $selectedCategory = NULL;

    public function mount()
    {
      $this->books = Book::all();
      $this->category = collect();
    }

    public function render()
    {
        return view('livewire.bookselection');
    }

    public function updatedSelectedCategory($category)
    {
      $this->books = Book::where('category',$category)->get();
    }

    public function hydrate()
    {
        $this->emit('select2');
    }
}
?>
