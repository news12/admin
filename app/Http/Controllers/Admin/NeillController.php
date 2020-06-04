<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PremiumNeilItemRepository;
use Illuminate\Database\QueryException;

class NeillController extends Controller
{

    protected $repository;
    /**
     * NeillController constructor.
     */
    public function __construct(
        PremiumNeilItemRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $itens = $this->repository->all('*');
        return view('admin.neill.home')
        ->with('itens', $itens);
    }

    public function create(Request $request)
    {
        ucfirst($request->item);
        if ($request->hasFile('img_item')) {
            $imageName = $request->item__id . '.gif';
            $request->img_item->move(public_path('cash/img/itens'), $imageName);
            //$request->img_item->move(public_path('img/itens/'), $imageName);
        }
        //dd($request);
        try {
            $qtd = $request->efv1;

            if ($qtd < 1)
                $qtd = 1;

            $this->repository->create(
                [
                    'item_name' => $request->item_name,
                    'item_desc' => $request->item_desc,
                    'item_price' => $request->item_price,
                    'item_cont' => $request->item_cont,
                    'item_cat_id' => 0,
                    'item_type' =>$qtd,
                    'item_date' => date("m.d.y"),
                    'item__img' => $request->item__id,
                    'item__id' => $request->item__id,
                    'item__ef1' => $request->ef1,
                    'item__ef2' => $request->ef2,
                    'item__ef3' => $request->ef3,
                    'item__efv1' => $request->efv1,
                    'item__efv2' => $request->efv2,
                    'item__efv3' => $request->efv3

                ]);

            $this->tipo_msg = 'success';
            $this->msg = 'Item criado com sucesso!!!';

        } catch (QueryException $errorQuery)
        {
            $this->tipo_msg = 'error';
            $this->msg = 'Ocorreu o seguinte erro: ' . $errorQuery->getMessage();

        }catch (exception $error) {

            $this->tipo_msg = 'error';
            $this->msg = 'Ocorreu o seguinte erro: ' . $error;

        }
        $request->session()->flash($this->tipo_msg, $this->msg);
        return redirect('/panel/neill');
    }

    public function edit(Request $request)
    {
        ucfirst($request->item);
        if ($request->hasFile('img_item')) {
            $imageName = $request->item__id . '.gif';
            $request->img_item->move(public_path('cash/img/itens'), $imageName);
            //$request->img_item->move(public_path('img/itens/'), $imageName);
        }
        //dd($request);
        try {
            $qtd = $request->efv1;

            if ($qtd < 1)
                $qtd = 1;
            $this->repository->update_where(
                [
                    'item_name' => $request->item_name,
                    'item_desc' => $request->item_desc,
                    'item_price' => $request->item_price,
                    'item_cont' => $request->item_cont,
                    'item__img' => $request->item__id,
                    'item_type' =>$qtd,
                    'item__id' => $request->item__id,
                    'item__ef1' => $request->ef1,
                    'item__ef2' => $request->ef2,
                    'item__ef3' => $request->ef3,
                    'item__efv1' => $request->efv1,
                    'item__efv2' => $request->efv2,
                    'item__efv3' => $request->efv3

                ],
                [
                    'id' => $request->id_item
                ]);

            $this->tipo_msg = 'success';
            $this->msg = 'Item alterado com sucesso!!!';

        } catch (exception $error) {

            $this->tipo_msg = 'error';
            $this->msg = 'Ocorreu o seguinte erro: ' . $error;

        }
        $request->session()->flash($this->tipo_msg, $this->msg);
        return redirect('/panel/neill');
    }

    public function destroy(Request $request)
    {

        try {

                $this->repository->delete($request->id_item);

                $this->tipo_msg = 'success';
                $this->msg = 'Item excluido com sucesso';

        } catch (exception $erros) {

            $this->tipo_msg = 'error';
            $this->msg .= 'Ocorreu o seguinte erro: ' . $erros;

        }

        $request->session()->flash($this->tipo_msg, $this->msg);
        return redirect('/panel/neill');
    }
}
