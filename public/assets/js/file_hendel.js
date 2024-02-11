let hiddenFile = document.getElementById('fileInput');
let hiddenUploadFile = document.getElementById('folderInput');
  function handlefilepick(type) {
    if (type == 'uploadFolder') {
      hiddenUploadFile.click();
    } else {
      hiddenFile.click();
    }
  }
  hiddenFile.onchange = function () {
    let selectedFiles = this.files;
    if (selectedFiles.length > 0) {
      upload_file()
    }
  }

