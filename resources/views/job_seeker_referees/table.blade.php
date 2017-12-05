@section('css')
    @include('layouts.datatables_css')
@endsection
<table class="table table-responsive dataTable" id="jobSeekerReferees-table">
    <thead>
        <tr>
            <th>Job Seeker</th>
            <th>Referee Name</th>
            <th>Referee Address</th>
            <th>Referee Phone</th>
            <th>Confirmed</th>
            <th> Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jobSeekerReferees as $jobSeekerReferee)
        <tr>
            <td>{!! $jobSeekerReferee->jobSeeker->name !!}</td>
            <td>{!! $jobSeekerReferee->name !!}</td>
            <td>{!! $jobSeekerReferee->address !!}</td>
            <td>{!! $jobSeekerReferee->phone !!}</td>
            <td>{!! $jobSeekerReferee->confirmed?'Yes':'No' !!}</td>
            <td >
                  {!! Form::open(['route' => ['jobSeekerReferees.destroy', $jobSeekerReferee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('jobSeekerReferees.show', [$jobSeekerReferee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('jobSeekerReferees.edit', [$jobSeekerReferee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}  
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
    @include('layouts.datatables_js')
    <script>
    $(document).ready(function(){
        $('#jobSeekerReferees-table').DataTable();
    });
</script>
@endsection