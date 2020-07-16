<table class="table">
    <thead>
    <tr>
        @foreach($headers ?? [] as $table_head)
            <th>{{ $table_head }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($rows ?? [] as $table_row)
        <tr>
            @foreach($table_row ?? [] as $row_data)
                <td>{!! $row_data !!}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>

