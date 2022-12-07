window.onload=function(){

    let note;
    let addBtn;

    note = document.getElementById("note");
    addBtn = document.getElementById("addnote");

    addBtn.addEventListener("click", function(){
        httpRequest = new XMLHttpRequest();
        //httpRequest.onreadystatechange = console.log(httpRequest.responseText);
        httpRequest.open("GET", "viewdetails.php?note=" + note.value );
        httpRequest.send();
        console.log(note.value);
        //alert("hi");
    })
}