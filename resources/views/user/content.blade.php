@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <!--<div class="panel-heading">Пользователь</div>-->
                <div class="panel-body">
                   
                    <!---->
                    <div class="col-md-2">
                        <img src="/uploads/avatars/{{$user->avatar}}" style="width:100px; heidth:100px; margin-right:50px; float:left;">
                    </div>
                    
                    <!---->    
                    <div class="col-md-10">
                        
                        <div class="col-sm-12">
                            <div class="col-sm-9"><h3>{{ $user->name }}</h3></div>
                        </div>
                        
                        <div class="col-sm-12">
                            @if($user->count_status > 0)
                                <div class="col-sm-3">Прочел:</div>
                                <div class="col-sm-9">
                                    <?php new App\Sklonenie($user->count_status, ['книгу','книги','книг']);?>    
                                </div>
                            @endif
                        </div>    
                                    
                        <div class="col-sm-12">
                            @if($user->count_coment > 0)
                                <div class="col-sm-3">Оставил:</div>
                                <div class="col-sm-9">
                                    <?php new App\Sklonenie($user->count_coment, ['отзыв','отзыва','отзывов']);?>           
                                </div>
                            @endif
                        </div>  
                    </div>
                        
                    <!--Статус чтения-->
                    <?php
                        $status_2 = App\Status::StatusToUser($user->id, "2");
                        $status_3 = App\Status::StatusToUser($user->id, "3");
                    ?>
                    
                    <div id="panel2" style="padding-top:100px;">
                        @if(count($status_2) > 0 || count($status_3) > 0)
                            <h3>Статус чтения</h3>
                        @endif
                        <!--Читаю-->
                        <div class="col-md-12">                           
                            @if(count($status_2) > 0)
                                <h4 style="font-size: 100%; border-bottom: 2px solid maroon; font-weight: normal; padding-bottom: 5px;" >
                                    Читаю
                                </h4></br>
                                @foreach($status_2  as $k=>$v)
                                    <a href="/book/{{$v->id}}" style = "text-decoration:none; color:#777;" >
                                        <div class="col-sm-2" style="text-align:center; padding:15px;">
                                            <p>
                                                <img src="/uploads/book_avatar/{{$v->avatar}}" style="width:100px; heidth:100px;">
                                                <?php //var_dump($status_2); exit?> {{$v->title}}
                                            </p>
                                            <p>{{strftime("%d.%m.%Y", strtotime($v->created_at))}}</p>
                                        </div>
                                    </a>    
                                @endforeach
                                <div class="col-md-12"><?php echo $status_2->links(); ?></div>
                            @endif
                        </div>
                        <!--Прочел-->
                        <div class="col-md-12">                           
                            @if(count($status_3) > 0)
                                <h4 style="font-size: 100%; border-bottom: 2px solid maroon; font-weight: normal; padding-bottom: 5px;" >
                                    Прочел
                                </h4></br>
                                @foreach($status_3  as $k=>$v)
                                    <a href="/book/{{$v->id}}" style="text-decoration:none; color:#777;">
                                        <div class="col-sm-2" style="text-align:center; padding:15px;">
                                            <p>
                                                <img src="/uploads/book_avatar/{{$v->avatar}}" style="width:100px; heidth:100px;">
                                                {{$v->title}}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                                <div class="col-md-12"><?php echo $status_3->links(); ?></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                
            @if(count($coment) > 0)    
                <h4 style="font-size: 100%; border-bottom: 2px solid maroon; font-weight: normal; padding: 0 30px 5px 30px; " >
                    Последние комментарии
                </h4>
            @endif
            <!--<div class="panel panel-default">-->
                <!--<div class="panel-heading">Последние комментарии</div>-->
                
            <div style="margin:0 0 400px;">
                @foreach($coment as $c)         
                @if(count($c->coment)>0)
                <div class="col-sm-12">
                <hr>
                    <div class="col-md-1">
                        <a href="{{ url('book/'.$c->book_id) }}">
                            <img src="/uploads/book_avatar/{{$c->avatar}}" style="max-width:70px; float:left;">
                        </a>
                    </div>
                    <div class="col-md-11">
                        <div class="col-sm-12">
                            <a href="{{ url('book/'.$c->book_id) }}" style="text-decoration:none; color: black;">
                                 <b style="font-size:16px;">
                                     {{ $c->title }}
                                 </b>
                            </a>
                            <span style="color:grey; font-size:12px;padding-left:15px;">
                                 {{$c->updated_at->format('d-m-Y')}} в {{$c->updated_at->format('H:i')}}
                             </span>
                        </div>
                        <div class="col-sm-12" style="font-size:16px;">{{ $c->coment }}</div>	
                    </div>
                </div>
                @endif
                @endforeach    
            </div>
        </div>
    </div>
</div>
@endsection