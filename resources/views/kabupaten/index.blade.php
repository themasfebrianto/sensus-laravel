        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

@extends('layouts.app')
@section('content')
<div class="container">
        <div class="col-8 table-responsive">
            <table class="table table-bordered user_datatable" id="mytable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kabupaten</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

<script type="text/javascript">
$('#mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:"{{ route('kabupaten.index') }}"
        },
        columns: [
            {data: 'id_kabupaten'},
            {data: 'nama_kabupaten'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
</script>

