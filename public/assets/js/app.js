const ctx = document.getElementById("myChart");

new Chart(ctx, {
    type: "bar",
    data: {
        labels: [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
            20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31,
        ],
        datasets: [
            {
                label: "MB",
                data: [
                    12, 19, 3, 5, 2, 3, 8, 4, 6, 46, 45, 4, 2, 6, 9, 4, 2, 5, 8,
                    2, 5, 8, 5, 4, 12, 7, 13, 14, 2, 22, 33, 15, 22, 15, 5, 4,
                    2,
                ],
                backgroundColor: ["#007A43"],
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
//chart end
//jquery start
$(document).ready(function () {
    // When the hamburger button is clicked
    $(".hamburger").click(function () {
        //console.log("asi");
        // Toggle the sidebar's visibility by changing its left position
        $(".sidebar1").toggleClass("lg:w-[15.7%] lg:block hidden");
    });
    $(".remove-doc").click(function () {
        console.log("ok rmove");
    });

    //let lastScrollTop = 0;

    // $(window).scroll(function() {
    //     let scrollTop = $(this).scrollTop();
    //     console.log(scrollTop);

    //     if (scrollTop > lastScrollTop) {
    //         // Scroll down: hide the section
    //         $(".scroll-hide").addClass('hidden');
    //     } else {
    //         // Scroll up: show the section
    //         $(".scroll-hide").removeClass('hidden');
    //     }

    // });
    $(".accordion-content").hide();
    $(".accordion-title").click(function () {
        var $content = $(this).next(".accordion-content");

        // Hide all other open content sections
        $(".accordion-content").not($content).slideUp();
        $(".accordion-title").not(this).removeClass("active");
        $(".accordion-title")
            .not(this)
            .find(".rotated-icon")
            .removeClass("rotate-180");

        // Toggle the clicked content section
        $content.slideToggle();
        $(this).toggleClass("active");
        $(this).find(".rotated-icon").toggleClass("rotate-180");
    });

    $("#search-btn").click(() => {
        $("#search-feild").removeClass("hidden");
        $("#search-feild").addClass(
            "w-full transition-width duration-300 ease-in-out whitespace-nowrap "
        );
    });

    $("#modal-close").click(() => {
        let dialog = document.getElementById("my_modal_5");
        dialog.close();
    });

    $("#moveformsub").on("submit", function (e) {
        e.preventDefault();
        var cat_id = $("#move_cat").val();
        $.ajax({
            type: "get",
            url: "/categories_rename",
            data: {
                name: categoryName,
                cat_id: cat_id,
            },
            success: function (data) {
                $("#edit_modal").css("display", "none");
                var message = data.success;
                $("#category_name_rename").val("");
                showMessage("success", message);
                reloadPageIfURLContainsUser();
                fetch_data(cat_id);
            },
            error: function (data) {
                toastr.options = {
                    positionClass: "toast-bottom-right",
                };
                toastr.error(data.responseJSON.message);
            },
        });
    });
});

   


function delete_files(event) {
    var dataIdfiles = event.target.getAttribute("data-catid");
    var type_files = event.target.getAttribute("data-type");
    console.log(type_files);
    $.ajax({
        url: "/delete_files", // Replace with your Laravel route or controller URL
        method: "get",
        data: {
            dataIdfiles: dataIdfiles,
            type_files: type_files,
        },
        success: function (response) {
            showMessage("success", response);
            reloadPageIfURLContainsUser();
            var parent_category_id = $("#parent_category_id").val();
            var targetElement = $("#open-file-section");
            targetElement.slideUp("fast");
            fetch_data(parent_category_id);
        },
        error: function (xhr) {
            showMessage("error", "There was an error");
            var parent_category_id = $("#parent_category_id").val();
            fetch_data(parent_category_id);
        },
    });
}

function set_cat_id(el) {
    let selectedcatid = $(el).attr("data-catid");
    let datatype = $(el).attr("data-type");
    localStorage.setItem("selectedcatid", selectedcatid);
    localStorage.setItem("selecteddata_type", datatype);
}

function set_cat_id_for_share(el) {
    let selectedcatid = $(el).attr("data-catid");
    let datatype = $(el).attr("data-type");
    $('#document_id_for_share').val(selectedcatid);
    $('#document_type_for_share').val(datatype); 
}

function movecat() {
    selectedcatid = localStorage.getItem("selectedcatid");
    selecteddata_type = localStorage.getItem("selecteddata_type");
    move_cat_to = localStorage.getItem("move_cat");
    $.ajax({
        url: "/move_folder", // Replace with your Laravel route or controller URL
        method: "get",
        data: {
            selectedcatid: selectedcatid,
            move_cat_to: move_cat_to,
            selecteddata_type: selecteddata_type,
        },
        success: function (m) {
            let dialog = document.getElementById("File_path");
            if (dialog) {
                dialog.close();
            }
            reloadPageIfURLContainsUser();
            showMessage("success", "Success");
            fetch_data(move_cat_to);
            localStorage.removeItem("selectedcatid");
            localStorage.removeItem("move_cat");
        },
    });
}

function folder_path(id = null) {
    const myVariable = localStorage.getItem("myVariable");
    const selectedcatid = localStorage.getItem("selectedcatid");
    const selecteddata_type = localStorage.getItem("selecteddata_type");
    var folder_id = 1;
    if (myVariable) {
        folder_id = myVariable;
    }
    if (id) {
        var folder_id = id;
    }
    $.ajax({
        url: "/get_path", // Replace with your Laravel route or controller URL
        method: "get",
        data: {
            folder_id: folder_id,
            selectedcatid: selectedcatid,
            selecteddata_type: selecteddata_type,
        },
        success: function (data) {
            localStorage.setItem("move_cat", folder_id);
            $("#add_content_directory").empty();
            $("#bar_camb").empty();
            var response = data.folder;
            var breadcrumbs = data.breadcrumbs;
            console.log(breadcrumbs);
            // Assuming response is an array of items you want to iterate over
            if (response.length > 0) {
                response.forEach(function (item) {
                    // Create a new HTML element for each item
                    var newItem = `<div class="w-[45%] cursor-pointer lg:w-[30%] py-3 border border-gray-400 rounded-md shadow-md transition-all hover:bg-gray-400 ease-in" ondblclick="folder_path(${item.id})" >
            <div class="flex items-center justify-around">
              <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M2.25 21H18.75L19.47 20.445L23.415 9.945L22.695 9H21V5.25L20.25 4.5H11.565L10.275 3.225L9.75 3H2.25L1.5 3.75V20.25L2.25 21ZM3 4.5H9.435L10.725 5.775L11.25 6H19.5V9H12.75L12.225 9.225L10.935 10.5H5.25L4.545 11.01L3.045 15.63L3 4.5ZM18.195 19.5H3.285L5.79 12H11.25L11.775 11.775L13.065 10.5H21.75L18.195 19.5Z" fill="black"/>
              </svg>
              <p class="text-16 font-solaimans w-[70%] whitespace-nowrap overflow-hidden overflow-ellipsis select-none" title="${item.name}">${item.name}</p>
            </div>
          </div>`;

                    // Append the new item to the element with the ID 'add_content_directory'
                    $("#add_content_directory").append(newItem);
                });
            } else {
                $("#add_content_directory").append("There is no Data");
            }

            breadcrumbs.forEach(function (item) {
                // Create a new HTML element for each item
                var Items = `<a onclick="folder_path(${item.id})">${item.name}</a>/`;
                // Append the new item to the element with the ID 'add_content_directory'
                $("#bar_camb").append(Items);
            });
        },
        error: function (xhr) {},
    });
}

function rename_folder(event) {
    var dataIdfiles = event.target.getAttribute("data-catid");
    var dataname = event.target.getAttribute("data-name");
    var datatype = event.target.getAttribute("data-type");
    if (datatype=='file') {
        dataname = dataname.split(".")[0];
    }
    $("#category_name_rename").val(dataname);
    $("#cat_id").val(dataIdfiles);
    $("#datatype").val(datatype);
}
function set_cat_id_remainder(el) {
    var dataIdfiles = $(el).attr("data-catid");
    var datatype = $(el).attr("data-type");
    console.log(dataIdfiles);
    $("#cat_id_set_remainder").val(dataIdfiles);
    $("#file_type_set_remainder").val(datatype);
}
function reloadPageIfURLContainsUser() {
    var location = window.location.href;

    if (location.endsWith("user")) {
        window.location.reload();
    }
}

$(document).ready(function () {
    $("#reminder_list").empty();
    $.ajax({
        url: "/reminder_show", // Replace with your Laravel route or controller URL
        method: "GET",
        dataType: "json", // Specify the expected response format
        success: function (response) {
            if (response.length > 0) {
                reminder_show_modal.showModal();
                var item = "";
                for (let index = 0; index < response.length; index++) {
                    const data = response[index];
                    console.log(data.reminder_date);
                    item += ` 
          <section class="modal-box" style="min-width: 40%;">
          <div class="flex justify-end">
              <span onclick="closeNotifile(this);  mark_as_read_Reminder(${data.id})" class="cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12 0.375C5.57812 0.375 0.375 5.57812 0.375 12C0.375 18.4219 5.57812 23.625 12 23.625C18.4219 23.625 23.625 18.4219 23.625 12C23.625 5.57812 18.4219 0.375 12 0.375ZM17.7 15.0516C17.9203 15.2719 17.9203 15.6281 17.7 15.8484L15.8438 17.7C15.6234 17.9203 15.2672 17.9203 15.0469 17.7L12 14.625L8.94844 17.7C8.72812 17.9203 8.37187 17.9203 8.15156 17.7L6.3 15.8438C6.07969 15.6234 6.07969 15.2672 6.3 15.0469L9.375 12L6.3 8.94844C6.07969 8.72812 6.07969 8.37187 6.3 8.15156L8.15625 6.29531C8.37656 6.075 8.73281 6.075 8.95312 6.29531L12 9.375L15.0516 6.3C15.2719 6.07969 15.6281 6.07969 15.8484 6.3L17.7047 8.15625C17.925 8.37656 17.925 8.73281 17.7047 8.95312L14.625 12L17.7 15.0516Z" fill="#FF715B"/>
                  </svg></span>
          </div>
          <div class="flex justify-center items-center">
              <figure>
                  <img src="/assets/image/reminderdrag.gif" alt=""  width="250" />
              </figure>
          </div>
          <div class="flex items-center justify-between">
              <h2 class="text-18 font-solaimans leading-5">${langTranslations.You_have_a_reminder}</h2>

           
          </div>
          <div class="flex items-center gap-2">

                  <div class="flex items-center gap-1">
                      <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0263 2H14.3684V1H13.2631V2H4.42101V1H3.31575V2H1.65786L1.10522 2.5V14.5L1.65786 15H16.0263L16.5789 14.5V2.5L16.0263 2ZM15.4736 14H2.21049V5H15.4736V14ZM15.4736 4H2.21049V3H15.4736V4ZM4.42101 8H3.31575V9H4.42101V8ZM3.31575 10H4.42101V11H3.31575V10ZM4.42101 12H3.31575V13H4.42101V12ZM6.63154 8H7.7368V9H6.63154V8ZM7.7368 10H6.63154V11H7.7368V10ZM6.63154 12H7.7368V13H6.63154V12ZM7.7368 6H6.63154V7H7.7368V6ZM9.94733 8H11.0526V9H9.94733V8ZM11.0526 10H9.94733V11H11.0526V10ZM9.94733 12H11.0526V13H9.94733V12ZM11.0526 6H9.94733V7H11.0526V6ZM13.2631 8H14.3684V9H13.2631V8ZM14.3684 10H13.2631V11H14.3684V10ZM13.2631 6H14.3684V7H13.2631V6Z" fill="#007A43"/>
                              </svg>
                      </span>
                      <p class="text-12 font-solaimans text-[#5C5F62] leading-3"> ${data.reminder_date}</p>
                  </div>
                  <div class="flex items-center gap-1">
                      <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 19 16" fill="none">
                              <path d="M9.52648 0.25C4.79457 0.25 0.960693 3.71875 0.960693 8C0.960693 12.2812 4.79457 15.75 9.52648 15.75C14.2584 15.75 18.0923 12.2812 18.0923 8C18.0923 3.71875 14.2584 0.25 9.52648 0.25ZM9.52648 14.25C5.70987 14.25 2.61859 11.4531 2.61859 8C2.61859 4.54688 5.70987 1.75 9.52648 1.75C13.3431 1.75 16.4344 4.54688 16.4344 8C16.4344 11.4531 13.3431 14.25 9.52648 14.25ZM11.661 10.9875L8.72862 9.05937C8.62155 8.9875 8.55938 8.875 8.55938 8.75625V3.625C8.55938 3.41875 8.74589 3.25 8.97385 3.25H10.0791C10.3071 3.25 10.4936 3.41875 10.4936 3.625V8.05313L12.8008 9.57187C12.9873 9.69375 13.0253 9.92813 12.8906 10.0969L12.2413 10.9062C12.1066 11.0719 11.8475 11.1094 11.661 10.9875Z" fill="#007A43"/>
                              </svg>
                      </span>
                      <p class="text-12 font-solaimans text-[#5C5F62] leading-3">${data.reminder_time}/p>
                  </div>
                  <div class="flex items-center gap-1">
                      <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                              <path d="M15.4736 7V8H8.84207V14H7.7368V8H1.10522V7H7.7368V1H8.84207V7H15.4736Z" fill="#007A43"/>
                              </svg>
                      </span>
                      <p class="text-12 font-solaimans text-[#5C5F62] leading-3">created By @Admin</p>
                  </div>
          </div>

          <div class="py-4">
                  <p class="text-14 font-solaimans text-[#5C5F62] leading-5">
                      ${data.reminder_type}
                  </p>
          </div>
          
          <div class="flex justify-center !border-none">
                  <button onclick="gotofile(${data.id},${data.document_id},'${data.file_type}')" class="bg-[#007A43] py-2 px-4 flex items-center gap-2 rounded !border-none">
                      <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                              <path d="M16.4969 8H15V6.5C15 5.67188 14.3281 5 13.5 5H8.5L6.5 3H1.5C0.671875 3 0 3.67187 0 4.5V13.5C0 14.3281 0.671875 15 1.5 15H14C14.5156 15 14.9969 14.7344 15.2719 14.2937L17.7687 10.2938C18.3937 9.29688 17.675 8 16.4969 8ZM1.5 4.6875C1.5 4.58438 1.58438 4.5 1.6875 4.5H5.87813L7.87813 6.5H13.3125C13.4156 6.5 13.5 6.58438 13.5 6.6875V8H4.75C4.225 8 3.7375 8.275 3.46563 8.725L1.5 11.9813V4.6875ZM14 13.5H2.25L4.6625 9.5H16.5L14 13.5Z" fill="white"/>
                          </svg>
                      </span>
                      <a class="text-15 font-solaimans text-white leading-4">${langTranslations.view} ${langTranslations.file}/${langTranslations.folder}</a>
                  </button>
          </div>
      </section>
                  `;
                }
                $("#reminder_show_modal").append(item);
            }
        },
        error: function (xhr) {
            console.error("There was an error:", xhr);
        },
    });
});

function closeNotifile(el) {
    var section = el.closest("section");

    section.style.animationName = "slide";
    section.addEventListener("animationend", function () {
        section.remove();
        var sectionCount = document.querySelectorAll(
            "#reminder_show_modal section"
        ).length;
        if (sectionCount == 0) {
            reminder_show_modal.close();
        }
    });
}
function gotofile(rid, id, type) {
    if (type == "folder") {
        mark_as_read_Reminder(rid);
        localStorage.setItem("myVariable", id);
        window.location.href = `/files`;
    } else {
                mark_as_read_Reminder(rid);
                displayFileContents(id);
    }
}
function gotofileshare(id, type) {
    if (type == "folder") {
        localStorage.setItem("share_document_id", id);
        localStorage.setItem("startid", id);
        window.location.href = `/shared_file_manager`;
    } else {
       displayFileContents(id); 
    }
}

function get_comment(el) {
    let selectedcatid = $(el).attr("data-catid");
    let datatype = $(el).attr("data-type");
    let dataname = $(el).attr("data-name");

    let commentDocumentId = $("#comment_document_id");
    commentDocumentId.val(selectedcatid);

    let commentFileType = $("#comment_file_type");
    commentFileType.val(datatype);

    $.ajax({
        type: "GET",
        url: `/get_comment/${selectedcatid}/${datatype}`,
        data: {},
        success: function (response) {
            console.log(response);
            $('#comment_file_name').html(dataname);
            var item = "";
            for (let index = 0; index < response.length; index++) {
                const element = response[index];
                var datetime = element.created_at;
                var dateObj = new Date(datetime);
                var time = dateObj.toLocaleTimeString(); // Get the time portion
                var date = dateObj.toLocaleDateString(); // Get the date portion

                item += `
        <li class="py-2 list-none">
                  <div class="flex items-center gap-10">
                      <div class="flex items-center gap-3">
                          <figure>
                          <img class="rounded-full w-[2.688em] h-[2.688em]" src="uploads/prp-users/${element.photo}" alt="">
                          </figure>
                          <h1 class="text-16 font-solaimans font-semibold">${element.nameEn}</h1>
                      </div>
                      <div class="flex items-center gap-3">
                          <div class="flex items-center gap-1">
                              <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6875 2.25H11.375V1.375H10.5V2.25H3.5V1.375H2.625V2.25H1.3125L0.875 2.6875V13.1875L1.3125 13.625H12.6875L13.125 13.1875V2.6875L12.6875 2.25ZM12.25 12.75H1.75V4.875H12.25V12.75ZM12.25 4H1.75V3.125H12.25V4ZM3.5 7.5H2.625V8.375H3.5V7.5ZM2.625 9.25H3.5V10.125H2.625V9.25ZM3.5 11H2.625V11.875H3.5V11ZM5.25 7.5H6.125V8.375H5.25V7.5ZM6.125 9.25H5.25V10.125H6.125V9.25ZM5.25 11H6.125V11.875H5.25V11ZM6.125 5.75H5.25V6.625H6.125V5.75ZM7.875 7.5H8.75V8.375H7.875V7.5ZM8.75 9.25H7.875V10.125H8.75V9.25ZM7.875 11H8.75V11.875H7.875V11ZM8.75 5.75H7.875V6.625H8.75V5.75ZM10.5 7.5H11.375V8.375H10.5V7.5ZM11.375 9.25H10.5V10.125H11.375V9.25ZM10.5 5.75H11.375V6.625H10.5V5.75Z" fill="#5C5F62"/>
                                  </svg>
                              </span>
                              <p class="text-12 text-[#5C5F62] font-solaimans leading-3">${date}</p>
                          </div>
                          <div class="flex items-center gap-1">
                              <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                  <path d="M7 0.71875C3.25391 0.71875 0.21875 3.75391 0.21875 7.5C0.21875 11.2461 3.25391 14.2812 7 14.2812C10.7461 14.2812 13.7812 11.2461 13.7812 7.5C13.7812 3.75391 10.7461 0.71875 7 0.71875ZM7 12.9688C3.97852 12.9688 1.53125 10.5215 1.53125 7.5C1.53125 4.47852 3.97852 2.03125 7 2.03125C10.0215 2.03125 12.4688 4.47852 12.4688 7.5C12.4688 10.5215 10.0215 12.9688 7 12.9688ZM8.68984 10.1141L6.36836 8.42695C6.28359 8.36406 6.23438 8.26563 6.23438 8.16172V3.67188C6.23438 3.49141 6.38203 3.34375 6.5625 3.34375H7.4375C7.61797 3.34375 7.76562 3.49141 7.76562 3.67188V7.54648L9.59219 8.87539C9.73984 8.98203 9.76992 9.18711 9.66328 9.33477L9.14922 10.043C9.04258 10.1879 8.8375 10.2207 8.68984 10.1141Z" fill="#5C5F62"/>
                                  </svg>
                              </span>
                              <p class="text-12 text-[#5C5F62] font-solaimans leading-3">${time}</p>
                          </div>
                      </div>
                    
          
                  </div>
                  <div>
                      <p>${element.comment}</p>
                  </div>
                  <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="377" height="2" viewBox="0 0 377 2" fill="none">
                      <path d="M0 1H377" stroke="#5C5F62" stroke-width="0.5"/>
                      </svg>
                  </span>
              </li>
        `;
            }
            $("#comment_render_section").html(item);
        },
        error: function (xhr, status, error) {},
    });
}
function get_file_version(el) {
    let selectedcatid = $(el).attr("data-catid");
    let dataname = $(el).attr("data-name");
    $('#document_idvertion').val(selectedcatid);
    $.ajax({
        type: "GET",
        url: `/get_file_version/${selectedcatid}`,
        data: {},
        success: function (response) {
            console.log(response);
            $('#version_file_name').html(dataname);
            var item = "";
            for (let index = 0; index < response.length; index++) {
                const element = response[index];
                var datetime = element.created_at;
                var dateObj = new Date(datetime);
                var time = dateObj.toLocaleTimeString(); // Get the time portion
                var date = dateObj.toLocaleDateString(); // Get the date portion
                var file_type = element.filetype;
                if (file_type == "mp4") {
                    file_type = "video--v1";
                }else if (file_type == "gz") {
                    file_type = "zip";
                }else if (file_type == "jpeg") {
                    file_type = "image";
                }else if (file_type == "java") {
                    file_type = "java-coffee-cup-logo";
                }else if (file_type == "pub") {
                    file_type = "ms-publisher";
                }else if (file_type == "docx") {
                    file_type = "ms-word";
                }else if (file_type == "accdb") {
                    file_type = "ms-word";
                }else if (file_type == "pptx") {
                    file_type = "powerpoint";
                }
                item += `  <li>
                <div>
                    <div class="flex items-center justify-between">

                        <h1 class="text-[#5C5F62]">Version ${index+1}</h1>

                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 14 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.6875 1.75H11.375V0.875H10.5V1.75H3.5V0.875H2.625V1.75H1.3125L0.875 2.1875V12.6875L1.3125 13.125H12.6875L13.125 12.6875V2.1875L12.6875 1.75ZM12.25 12.25H1.75V4.375H12.25V12.25ZM12.25 3.5H1.75V2.625H12.25V3.5ZM3.5 7H2.625V7.875H3.5V7ZM2.625 8.75H3.5V9.625H2.625V8.75ZM3.5 10.5H2.625V11.375H3.5V10.5ZM5.25 7H6.125V7.875H5.25V7ZM6.125 8.75H5.25V9.625H6.125V8.75ZM5.25 10.5H6.125V11.375H5.25V10.5ZM6.125 5.25H5.25V6.125H6.125V5.25ZM7.875 7H8.75V7.875H7.875V7ZM8.75 8.75H7.875V9.625H8.75V8.75ZM7.875 10.5H8.75V11.375H7.875V10.5ZM8.75 5.25H7.875V6.125H8.75V5.25ZM10.5 7H11.375V7.875H10.5V7ZM11.375 8.75H10.5V9.625H11.375V8.75ZM10.5 5.25H11.375V6.125H10.5V5.25Z"
                                            fill="#5C5F62" />
                                    </svg>
                                </span>
                                <p class="text-12 text-[#5C5F62] font-solaimans">${date}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 14 14" fill="none">
                                        <path
                                            d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM7 12.4688C3.97852 12.4688 1.53125 10.0215 1.53125 7C1.53125 3.97852 3.97852 1.53125 7 1.53125C10.0215 1.53125 12.4688 3.97852 12.4688 7C12.4688 10.0215 10.0215 12.4688 7 12.4688ZM8.68984 9.61406L6.36836 7.92695C6.28359 7.86406 6.23438 7.76563 6.23438 7.66172V3.17188C6.23438 2.99141 6.38203 2.84375 6.5625 2.84375H7.4375C7.61797 2.84375 7.76562 2.99141 7.76562 3.17188V7.04648L9.59219 8.37539C9.73984 8.48203 9.76992 8.68711 9.66328 8.83477L9.14922 9.54297C9.04258 9.68789 8.8375 9.7207 8.68984 9.61406Z"
                                            fill="#5C5F62" />
                                    </svg>
                                </span>
                                <p class="text-12 text-[#5C5F62] font-solaimans">${time}</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-[50%] px-3 pt-3 bg-[#F4F4F4] rounded-md mt-3">
                        <div class="w-full bg-white rounded-md flex items-center justify-center">
                            <div class="px-11 py-8">
                            <img class="w-full" src="https://img.icons8.com/color/96/${file_type}.png" alt="${file_type}"/>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-3 pb-4">
                            <h1 class="text-12 lg:text-14 font-solaimans leading-3">${element.title}</h1>
                            <svg class="file-delete w-[1.125em] h-[1.125] cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                <path
                                    d="M9 13.5C9.29837 13.5 9.58452 13.6185 9.79549 13.8295C10.0065 14.0405 10.125 14.3266 10.125 14.625C10.125 14.9234 10.0065 15.2095 9.79549 15.4205C9.58452 15.6315 9.29837 15.75 9 15.75C8.70163 15.75 8.41548 15.6315 8.20451 15.4205C7.99353 15.2095 7.875 14.9234 7.875 14.625C7.875 14.3266 7.99353 14.0405 8.20451 13.8295C8.41548 13.6185 8.70163 13.5 9 13.5ZM9 7.875C9.29837 7.875 9.58452 7.99353 9.79549 8.2045C10.0065 8.41548 10.125 8.70163 10.125 9C10.125 9.29837 10.0065 9.58452 9.79549 9.7955C9.58452 10.0065 9.29837 10.125 9 10.125C8.70163 10.125 8.41548 10.0065 8.20451 9.7955C7.99353 9.58452 7.875 9.29837 7.875 9C7.875 8.70163 7.99353 8.41548 8.20451 8.2045C8.41548 7.99353 8.70163 7.875 9 7.875ZM9 2.25C9.29837 2.25 9.58452 2.36853 9.79549 2.5795C10.0065 2.79048 10.125 3.07663 10.125 3.375C10.125 3.67337 10.0065 3.95952 9.79549 4.1705C9.58452 4.38147 9.29837 4.5 9 4.5C8.70163 4.5 8.41548 4.38147 8.20451 4.1705C7.99353 3.95952 7.875 3.67337 7.875 3.375C7.875 3.07663 7.99353 2.79048 8.20451 2.5795C8.41548 2.36853 8.70163 2.25 9 2.25Z"
                                    fill="black" />
                            </svg>
                        </div>
                    </div>
                </div>
            </li>`;
            }
            $("#version_file_render").html(item);
        },
        error: function (xhr, status, error) {},
    });
}
$(document).on("submit", "#add_comment", function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var formData = $("#add_comment").serialize();
    // console.log(formData);
    $.ajax({
        url: "/add_comment",
        type: "POST",
        data: formData,
        success: function (element) {
            // let commentDocumentId = $('#comment_document_id');
            // commentDocumentId.val('');

            // let commentFileType = $('#comment_file_type');
            // commentFileType.val('');

            let comment_input = $("#comment_input");
            comment_input.val("");

            var datetime = element.created_at;
            var dateObj = new Date(datetime);
            var time = dateObj.toLocaleTimeString(); // Get the time portion
            var date = dateObj.toLocaleDateString();
            item = `
      <li class="py-2 list-none">
                <div class="flex items-center gap-10">
                    <div class="flex items-center gap-3">
                        <figure>
                        <img class="rounded-full w-[2.688em] h-[2.688em]" src="uploads/prp-users/${element.photo}" alt="">
                        </figure>
                        <h1 class="text-16 font-solaimans font-semibold">${element.nameEn}</h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6875 2.25H11.375V1.375H10.5V2.25H3.5V1.375H2.625V2.25H1.3125L0.875 2.6875V13.1875L1.3125 13.625H12.6875L13.125 13.1875V2.6875L12.6875 2.25ZM12.25 12.75H1.75V4.875H12.25V12.75ZM12.25 4H1.75V3.125H12.25V4ZM3.5 7.5H2.625V8.375H3.5V7.5ZM2.625 9.25H3.5V10.125H2.625V9.25ZM3.5 11H2.625V11.875H3.5V11ZM5.25 7.5H6.125V8.375H5.25V7.5ZM6.125 9.25H5.25V10.125H6.125V9.25ZM5.25 11H6.125V11.875H5.25V11ZM6.125 5.75H5.25V6.625H6.125V5.75ZM7.875 7.5H8.75V8.375H7.875V7.5ZM8.75 9.25H7.875V10.125H8.75V9.25ZM7.875 11H8.75V11.875H7.875V11ZM8.75 5.75H7.875V6.625H8.75V5.75ZM10.5 7.5H11.375V8.375H10.5V7.5ZM11.375 9.25H10.5V10.125H11.375V9.25ZM10.5 5.75H11.375V6.625H10.5V5.75Z" fill="#5C5F62"/>
                                </svg>
                            </span>
                            <p class="text-12 text-[#5C5F62] font-solaimans leading-3">${date}</p>
                        </div>
                        <div class="flex items-center gap-1">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                <path d="M7 0.71875C3.25391 0.71875 0.21875 3.75391 0.21875 7.5C0.21875 11.2461 3.25391 14.2812 7 14.2812C10.7461 14.2812 13.7812 11.2461 13.7812 7.5C13.7812 3.75391 10.7461 0.71875 7 0.71875ZM7 12.9688C3.97852 12.9688 1.53125 10.5215 1.53125 7.5C1.53125 4.47852 3.97852 2.03125 7 2.03125C10.0215 2.03125 12.4688 4.47852 12.4688 7.5C12.4688 10.5215 10.0215 12.9688 7 12.9688ZM8.68984 10.1141L6.36836 8.42695C6.28359 8.36406 6.23438 8.26563 6.23438 8.16172V3.67188C6.23438 3.49141 6.38203 3.34375 6.5625 3.34375H7.4375C7.61797 3.34375 7.76562 3.49141 7.76562 3.67188V7.54648L9.59219 8.87539C9.73984 8.98203 9.76992 9.18711 9.66328 9.33477L9.14922 10.043C9.04258 10.1879 8.8375 10.2207 8.68984 10.1141Z" fill="#5C5F62"/>
                                </svg>
                            </span>
                            <p class="text-12 text-[#5C5F62] font-solaimans leading-3">${time}</p>
                        </div>
                    </div>
                  
        
                </div>
                <div>
                    <p>${element.comment}</p>
                </div>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="377" height="2" viewBox="0 0 377 2" fill="none">
                    <path d="M0 1H377" stroke="#5C5F62" stroke-width="0.5"/>
                    </svg>
                </span>
            </li>
      `;
            $("#comment_render_section").append(item);
        },
        error: function (xhr, status, error) {
            console.log(xhr);
        },
    });
});

function modalClose(e, elId) {
    e.preventDefault();
    let dialog = document.getElementById(elId);
    if (dialog) {
        dialog.close();
    }
}
function showMessage(icon, message) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Toast.fire({
        icon: icon,
        title: message,
    });
}

function dropdownFileHide() {
    $("#open-file-section").hide();
}

// comment section opening dower
function openComment(event) {
    
    event.preventDefault();
    event.stopPropagation();
    console.log("open comment");
    $("#commentSection").css("display", "block");
    $("#commentSection").animate(
        {
            right: "0",
        },
        500
    );
}

function closeComment() {
    $("#commentSection").animate(
        {
            right: "-500px",
        },
        500,
        function () {
            // After the animation is complete, hide the comment section by setting display to 'none'
            $("#commentSection").css("display", "none");
        }
    );
}
//comment section colse end

//fileversion section opening dower
function openFileVersion(event) {
    event.preventDefault();
    event.stopPropagation();
    $("#versionSection").css("display", "block");
    $("#versionSection").animate(
        {
            right: "0",
        },
        500
    );
}

window.onclick = function (event) {
    event.stopPropagation();

    var versionSection = $("#versionSection");
    // var commentSection = $("#commentSection");
    var activiteSection = $("#activiteSection");
    var notification = $("#notificationSection");
    if (
        !versionSection.is(event.target) &&
        !versionSection.has(event.target).length
    ) {
        versionSection.animate(
            {
                right: "-500px",
            },
            500,
            function () {
                versionSection.css("display", "none");
            }
        );
    }
    if (
        !$(activiteSection).is(event.target) &&
        !$(activiteSection).has(event.target).length
    ) {
        $(activiteSection).animate(
            {
                right: "500px",
            },
            500,
            function () {

                $(activiteSection).css("display", "none");

            }
        );
    }

    if (
        !$(notification).is(event.target) &&
        !$(notification).has(event.target).length
    ) {
        $("#notificationSection").css("display", "none");
        $("#notificationSection").animate(
            {
                top: '5%',
            },
            500
        );
        notificationVisible = !notificationVisible;
    }
};

function closeFileVersion() {
    $("#versionSection").animate(
        {
            right: "-500px",
        },
        500,
        function () {
            $("#versionSection").css("display", "none");
        }
    );
}

//fileversion section close end

// activity section opening dower
function openActivityFile(event) {
    event.preventDefault();
    event.stopPropagation();
    $("#activiteSection").css("display", "block");
    $("#activiteSection").animate(
        {
            right: "0",
        },
        500
    );
}

function closeActiviteFile() {
    console.log("activite");
    $("#activiteSection").animate(
        {
            right: "-500px",
        },
        500,
        function () {
            $("#activiteSection").css("display", "none");
        }
    );
}

let notificationVisible = false;


        

function showNotificationHandle(event){
    event.preventDefault();
    event.stopPropagation();
    const screenWidth = $(window).width();
        let topValue = "12%"; // Default value

        if (screenWidth >= 1025 && screenWidth <= 1280) {
            topValue = "20%";
        }else{
            topValue = "12%"
        }
    if(!notificationVisible){
        $("#notificationSection").css("display", "block");
        $("#notificationSection").animate(
            {
                top: topValue,
            },
            500
        );
    }else{
        $("#notificationSection").css("display", "none");
        $("#notificationSection").animate(
            {
                top: '5%',
            },
            500
        );
    }
    notificationVisible = !notificationVisible;
    
}
//activity section colse end

//profile picture upload
let profilePictureUpload = $("#profileImage")
function choiceProfilePicture(){
    profilePictureUpload.click();
}

function showSelectedImage() {
    const fileInput = document.getElementById("profileImage");
    const previewImage = document.getElementById("previewImage");
    
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
