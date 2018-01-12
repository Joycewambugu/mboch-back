@section('css')
    @include('layouts.datatables_css')
@endsection
<table class="table table-responsive" id="employers-table">
    <thead>
        <tr>
            {{--  <th>User Id</th>  --}}
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Current Location</th>
        <th>Tribe</th>
        <th>Spoken Languages</th>
        <th>Religion</th>
        {{--  <th>Family Structure</th>
        <th>House Size</th>
        <th>No Of Children</th>
        <th>Help Hours</th>  --}}
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($employers as $employer)
        <tr>
            <td>{!! $employer->user->name !!}</td>
            <td>{!! $employer->user->email !!}</td>
            <td>{!! $employer->user->phone !!}</td>
            <td>{!! $employer->current_location !!}</td>
            <td>{!! $employer->tribe !!}</td>
            <td>{!! $employer->spoken_languages !!}</td>
            <td>{!! $employer->religion !!}</td>
            {{--  <td>{!! $employer->family_structure !!}</td>
            <td>{!! $employer->house_size !!}</td>
            <td>{!! $employer->no_of_children !!}</td>
            <td>{!! $employer->help_hours !!}</td>  --}}
            <td>
                {!! Form::open(['route' => ['employers.destroy', $employer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('employers.show', [$employer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('employers.edit', [$employer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        $('#employers-table').DataTable();
    });
</script>
@endsection