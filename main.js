const body=document.querySelector("body"),
sidebar=document.querySelector(".sidebar"),
toggle=document.querySelector(".toggle"),
searchbtn=document.querySelector(".search-box");

toggle.addEventListener("click",()=>{
    sidebar.classList.toggle("close");
});

searchbtn.addEventListener("click",()=>{
    sidebar.classList.remove("close");
});

function validateForm() {
    var contact = document.getElementById("mno").value;
    if (contact.length !== 10 || isNaN(contact)) {
        alert("Please enter a valid 10-digit contact number.");
        return false;
    }
    return true;
}
