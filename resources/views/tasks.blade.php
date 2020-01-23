@extends('master')

@section('content')
    <div class="panel-body panel-padding-zero">
        <table class="table table-striped task-table menu-margin">
            <!-- Table Body -->
            <tbody>
            @foreach ($tasks as $value)
                @if($value->status == 1)
                    <tr>
                        <td class="col-sm-1">
                                <a class="button-check button-circle" href="/task/{{$value->id}}/edit"><i class="fa fa-check button-white"></i></a>
                        </td>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div class="task-padding" data-editable>{{ $value->name }}</div>
                        </td>

                    </tr>
                @else
                    <tr>
                        <td class="col-sm-1">
                            <a class="button-check button-circle"><i class="fa fa-check green"></i></a>
                        </td>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div class="task-padding"><del>{{ $value->name }}</del></div>
                        </td>

                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection