$(document).ready(function () {
    $('#category-form').on('submit', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var categoryName = $('#category-name').val();
        var location = window.location.href;
        if (location.endsWith("user")) {
            var parent_category_id= 1;
        }else{
            var parent_category_id= $('#parent_category_id').val();
        }
        if (parent_category_id=='' || parent_category_id==null) {
            parent_category_id = 0
        }
        $.ajax({
            type: "POST",
            url: '/categories',
            data: {
                "name": categoryName,
                "parent_category_id": parent_category_id
            },
            success: function (data) {
                let dialog = document.getElementById('my_modal_5');
                dialog.close();
                var message = data.success;
                showMessage('success', message)
                var location = window.location.href;
                if (location.endsWith("user")) {
                    localStorage.setItem("myVariable", 1);
                    var modifiedUrl = location.replace('/user', '/files');
                    window.location.href = modifiedUrl;
                }   
                fetch_data(parent_category_id);
            },
            error: function (data) {        
                showMessage('error', data.responseJSON.message)
            }
        });
    });
    $('#category_rename_form').on('submit', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var categoryName = $('#category_name_rename').val();
        var cat_id= $('#cat_id').val();
        var datatype= $('#datatype').val();
        $.ajax({
            type: "POST",
            url: '/rename',
            data: {
                "name": categoryName,
                "cat_id": cat_id,
                "datatype": datatype
            },
            success: function (data) {
                let dialog = document.getElementById('edit_modal');
                dialog.close();
                var message = data.success;
                $('#category_name_rename').val('');
                showMessage('success', message) 
                reloadPageIfURLContainsUser()
                const myVariable = localStorage.getItem('myVariable');
                if (myVariable) {
                    fetch_data(myVariable);
                } else {
                    fetch_data(1);
                }
            },
            error: function (data) {
                showMessage('error', data.responseJSON.message) 
            }
        });
    });
});
function preview_modal_close() {
    let dialog = document.getElementById('preview_modal');
      dialog.close();
}

function closeFileDialog() {
    document.getElementById('File_path').closeModal();
}
function rename_modal_close() {
    let dialog = document.getElementById('edit_modal');
      dialog.close();
}
function modalCreateFolderClose() {
    var $showElement = $('.show-upload');
    $showElement.hide();
}

function file_modal_close() {
    let dialog = document.getElementById('File_path');
      dialog.close();
}

function setRemaider_modal_close(e,modalId){
    e.preventDefault();
    let dialog = document.getElementById(modalId);
    
    dialog.close();
}


$('.click-notification').click(function(){
  let showNotification =  $('#show-notification');
   
});