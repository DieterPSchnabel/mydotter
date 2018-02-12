<!-- Countries Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('countries_name', 'Countries Name:') !!}
    {!! Form::text('countries_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Countries Iso Code 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('countries_iso_code_2', 'Countries Iso Code 2:') !!}
    {!! Form::text('countries_iso_code_2', null, ['class' => 'form-control']) !!}
</div>

<!-- Countries Iso Code 3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('countries_iso_code_3', 'Countries Iso Code 3:') !!}
    {!! Form::text('countries_iso_code_3', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Format Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address_format_id', 'Address Format Id:') !!}
    {!! Form::number('address_format_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    {!! Form::number('active', null, ['class' => 'form-control']) !!}
</div>

<!-- Sort Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort_order', 'Sort Order:') !!}
    {!! Form::number('sort_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Europe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_europe', 'Is Europe:') !!}
    {!! Form::number('is_europe', null, ['class' => 'form-control']) !!}
</div>

<!-- Indiv Porto Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('indiv_porto_active', 'Indiv Porto Active:') !!}
    {!! Form::number('indiv_porto_active', null, ['class' => 'form-control']) !!}
</div>

<!-- Indiv Porto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('indiv_porto', 'Indiv Porto:') !!}
    {!! Form::number('indiv_porto', null, ['class' => 'form-control']) !!}
</div>

<!-- Indiv Porto Freigrenze Field -->
<div class="form-group col-sm-6">
    {!! Form::label('indiv_porto_freigrenze', 'Indiv Porto Freigrenze:') !!}
    {!! Form::number('indiv_porto_freigrenze', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.countries.index') !!}" class="btn btn-default">Cancel</a>
</div>
