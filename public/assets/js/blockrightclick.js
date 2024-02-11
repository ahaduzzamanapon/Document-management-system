document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});

document.onselectstart = function() {
    return false;
};
document.onkeydown = function (e) {
    if (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'i')) {
        e.preventDefault();
        alert("Opening the developer tools is not allowed.");
    }
};

