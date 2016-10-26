@extends('layouts.moder')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Books</div>
                    <div class="panel-body">
                        
                        <a href="{{ url('/moder/create/dep') }}">
                            <button type="button" class="btn btn-success">
                                <i class="glyphicon glyphicon-pencil"></i> Добавить новый отдел
                            </button>
                        </a>
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>Отдел</th>
                                <th>Подчинение</th>
                                <th>&nbsp;</th>
                            </thead>
                            
                            <!-- Table Body -->
                            <tbody>
                                @foreach ($deps as $d)
                                    <tr>
                                        
                                        <td class="table-text">
                                            <div>{{ $d->name }}</div>
                                        </td>
                                        <?php //print_r($d->id);?>
                                        <td class="table-text">
                                            <div>@if(!empty($d->parent_id->name))?{{ $d->parent_id->name }}:;@endif</div>
                                        </td>
                                        <?php //print_r($book->id);?>    
                                        <td>
                                            <a href="{{ url('/moder/edit/dep/'.$d->id) }}">
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="glyphicon glyphicon-repeat"></i> Edit 
                                                </button>
                                            </a>
                                        </td>
                                        
                                        <td>
                                            <form action="{{ url('/moder/delete/dep/'.$d->id) }}" method="GET" onclick="return confirm('Вы уверены что хотите удалить?')">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <?php echo $deps->links(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection