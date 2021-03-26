document.getElementById("btn1").onclick = function ()
{
    // Lấy danh sách checkbox
    var checkboxes = document.getElementsByName('permission_child[]');

    // Lặp và thiết lập checked
    for (var i = 0; i < checkboxes.length; i++){
        checkboxes[i].checked = true;
    }
};


document.getElementById("btn2").onclick = function ()
{
    // Lấy danh sách checkbox
    var checkboxes = document.getElementsByName('permission_child[]');

    // Lặp và thiết lập Uncheck
    for (var i = 0; i < checkboxes.length; i++){
        checkboxes[i].checked = false;
    }
};
