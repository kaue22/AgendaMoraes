<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Http;
use App\Agenda;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DB;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $repository;
    public function __construct(Agenda $agenda)
    {
        $this->middleware('auth');

        $this->repository = $agenda;
    }

    public function index()
    {
        $idAuth = Auth::user()->id;
        // dd($this->repository->name);
        //$user_id = Agenda::where('user_id', $idAuth);

        $user_id = DB::select('select user_id from agendas where user_id = ?', [$idAuth]);
        
        foreach ($user_id as $key => $value){
            $id=$value->user_id;
        }
        
        //$mostra = $this->repository->latest()->paginate(10);
        
        if(Auth::user()->id == $id){
        //$mostra = $this->repository->latest()->paginate(10);
        $mostra = DB::select('select * from agendas where user_id = ?', [$idAuth]);
       // dd($mostra);
        return view(
            'admin.agenda.home',
            ['mostra' => $mostra,]
        );

        
    }
    return view('admin.agenda.create');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.agenda.create');
    }

    public function cadastra(Request $request)
    {

        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }
        $data = $request->all();
        $data['user_id'] = $user_id;
        //  dd($data);

        $this->repository->create($data);


        return redirect()->route('admin.agenda.home');
    }

  


    public function destroy($user_id)
    {
        $teste = $this->repository->where('id', $id)->first();
       //dd($teste);
        if (!$teste)
            return redirect()->back();

        $teste->delete();
        return redirect()->route('admin.agenda.home');
    }
}
