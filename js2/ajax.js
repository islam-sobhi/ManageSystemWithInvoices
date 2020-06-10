function getInfo(page, action) {
    var getpage;
    getpage = createRequest();
    getpage.onreadystatechange = action;
    getpage.open("GET", page, true);
    getpage.send();
}


function createRequest() {
    var getpage;
    if (window.XMLHttpRequest) {
        getpage = new XMLHttpRequest();
    } else
        getpage = new ActiveXobject("Microsoft.XMLHTTP")
    return getpage;

}

function doActionImage() {
    if (this.readyState < 4) {
        document.getElementById("jax").innerHTML = '<img src="images/wait.gif" border="0" />'
    }

    if (this.readyState == 4 & this.status == 200)
        document.getElementById("page").innerHTML = this.responseText;

}

function doActionText() {
    if (this.readyState < 4) {
        document.getElementById("page").innerHTML = "جــــــارى معالجة البيانات"
    }

    if (this.readyState == 4 & this.status == 200)
        document.getElementById("page").innerHTML = this.responseText;

}

