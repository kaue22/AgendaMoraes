<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Str;
use Illuminate\Support\Facades\Route;

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

        //echo "teste";
        return view('admin.pages.home');
    }
    public function create(Request $request)
    {
        //$request = Request::create('https://servicodados.ibge.gov.br/api/v1/localidades/municipios', 'GET');
        $request = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/';
        $result = json_decode(file_get_contents($request));
 
       // var_dump($result);

       // die();
        /* foreach($result as $teste){
            var_dump($result->sigla);
            die();
        }*/
  

        return view('admin.pages.create');
    }

    public function cadastra(Request $request)
    {
        $data = $request->all();

        echo ("Data");
        var_dump($data);
        die();
        // $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('admin.pages.index');
    }


    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.show', [
            'plan' => $plan,
        ]);
    }

    public function ibge(Request $request)
    {
        $request = Request::create('https://servicodados.ibge.gov.br/api/v1/localidades/estados/{UF}/municipios', 'GET');
        echo ("Response");
        var_dump($request);
        die();
        //  $response = Route::dispatch($request);

    }
}
