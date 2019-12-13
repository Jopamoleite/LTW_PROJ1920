let form = document.getElementById("edit_profile_pic_form");
let upload = document.getElementById("profile_pic_upload");

function uploadProfilePic() {
    console.log(":(((");
    form.submit();
}

upload.addEventListener("change", uploadProfilePic);