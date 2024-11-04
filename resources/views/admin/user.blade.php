<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- breadcrumb --}}
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>User Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Management System</a>
                </li>
                <li class="active">
                    <a><strong>Management User</strong></a>
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
                            <h5>Property Data User</h5>

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
                                            </div>
                                        </div>
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
                                                            action="{{ route('user.store') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="name"
                                                                    class="col-sm-2 control-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="name" name="name"
                                                                        placeholder="Enter name" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="email"
                                                                    class="col-sm-2 control-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="email" name="email"
                                                                        placeholder="Enter email" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="password"
                                                                    class="col-sm-2 control-label">Password</label>
                                                                <div class="col-sm-10">
                                                                    <input type="password" class="form-control"
                                                                        id="password" name="password"
                                                                        placeholder="Enter password" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="role">Role</label>
                                                                <select class="form-control" id="role"
                                                                    name="role" required>
                                                                    <option value="" disabled selected>Select
                                                                        Role</option>
                                                                    <option value="user">User</option>
                                                                    <option value="admin">Admin</option>
                                                                    <option value="super admin">Super Admin</option>
                                                                </select>
                                                            </div>
                                                            <br>
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

                                        {{-- modal edit --}}
                                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form dengan Method PUT untuk Update -->
                                                        <form id="editItemForm" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="name" name="name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control"
                                                                    id="email" name="email" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="role">Role</label>
                                                                <select class="form-control" id="role"
                                                                    name="role" required>
                                                                    <option value="" disabled>Select Role
                                                                    </option>
                                                                    <option value="user">User</option>
                                                                    <option value="admin">Admin</option>
                                                                    <option value="super admin">Super Admin</option>
                                                                </select>
                                                            </div>
                                                            <input type="hidden" id="currentPassword"
                                                                name="currentPassword" value="">
                                                            <!-- Hidden input for current password -->
                                                        </form>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" form="editItemForm"
                                                            class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>
                                                Search:
                                                <form action="{{ route('user.show') }}" method="GET"
                                                    class="form-inline">
                                                    <div class="input-group">
                                                        <!-- Input untuk pencarian -->
                                                        <input type="search" name="title"
                                                            class="form-control input-sm" placeholder=""
                                                            aria-controls="DataTables_Table_0" required>

                                                        <!-- Tombol pencarian -->
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-sm btn-primary"
                                                                type="submit">Search</button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </label>
                                        </div> --}}

                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>
                                                Search:
                                                <form action="{{ route('user.show') }}" method="GET"
                                                    class="form-inline">
                                                    <div class="input-group">
                                                        <input type="search" name="query"
                                                            class="form-control input-sm"
                                                            placeholder="Search users..."
                                                            value="{{ request('query') }}" required>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-sm btn-primary"
                                                                type="submit">Search</button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </label>
                                        </div>


                                        {{-- <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite">Showing 1 to 25 of 57 entries</div> --}}
                                        <table
                                            class="table table-striped table-bordered table-hover dataTables-example dataTable">
                                            <thead>
                                                <tr role="row">
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role(s)</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($users) && count($users) > 0)
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td>{{ $user['name'] ?? 'N/A' }}</td>
                                                            <td>{{ $user['email'] ?? 'N/A' }}</td>
                                                            <td>{{ $user['role'] ?? 'N/A' }}</td>
                                                            <td>{{ $user['created_at'] ?? 'N/A' }}</td>
                                                            <td>{{ $user['updated_at'] ?? 'N/A' }}</td>
                                                            <td>
                                                                <a href="#"
                                                                    class="btn btn-outline btn-success btn-sm"
                                                                    data-toggle="modal" data-target="#editModal"
                                                                    data-id="{{ $user['id'] }}"
                                                                    data-name="{{ $user['name'] }}"
                                                                    data-email="{{ $user['email'] }}"
                                                                    data-role="{{ $user['role'] }}">Edit</a>
                                                                <form
                                                                    action="{{ route('user.destroy', $user['id']) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-outline btn-danger btn-sm">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6" class="text-center">No users found</td>
                                                    </tr>
                                                @endif
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
<script>
    $(document).ready(function() {
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var role = button.data('role');
            var currentPassword = button.data('password'); // Ambil password dari data

            var modal = $(this);
            modal.find('#name').val(name);
            modal.find('#email').val(email);
            modal.find('#role').val(role);
            modal.find('#currentPassword').val(currentPassword); // Set password ke hidden input
            modal.find('#editItemForm').data('id', id);
        });

        $('#editItemForm').on('submit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = '/admin-user/update/' + id;
            $(this).attr('action', url);
            this.submit();
        });
    });
</script>
