@extends('layouts.moder')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить новую книгу</div>
                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')
                        
                        <form action="{{ url('/moder/save/book') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" id="formupload">
                            {!! csrf_field() !!}
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Загрузите обложку</label>
                                
                                <div class="col-sm-6">  
                                   <!-- <img src="/uploads/book_avatar/default.jpg" style="width:150px; heidth:150px; float:left; margin-right:25px;">-->
                                    <input type="file" name="avatar" id="fileupload">
                                    <p id="max" class="bg-danger" style="color: red; border-radius: 5px; margin:10px 0 0 0; padding: inherit;"></p>
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Название</label>
                
                                <div class="col-sm-6">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Автор</label>
                
                                <div class="col-sm-6">
                                    <input type="text" name="author" class="form-control">
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Год издания</label>
                
                                <div class="col-sm-6">
                                    <input type="number" name="pubyear" class="form-control">
                                </div>
                            </div>
                             <?php //echo"<pre>"; print_r($genre);?>   
                            <div class="form-group">
                                 <label class="col-sm-3 control-label">Жанр</label>
                                <div class="col-sm-6">
                                    <select  class="form-control" name="genre_id">
                                    @foreach ($genres as $g)
                                        <option value ='{{ $g->id }}'>{{ $g->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                                
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">Тип</label>
                                <div class="col-sm-6">
                                    <select  class="form-control" name="type">
                                        <option value ='Бумажная'>Бумажная</option>
                                        <option value ='Электронная'>Электронная</option>
                                    </select>
                                </div>
                            </div>    
                                
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Описание</label>
                                
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="3" name="description"></textarea>
                                 </div>
                            </div>
                                
                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Создать
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection