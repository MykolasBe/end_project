@foreach($buttons  ?? [] as $button_id => $button)
    <button {{ button_attr($button_id, $button )}}>
        {{ $button['text'] }}
    </button>
@endforeach
