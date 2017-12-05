{!! Form::hidden('job_seeker_id') !!}
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Referee Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Referee Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Referee Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','type'=>'tel']) !!}
</div>

<!-- Confirmed Field -->
<div class="form-group col-sm-6">
   
    {!! Form::label('confirmed', 'confirmed:') !!}<br/>
    <label class="radio-inline">
        {!! Form::radio('confirmed', 1, null) !!} Yes
    </label>

    <label class="radio-inline">
        {!! Form::radio('confirmed', 0, null) !!} No
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jobSeekerReferees.index') !!}" class="btn btn-default">Cancel</a>
</div>
