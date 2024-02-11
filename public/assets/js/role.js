function updaterole(id){
    $.ajax({
        url: "/update_role_get/" + id,
        type: "get",
        success: function (response) {
            $('#file_upload_update, #file_sharing_update, #reminder_own_update, #reminder_with_user_update, #rename_update, #comment_update, #download_update, #add_role_update, #view_user_list_update, #manage_pending_list_update').prop("checked", false);
            var role = response;
            $("#role_id").val(role.id);
            if (role.name==="admin" || role.name==="Admin" || role.name==="user" || role.name==="User") {
                $("#role_name_update").attr('readonly', true);
            }else{
                $("#role_name_update").attr('readonly', false);
            }         
            $("#role_name_update").val(role.name);
            var permissions = response.permissions;
            for (let index = 0; index < permissions.length; index++) {
                const per = permissions[index];
                $("#" + per.name + "_update").prop("checked", true);
            }
        },
        error: function (xhr, status, error) {
            showMessage('error', xhr.responseJSON.message)
        }
    })
}
 $(document).ready(function() {
   $('#roleselect').select2();
 });
