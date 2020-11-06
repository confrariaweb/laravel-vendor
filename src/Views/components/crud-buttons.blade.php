<div class="btn-group btn-group-sm float-right" role="group">
    <a href="{{ route($routeName . '.show', $id) }}" class="btn btn-info">
        <i class="glyphicon glyphicon-eye"></i> Ver
    </a>
    <a href="{{ route($routeName . '.edit', $id) }}" class="btn btn-primary">
        <i class="glyphicon glyphicon-edit"></i> Editar
    </a>
    <a class="btn btn-danger"
       href="{{ route($routeName . '.destroy', $id) }}"
       onclick="event.preventDefault(); document.getElementById('sections-destroy-form-{{ $id }}').submit();">
        Deletar
    </a>
    <form id="sections-destroy-form-{{ $id }}"
          action="{{ route($routeName . '.destroy', $id) }}"
          method="POST"
          style="display: none;">
        <input name="_method" type="hidden" value="DELETE">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $id }}">
    </form>
</div>