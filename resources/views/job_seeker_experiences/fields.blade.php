<!-- Job Seeker Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_seeker_id', 'Job Seeker Id:') !!}
    {!! Form::select('job_seeker_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Family Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('family_type', 'Family Type:') !!}
    {!! Form::select('family_type', ['nuclear' => 'nuclear', 'extended' => 'extended', 'single' => 'single'], null, ['class' => 'form-control']) !!}
</div>

<!-- No Of Children Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_of_children', 'No Of Children:') !!}
    {!! Form::number('no_of_children', null, ['class' => 'form-control']) !!}
</div>

<!-- Employer Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employer_name', 'Employer Name:') !!}
    {!! Form::text('employer_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Employer Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employer_contact', 'Employer Contact:') !!}
    {!! Form::text('employer_contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jobSeekerExperiences.index') !!}" class="btn btn-default">Cancel</a>
</div>
