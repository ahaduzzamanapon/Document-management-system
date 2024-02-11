function search_Folder_file() {
    const myVariable = localStorage.getItem("myVariable");
    if (myVariable) {
        var id = myVariable;
    } else {
        var id = 1;
    }
    var searchData = $('#search-folder').val();
    if (searchData == "") {
        fetch_data(id);
    } else {
        const loadingfolder = `<div class="shadow">
                            <div class="flex animate-pulse space-x-4">
                                <div class="flex h-14 w-56 items-center bg-slate-50">
                                    <div class="ms-2 h-4 w-5 bg-slate-200"></div>
                                        <div class="ms-2 flex h-full w-full flex-col gap-1 p-3">
                                            <div class="ms-2 h-2 w-full bg-slate-200"></div>
                                            <div class="ms-2 h-2 w-full bg-slate-200"></div>
                                            <div class="ms-2 h-2 w-full bg-slate-200"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
        const loadingfile = `<div class="rounded-md shadow">
                            <div class="flex animate-pulse space-x-4">
                            <div class="flex flex-col h-44 w-48 items-center bg-slate-50 p-3">
                                <div class="h-80 w-40  bg-slate-200"></div>
                                <div class="flex h-full w-full flex-col gap-1 py-2 pe-4">
                                <div class="ms-2 h-2 w-full bg-slate-200"></div>
                                <div class="ms-2 h-2 w-full bg-slate-200"></div>
                                <div class="ms-2 h-2 w-full bg-slate-200"></div>
                                </div>
                            </div>
                            </div>
                        </div>`;
        $("#fetch_folder_data").html(loadingfolder);
        $("#fetch_file_data").html(loadingfile);
        var userfile = $('#userfile').val();
        $.ajax({
            url: "/search_data/" + id + "/" + searchData + "/" + userfile,
            method: "GET",
            success: function (data) {
                if (typeof noData !== 'undefined') {
                    $('#noData').addClass('hidden');
                }
                $("#fetch_folder_data").empty();
                $("#fetch_file_data").empty();
                var folder_data = data.folderData;
                var fileData = data.fileData;
                if (Object.keys(folder_data).length > 0) {
                    Object.keys(folder_data).forEach(function (key) {
                        const item = folder_data[key];
                        var newItem = ` <div ondblclick="fetch_data(${item.id})"  class="folderclick cursor-pointer  w-[95%]  lg:w-[30.9%]  xl:w-[23%]   bg-[#EBFBEC] py-3 rounded-sm flex items-center justify-between gap-1">
                                            <div class="flex items-center ps-3 gap-2 w-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M2.25 21H18.75L19.47 20.445L23.415 9.945L22.695 9H21V5.25L20.25 4.5H11.565L10.275 3.225L9.75 3H2.25L1.5 3.75V20.25L2.25 21ZM3 4.5H9.435L10.725 5.775L11.25 6H19.5V9H12.75L12.225 9.225L10.935 10.5H5.25L4.545 11.01L3.045 15.63L3 4.5ZM18.195 19.5H3.285L5.79 12H11.25L11.775 11.775L13.065 10.5H21.75L18.195 19.5Z" fill="black"/>
                                                </svg>
                                                <h3 style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;height: 20px;width: 70%;" class="text-10 select-none lg:text-13 lx:text-16 font-solaimans leading-4">${item.name}</h3>
                                                <svg data-id="${item.id}" data-name="${item.name}" data-type="folder" onclick="get_hiden_menu(event, this)" class="file_delete w-[1.125em] cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path d="M9 13.5C9.29837 13.5 9.58452 13.6185 9.79549 13.8295C10.0065 14.0405 10.125 14.3266 10.125 14.625C10.125 14.9234 10.0065 15.2095 9.79549 15.4205C9.58452 15.6315 9.29837 15.75 9 15.75C8.70163 15.75 8.41548 15.6315 8.20451 15.4205C7.99353 15.2095 7.875 14.9234 7.875 14.625C7.875 14.3266 7.99353 14.0405 8.20451 13.8295C8.41548 13.6185 8.70163 13.5 9 13.5ZM9 7.875C9.29837 7.875 9.58452 7.99353 9.79549 8.2045C10.0065 8.41548 10.125 8.70163 10.125 9C10.125 9.29837 10.0065 9.58452 9.79549 9.7955C9.58452 10.0065 9.29837 10.125 9 10.125C8.70163 10.125 8.41548 10.0065 8.20451 9.7955C7.99353 9.58452 7.875 9.29837 7.875 9C7.875 8.70163 7.99353 8.41548 8.20451 8.2045C8.41548 7.99353 8.70163 7.875 9 7.875ZM9 2.25C9.29837 2.25 9.58452 2.36853 9.79549 2.5795C10.0065 2.79048 10.125 3.07663 10.125 3.375C10.125 3.67337 10.0065 3.95952 9.79549 4.1705C9.58452 4.38147 9.29837 4.5 9 4.5C8.70163 4.5 8.41548 4.38147 8.20451 4.1705C7.99353 3.95952 7.875 3.67337 7.875 3.375C7.875 3.07663 7.99353 2.79048 8.20451 2.5795C8.41548 2.36853 8.70163 2.25 9 2.25Z" fill="black"/>
                                                </svg>
                                            </div>
                                    </div>`;
                        $("#fetch_folder_data").append(newItem);
                    });
                } else {
                    $("#fetch_folder_data").append(langTranslations.no_folders_found);
                }
                // file data add
                if (Object.keys(fileData).length > 0) {
                    Object.keys(fileData).forEach(function (key) {
                        const file_item = fileData[key];
                        var file_type = file_item.filetype;
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
                        var newItem = `<div class="w-[43%] lg:w-[21.2%] xl:w-[17%] px-3 pt-3 bg-[#F4F4F4] rounded-md border border-[#cfcfcf] file_link" ondblclick="preview_modal.showModal(); displayFileContents('${file_item.file_path}');" >
                    <div class="w-full bg-white rounded-md flex items-center justify-center">
                        <div class="px-2 py-1 md:px-4 md:py-2 lg:px-11 lg:py-8 remove-doc w-full">
                        <img class="w-full" src="https://img.icons8.com/color/96/${file_type}.png" alt="${file_type}"/>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-3 pb-4">
                            <h1 class="text-12 xl:text-14 font-solaimans leading-5 cursor-pointer w-[83%]" title='${file_item.title}' style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${file_item.title}</h1>
                        <svg data-id="${file_item.id}" data-name="${file_item.title}" data-type="file" onclick="get_hiden_menu(event, this)" class="file_delete cursor-pointer w-[15%] h-[1.125]" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 18 18" fill="none">
                                <path d="M9 13.5C9.29837 13.5 9.58452 13.6185 9.79549 13.8295C10.0065 14.0405 10.125 14.3266 10.125 14.625C10.125 14.9234 10.0065 15.2095 9.79549 15.4205C9.58452 15.6315 9.29837 15.75 9 15.75C8.70163 15.75 8.41548 15.6315 8.20451 15.4205C7.99353 15.2095 7.875 14.9234 7.875 14.625C7.875 14.3266 7.99353 14.0405 8.20451 13.8295C8.41548 13.6185 8.70163 13.5 9 13.5ZM9 7.875C9.29837 7.875 9.58452 7.99353 9.79549 8.2045C10.0065 8.41548 10.125 8.70163 10.125 9C10.125 9.29837 10.0065 9.58452 9.79549 9.7955C9.58452 10.0065 9.29837 10.125 9 10.125C8.70163 10.125 8.41548 10.0065 8.20451 9.7955C7.99353 9.58452 7.875 9.29837 7.875 9C7.875 8.70163 7.99353 8.41548 8.20451 8.2045C8.41548 7.99353 8.70163 7.875 9 7.875ZM9 2.25C9.29837 2.25 9.58452 2.36853 9.79549 2.5795C10.0065 2.79048 10.125 3.07663 10.125 3.375C10.125 3.67337 10.0065 3.95952 9.79549 4.1705C9.58452 4.38147 9.29837 4.5 9 4.5C8.70163 4.5 8.41548 4.38147 8.20451 4.1705C7.99353 3.95952 7.875 3.67337 7.875 3.375C7.875 3.07663 7.99353 2.79048 8.20451 2.5795C8.41548 2.36853 8.70163 2.25 9 2.25Z" fill="black"/>
                        </svg>
                    </div>
                </div>`;
                        $("#fetch_file_data").append(newItem);
                    });
                } else {
                    $("#fetch_file_data").html(langTranslations.no_file_found);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
    }
}
function file_type_seleted() {
    const myVariable = localStorage.getItem("myVariable");
    if (myVariable) {
        var id = myVariable;
    } else {
        var id = 1;
    }
    var searchData = $('#file_type_seleted').val();
    if (searchData == "all") {
        fetch_data(id);
    } else {
        const loadingfile = `<div class="rounded-md shadow">
                            <div class="flex animate-pulse space-x-4">
                            <div class="flex flex-col h-44 w-48 items-center bg-slate-50 p-3">
                                <div class="h-80 w-40  bg-slate-200"></div>
                                <div class="flex h-full w-full flex-col gap-1 py-2 pe-4">
                                <div class="ms-2 h-2 w-full bg-slate-200"></div>
                                <div class="ms-2 h-2 w-full bg-slate-200"></div>
                                <div class="ms-2 h-2 w-full bg-slate-200"></div>
                                </div>
                            </div>
                            </div>
                        </div>`;
        $("#fetch_file_data").html(loadingfile);
        var userfile = $('#userfile').val();
        $.ajax({
            url: "/search_data_type/" + id + "/" + searchData + "/" + userfile,
            method: "GET",
            success: function (data) {
                if (typeof noData !== 'undefined') {
                    $('#noData').addClass('hidden');
                }
                $("#fetch_file_data").empty();
                var fileData = data.fileData;
             
                // file data add
                if (Object.keys(fileData).length > 0) {
                    Object.keys(fileData).forEach(function (key) {
                        const file_item = fileData[key];
                        var file_type = file_item.filetype;
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
                        var newItem = `<div class="w-[43%] lg:w-[21.2%] xl:w-[17%] px-3 pt-3 bg-[#F4F4F4] rounded-md border border-[#cfcfcf] file_link" ondblclick="preview_modal.showModal(); displayFileContents('${file_item.file_path}');" >
                    <div class="w-full bg-white rounded-md flex items-center justify-center">
                        <div class="px-2 py-1 md:px-4 md:py-2 lg:px-11 lg:py-8 remove-doc w-full">
                        <img class="w-full" src="https://img.icons8.com/color/96/${file_type}.png" alt="${file_type}"/>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-3 pb-4">
                            <h1 class="text-12 xl:text-14 font-solaimans leading-5 cursor-pointer w-[83%]" title='${file_item.title}' style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${file_item.title}</h1>
                        <svg data-id="${file_item.id}" data-name="${file_item.title}" data-type="file" onclick="get_hiden_menu(event, this)" class="file_delete cursor-pointer w-[15%] h-[1.125]" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 18 18" fill="none">
                                <path d="M9 13.5C9.29837 13.5 9.58452 13.6185 9.79549 13.8295C10.0065 14.0405 10.125 14.3266 10.125 14.625C10.125 14.9234 10.0065 15.2095 9.79549 15.4205C9.58452 15.6315 9.29837 15.75 9 15.75C8.70163 15.75 8.41548 15.6315 8.20451 15.4205C7.99353 15.2095 7.875 14.9234 7.875 14.625C7.875 14.3266 7.99353 14.0405 8.20451 13.8295C8.41548 13.6185 8.70163 13.5 9 13.5ZM9 7.875C9.29837 7.875 9.58452 7.99353 9.79549 8.2045C10.0065 8.41548 10.125 8.70163 10.125 9C10.125 9.29837 10.0065 9.58452 9.79549 9.7955C9.58452 10.0065 9.29837 10.125 9 10.125C8.70163 10.125 8.41548 10.0065 8.20451 9.7955C7.99353 9.58452 7.875 9.29837 7.875 9C7.875 8.70163 7.99353 8.41548 8.20451 8.2045C8.41548 7.99353 8.70163 7.875 9 7.875ZM9 2.25C9.29837 2.25 9.58452 2.36853 9.79549 2.5795C10.0065 2.79048 10.125 3.07663 10.125 3.375C10.125 3.67337 10.0065 3.95952 9.79549 4.1705C9.58452 4.38147 9.29837 4.5 9 4.5C8.70163 4.5 8.41548 4.38147 8.20451 4.1705C7.99353 3.95952 7.875 3.67337 7.875 3.375C7.875 3.07663 7.99353 2.79048 8.20451 2.5795C8.41548 2.36853 8.70163 2.25 9 2.25Z" fill="black"/>
                        </svg>
                    </div>
                </div>`;
                        $("#fetch_file_data").append(newItem);
                    });
                } else {
                    $("#fetch_file_data").html(langTranslations.no_file_found);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
    }
}