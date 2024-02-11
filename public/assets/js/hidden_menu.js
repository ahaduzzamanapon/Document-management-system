const files_info_dr = document.getElementById('files_info_dr');
const linkeliment = document.getElementById('Folder_Info');
const files_info_dr_close = document.getElementById('files_info_dr_close');

    linkeliment.addEventListener('click', () => {
        linkeliment.classList.toggle('active');
        files_info_dr.classList.toggle('active');
        let dataIdfiles = '';
        dataIdfiles = document.getElementById('Folder_Info').getAttribute('data-catid');
        datatype = document.getElementById('Folder_Info').getAttribute('data-type');
        $.ajax({
          url: '/get_details', // Replace with your Laravel route or controller URL
          method: 'get',
          data: {
            dataIdfiles: dataIdfiles,
            datatype: datatype
          },
          success: function (response) {

            const momentDateTime = moment(response.updated_at);
            const momentDateTime2 = moment(response.created_at);
            const updated_at = momentDateTime.format('h.mm A, DD MMM YYYY');
            const created_at = momentDateTime2.format('h.mm A, DD MMM YYYY');
        
            $('#File_update_at_info').html(updated_at)
            $('#File_create_at_info').html(created_at);

            if(langTranslations.Current_Language=='en'){
              $('#File_Owner_info').html(response.nameEn)
            }else{
              $('#File_Owner_info').html(response.nameBn)
            }

            if (response.name) {
              $('#File_name_info').html(response.name)
              $('#File_title_info').html(response.name)
            } else {
              $('#File_name_info').html(response.title)
              $('#File_title_info').html(response.title)
            }
          },
          error: function (xhr) {
            console.log(xhr.responseText);
          }
        });
      });


  files_info_dr_close.addEventListener('click', () => {
    linkeliment.classList.toggle('active');
    files_info_dr.classList.toggle('active');
  });
