<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- breadcrumb --}}
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Property Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Management System</a>
                </li>
                <li class="active">
                    <a><strong>Management Property</strong></a>
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
                            <h5>Property Data Tables</h5>

                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper"
                                        class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="html5buttons">
                                            <div class="dt-buttons btn-group"><button type="button"
                                                    class="btn btn-outline btn-primary" data-toggle="modal"
                                                    data-target="#addModal">
                                                    Add
                                                </button>
                                                {{-- <a
                                                    class="btn btn-default buttons-csv buttons-html5" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    href="#"><span>Update</span></a><a
                                                    class="btn btn-default buttons-excel buttons-html5" tabindex="0"
                                                    aria-controls="DataTables_Table_0"
                                                    href="#"><span>Delete</span></a> --}}
                                            </div>
                                        </div>
                                        <!-- Modal Add -->
                                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                            aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Add New Item</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <div class="modal-body">
                                                        <!-- Menambahkan action dan method yang benar, serta CSRF token -->
                                                        <form id="addItemForm" method="POST"
                                                            action="{{ route('product.store') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="title"
                                                                    class="col-sm-2 control-label">Title</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="title" name="title"
                                                                        placeholder="Enter item name" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="description"
                                                                    class="col-sm-2 control-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter item description"
                                                                        required></textarea>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="price"
                                                                    class="col-sm-2 control-label">Price</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" class="form-control"
                                                                        id="price" name="price"
                                                                        placeholder="Enter item price" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="location"
                                                                    class="col-sm-2 control-label">Location</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="location" name="location"
                                                                        placeholder="Enter item location" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="type"
                                                                    class="col-sm-2 control-label">Type</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="type" name="type"
                                                                        placeholder="Enter item type" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="status"
                                                                    class="col-sm-2 control-label">Status</label>
                                                                <select class="form-control" id="status"
                                                                    name="status" required>
                                                                    <option value="" disabled selected>Select
                                                                        status</option>
                                                                    <option value="available">Available</option>
                                                                    <option value="sold">Sold</option>
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="category_id">Category</label>
                                                                <select class="form-control" id="category_id"
                                                                    name="category_id" required>
                                                                    <option value="" disabled selected>Select
                                                                        category</option>
                                                                    <option value="1">Unit 1</option>
                                                                    <option value="2">Unit 2</option>
                                                                    <option value="3">Unit 3</option>
                                                                    <option value="4">Unit 4</option>
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="image_path">Image</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        id="image_path" name="image_path" required>
                                                                    <label class="custom-file-label pl-3"
                                                                        for="image_path">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" form="addItemForm"
                                                            class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
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
                                                <form action="{{ route('products.search') }}" method="GET"
                                                    class="form-inline">
                                                    <div class="input-group">
                                                        <!-- Input untuk pencarian -->
                                                        <input type="search" name="title"
                                                            class="form-control input-sm"
                                                            placeholder="Enter product title"
                                                            aria-controls="DataTables_Table_0" required>

                                                        <!-- Tombol pencarian -->
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-sm btn-primary"
                                                                type="submit">Search</button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </label>
                                        </div>

                                        {{-- <!-- Tampilkan hasil pencarian -->
                                        @if (isset($products) && count($products) > 0)
                                            <h3>Search Results:</h3>
                                            <ul>
                                                @foreach ($products as $product)
                                                    <li>{{ $product['title'] }} - {{ $product['price'] }}</li>
                                                @endforeach
                                            </ul>
                                        @elseif(isset($products))
                                            <p>No products found for "{{ request('title') }}"</p>
                                        @endif --}}

                                        {{-- <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite">Showing 1 to 25 of 57 entries</div> --}}
                                        <table
                                            class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                            id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                            role="grid">
                                            <thead>
                                                <tr role="row">
                                                    {{-- <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending"
                                                        style="width: 240.115px;">ID</th> --}}
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending"
                                                        style="width: 165.021px;">Title</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 267.073px;">Description</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending"
                                                        style="width: 105.552px;">Price</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 146.906px;">Location</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 100.906px;">Type</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 100.906px;">Status</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 100.906px;">Category ID</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 146.906px;">Images</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 146.906px;">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="propertyTableBody">
                                                @forelse($products as $product)
                                                    <tr class="gradeA odd" role="row">
                                                        <td>{{ $product['title'] }}
                                                        </td>
                                                        <td>{{ $product['description'] }}
                                                        </td>
                                                        <td>{{ $product['price'] }}
                                                        </td>
                                                        <td>{{ $product['location'] }}
                                                        </td>
                                                        <td>{{ $product['type'] }}
                                                        </td>
                                                        <td>{{ $product['status'] }}
                                                        </td>
                                                        <td>
                                                            @if (is_array($product['category_id']))
                                                                {{ implode(', ', $product['category_id']) }}
                                                            @else
                                                                {{ $product['category_id'] }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (isset($product['images']) && count($product['images']) > 0)
                                                                <img src="{{ $product['images'][0]['url'] }}"
                                                                     alt="{{ $product['title'] }}"
                                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                                            @else
                                                                No Image
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="btn btn-outline btn-success btn-sm">Edit</a>
                                                            <form action="#"
                                                                method="POST" class="d-inline">
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
        </div>

    </div>

</x-layout_admin>
