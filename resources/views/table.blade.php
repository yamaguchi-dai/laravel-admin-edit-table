<table {!! $attributes !!}>
    <thead>
    <tr>
        @foreach($headers as $header)
            <th>{{ $header }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($rows as $row)
        <tr data-pk="{{$row[$pk_key]}}">
            @foreach($row as $column=>$value)
                <td>
                    @if(in_array($column,$edit_list))
                        <input data-column_name={{$column}} class="form-control" value="{{$value}}">
                    @else
                        {!! $value !!}
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
