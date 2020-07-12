@foreach($buttons  ?? [] as $button_id => $button)
    <button {{ button_attr($button_id, $button )}}>
        {{ $button['text'] }}
    </button>
@endforeach

<ul class="list1">
    <li>item1</li>
    <li>item2</li>
    <li>item3</li>
    <li>item4</li>
</ul>
<ul class="list2">
    <li>item1</li>
    <li>item4</li>
</ul>
