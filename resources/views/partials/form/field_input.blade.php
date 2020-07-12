<label>
    <span>{{ $field['label'] ?? '' }}</span>
    @if(in_array($field['type'] ?? [], ['text', 'password', 'email', 'number', 'hidden']))
        <input {!! input_attr($field_id, $field) !!}>
    @elseif(in_array($field['type'] ?? [], ['select']))
        <select {!! select_attr($field_id, $field) !!}>
            @foreach($field['options'] as $option_id => $option)
                <option {!! option_attr($option_id, $field) !!}>
                    {!! $option !!}
                </option>
            @endforeach
        </select>
    @elseif(in_array($field['type'] ?? [], ['textarea']))
        <textarea {!! textarea_attr($field_id, $field) !!}>
            {{ $field['value'] ?? '' }}
        </textarea>
    @elseif(in_array($field['type'] ?? [], ['radio']))
        @foreach($field['options'] as $option_id => $radio)
            <span>{{ $radio }}</span>
            <input
                {!! radio_attr($field_id, $option_id,$field) !!}
                {{( $option_id == $field['value']) ? 'checked' : '' }}>
        @endforeach
    @elseif(in_array($field['type'] ?? [], ['file']))
        <input {!! file_attr($field_id, $field) !!}>
    @endif
    @if($errors->has($field_id))
        <span class="error">{{ $errors->first($field_id) }}</span>
    @endif
</label>
