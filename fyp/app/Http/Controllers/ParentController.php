<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

use App\Models\Pupil;
use App\Models\User;
use App\Models\Book;
use App\Models\ReadingEntries;
use App\Models\PupilPerformance;
use App\Models\Learning_objective;
use App\Models\LearningObjectivePerformance;

class ParentController extends Controller
{
  public function dashboard()
  {
    if(Gate::allows('parents-only', auth()->user())){
      return view ('parents.parentlanding');
    }
    return 'Sorry, no access allowed.';
  }

  //functions for reading record side of parent user
  public function recordshub()
  {
        $findparent = auth()->user()->id;
        $parent = User::find($findparent);
        $pupil = Pupil::find($parent);
        $records = ReadingEntries::orderBy('assigned_week', 'DESC')->get();
        $books = Book::all();

    return view ('parents.parentreadingrecs', compact('parent','pupil','books','records'));
  }

  public function recordstatus($entryid)
  {
    $entry = ReadingEntries::find($entryid);
    $entry->read = 1;

    $findbook = $entry->bookid;
    $book = Book::find($findbook);

    $decreaseBookNo = Book::where('bookid',$book)
                      ->update([
                      'on_loan'=> DB::raw('on_loan-1'),
                      ]);
    $entry->save();
    return redirect()->route('recordshub')->with('success','Book marked as read');
  }

  //functions for performance side of parent user
  public function performancehub()
  {
      $findparent = auth()->user()->id;
      $parent = User::find($findparent);
      $pupil = Pupil::find($parent);
      $records = PupilPerformance::orderBy('assessment_date', 'DESC')->get();

    return view ('parents.parentspupilperformance', compact('parent','pupil','records'));
  }

  public function objectivesview($pupilid)
  {
    $pupil = Pupil::find($pupilid);
    $LOs = LearningObjectivePerformance::where('pupilid',$pupilid)
            ->orderBy('assessment_date', 'DESC')
            ->get();
    return view('parents.objectivesperformance',compact('LOs','pupil'));
  }
}
