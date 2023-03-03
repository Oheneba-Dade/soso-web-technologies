const form = document.querySelector("form"),
  emailField = form.querySelector(".email-field"),
  emailInput = emailField.querySelector(".email"),
  passField = form.querySelector(".create-password"),
  passInput = passField.querySelector(".password");

  var btn = document.getElementById('btn');



function checkEmail() {
  const emailregex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (!emailInput.value.match(emailregex)) {
    return emailField.classList.add("invalid"); //adding invalid class if email value do not mathced with email pattern
  }
  emailField.classList.remove("invalid"); //removing invalid class if email value matched with emaiPattern
};


// Hide and show password
const eyeIcons = document.querySelectorAll(".show-hide");
eyeIcons.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    const pInput = eyeIcon.parentElement.querySelector("input"); //getting parent element of eye icon and selecting the password input
    if (pInput.type === "password") {
      eyeIcon.classList.replace("bx-hide", "bx-show");
      return (pInput.type = "text");
    }
    eyeIcon.classList.replace("bx-show", "bx-hide");
    pInput.type = "password";
  });
})

// Password Validation
function createPass() {
  const passPattern =
  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&;:.])[A-Za-z\d@$!%*?&;:.]{8,}$/;
  if (!passInput.value.match(passPattern)) {
    return passField.classList.add("invalid"); //adding invalid class if password input value do not match with passPattern
  }
  passField.classList.remove("invalid"); //removing invalid class if password input value matched with passPattern
}

// // Calling Function on Form Sumbit
btn.addEventListener("click", (e) => {
  // function totalvalidation(){
   e.preventDefault(); 
  checkEmail();
  createPass();

  //calling function on key up
  emailInput.addEventListener("keyup", checkEmail);
  passInput.addEventListener("keyup", createPass);

  if (
    !emailField.classList.contains("invalid") &&
    !passField.classList.contains("invalid") 
  ) {
    handleLogin();

  }
});





const handleLogin = ()=>{
let form_data = new FormData(document.getElementById("logform"));
fetch("login_proc.php", {
    method:"POST",
    body:form_data
})
.then(res=>res.json())
.then(function(data){
    console.log(data);
    if(data.success == "mytrue"){
        window.location.href= "shopping.php";

    }else if(data.success == "accountnoexist"){
        alert("Account does not exist");

    } else if(data.success == "passnomatch"){
        alert("Password does not match email");

      } else if(data.success == "admin"){
        window.location.href = "shoppingAdmin.php"

      } else if(data.success == "mytruecart"){
        window.location.href = "cart.php"

    }else{
        alert("query did not occur");
    }
})

// .catch(err=>{
//   // console.error(err);
//     alert("Backend Error")
// })
}







// const req = new XMLHttpRequest();

// // function to handle ajax request
// function handleAjax() {
//     // reference to handler 
//     req.onreadystatechange = handler;

//     // make our request
//     req.open("POST", 'signup_proc.php');


//     // define POST parameters
//     const parameters = `useremail=${emailInput.value}&userphone=
//     ${phoneInput.value}&userpass=${passInput.value}&register=${btn}`;

//     // set the header
//     req.setRequestHeader(
//         "Content-Type",
//         "application/x-www-form-urlencoded"
//     );

//     // call our send method
//     req.send(parameters);

// }

// function handler() {
//     // process response here
//     if (req.readyState === XMLHttpRequest.DONE) {
//         // check status code
//         if (req.status === 200) {
//             // Everything is fine, we can proceed
//             alert("Record Entered")
//             document.location.href = 'login.php';
//         } else {
//             // Something went wrong
//             alert('Something went wrong')
//         }

//     }
// }

