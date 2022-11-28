@if(isset($edit_url) && $edit_url)
    <a href="javascript:void(0)" data-toggle="tooltip" data-edit_url="{{$edit_url}}" data-update_url="{{$update_url}}"  class="btn btn-primary btn-sm edit-btn">EDIT</a>
@endif
@if(isset($delete_url) && $delete_url)
    <a href="javascript:void(0)" data-toggle="tooltip" class='btn btn-danger btn-sm delete-btn' data-delete_url="{{$delete_url}}" >DELETE</a>
@endif

