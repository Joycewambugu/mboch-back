<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Of Birth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_birth', 'Date Of Birth:') !!}
    {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    <label class="radio-inline">
        {!! Form::radio('gender', "male", null) !!} male
    </label>

    <label class="radio-inline">
        {!! Form::radio('gender', "female", null) !!} female
    </label>

</div>

<!-- Education Level Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_level', 'Education Level:') !!}
    {!! Form::select('education_level', ['primary' => 'primary', 'secondary' => 'secondary', 'college' => 'college', 'university' => 'university'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tribe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tribe', 'Tribe:') !!}
    {!! Form::text('tribe', null, ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo') !!}
</div>
<div class="clearfix"></div>

<!-- National Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('national_id', 'National Id:') !!}
    {!! Form::text('national_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Experience Years Field -->
<div class="form-group col-sm-6">
    {!! Form::label('experience_years', 'Experience Years:') !!}
    {!! Form::number('experience_years', null, ['class' => 'form-control']) !!}
</div>

<!-- Spoken Languages Field -->
<div class="form-group col-sm-6">
    {!! Form::label('spoken_languages', 'Spoken Languages:') !!}
    {!! Form::text('spoken_languages', null, ['class' => 'form-control']) !!}
</div>

<!-- Religion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion', 'Religion:') !!}
    {!! Form::text('religion', null, ['class' => 'form-control']) !!}
</div>

<!-- Employment Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employment_status', 'Employment Status:') !!}
    {!! Form::select('employment_status', ['employed' => 'employed', 'searching' => 'searching', 'suspended' => 'suspended'], null, ['class' => 'form-control']) !!}
</div>

<!-- Marital Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marital_status', 'Marital Status:') !!}
    {!! Form::select('marital_status', ['single' => 'single', 'married' => 'married', 'divorced' => 'divorced', 'widowed' => 'widowed'], null, ['class' => 'form-control']) !!}
</div>

<!-- Max Children Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max_children', 'Max Children:') !!}
    {!! Form::number('max_children', null, ['class' => 'form-control']) !!}
</div>

<!-- Health Conditions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('health_conditions', 'Health Conditions:') !!}
    {!! Form::textarea('health_conditions', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jobSeekers.index') !!}" class="btn btn-default">Cancel</a>
</div>
