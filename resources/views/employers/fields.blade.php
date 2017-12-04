<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo') !!}
</div>
<div class="clearfix"></div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Current Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('current_location', 'Current Location:') !!}
    {!! Form::text('current_location', null, ['class' => 'form-control']) !!}
</div>

<!-- Tribe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tribe', 'Tribe:') !!}
    {!! Form::text('tribe', null, ['class' => 'form-control']) !!}
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

<!-- Family Structure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('family_structure', 'Family Structure:') !!}
    {!! Form::select('family_structure', ['nuclear' => 'nuclear', 'extended' => 'extended', 'single' => 'single'], null, ['class' => 'form-control']) !!}
</div>

<!-- House Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('house_size', 'House Size:') !!}
    {!! Form::text('house_size', null, ['class' => 'form-control']) !!}
</div>

<!-- No Of Children Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_of_children', 'No Of Children:') !!}
    {!! Form::number('no_of_children', null, ['class' => 'form-control']) !!}
</div>

<!-- Help Hours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('help_hours', 'Help Hours:') !!}
    {!! Form::select('help_hours', ['day' => 'day', 'day and night' => 'day and night', 'scheduled few hours' => 'scheduled few hours', 'on call few hours' => 'on call few hours'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('employers.index') !!}" class="btn btn-default">Cancel</a>
</div>
