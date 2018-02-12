<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Lara Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lara_code', 'Lara Code:') !!}
    {!! Form::text('lara_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Directory Field -->
<div class="form-group col-sm-6">
    {!! Form::label('directory', 'Directory:') !!}
    {!! Form::text('directory', null, ['class' => 'form-control']) !!}
</div>

<!-- Sort Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort_order', 'Sort Order:') !!}
    {!! Form::number('sort_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Rtl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rtl', 'Rtl:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('rtl', false) !!}
        {!! Form::checkbox('rtl', '1', null) !!} 1
    </label>
</div>

<!-- Fallback Frontend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fallback_frontend', 'Fallback Frontend:') !!}
    {!! Form::text('fallback_frontend', null, ['class' => 'form-control']) !!}
</div>

<!-- Fallback Backend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fallback_backend', 'Fallback Backend:') !!}
    {!! Form::text('fallback_backend', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.languages.index') !!}" class="btn btn-default">Cancel</a>
</div>
