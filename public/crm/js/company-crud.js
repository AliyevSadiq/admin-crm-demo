$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let table=$('#list-datatable').DataTable({
    stateSave: true,
    paging: true,
    lengthChange: false,
    searching: false,
    ordering: true,
    autoWidth: true,
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: $("#list-datatable").attr("data-list-url"),
    columns: [
        {data: 'id', name: 'id'},
        {data: 'title', name: 'title'},
        {data: 'created_at', name: 'created_at',is_date:true},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    "initComplete": window.datatable
});

$('#createNewCompany').click(function () {
    $('#saveBtn').val("create");
    $('#companyForm').trigger("reset").data('action',$(this).data('url'));
    $('#modelHeading').html("Create New Company");
    $('#ajaxModel').modal('show');
});

$('body').on('click', '.edit-btn', function () {
    let edit_url = $(this).data('edit_url');
    let update_url = $(this).data('update_url');
    $.get(edit_url, function (data) {
        $('#modelHeading').html("Edit Company");
        $('#saveBtn').val("edit");
        $('#ajaxModel').modal('show');
        $('#companyForm').data('action',update_url);
        $('#title').val(data.title);
    })
}).on('click', '.delete-btn', function () {

    let url = $(this).data("delete_url");
    confirm("Are You sure want to delete !");

    $.ajax({
        type: "DELETE",
        url,
        success: function (data) {
            table.draw();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

$('#saveBtn').click(function (e) {
    e.preventDefault();
    $(this).html('Sending..');

    $.ajax({
        data: $('#companyForm').serialize(),
        url: $("#companyForm").data('action'),
        type: $(this).val()==='edit' ? 'PUT' : "POST",
        dataType: 'json',
        success: function (data) {

            $('#companyForm').trigger("reset");
            $('#ajaxModel').modal('hide');
            table.draw();

        },
        error: function (data) {
            let errors=data.responseJSON.errors;
           for(let key in errors){
               $("#companyForm").prepend(`<div class="alert alert-danger" role="alert">
                     ${errors[key]}
               </div>`)
           }

            $('#saveBtn').html('Save Changes');
        }
    });
});


