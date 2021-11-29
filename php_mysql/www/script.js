/*window.onload = function () {
    let divs = document.querySelectorAll("div[data-tooltip]");
    for (let i = 0; i < divs.length; i++) {
        let div = divs[i];
        div.onmouseenter = function () {
            div.innerHTML = div.innerHTML + '<div class="tt">' +
                div.getAttribute("data-tooltip") + '</div>';
            div.onmouseleave = function() {
                div.querySelector("div[data-tooltip]").remove();
            }
        }


    }

}
*/

let users = [
    {
        email: "admin",
        password: "admin"
    },
    {
        email: "dima",
        password: "heslo"
    }

]

function login() {
    var email = document.getElementById("email_input").value
    var password = document.getElementById("password_input").value
    for(i = 0; i < users.length; i++) {
        if (email == users[i].email && password == users[i].password) {
            alert("Login Succeeded")
            return
        }
    }
    document.getElementById("email_input").value = ''
    document.getElementById("password_input").value = ''
    alert("Wrong email or password")

}
function sign_up() {
    var email = document.getElementById("email_inp").value
    var password = document.getElementById("password_inp").value
    var password2 = document.getElementById("password2_inp").value
    if (password != password2) {
        document.getElementById("email_input").value = ''
        document.getElementById("password_input").value = ''
        alert("Passwords didn't match")
        return
    }
    for(i = 0; i < users.length; i++) {
        if (email == users[i].email ) {
            document.getElementById("email_input").value = ''
            document.getElementById("password_input").value = ''
            alert("User with such email already registered")
            return
        }
    }
    users.push({email: email, password: password})
    alert("User was successfully created")


}

function AddReview() {
    var emails = document.getElementById('reviews_mails');
    var email = document.getElementById('add_review_email').value
    if (emails.contains(email)) {
        document.getElementById('add_review_email').value = ''

    }

}

function funErrorBadInput() {
    alert("BAD INPUT DATA");

}


