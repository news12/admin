<?php

namespace App\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsRepository;
use App\Entities\News;
use App\Validators\NewsValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class NewsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NewsRepositoryEloquent implements NewsRepository
{
    private $news;
    private $id_news;
    private $table_name = 'news';
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }

    public function all($columns = ['*'])
    {
        $data = DB::table($this->table_name)
            ->select($columns)
            ->orderBy('data', 'desc')
            ->get();
        return $data;
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
        $new_item = new News;
        $new_item->acessos = $fields['acessos'];
        $new_item->titulo = $fields['titulo'];
        $new_item->corpo = $fields['corpo'];
        $new_item->tipo = $fields['tipo'];
        $new_item->autor = $fields['autor'];
        $new_item->data = $fields['data'];

        $new_item->save();
      //  dd($new_item);
        return $new_item;
    }

    public function selectID($field,$where = [null])
    {
        $data = DB::table($this->table_name)
            ->select($field)
            ->where('id', $where['id_news'])
            ->get();

        return $data;
    }

    public function delete($id)
    {
        $data = DB::table($this->table_name)
            ->delete($id);

        return $data;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
