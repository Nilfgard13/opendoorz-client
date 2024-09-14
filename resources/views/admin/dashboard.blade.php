<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- body content --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Rotator Management System</h5>

                    <div class="ibox-content">

                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="html5buttons">
                                    <div class="dt-buttons btn-group">
                                        <!-- Button Add -->
                                        <button type="button" class="btn btn-outline btn-primary" data-toggle="modal"
                                            data-target="#addModal">
                                            Add
                                        </button>

                                        <button id="editSelected" type="button" class="btn btn-outline btn-success">
                                            Edit
                                        </button>

                                        <!-- Button Delete -->
                                        <button id="deleteSelected" type="button" class="btn btn-outline btn-danger">
                                            Delete
                                        </button>
                                    </div>
                                </div>

                                <!-- Modal Add -->
                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                    aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addModalLabel">Add New Item</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form content for adding -->
                                                <form class="text-center" action="{{ route('nomors.store') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="itemName">Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            id="itemName" placeholder="Enter name">
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="itemNomor">No HP</label>
                                                        <input type="number" class="form-control" name="nomor"
                                                            id="itemNomor" placeholder="Enter the number">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="deleteForm" action="{{ route('nomors.multiDelete') }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    Are you sure you want to delete the selected items?
                                                    <input type="hidden" name="ids" id="delete_ids">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Selected Items</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="editForm" action="{{ route('nomors.multiUpdate') }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body" id="editModalBody">
                                                    <!-- Dynamic form inputs will be added here -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show
                                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                            class="form-control input-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div> --}}
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <form action="{{ route('search') }}" method="GET">
                                        <label>
                                            Search:
                                            <div class="input-group">
                                                <input type="search" name="query" class="form-control input-sm"
                                                    placeholder="" aria-controls="DataTables_Table_0">
                                                <span class="input-group-btn">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm">Search</button>
                                                </span>
                                            </div>
                                        </label>
                                    </form>
                                </div>
                                <br>
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                    aria-live="polite">Penambahan no hp harus dengan format 62'No HP'</div>
                                <table
                                    class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                    id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                    role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 30px;">
                                                <input type="checkbox" id="select-all">
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 297.021px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 267.073px;">No HP</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 205.552px;">Created At
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 146.906px;">Updated At
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($nomors as $item)
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1">
                                                    <input type="checkbox" name="select_gecko" class="select-item"
                                                        value="{{ $item->id }}">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->nomor }}</td>
                                                <td class="center">{{ $item->created_at }}</td>
                                                <td class="center">{{ $item->updated_at }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No data available.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <form action="{{ route('nomors.search') }}" method="GET"
                                    class="form-inline my-2 my-lg-0">
                                    <!-- Clear Search Button -->
                                    @if (request('query'))
                                        <a href="{{ route('nomors.index') }}"
                                            class="btn btn-outline-danger my-2 my-sm-0 ml-2">Clear Search</a>
                                    @endif
                                </form>

                                {{-- <div class="dataTables_paginate paging_simple_numbers"
                                    id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled"
                                            id="DataTables_Table_0_previous"><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="0"
                                                tabindex="0">Previous</a></li>
                                        <li class="paginate_button active"><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="1"
                                                tabindex="0">1</a></li>
                                        <li class="paginate_button "><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="2"
                                                tabindex="0">2</a></li>
                                        <li class="paginate_button "><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="3"
                                                tabindex="0">3</a></li>
                                        <li class="paginate_button next" id="DataTables_Table_0_next"><a
                                                href="#" aria-controls="DataTables_Table_0" data-dt-idx="4"
                                                tabindex="0">Next</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Link Generator</h5>

                    <div class="ibox-content">
                        {{-- <form method="GET" action="{{ route('nomors.generateLink') }}">
                            <div class="table-responsive text-center">
                                <p>Click button below for generating link</p>
                                <button type="submit" class="btn btn-primary btn-lg my-4">Generate Link WA
                                    Rotator</button>
                            </div>
                        </form> --}}

                        {{-- Menampilkan hasil generated link jika ada --}}
                        {{-- @if (session('generated_url')) --}}
                        <p>Generate Link Result:</p>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ url(route('nomors.showLink')) }}"
                                readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary"
                                    onclick="copyToClipboard('{{ url(route('nomors.showLink')) }}')">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </span>
                        </div>
                        <hr>
                        <div class="table-responsive text-center">
                            <p>Check Generated Link</p>
                            <a href="{{ url(route('nomors.showLink')) }}" target="_blank"
                                class="btn btn-primary btn-md my-4">Test</a>
                        </div>
                        {{-- @endif --}}

                        {{-- Menampilkan hasil lama jika ada --}}
                        {{-- @if (isset($url))
                            <p>Generate Link Result :</p>
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $url }}" readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary"
                                            onclick="copyToClipboard('{{ $url }}')">
                                            <i class="fa fa-copy"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                            <hr>
                            <div class="table-responsive text-center">
                                <p>Check Generated Link</p>
                                <a href="{{ $url }}" target="_blank"
                                    class="btn btn-primary btn-md my-4">Test</a>
                            </div>
                        @endif --}}
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-layout_admin>
