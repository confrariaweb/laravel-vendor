<?php

namespace ConfrariaWeb\Vendor\Traits;

use Illuminate\Support\Facades\Log;

trait ServiceTrait
{

    protected $obj;

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

    public function trashed()
    {
        return $this->obj->onlyTrashed()->get();
    }

    public function withoutGlobalScope($scope)
    {
        $this->obj = $this->obj->withoutGlobalScope($scope);
        return $this;
    }

    public function withoutGlobalScopes($scopes = NULL)
    {
        $this->obj = $this->obj->withoutGlobalScopes($scopes);
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

    public function paginate($take = 10)
    {
        return $this->obj->paginate($take);
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

    public function select($clause)
    {
        $this->obj = $this->obj->select($clause);
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

    public function doesntHave($relationship)
    {
        $this->obj = $this->obj->doesntHave($relationship);
        return $this;
    }

    function all()
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitAll');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitAll');
        }
        try {
            return $this->obj->all();
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    function find($id)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitFind');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitFind');
        }
        try {
            $find = $this->obj->find($id);
            return $find;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    function findOrFail($id)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitfindOrFail');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitfindOrFail');
        }
        try {
            return $this->obj->findOrFail($id);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    public function findBy($field, $value)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitFindBy');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitFindBy');
        }
        try {
            return $this->obj->findBy($field, $value);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    function pluck($field = 'name', $id = 'id')
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitPluck');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitPluck');
        }
        try {
            return $this->obj->pluck($field, $id);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    function where(array $data)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitWhere');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitWhere');
        }
        try {
            $this->obj = $this->obj->where($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return $this;
    }

    public function orWhere(array $data)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitWhere');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitWhere');
        }
        try {
            $this->obj = $this->obj->orWhere($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return $this;
    }

    public function whereIn(string $column, $data = [])
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitWhereIn');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitWhereIn');
        }
        try {
            $this->obj = $this->obj->whereIn($column, $data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return $this;
    }

    public function whereBetween(string $column, $from = null, $to = null)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitwhereBetween');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitwhereBetween');
        }
        try {

            $this->obj = $this->obj->whereBetween($column, $from, $to);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return $this;
    }

    public function whereDate(string $column, $date = null)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitwhereDate');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitwhereDate');
        }
        try {
            $this->obj = $this->obj->whereDate($column, $date);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return $this;
    }

    public function orWhereBetween(string $column, $from = null, $to = null)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitorWhereBetween');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitorWhereBetween');
        }
        try {
            $this->obj = $this->obj->orWhereBetween($column, $from, $to);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return $this;
    }

    function create(array $data)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitCreate');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitCreate');
        }
        try {
            $data = $this->prepareData($data);
            $this->executeBefore($data);
            $this->executeEvent($this->obj->obj, 'Saving');
            $this->executeEvent($this->obj->obj, 'Creating');
            $obj = $this->obj->create($data);
            $this->executeAfter($data, $obj);
            $this->executeEvent($obj, 'Saved');
            $this->executeEvent($obj, 'Created');
            return $obj;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    /**
     * @param array $data
     * @return bool|null
     */
    public function createMany(array $data)
    {
        try {
            foreach ($data as $objData) {
                $obj[] = $this->create($objData);
            }
            return isset($obj) ? $obj : NULL;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    /**
     * @param $data
     * @param $id
     * @return bool
     */
    function update($data, $id)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitUpdate');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitUpdate');
        }
        try {
            $obj = $this->obj->find($id);
            if ($obj) {
                $data = $this->prepareData($data, $obj);
                $this->executeBefore($data);
                $this->executeEvent($obj, 'Saving');
                $this->executeEvent($obj, 'Updating');
                $obj = $this->obj->update($data, $id);
                $this->executeAfter($data, $obj);
                $this->executeEvent($obj, 'Saved');
                $this->executeEvent($obj, 'Updated');
                //$this->executeSchedule($obj, 'Saved');
                //$this->executeSchedule($obj, 'Updated');
                return $obj;
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    /**
     * @param array $data
     * @param string $key_field
     * @param null $obj
     * @return array|bool|null
     */
    public function updateMany(array $data, string $key_field, $obj = null)
    {
        try {
            foreach ($data as $userData) {
                $findBy = $this->findBy($key_field, $userData[$key_field]);
                if ($findBy) {
                    $obj[] = $this->update($userData, $findBy->id);
                }
            }
            return $obj;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    /**
     * @param array $data
     * @param string $key_field
     * @return bool
     */
    public function updateOrCreate(array $data, string $key_field)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitUpdateOrCreate');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitUpdateOrCreate');
        }
        try {
            $data = $this->sometimes($data);
            $data = $this->prepareData($data);
            $updateOrCreate = $this->findBy($key_field, data_get($data, $key_field));
            $attributes = [$key_field => data_get($data, $key_field)];
            $obj = $this->obj->updateOrCreate($attributes, $data);
            $this->executeEvent($obj, 'Saved');
            //$this->executeSchedule($obj, 'Saved');
            if (!is_null($updateOrCreate)) {
                $this->executeEvent($obj, 'Updated');
                //$this->executeSchedule($obj, 'Updated');
            } else {
                $this->executeEvent($obj, 'Created');
                //$this->executeSchedule($obj, 'Created');
            }

            return $obj;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    /**
     * @param array $data
     * @param string $key_field
     * @param bool $obj
     * @return array|bool
     */
    public function updateOrCreateMany(array $data, string $key_field, $obj = false)
    {
        try {
            if (isset($data)) {
                foreach ($data as $d) {
                    $obj[] = $this->updateOrCreate($d, $key_field);
                }
            }
            return $obj;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    function destroy($id)
    {
        if (!property_exists($this, 'obj')) {
            Log::error('Missing OBJ attribute in ServiceTraitDestroy');
            throw new RuntimeException('Missing OBJ attribute in ServiceTraitDestroy');
        }
        try {
            $obj = $this->obj->find($id);

            if ($obj) {
                $this->executeEvent($obj, 'Deleting');
                $deleted = $obj->delete();
                $this->executeEvent($obj, 'Deleted');
                //$this->executeSchedule($obj, 'Deleted');
                return $obj;
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    public function executeEvent($obj, $action)
    {
        try {
            $event = $this->checkEventExist($obj, $action);
            if ($event) {
                $eventClass = new $event($obj);
                event($eventClass);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    private function checkEventExist($obj, $action)
    {
        if (!$obj) {
            return false;
        }
        $event = false;
        $get_class = get_class($obj);
        $get_class_basename = class_basename(get_class($obj));
        $event = (string)'App\\Events\\' . $get_class_basename . $action . 'Event';
        if (class_exists($event)) {
            return $event;
        }
        $event = (string)'ConfrariaWeb\\' . $get_class_basename . '\\Events\\' . $get_class_basename . $action . 'Event';
        if (class_exists($event)) {
            return $event;
        }
        $explodeClass = explode('\\', $get_class);
        if (isset($explodeClass[0]) && $explodeClass[0] == 'ConfrariaWeb' && isset($explodeClass[1])) {
            $event = (string)'ConfrariaWeb\\' . $explodeClass[1] . '\\Events\\' . $get_class_basename . $action . 'Event';
            if (class_exists($event)) {
                return $event;
            }
        }
        return false;
    }

    /**
     * @param array $data
     * @param null $obj
     * @return array
     */
    public function prepareData(array $data, $obj = NULL)
    {
        return $data;
    }

    /**
     * @param array $data
     * @param null $obj
     * @return bool
     */
    public function executeBefore(array $data)
    {
        return true;
    }

    /**
     * @param array $data
     * @param null $obj
     * @return bool
     */
    public function executeAfter(array $data, $obj = NULL)
    {
        return true;
    }

}
