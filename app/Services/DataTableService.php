<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class DataTableService
{
    public  $totalData      = null;
    public  $totalFiltered  = null;

    public function __construct()
    {
        $this->totalData        = 0;
        $this->totalFiltered    = 0;
    }

    public static function getDataTables($draw = 0, $totalData = 0, $totalFiltered = 0, $data = null)
    {
        $json_data = array(
            "draw"            => intval($draw),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );   
        return json_encode($json_data); 
    }

    public function preparesDataTables($request, $query, $columnsSearch, $columns)
    {
        $this->totalData      = $query->count();            
        $this->totalFiltered  = $this->totalData; 
        $limit                = $request->input('length');
        $start                = $request->input('start');
        $order                = $columns[$request->input('order.0.column')];
        $dir                  = $request->input('order.0.dir');

        if( !empty($request->input('search.value')) )
        {            
            $search     = strtolower(trim($request->input('search.value')));
            $count      = 0;
            foreach ($columnsSearch as $key => $value) {
                $value = str_replace('.', '`.`', str_replace('`.`','.', $value));
                if ( $count == 0 ){
                    $query = $query->whereRaw('LOWER(`' . $value . '`) LIKE ?',"%" . $search . "%");
                } else {
                    $query = $query->orWhereRaw('LOWER(`' . $value . '`) LIKE ?',"%" . $search . "%");
                }
                $count += 1;
            }
            $this->totalFiltered  = $query->count();
        }

        return $query->offset($start)->limit($limit)->orderBy($order,$dir);
    }
   

    public function addColumnsActionDataTables($object = null, $name = null, $disabled = false, $modelKey = null, $listLabel = null)
    {
        if ( $object == null ){
            return '';
        }
        $column         = '';
        $routeDelete    = $modelKey . '.destroy';
        $routeEdit      = $modelKey . '.edit';

        if ( $disabled ){
            $column = $column . '<button disabled type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>';
            $column = $column . '<button disabled type="button" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></button>';
        } else {
            $column = $column . '<a href="'. route($routeEdit, $object->id) .'" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>';
            $column = $column . '<button onclick="destroy(\''.($listLabel).'\',\''.$name.'\',\''.route($routeDelete, $object->id).'\')" type="button" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></button>';
        }
        return $column;
    }

    public function addColumnsActiveDataTables($object)
    {
        if ( ( isset($object->deleted_at )) && ( $object->deleted_at) ) {
            return '<span class="badge badge-danger">Excluído</span>';
        } else {
            if ( $object->active ){
                return '<span class="badge badge-success">Ativo</span>';
            } else {
                return "<span class='badge badge-warning'>Inativo</span>";
            }
        }
        return null;
    }



    
}
