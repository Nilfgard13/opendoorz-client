<tbody>
    @forelse ($nomors as $nomor)
        <tr class="gradeA odd" role="row">
            <td class="sorting_1">
                <input type="checkbox" name="select_gecko" class="select-item"
                    value="{{ $nomor->id }}">
            </td>
            <td>{{ $nomor['name'] }}</td>
            <td>{{ $nomor['nomor'] }}</td>
            <td class="center">{{ $nomor['created_at'] }}</td>
            <td class="center">{{ $nomor['updated_at'] }}</td>
        </tr>
    @empty
    @endforelse
</tbody>

<tbody>
    @foreach ($results as $result)
        <tr class="gradeA odd" role="row">
            <td class="sorting_1">
                <input type="checkbox" name="select_gecko" class="select-item" value="{{ $result->id }}">
            </td>
            <td>{{ $result->name }}</td>
            <td>{{ $result->nomor }}</td>
            <td class="center">{{ $result->created_at }}</td>
            <td class="center">{{ $result->updated_at }}</td>
        </tr>
    @endforeach
</tbody>