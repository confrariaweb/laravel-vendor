<?php

namespace ConfrariaWeb\Vendor\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

trait RepositoryTrait
{

    public $obj;

    protected function cacheName($name = null)
    {
        return class_basename($this->obj) . $name;
    }

    public function doesntHave($relationship)
    {
        $this->obj = $this->obj->doesntHave($relationship);
        return $this;
    }

    public function withTrashed()
    {
        $this->obj = $this->obj->withTrashed();
        return $this;
    }

    public function onlyTrashed()
    {
        $this->obj = $this->obj->onlyTrashed();
        return $this;
    }

    public function withoutGlobalScope($scope)
    {
        $this->obj = $this->obj->withoutGlobalScope($scope);
        return $this;
    }

    public function withoutGlobalScopes($scopes)
    {
        $this->obj = $this->obj->withoutGlobalScope($scopes);
        return $this;
    }

    public function skip($offset = 0)
    {
        $this->obj = $this->obj->skip($offset);
        return $this;
    }

    public function take($limit = 10)
    {
        $this->obj = $this->obj->take($limit);
        return $this;
    }

    public function groupBy($by)
    {
        $this->obj = $this->obj->groupBy($by);
        return $this;
    }

    public function orderBy($order = 'id', $by = 'asc')
    {
        $this->obj = $this->obj->orderBy($order, $by);
        return $this;
    }

    public function get()
    {
        return $this->obj->get();
    }

    public function first()
    {
        return $this->obj->first();
    }

    public function paginate($take = 10)
    {
        return $this->obj->paginate($take);
    }

    public function select($clause = false)
    {
        $this->obj = ($clause) ? $this->obj->select($clause) : $this->obj;
        return $this;
    }

    public function all()
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in EloquentTraitAll');
            throw new RuntimeException('Missing OBJ attribute in EloquentTraitAll');
        }
        return $this->obj->all();
    }

    public function create(array $data)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in EloquentTraitCreate');
            throw new RuntimeException('Missing OBJ attribute in EloquentTraitCreate');
        }
        try {
            $create = $this->obj->create($data);
            $this->relationships($create, $data);
            return $create;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    public function find($id)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in EloquentTraitFind');
            throw new RuntimeException('Missing OBJ attribute in EloquentTraitFind');
        }
        $find = $this->obj->find($id);
        return $find;
    }

    public function findOrFail($id)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in EloquentTraitfindOrFail');
            throw new RuntimeException('Missing OBJ attribute in EloquentTraitfindOrFail');
        }
        return $this->obj->findOrFail($id);
    }

    public function pluck($field = 'name', $id = 'id')
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in EloquentTraitFind');
            throw new RuntimeException('Missing OBJ attribute in EloquentTraitFind');
        }
        return $this->obj->get()->pluck($field, $id);
    }

    public function findBy($field, $value)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in EloquentTraitFindBy');
            throw new RuntimeException('Missing OBJ attribute in EloquentTraitFindBy');
        }
        if (!in_array($field, $this->obj->getFillable())) {
            return false;
        }
        return $this->obj
            ->when(in_array($field, $this->obj->getFillable()), function ($query) use ($field, $value) {
                return $query->where($this->obj->getTable() . '.' . $field, $value);
            })
            ->first();
    }

    public function update(array $data, $id)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in EloquentTraitUpdate');
            throw new RuntimeException('Missing OBJ attribute in EloquentTraitUpdate');
        }
        $update = $this->obj->find($id);
        $update->update($data);
        $this->relationships($update, $data);
        return $update;
    }


    public function updateOrCreate(array $attributes, array $values = array())
    {
        try {
            $attributeKey = key($attributes);
            $attributeVal = data_get($values, $attributeKey);
            $updateOrCreate = $this->findBy($attributeKey, $attributeVal);
            if (!$updateOrCreate) {
                $updateOrCreate = $this->create($values);
            } else {
                $updateOrCreate->update($values);
            }
            $this->relationships($updateOrCreate, $values);
            return $updateOrCreate;
        } catch (Exception $e) {
            return false;
        }
        return false;
    }


    public function destroy($id)
    {
        if (!property_exists($this, 'obj')) {
            throw new RuntimeException('Missing OBJ attribute');
        }
        return $this->obj->destroy($id);
    }

    public function where(array $data = [])
    {
        if (!property_exists($this, 'obj')) {
            throw new RuntimeException('Missing OBJ attribute');
        }
        $this->obj = $this->obj->where($data);
        return $this;
    }

    public function orWhere(array $data = [])
    {
        if (!property_exists($this, 'obj')) {
            throw new RuntimeException('Missing OBJ attribute');
        }
        $this->obj = $this->obj->orWhere($data);
        return $this;
    }

    public function whereIn(string $column, $data = [])
    {
        if (!property_exists($this, 'obj')) {
            throw new RuntimeException('Missing OBJ attribute');
        }
        $this->obj = $this->obj->whereIn($this->obj->getTable() . '.' . $column, $data);
        return $this;
    }

    public function whereBetween(string $column, $from = null, $to = null)
    {
        if (!property_exists($this, 'obj')) {
            throw new RuntimeException('Missing OBJ attribute');
        }
        $this->obj = $this->obj->whereBetween($column, [$from, $to]);
        return $this;
    }

    public function whereDate(string $column, $date = null)
    {
        if (!property_exists($this, 'obj')) {
            throw new RuntimeException('Missing OBJ attribute');
        }
        $this->obj = $this->obj->whereDate($column, $date);
        return $this;
    }

    public function orWhereBetween(string $column, $from = null, $to = null)
    {
        if (!property_exists($this, 'obj')) {
            throw new RuntimeException('Missing OBJ attribute');
        }
        $this->obj = $this->obj->whereBetween($column, [$from, $to]);
        return $this;
    }

    public function attach($obj, array $data)
    {
        //
    }

    public function syncWithoutDetaching($obj, array $data)
    {
        //
    }

    public function sync($obj, array $data)
    {
        //
    }

    protected function relationships($obj, array $data)
    {
        if (!property_exists($this, 'obj')) {
            throw new RuntimeException('Missing OBJ attribute');
        }

        if (isset($data['attach'])) {
            $this->attach($obj, $data['attach']);
        }

        if (isset($data['sync'])) {
            $this->sync($obj, $data['sync']);
        }

        if (isset($data['syncWithoutDetaching'])) {
            $this->syncWithoutDetaching($obj, $data['syncWithoutDetaching']);
        }

    }

}
