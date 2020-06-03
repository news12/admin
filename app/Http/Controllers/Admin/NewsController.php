<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
class NewsController extends Controller
{

    protected $repository;
    private $autor;
    /**
     * NewsController constructor.
     */
    public function __construct(
        NewsRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->autor = Auth::user()->name;
        $itens = $this->repository->all('*');
        return view('admin.news.home')
        ->with('itens', $itens)
        ->with('autor', $this->autor);
    }

    public function create(Request $request)
    {
        //dd($request);
        try {

            $this->repository->create(
                [
                    'acessos' => $request->acessos,
                    'titulo' => $request->titulo,
                    'corpo' => $request->corpo,
                    'tipo' => $request->tipo,
                    'autor' => $request->autor,
                    'data' => $request->data

                ]);

            $this->tipo_msg = 'success';
            $this->msg = 'Noticia criada com sucesso!!!';

        } catch (QueryException $errorQuery)
        {
            $this->tipo_msg = 'error';
            $this->msg = 'Ocorreu o seguinte erro: ' . $errorQuery->getMessage();

        }catch (exception $error) {

            $this->tipo_msg = 'error';
            $this->msg = 'Ocorreu o seguinte erro: ' . $error;

        }
        $request->session()->flash($this->tipo_msg, $this->msg);
        return redirect('/panel/news');
    }

    public function edit(Request $request)
    {
        //dd($request);
        try {

            $this->repository->update_where(
                [
                    'acessos' => $request->acessos,
                    'titulo' => $request->titulo,
                    'corpo' => $request->corpo,
                    'tipo' => $request->tipo,
                    'autor' => $request->autor,
                    'data' => $request->data

                ],
                [
                    'id' => $request->id_item
                ]);

            $this->tipo_msg = 'success';
            $this->msg = 'Noticia alterada com sucesso!!!';

        } catch (exception $error) {

            $this->tipo_msg = 'error';
            $this->msg = 'Ocorreu o seguinte erro: ' . $error;

        }
        $request->session()->flash($this->tipo_msg, $this->msg);
        return redirect('/panel/news');
    }

    public function destroy(Request $request)
    {

        try {

                $this->repository->delete($request->id_item);

                $this->tipo_msg = 'success';
                $this->msg = 'Noticia excluida com sucesso';

        } catch (exception $erros) {

            $this->tipo_msg = 'error';
            $this->msg .= 'Ocorreu o seguinte erro: ' . $erros;

        }

        $request->session()->flash($this->tipo_msg, $this->msg);
        return redirect('/panel/news');
    }
}
