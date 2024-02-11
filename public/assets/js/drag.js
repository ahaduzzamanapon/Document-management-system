function startdrag() {
    const whiteBoxes = document.getElementsByClassName('drag_box');
    const deletePopUp = document.getElementById('deletePopUp');
    const bottomDrawer = document.getElementById('bottomDrawer');
    const reminderdrag = document.getElementById('reminderdrag');
    for (whiteBox of whiteBoxes) {
        whiteBox.addEventListener('dragstart', (e) => {
            bottomDrawer.classList.toggle('open');
            // e.target.style.display = "none";
            let selectedcatid = $(e.target).closest('section').attr('data-id');
            let datatype = $(e.target).closest('section').attr('data-type');
            let dataname = $(e.target).closest('section').attr('data-name');
            localStorage.setItem('selectedcatid', selectedcatid);
            localStorage.setItem('selecteddata_type', datatype);
            localStorage.setItem('selecteddata_name', dataname);

            e.target.closest('section').classList.add('hold');
        });

        whiteBox.addEventListener('dragend', (e) => {
            e.target.closest('section').classList.remove('hold');
            // e.target.style.display = "block";
            bottomDrawer.classList.toggle('open');
            let getifdelete = localStorage.getItem('deletedrop');
            let getifreminder= localStorage.getItem('reminderdrop');
            if (getifreminder == 1) {
                localStorage.setItem('reminderdrop', 0);
                setRemaider_Modal.showModal();
                let dataIdfiles =localStorage.getItem('selectedcatid');
                let datatype =localStorage.getItem('selecteddata_type');
                $('#cat_id_set_remainder').val(dataIdfiles);
                $('#file_type_set_remainder').val(datatype);
            }
            if (getifdelete == 1) {
                localStorage.setItem('deletedrop', 0);
                let dataid =localStorage.getItem('selectedcatid');
                let datatype =localStorage.getItem('selecteddata_type');
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/delete_files', // Replace with your Laravel route or controller URL
                            method: 'get',
                            data: {
                                dataIdfiles: dataid,
                                type_files: datatype
                            },
                            success: function (response) {
                                localStorage.setItem('deletedrop', 0);
                                showMessage('success', response)
                                const myVariable = localStorage.getItem("myVariable");
                                if (myVariable) {
                                    fetch_data(myVariable);
                                } else {
                                    fetch_data(1);
                                }
                            },
                            error: function (xhr) {
                                showMessage('error', 'There was an error')
                                var parent_category_id = $('#parent_category_id').val();
                                fetch_data(parent_category_id);
                            }
                        });
                    }
                })
                
            }

        });

        whiteBox.addEventListener('dragover', (e) => {
            e.preventDefault();
            let dataid = $(e.target).closest('section').attr('data-id');
            localStorage.setItem('move_cat', dataid);
            // console.log('DragOver has been triggered');
            e.target.closest('section').classList.add('dashed');
        });

        whiteBox.addEventListener('dragenter', (e) => {
            // console.log('DragEnter has been triggered');
            e.target.closest('section').classList.add('dashed');
        });

        whiteBox.addEventListener('dragleave', (e) => {
            // console.log('DragLeave has been triggered');
            e.target.closest('section').classList.remove('dashed');
        });

        whiteBox.addEventListener('drop', (e) => {
            // // console.log('Drop has been triggered');
            let dataid = $(e.target).closest('section').attr('data-id');
            let datatype = $(e.target).closest('section').attr('data-type');
            selecteddata_type = localStorage.getItem('selecteddata_type');
            selectedcatid = localStorage.getItem('selectedcatid');
       

            if(selecteddata_type==datatype){
                if (selectedcatid!=dataid) {
                    movecat();
                }
            }else{
                movecat();
            }
            e.target.closest('section').classList.remove('dashed');
        });

    }
    deletePopUp.addEventListener('dragover', (e) => {
        e.preventDefault();
    });

    deletePopUp.addEventListener('dragenter', (e) => {
    });

    deletePopUp.addEventListener('dragleave', (e) => {
        localStorage.setItem('deletedrop', 0);
    });

    deletePopUp.addEventListener('drop', (e) => {
        localStorage.setItem('deletedrop', 1);
    });

    reminderdrag.addEventListener('dragover', (e) => {
        e.preventDefault();
    });

    reminderdrag.addEventListener('dragenter', (e) => {
    });

    reminderdrag.addEventListener('dragleave', (e) => {
        localStorage.setItem('reminderdrop', 0);
    });

    reminderdrag.addEventListener('drop', (e) => {
        localStorage.setItem('reminderdrop', 1);
    });
}
