function copyEvent(id){
                    var str = id.value;
                    navigator.clipboard.writeText(str);
};


function hostSearch() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("hostInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("hostTable");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var j;
        var rowContainsFilter = false;
        for (j = 0; j < cells.length; j++) {
        if (cells[j]) {
            if (cells[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
            rowContainsFilter = true;
            continue;
            }
        }
        }
        if (! rowContainsFilter) {
        rows[i].style.display = "none";
        } else {
        rows[i].style.display = "";
        }
    }
}
