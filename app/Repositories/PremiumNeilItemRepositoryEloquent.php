<?php

namespace App\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PremiumNeilItemRepository;
use App\Entities\PremiumNeilItem;
use App\Validators\PremiumNeilItemRepositoryValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class PremiumNeilItemRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PremiumNeilItemRepositoryEloquent implements PremiumNeilItemRepository
{

    private $item;
    private $id_item;
    private $table_name = 'premiun_nell_itens';
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PremiumNeilItem::class;
    }

    public function all($columns = ['*'])
    {
        $dados = DB::table($this->table_name)
            ->select($columns)
            ->orderBy('item_name', 'desc')
            ->get();
        return $dados;
    }

    public function update($field = ['*'])
    {
        $update = DB::table($this->table_name)
            ->update($field);
        return $update;
    }

    public function update_where($field = ['*'], $where = null)
    {
        $update = DB::table($this->table_name)
            ->where('id', '=', $where['id'])
            ->update($field);

        return $update;

    }

    public function create($fields = [null])
    {
        $new_item = new PremiumNeilItem;
        $new_item->item_name = $fields['item_name'];
        $new_item->item_price = $fields['item_price'];
        $new_item->item_desc = $fields['item_desc'];
        $new_item->item_cont = $fields['item_cont'];
        $new_item->item_cat_id = $fields['item_cat_id'];
        $new_item->item_type = $fields['item_type'];
        $new_item->item_date = $fields['item_date'];
        $new_item->item__img = $fields['item__img'];
        $new_item->item__id = $fields['item__id'];
        $new_item->item__ef1 = $fields['item__ef1'];
        $new_item->item__ef2 = $fields['item__ef2'];
        $new_item->item__ef3 = $fields['item__ef3'];
        $new_item->item__efv1 = $fields['item__efv1'];
        $new_item->item__efv2 = $fields['item__efv2'];
        $new_item->item__efv3 = $fields['item__efv3'];

        $new_item->save();
      //  dd($new_item);
        return $new_item;
    }

    public function selectID($field,$where = [null])
    {
        $dados = DB::table($this->table_name)
            ->select($field)
            ->where('id', $where['id_item'])
            ->get();

        return $dados;
    }

    public function delete($id)
    {
        $dados = DB::table($this->table_name)
            ->delete($id);

        return $dados;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
