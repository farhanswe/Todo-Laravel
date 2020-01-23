@extends('master')

@section('content')
    <div class="panel-body panel-padding-zero">
        <table class="table table-striped task-table menu-margin">
            <!-- Table Body -->
            <tbody>
            @foreach ($tasks->where('status',0) as $value)
                <tr>
                    <td class="col-sm-1">
                        <button class="button-check button-circle"><i class="fa fa-check green"></i></button>
                    </td>
                    <!-- Task Name -->
                    <td class="table-text">
                        <div class="task-padding"><del>{{ $value->name }}</del></div>
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection