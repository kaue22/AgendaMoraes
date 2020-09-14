<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Http;
use App\Agenda;
use Illuminate\Support\Str;

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
    
        //$agendas = $this->repository->latest()->paginate(10);
        return view('admin.agenda.home');
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
        $data = $request->all();

       
        $data['url'] = Str::kebab($request->name);
        
       
        $this->repository->create($data);
        //dd($data);

        return redirect()->route('admin.agenda.index');
    }

    public function show($url)
    {
        $teste = $this->repository->where('url', $url)->first();
        dd($teste);
        return view('admin.agenda.show',['teste'=>$teste]);
    }
}
