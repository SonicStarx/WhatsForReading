<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Enums\YearGroup;
use App\Enums\BookBand;
use App\Enums\PhonicsLevel;
use App\Enums\ProgressRate;

use App\Models\Teacher;
use App\Models\Topic;
use App\Models\Pupil;
use App\Models\Book;
use App\Models\ReadingEntries;
use App\Models\PupilPerformance;
use App\Models\Learning_objective;
use App\Models\LearningObjectivePerformance;


class TeacherController extends Controller
{
  public function dashboard()
  {

    if(Gate::allows('teacher-only', auth()->user())){
      return view ('teacher.dashboard');
    }
    return 'Sorry, no access allowed.';
  }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////topics and objectives functions
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function topicshome()
  {
    $Topics = Topic::orderBy('scheduled_teaching','desc')
              ->get();
    $LOs = Learning_objective::all();
    return view('teacher.topicsobjs', compact('Topics','LOs'));
  }

  public function objectiveshome()
  {
    $LOs = Learning_objective::all();
    return view('teacher.allLO', compact('LOs'));
  }

  public function addtopic()
  {
    $LOs = Learning_objective::all();

    return view('teacher.addtopic', compact('LOs'));
  }

  public function storetopic(Request $request)
  {
    $request->validate([
      'topic_title' => 'required|string|max:255',
      'topic_description' => 'required|string',
      'scheduled_teaching' => 'required|date|after:today',
      'topicLO'=> 'required',
    ]);

    ($topic = Topic::create([
      'topic_title' => $request->topic_title,
      'topic_description' => $request->topic_description,
      'scheduled_teaching' => $request->scheduled_teaching,
      'topicLO'=> $request->topicLO,
    ]));

    $topic->save();
    return redirect()->back()->with('success', 'This topic has been added');
  }

  public function updatetopic()
  {
    $request->validate([
      'topic_title' => 'required|string|max:255',
      'topic_description' => 'required|string',
      'scheduled_teaching' => 'required|date|after:today',
      'topicLO'=> 'required',
    ]);

    $topic->topic_title = $request->input('topic_title');
    $topic->topic_description = $request->input('topic_description');
    $topic->scheduled_teaching = $request->input('scheduled_teaching');
    $topic->topicLO = $request->input('topicLO');

    $topic->save();
    return redirect('topicshome')->with('success','This topic has been successfully updated');
  }

  public function edittopic($id)
  {
    $topic = Topic::find($id);
    $LOs = Learning_objective::all();
    return view ('teacher.edittopic', ['topic' => $topic],['LOs' => $LOs]);
  }

  public function deletetopic($id)
  {
    if(Gate::allows('teacher-only', auth()->user())){
      $topic = Topic::find($id);
      $topic->delete();
      return redirect (route('topicshome'))->with('success','This topic has been successfully deleted');
    }
    return 'You cannot perform this action. Please contact a system administrator';
  }

  public function addobjective()
  {
    return view('teacher.addLO');
  }

  public function storeobjective(Request $request)
  {
    $request->validate([
      'LO_title' => 'required|string|max:255',
      'year_group' => 'required',Rule::in(YearGroup::$types),
      'LO_description' => 'required|string',
    ]);

    ($LO = Learning_objective::create([
      'LO_title' => $request->LO_title,
      'year_group' => $request->year_group,
      'LO_description' => $request->LO_description,
    ]));

    $LO->save();
    return redirect()->back()->with('success', 'This learning objective has been added');
  }

  public function editobjective($LO_id)
  {
    $LO = Learning_objective::find($LO_id);
    return view ('teacher.editLO', ['LO' => $LO]);
  }

  public function updateobjective(Request $request, $LO_id)
  {

    $LO = Learning_objective::find($LO_id);

    $request->validate([
      'LO_title' => 'required|string|max:255',
      'year_group' => 'required',Rule::in(YearGroup::$types),
      'LO_description' => 'required|string',
    ]);

    $LO->LO_title = $request->LO_title;
    $LO->year_group = $request->input('year_group');
    $LO->LO_description = $request->input('LO_description');

    $LO->save();
    return redirect(route('objectiveshome'))->with('success','This learning objective has been successfully updated');
  }

  public function deleteobjective($LO_id)
  {
    if(Gate::allows('teacher-only', auth()->user())){
      $LO = Learning_objective::find($LO_id);
      $LO->delete();
      return redirect (route('objectiveshome'))->with('success','This learning objective has been successfully deleted');
    }
    return 'You cannot perform this action. Please contact a system administrator';
  }


  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////// reading lists functions
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function readinglists()
  {
    $savedLists = DB::table('reading_entries')
                  ->groupBy('assigned_week')
                  ->orderBy('assigned_week', 'DESC')
                  ->get();
    return view('teacher.readinglists', compact('savedLists'));
  }

  public function viewlist($week)
  {
    $teacherid = auth()->user()->id;
    $teacher = Teacher::where('userid', $teacherid)->first();
    $list = DB::table('reading_entries')
            ->where('assigned_week',$week)
            ->get();

    $pupils = DB::table('pupils')
              ->where('class',$teacher->class_name)
              ->orderBy('last_name')
              ->get();

    $books = Book::all();
    return view('teacher.viewreadinglist', compact('pupils','list','books','week'));
  }

  public function createnewlist()
  {
    $teacherid = auth()->user()->id;
    $teacher = Teacher::where('userid', $teacherid)->first();
    $pupils = DB::table('pupils')
              ->where('class',$teacher->class_name)
              ->orderBy('last_name')
              ->get();
    $pupilstats = PupilPerformance::select("id","pupilid","reading_level","phonics_level")
                  ->get();

    $readingrecs = DB::table('reading_entries')
                  ->groupBy('pupilid')
                  ->first();
    $library = Book::all();

    return view('teacher.newlist', compact('pupils','pupilstats','readingrecs','library'));
  }

  public function allocatebook($pupilid)
  {
    $library = Book::select("bookid","book_title","category")
              ->orderBy('book_title')
              ->get();
    $pupil = Pupil::find($pupilid);
    $pupilp = Pupil::find($pupilid)->performance;

    return view ('teacher.assignbook', compact('library', 'pupil', 'pupilp'));
  }


  public function savereadinglist(Request $request, $pupilid)
  {
    $request->validate([
      'bookid' => 'required|numeric',
      'assigned_week' => 'required|date',
    ]);

    $selectedBook = Book::find($request->bookid);

    if($selectedBook->on_loan === $selectedBook->available_quantity)
    {
      return redirect()->back()->with('fail', 'This book is not currently available to be assigned to this pupil');
    }
    else{
        $increaseBookNo = Book::where('bookid',$selectedBook->bookid)
                          ->update([
                          'on_loan'=> DB::raw('on_loan+1'),
                          ]);

        ($readingentry = ReadingEntries::create([
          'pupilid' => $pupilid,
          'bookid' => $request->bookid,
          'assigned_week'=> $request->assigned_week,
          'date_created' => date('Y-m-d H:i:s'),
        ]));

        $readingentry->save();
    }
    return redirect()->route('newlist')->with('success','Reading book assigned successfully');
  }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////reading records functions
  public function readingrecords()
  {
    $teacherid = auth()->user()->id;
    $teacher = Teacher::where('userid', $teacherid)->first();
    $pupils = DB::table('pupils')
              ->where('class',$teacher->class_name)
              ->orderBy('last_name')
              ->get();

    $entries = DB::table('reading_entries')
              ->selectRaw('*,max(pupilid) as last')
              ->groupBy('pupilid')
              ->get();


    return view('teacher.readingrecords', compact('pupils','entries'));
  }

  public function viewrecord($pupilid)
  {
    $records = ReadingEntries::where('pupilid',$pupilid)->get();
    $pupil = Pupil::find($pupilid);
    $pupilp = PupilPerformance::where('pupilid', $pupilid)->first();
    $library = Book::all();

    return view('teacher.viewreadingrecord',compact('pupil','records','library','pupilp'));
  }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////performance functions
  public function classperformance()
  {
    $pupils = Pupil::all()->sortBy('last_name');
    $pupilp = PupilPerformance::all();
    $teacherid = auth()->user()->id;
    $teacher = Teacher::where('userid', $teacherid)->first();
    return view('teacher.performance',compact('pupils', 'teacher', 'pupilp'));
  }

  public function performancecharts()
  {
    $pupilp = PupilPerformance::all();
    $teacherid = auth()->user()->id;
    $teacher = Teacher::where('userid', $teacherid)->first();
    $pupils = DB::table('pupils')
              ->where('class',$teacher->class_name)
              ->get();

    $datas="";
    $data2="";

    //variable to count no. of pupils in each working level
    $abovecount=0;
    $atcount=0;
    $towardscount=0;
    $belowcount=0;

    //variables to count no. of pupils in each phonics stage
    $stageonecount=0; $stagetwocount=0;
    $stagethreecount=0; $stagefourcount=0;
    $stagefivecount=0; $stagesixcount=0;

    //goes through each pupil in the teacher's class to see their current working
    //level and increase the corresponding variable to create a total for that level
    foreach ($pupils as $pupil)
    {
      $temp = $pupil->pupilid;
      $newpupil = Pupil::find($temp)->performance;

      if($newpupil->working_level=='Working above expectations')
      {
        $abovecount++;
      }
      else if($newpupil->working_level=='Working at expectations')
      {
        $atcount++;
      }
      else if($newpupil->working_level=='Working towards expectations')
      {
        $towardscount++;
      }
      else {
        $belowcount++;
      }
      }
      //assigns all the counts to an array
      $datas.= "[ 'Working above expectations', ".$abovecount."],
                ['Working at expectations', ".$atcount."],
                ['Working towards expectations', ".$towardscount."],
                ['Working below expectations', ".$belowcount."]";
      //goes through each pupil in the teacher's class to see their current phonics
      //level and increase the corresponding variable to create a total for that level

      foreach ($pupils as $pupil) {
        $temp = $pupil->pupilid;
        $newpupil = Pupil::find($temp)->performance;
        if($newpupil->phonics_level=='Stage 1')
        {
              $stageonecount++;
        }
        else if($newpupil->phonics_level=='Stage 2')
        {
              $stagetwocount++;
        }
        else if($newpupil->phonics_level=='Stage 3')
        {
              $stagethreecount++;
        }
        else if($newpupil->phonics_level=='Stage 4')
        {
              $stagefourcount++;
        }
        else if($newpupil->phonics_level=='Stage 5')
        {
            $stagefivecount++;
        }
        else
        {
            $stagesixcount++;
        }

      }
      //assigns all the counts to an array
      $data2.= "['Stage 1', ".$stageonecount."],
                ['Stage 2', ".$stagetwocount."],
                ['Stage 3', ".$stagethreecount."],
                ['Stage 4', ".$stagefourcount."],
                ['Stage 5', ".$stagefivecount."],
                ['Stage 6', ".$stagesixcount."]";

    $arr['datas']=rtrim($datas,",");
    $arr2['data2']=rtrim($data2,",");

    return view('teacher.performancechart',$arr2,$arr)->with('teacher', $teacher);;
  }

  public function individualperformance($pupilid)
  {
    if(Gate::allows('teacher-only', auth()->user())){
      $pupil = Pupil::find($pupilid);
      $pupilp = PupilPerformance::where('pupilid',$pupilid)->first();
      $LOp = LearningObjectivePerformance::all();
      $LOfindp = LearningObjectivePerformance::where('pupilid',$pupilid)->get(['id','LO_id','performance','assessment_date','Notes']);
      $teacherid = auth()->user()->id;
      $teacher = Teacher::where('userid', $teacherid)->first();

      if($teacher->class_name == $pupil->class)
      {
        return view('teacher.performancehist',compact('pupilp','LOfindp'),['pupil' => $pupil] );
      }
    }

    return redirect()->back()->with('fail', 'This pupil cannot be accessed via this login. Please contact a system administrator');
  }

  public function pupillevels($pupilid)
  {
    $pupil = Pupil::find($pupilid);
    $pupilp = PupilPerformance::where('pupilid',$pupilid)->first();
    return view('teacher.pupillevels',compact('pupilp'), ['pupil' => $pupil],  );
  }

  public function pupilassessment($pupilid)
  {
    $pupil = Pupil::find($pupilid);
    $LOs = Learning_objective::all();
    return view('teacher.performanceassessment',['pupil' => $pupil], ['LOs' => $LOs]);
  }

  public function editpupilassessment($id)
  {
    $pupilp = LearningObjectivePerformance::find($id);
    $LOs = Learning_objective::all();
    return view('teacher.editperformanceassessment',['pupilp' => $pupilp], ['LOs' => $LOs]);
  }

  public function addpupilassessment(Request $request, $pupilid)
  {
    $request->validate([
      'objectives' => 'required',
      'performance' => 'required',Rule::in(ProgressRate::$types),
      'notes'=> 'required|string',
      'assessment_date' => ['required', 'before_or_equal:' . now()->format('Y-m-d')],
    ]);

    ($LOassess = LearningObjectivePerformance::create([
      'LO_id' => $request->objectives,
      'pupilid' => $pupilid,
      'performance' => $request->performance,
      'Notes'=> $request->notes,
      'assessment_date' => $request->assessment_date,
    ]));
    $LOassess->save();
    $pupilid = $pupilid;
    return redirect(route('individualperformance', $pupilid))->with('success','New assessment data has been successfully added');
  }

  public function updatepupilassessment(Request $request, $id)
  {

    $pupilpid = LearningObjectivePerformance::find($id);

    $request->validate([
      'objectives' => 'required',
      'performance' => 'required',Rule::in(ProgressRate::$types),
      'notes'=> 'required|string',
      'assessment_date' => ['required', 'before_or_equal:' . now()->format('Y-m-d')],
    ]);

    $pupilpid->LO_id = $request->input('objectives');
    $pupilpid->performance = $request->input('performance');
    $pupilpid->Notes = $request->input('notes');
    $pupilpid->performance = $request->input('performance');
    $pupilpid->assessment_date = $request->input('assessment_date');


    $pupilpid->save();
    $pupilid = $pupilpid->pupilid;

    return redirect(route('individualperformance', $pupilid))->with('success','The performance data for this pupil has been successfully updated');
  }

  public function updatepupillevels(Request $request,$pupilid)
  {
    $request->validate([
      'reading_level' => 'required',Rule::in(BookBand::$types),
      'phonics_level' => 'required',Rule::in(PhonicsLevel::$types),
      'working_level'=> 'required', Rule::in(ProgressRate::$types),
      'assessment_date' => ['required', 'before_or_equal:' . now()->format('Y-m-d')],
    ]);

    $checkifexists = PupilPerformance::where('pupilid',$pupilid)->first();
    if(is_null($checkifexists))
    {
    ($pupilp = PupilPerformance::create([
      'pupilid' => $pupilid,
      'reading_level' => $request->reading_level,
      'phonics_level' => $request->phonics_level,
      'working_level'=> $request->working_level,
      'uploaded_date' => Carbon::now(),
      'assessment_date' => $request->assessment_date,
    ]));
    $pupilp->save();
    }
    else {

        $checkifexists->reading_level = $request->input('reading_level');
        $checkifexists->phonics_level = $request->input('phonics_level');
        $checkifexists->working_level = $request->input('working_level');
        $checkifexists->uploaded_date = Carbon::now();
        $checkifexists->assessment_date = $request->input('assessment_date');

      $checkifexists->save();
      }
      return redirect(route('individualperformance', $pupilid))->with('success','The performance data for this pupil has been successfully updated');

    }
  }
