<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Http;
use App\Agenda;

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

        /* $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        $states = $response->json();
*/
        return view(
            'admin.agenda.create'
        );
    }

    public function cadastra(Request $request)
    {
        $data = $request->all();

        echo ("Data");
        var_dump($data);
        die();
        // $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('admin.agenda.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.agenda.show', [
            'plan' => $plan,
        ]);
    }
}
