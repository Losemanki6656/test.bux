<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Task;
use App\Models\TestCount;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('home');
    }

    public function home()
    {
        return view('home');
    }


    public function questions()
    {
        $questions = Question::query()
        ->when(\Request::input('search'),function($query,$search){
            $query->where(function ($query) use ($search) {
                $query
                    ->Orwhere('ques','like','%'.$search.'%')
                    ->orWhere('ques_a','like','%'.$search.'%')
                    ->orWhere('ques_b','like','%'.$search.'%')
                    ->orWhere('ques_c','like','%'.$search.'%')
                    ->orWhere('ques_d','like','%'.$search.'%')
                    ->orWhere('result','like','%'.$search.'%');
            });
        })
        ->when(request('lang_id'), function ($query, $lang_id) {
            return $query->where('lang_id', $lang_id);
            
        });
        return view('questions.questions',[
            'questions' => $questions->paginate(10)
        ]);
    }

    public function Tasks()
    {
        $tasks = Task::query()
        ->when(\Request::input('search'),function($query,$search){
            $query->where(function ($query) use ($search) {
                $query
                    ->Orwhere('ques','like','%'.$search.'%')
                    ->orWhere('result','like','%'.$search.'%');
            });
        })
        ->when(request('lang_id'), function ($query, $lang_id) {
            return $query->where('lang_id', $lang_id);
            
        });
        return view('questions.tasks',[
            'tasks' => $tasks->paginate(10)
        ]);
    }

    public function EditQues($id, Request $request) 
    {
        $que = Question::find($id);

        if($que->status_result) {
            $que->ques = $request->ques;
            $que->result = $request->result_text;
            $que->save();
        } else {
            $que->ques = $request->ques;
            $que->ques_a = $request->ques_a_text;
            $que->ques_b = $request->ques_b_text;
            $que->ques_c = $request->ques_c_text;
            $que->ques_d = $request->ques_d_text;
            $que->result = $request->ques_res;
            $que->save();
        }

        return redirect()->back()->with('msg' , 1);
    }

    public function DeleteQues($id, Request $request) 
    {
        $que = Question::find($id)->delete();

        return redirect()->back()->with('msg' , 2);
    }

    public function EditTask($id, Request $request) 
    {
        $que = Task::find($id);
        $que->ques = $request->ques;
        $que->result = $request->result;
        $que->save();

        return redirect()->back()->with('msg' , 1);
    }

    public function DeleteTask($id, Request $request) 
    {
        $que = Task::find($id)->delete();

        return redirect()->back()->with('msg' , 2);
    }


    public function addQues()
    {
        return view('questions.addques');
    }

    public function addTask()
    {
        return view('questions.addtasks');
    }
    
    public function addQuestions(Request $request) 
    {
        if($request->ResultOrAbcd) {
            $que = new Question();
            $que->lang_id = $request->lang_id;
            $que->status_result = true;
            $que->ques = $request->ques;
            $que->result = $request->result_text;
            $que->save();
        } else {
            $que = new Question();
            $que->lang_id = $request->lang_id;
            $que->ques = $request->ques;
            $que->ques_a = $request->ques_a_text;
            $que->ques_b = $request->ques_b_text;
            $que->ques_c = $request->ques_c_text;
            $que->ques_d = $request->ques_d_text;
            $que->result = $request->ques_res;
            $que->save();
        }

        return redirect()->back()->with('msg' ,1);
    }

    public function addTaskSucc(Request $request) 
    {
            $que = new Task();
            $que->lang_id = $request->lang_id;
            $que->ques = $request->ques;
            $que->result = $request->result;
            $que->save();
        

        return redirect()->back()->with('msg' ,1);
    }

    public function starttest()
    {
        $count = TestCount::find(1);
        $questions = Question::count();

        return view('test.start',[
            'count' => $count,
            'questions' =>  $questions
        ]);
    }

    public function testcount()
    {
        $count = TestCount::find(1);

        return view('admin.testcount',[
            'count' => $count
        ]);
    }

    public function EditTestCount(Request $request)
    {
        $count = TestCount::find(1);
        $count->count = $request->count;
        $count->test_time = $request->test_time;
        $count->save();

        return redirect()->back()->with('msg' ,1);
    }

    public function runtest(Request $request)
    {
        $count = TestCount::find(1);
        $questions = Question::where('lang_id',$request->lang_id)->inRandomOrder()->limit($count->count)->get();

        return view('test.runtest',[
            'questions' => $questions
        ]);
    }
}
