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
        //dd(Auth::user()->id);

        dd($user_id);
        if(Auth::user()->id == $user_id){
        $mostra = $this->repository->latest()->paginate(10);
        
        return view(
            'admin.agenda.home',
            ['mostra' => $mostra,]
        );
    }
        return view('admin.pages.home');
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


        return redirect()->route('admin.agenda.show');
    }

    /*  public function show($user_id)
    {
        $teste = $this->repository->where('nome', $user_id)->first();
        //dd($teste);
        return view('admin.agenda.show', ['teste' => $teste]);
    }
*/

    public function destroy($user_agenda_id)
    {
        $teste = $this->repository->where('user_agenda_id', $user_agenda_id)->first();
        dd($teste);
        /*if (!$plan)
            return redirect()->back();

        $plan->delete();*/
        return redirect()->route('plans.index');
    }
}
