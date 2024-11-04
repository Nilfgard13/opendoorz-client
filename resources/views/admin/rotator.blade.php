<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- breadcrumb --}}
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>WA Rotator Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Management System</a>
                </li>
                <li class="active">
                    <a><strong>Management Rotator Link</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    {{-- table --}}
    <div class="wrapper wrapper-content animated fadeIn">

        <div class="p-w-md m-t-sm">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Property Data Admin for Rotator</h5>

                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper"
                                        class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="html5buttons">
                                            <div class="dt-buttons btn-group"><a
                                                    class="btn btn-default buttons-copy buttons-html5" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    href="#"><span>Add</span></a><a
                                                    class="btn btn-default buttons-csv buttons-html5" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    href="#"><span>Update</span></a><a
                                                    class="btn btn-default buttons-excel buttons-html5" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    href="#"><span>Delete</span></a>
                                            </div>
                                        </div>
                                        {{-- <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show
                                                <select name="DataTables_Table_0_length"
                                                    aria-controls="DataTables_Table_0" class="form-control input-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div> --}}
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>
                                                Search:
                                                <div class="input-group">
                                                    <input type="search" class="form-control input-sm" placeholder=""
                                                        aria-controls="DataTables_Table_0">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-sm btn-primary"
                                                            type="button">Search</button>
                                                    </span>
                                                </div>
                                            </label>
                                        </div>


                                        {{-- <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite">Showing 1 to 25 of 57 entries</div> --}}
                                        <table
                                            class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                            id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                            role="grid">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending"
                                                        style="width: 240.115px;">Name</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending"
                                                        style="width: 297.021px;">Nomor</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 267.073px;">Created At(s)</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending"
                                                        style="width: 205.552px;">Updated At</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 146.906px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($nomors as $nomor)
                                                    <tr class="gradeA odd" role="row">
                                                        <td>{{ $nomor['name'] }}
                                                        </td>
                                                        <td>{{ $nomor['nomor'] }}
                                                        </td>
                                                        <td>{{ $nomor['created_at'] }}
                                                        </td>
                                                        <td>{{ $nomor['updated_at'] }}
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-outline btn-success btn-sm">Edit</a>
                                                            <form action="#" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">No products found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        {{-- pagination --}}
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
                                                        href="#" aria-controls="DataTables_Table_0"
                                                        data-dt-idx="4" tabindex="0">Next</a></li>
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




                                <p>Generate Link Result:</p>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        value="http://opendoorzweb.test/admin/show-link" readonly="">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary"
                                            onclick="copyToClipboard('http://opendoorzweb.test/admin/show-link')">
                                            <i class="fa fa-copy"></i>
                                        </button>
                                    </span>
                                </div>
                                <hr>
                                <div class="table-responsive text-center">
                                    <p>Check Generated Link</p>
                                    <a href="http://opendoorzweb.test/admin/show-link" target="_blank"
                                        class="btn btn-primary btn-md my-4">Test</a>
                                </div>




                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function copyToClipboard(text) {
            var tempInput = document.createElement("input");
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
        }
    </script>

</x-layout_admin>
