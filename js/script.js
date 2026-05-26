console.log("Project Running");

/* DELETE CONFIRM */
function confirmDelete(id){

    Swal.fire({
        title: "Are you sure?",
        text: "This data will be permanently deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if(result.isConfirmed){
            window.location.href = "delete.php?id=" + id;
        }
    });
}

/*  PASSWORD TOGGLE */
function togglePassword(id, el){

    let input = document.getElementById(id);

    if(!input) return; // safety check

    if(input.type === "password"){
        input.type = "text";
        el.classList.remove("fa-eye");
        el.classList.add("fa-eye-slash");
    }else{
        input.type = "password";
        el.classList.remove("fa-eye-slash");
        el.classList.add("fa-eye");
    }
}

/* FORM SWITCH (login/register page only) */
function showLogin(){

    let loginBox = document.getElementById("loginBox");
    let registerBox = document.getElementById("registerBox");

    if(loginBox && registerBox){
        registerBox.style.display = "none";
        loginBox.style.display = "block";
    }
}

function showRegister(){

    let loginBox = document.getElementById("loginBox");
    let registerBox = document.getElementById("registerBox");

    if(loginBox && registerBox){
        registerBox.style.display = "block";
        loginBox.style.display = "none";
    }
}