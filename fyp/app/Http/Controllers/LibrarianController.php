<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use Illuminate\Validation\Rule;
use App\Enums\BookCategory;
use App\Enums\BookBand;
use App\Enums\PhonicsLevel;

class LibrarianController extends Controller
{
  public function librarymain()
  {
    $books = DB::table('books')
    ->orderBy('book_title', 'asc')
    ->paginate(20);
    if(Gate::allows('librarian-only', auth()->user())){
      return view ('librarian.library')->with(['book' => $books]);
    }
    return 'Sorry you do not have access to this page. Please contact a system administrator';
  }

  public function createbook()
  {
    return view ('librarian.newbook');
  }

  public function store(Request $request)
  {
    $request->validate([
      'book_title' => 'required|string|max:255',
      'author' => 'required|string|max:60',
      'category'=>'required',Rule::in(BookCategory::$types),
      'phonics_level'=> 'sometimes',Rule::in(PhonicsLevel::$types),
      'book_band'=>'sometimes',Rule::in(BookBand::$types),
      'available_quantity'=>'required|numeric|min:1',
      'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
    ]);

    if($request->hasFile('image'))
    {
      ($book = Book::create([
        'book_title' =>$request->book_title,
        'author' =>$request->author,
        'category'=>$request->category,
        'phonics_level'=>$request->phonics_level,
        'book_band'=>$request->book_band,
        'available_quantity'=>$request->available_quantity,
        'image'=>$request->file('file')->store('bookcovers'),
      ]));
    }
    else {
      ($book = Book::create([
        'book_title' =>$request->book_title,
        'author' =>$request->author,
        'category'=>$request->category,
        'phonics_level'=>$request->phonics_level,
        'book_band'=>$request->book_band,
        'available_quantity'=>$request->available_quantity,
        'image'=>'noimage.jpg',
      ]));
    }
    $book->save();
    return redirect()->back()->with('success', 'This book has been added');
  }

  public function editbook($bookid)
  {
    $book = Book::find($bookid);
    return view ('librarian.editbook', ['book' => $book]);
  }

  public function update(Request $request, $bookid)
  {
    $book = Book::find($bookid);

    $request->validate([
      'book_title' => 'required|string|max:255',
      'author' => 'required|string|max:60',
      'category'=>'required',Rule::in(BookCategory::$types),
      'phonics_level'=> 'sometimes',Rule::in(PhonicsLevel::$types),
      'book_band'=>'sometimes',Rule::in(BookBand::$types),
      'available_quantity'=>'required|numeric|min:0',
      'on_loan'=>'required|numeric|min:0',
    ]);

    $book->book_title = $request->input('book_title');
    $book->author = $request->input('author');
    $book->category = $request->input('category');
    $book->phonics_level = $request->input('phonics_level');
    $book->book_band = $request->input('book_band');
    $book->available_quantity = $request->input('available_quantity');
    $book->on_loan = $request->input('on_loan');
    $book->save();

    return redirect(route('viewbook', [$book->bookid]))->with('success','This book has been successfully updated');
  }

  public function viewbook($bookid)
  {
    $book = Book::find($bookid);
    return view('librarian.viewbook',['book'=>$book]);
  }

  public function delete($bookid)
  {
    if(Gate::allows('librarian-only', auth()->user())){
      $book = Book::find($bookid);
      $book->delete();
      return redirect('library')->with('success','This book has been successfully deleted');
    }
    return 'You cannot perform this action. Please contact a system administrator';
  }
}
