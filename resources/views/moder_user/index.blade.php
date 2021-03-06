@extends('layouts.moder')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12 ">
            <div class="panel panel-default">
                 <!--<div class="panel-heading">Пользователи</div>-->
                    <div class="panel-body">
                        
                        <a href="{{ url('/moder/create/user') }}">
                            <button type="button" class="btn btn-success btn-margin-top" >
                                <i class="glyphicon glyphicon-pencil"></i> Добавить
                            </button>
                        </a>
                        <table class="table task-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>Доступ</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Роль</th>
                                <th>Отдел</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </thead>
                            
                            <!-- Table Body -->
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            @if($user->active == '0')
                                                <div class="col-md-2" style="color:#ff0000">Запрещен
                                                </div>
                                            @else<div class="col-md-2" style="color:#00C957">Разрешен
                                                </div>
                                            @endif
                                        </td>
                                        
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $user->name }}</div>
                                        </td>
                                        
                                        <td class="table-text">
                                            <div>{{ $user->email }}</div>
                                        </td>
                                           
                                        <td class="table-text">
                                            <div>{{$user->role->name}}</div>
                                        </td>
                                         
                                        
                                        <td class="table-text">
                                            <div>{{$user->dep->name}}</div>
                                        </td>
                                        
                                        <td>
                                            <a href="{{ url('/moder/edit/user/'.$user->id) }}">
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="glyphicon glyphicon-repeat"></i> Редактировать 
                                                </button>
                                            </a>
                                        </td>
                                        
                                        <td>
                                            <form action="{{ url('/moder/delete/user/'.$user->id) }}" method="GET" onclick="return confirm('Вы уверены что хотите удалить?')">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Удалить
                                                </button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php echo $users->links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection