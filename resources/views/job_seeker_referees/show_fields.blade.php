<!-- Job Seeker Field -->
<div class="form-group">
    {!! Form::label('JobSeeker', 'Job Seeker Name:') !!}
    {!! $jobSeekerReferee->jobSeeker->name !!}
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
   {!! $jobSeekerReferee->name !!}
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
   {!! $jobSeekerReferee->address !!}
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
   {!! $jobSeekerReferee->phone !!}
</div>

<!-- Confirmed Field -->
<div class="form-group">
    {!! Form::label('confirmed', 'Confirmed:') !!}
   {!! $jobSeekerReferee->confirmed?'Yes':'No' !!}
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
   {!! $jobSeekerReferee->created_at !!}
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
   {!! $jobSeekerReferee->updated_at !!}
</div>

