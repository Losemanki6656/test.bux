<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Task;
use App\Models\TestCount;
use App\Models\ResultTest;
use App\Models\Tema;
use App\Models\Mavzu;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
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
        if(Auth::user()->status == false) return redirect()->route('verification_page');
            else 
        return view('home');
    }
    public function verification_page()
    { 
        if(Auth::user()->status == true) return redirect()->route('home');
            else 
            return view('auth.verification');
        
    }
    public function activation(Request $request)
    { 
        $user = User::find(Auth::user()->id);
        $user->status = true;
        $user->save();

        return redirect()->back()->with('msg' , 1);
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
        $themes = Mavzu::all();
        return view('questions.addtasks',[
            'themes' => $themes
        ]);
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
            $tema = Mavzu::find($request->mavzu_id);

            $que = new Task();
            $que->lang_id = $request->lang_id;
            $que->tema_id = $tema->tema_id;
            $que->mavzu_id = $request->mavzu_id;
            $que->ques = $request->ques;
            $que->result = $request->result;
            $que->save();
        

        return redirect()->back()->with('msg' ,1);
    }

    public function starttest()
    {
        $status = false;
        $count = TestCount::find(1);
        $questions = Question::count();

        $xz = ResultTest::where('user_id',Auth::user()->id)->where('status',false)->where('status_test',false)->get();
        if($xz->count()) $status = true;

        return view('test.start',[
            'count' => $count,
            'questions' =>  $questions,
            'status' => $status
        ]);
    }

    public function testcount()
    {
        $count = TestCount::find(1);
        $taskcount = TestCount::find(2);

        return view('admin.testcount',[
            'count' => $count,
            'taskcount' => $taskcount
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
    public function EditTaskCount(Request $request)
    {
        $count = TestCount::find(2);
        $count->count = $request->taskcount;
        $count->test_time = $request->tasktime;
        $count->save();

        return redirect()->back()->with('msg' ,1);
    }

    public function runtest(Request $request)
    {
        $xz = ResultTest::where('user_id',Auth::user()->id)->where('status',false)->where('status_test',false)->get();
        $count = TestCount::find(1);
        
        if( $xz->count() ) {

            $arr = explode(',', $xz[0]->quests);
            $questions = Question::whereIn('id', $arr )->get();

            $ticketTime = strtotime($xz[0]->created_at);

            $difference = time() -  $ticketTime;
            $times = $count->test_time * 60 - $difference;

            $uid = $xz[0]->id;

        } else {

            $questions = Question::
            where('lang_id',$request->lang_id)
            ->inRandomOrder()
            ->where('status_result',false)
            ->limit($count->count)
            ->get();
            $arrques = $questions->pluck('id')->toArray();
            $times = $count->test_time * 60;

            $addRes = new ResultTest();
            $addRes->user_id = Auth::user()->id; 
            $addRes->lang_id = $request->lang_id;
            $addRes->quests = implode(',', $arrques);
            $addRes->count = $count->count;
            $addRes->time1 = $count->test_time;
            $addRes->save();

            $uid = $addRes->id;
            
        }

        return view('test.runtest',[
            'questions' => $questions,
            'times' => $times,
            'uid' => $uid
        ]);
        
    }

    public function finishTest($id, Request $request)
    {
        $result = ResultTest::find($id);

        if($result->status == false) {
            $x = 0; $a = []; $res = 0; $z = 0; $y = []; $t = [];
            
            if($request->result)
            foreach ($request->result as $key => $value){
                
                $x ++;
                $a[$x] = $key ."-". $value;
                $t[$x] = $key;
                $que = Question::find($key)->result;
                if($que == $value) $res ++; else {
                    $z ++; $y[$z] = $key . '-' . $value; 
                }

            }
            $quests = explode(',',$result->quests);

            foreach($quests as $sel) {
                $q = 0;
                foreach($t as $ted) {
                    if($sel == $ted) {$q ++; break;}
                }
                if($q == 0) {
                    $z++;
                    $y[$z] = $sel . '-0';
                }
            }

            $ticketTime = strtotime($result->created_at);
            $difference = time() -  $ticketTime;

            $result->results = implode(',',$a);
            $result->resultfail = implode(',',$y);
            $result->result = $res;
            $result->time2 = (int)$difference/60;
            $result->status = true;
            $result->save();
        }

        return redirect()->route('results');
    }

    public function results()
    {
        $results = ResultTest::where('user_id',Auth::user()->id)->where('status',true);

        return view('test.results',[
            'results' => $results->paginate(10)
        ]);
    }

    public function starttask()
    {
        $themes = Tema::with('mavzu')->get();

        return view('folders.folders',[
            'themes' => $themes
        ]);
    }

    public function runtask(Request $request)
    {
        $xz = ResultTest::where('user_id',Auth::user()->id)->where('status',false)->where('status_test',true)->get();
        $count = TestCount::find(2);
        
        if( $xz->count() ) {

            $arr = explode(',', $xz[0]->quests);
            $questions = Question::whereIn('id', $arr )->get();

            $ticketTime = strtotime($xz[0]->created_at);

            $difference = time() -  $ticketTime;
            $times = $count->test_time * 60 - $difference;

            $uid = $xz[0]->id;

        } else {

            $questions = Question::
            where('lang_id',$request->lang_id)
            ->inRandomOrder()->limit($count->count)
            ->where('status_result',true)
            ->get();
            $arrques = $questions->pluck('id')->toArray();
            $times = $count->test_time * 60;

            $addRes = new ResultTest();
            $addRes->user_id = Auth::user()->id; 
            $addRes->lang_id = $request->lang_id;
            $addRes->quests = implode(',', $arrques);
            $addRes->count = $count->count;
            $addRes->time1 = $count->test_time;
            $addRes->status_test = true;
            $addRes->save();

            $uid = $addRes->id;
            
        }

        return view('test.runtest',[
            'questions' => $questions,
            'times' => $times,
            'uid' => $uid
        ]);
        
    }

    public function verification(Request $request)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://notify.eskiz.uz/api/auth/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "email": "bloggerg420@gmail.com",
            "password": "mM32oxhLFQAtVZwcJBZnVd5XcNs18zmVom6lfahf"
        }
        ',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        $json = json_decode($response, true);
        $x = $json['data'];
        $token = $x['token'];
        curl_close($curl);

        $char = ['(', ')', ' ','-','+'];
        $replace = ['', '', '','',''];
        $phone = str_replace($char, $replace, Auth::user()->phone);
        $randomNumber = random_int(100000, 999999);
        $text = $randomNumber." is your MSFO verification code.";
        $curl = curl_init();    
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://notify.eskiz.uz/api/message/sms/send-batch',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>"{ \"messages\":[ {\"user_sms_id\":\"5284\",\"to\": \"998$phone\",\"text\": \"$text\"} ],\"from\":\"4546\",\"dispatch_id\":\"123\"}",
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token,
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);
        curl_close($curl);
        $json = json_decode($response, true);
        $x = $json['status'];

        return response()->json(['status' => $x, 'code' => $randomNumber], 200);
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function folders()
    {
        $themes = Tema::with('mavzu')->get();
        return view('folders.folders',[
            'themes' => $themes
        ]);
    }

    public function AddFolder(Request $request)
    {
        $new = new Tema();
        $new->name = $request->name;
        $new->save();

        return redirect()->back()->with('msg' ,1);
    }

    public function themes()
    {
        $themes = Tema::all();
        $tasks = Mavzu::with('tasks')->get();

        return view('folders.mavzu',[
            'themes' => $themes,
            'tasks' => $tasks
        ]);
    }
    public function addthemes()
    { 
        $themes = Tema::all();
        $tasks = Mavzu::all();

        return view('folders.addthemes',[
            'themes' => $themes,
            'tasks' => $tasks
        ]);
    }
    public function AddThem(Request $request)
    {
        $new = new Mavzu();
        $new->tema_id = $request->them_id;
        $new->name = $request->name;
        $new->text1 = $request->text1;
        $new->text2 = $request->text2;
        $new->save();

        return redirect()->back()->with('msg' ,1);
    }

    public function TaskView($id)
    {
        $task = Mavzu::find($id);

        return view('folders.taskview',[
            'task' => $task
        ]);
    }

    public function questaskview($id)
    {
        $tasks = Task::where('mavzu_id',$id)->paginate(1);

        return view('test.taskview',[
            'tasks' => $tasks
        ]);
    }

    public function ThemesF($id)
    {
        $tasks = Mavzu::where('tema_id',$id)->get();

        return view('test.tasks',[
            'tasks' => $tasks
        ]);
    }

    public function QuesView($id)
    {
        $task = Mavzu::find($id);

        return view('test.quesview',[
            'task' => $task
        ]);
    }

    public function taskrun($id)
    {
        $tasks = Task::where('mavzu_id',$id)->paginate(1);
        $times = 600;
        return view('test.runtask',[
            'tasks' => $tasks,
            'times' => $times
        ]);
    }
}
