@extends('master')

@section('content')
    <div class="panel-body panel-padding-zero">
        <table class="table table-striped task-table menu-margin">
            <!-- Table Body -->
            <tbody>
            @foreach ($tasks->where('status',1) as $value)
                <tr>
                    <td class="col-sm-1">
                        <a class="button-check button-circle" href="/task/{{$value->id}}/edit"><i class="fa fa-check button-white"></i></a>
                    </td>
                    <!-- Task Name -->
                    <td class="table-text">
                        <div class="task-padding" data-editable>{{ $value->name }}</div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection