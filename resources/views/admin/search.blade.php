<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <h2>Search Results for "{{ $query }}"</h2>

    @if ($results->count() > 0)
        <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0"
            aria-describedby="DataTables_Table_0_info" role="grid">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 30px;">
                        <input type="checkbox" id="select-all">
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 297.021px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 267.073px;">No HP</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 205.552px;">Created At</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 146.906px;">Updated At</th>
                </tr>
            </thead>
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
        </table>
    @else
        <p>No results found.</p>
    @endif

</x-layout_admin>
