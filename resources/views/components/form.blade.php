<form {!! html_attr(($attr ?? []) + ['method' => 'POST']) !!} class="input-form">
    @csrf
    <div class="input-group">
        @foreach($fields as $field_id => $field)
            @if (View::exists('partials.form.field-' . $field['type']))
                @include('components/form/field-' . $field['type'], [
                    'field_id' => $field_id,
                    'field'=>$field
                 ])
            @else
                @include('partials.form.field_input', [
                    'field_id' => $field_id,
                    'field' => $field
                ])
            @endif
        @endforeach
    </div>
    <div class="button-group">
        @foreach($buttons  ?? [] as $button_id => $button)
            @include('partials.form.form_buttons', [
                'button_id' => $button_id,
                'button' => $button
            ])
        @endforeach
    </div>
</form>
