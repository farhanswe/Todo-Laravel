<!DOCTYPE html>
<html lang="en">
<head>
    <title>todos weDev</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <h1 class="text-center"> todos </h1>
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading panel-padding-zero">
                <form action="/task" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <span class="input-group-addon  white"><i class="fa fa-angle-down"></i></span>
                        <input type="text" name="name" id="task-name" class="form-control input-form-hight"
                               placeholder="What needs to be done?">
                    </div>
                </form>
            </div>

            @if (count($tasks) > 0)
                @yield('content')
                <div class="panel-footer panel-padding-zero">
                    <nav class="navbar navbar-default white menu-margin">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav na">
                                <li><a>{{$tasks->where('status',1)->count()}} items left</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-center">
                                <li><a href="{{URL::to('task')}}">All</a></li>
                                <li><a href="{{URL::to('task/active')}}">Active</a></li>
                                <li><a href="{{URL::to('task/completed')}}">Completed</a></li>
                            </ul>
                            @if ($tasks->where('status',0)->count() > 0)
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a>
                                        <form action="/task/delete" method="POST">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button>Clear completed</button>
                                        </form>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </nav>
                </div>
            @endif

        </div>
    </div>
</div>


<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script>
    $('body').on('click', '[data-editable]', function(){
        var $el = $(this);
        var $input = $('<input class="form-control task-padding"/>').val( $el.text() );
        $el.replaceWith( $input );

        var save = function(){
            var $p = $('<div data-editable class="task-padding"/>').text( $input.val() );
            $input.replaceWith( $p );
            $.post("/task/"+$el.text(),
                {
                    name: $input.val(),
                    _method: 'PUT',
                    _token:'{{ csrf_token() }}'
                },
                function(data, status){
                    //window.location.href = "/task";
                    //alert("Data: " + data + "\nStatus: " + status);
                });
        };
        $input.one('blur', save).focus();
    });
</script>
</body>
</html>