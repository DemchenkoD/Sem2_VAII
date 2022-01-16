function DeleteUser(deleteid) {
    if (deleteid == "") {
        alert('Error. User not found')
        return
    }
    var confirmation = confirm("Are you sure ?");
    if (confirmation == true) {
        $.ajax(
            {
                url: "backend_ajax.php",
                method: "POST",
                data: { deleteid:deleteid},
                success:function (data, status) {
                    readUsers();
                }
            }

        )

    }
}
function getUserDetails_UpdModal(id) {
    if (id == "") {
        alert('Error. User not found')
        return
    }

    $.ajax(
        {
            url: "backend_ajax.php",
            method: "POST",
            data: { id:id},
            success:function (data, status) {
                var user = JSON.parse(data);
                $('#hidden_id').val(user.id)
                $('#upd_login').val(user.login)
                $('#upd_email').val(user.mail)
                //$('#upd_password').val(user.password)
                $('#upd_reg_date').val(user.registration_date)
            }
        }
    )
}

function UpdateUser() {
    var id = $('#hidden_id').val()
    var login = $('#upd_login').val()
    var email = $('#upd_email').val()
    var reg_date = $('#upd_reg_date').val()

    if (id == "") {
        alert('Error. User not found')
        return
    }
    if ((login == "") || (email == "") || (reg_date == "")) {
        alert('Info about user need to be filled')
        return
    }
    if (login.length > 30) {
        alert('Login has to be max 30 characters')
        return
    }
    if (email.length > 30) {
        alert('Email has to be max 30 characters')
        return
    }
    if (reg_date.length > 10) {
        alert('Registration date has to be max 10 characters')
        return
    }

    $.ajax(
        {
            url: "backend_ajax.php",
            method: "POST",
            data: { upd_id:id,
                upd_login:login,
                upd_email:email,
                upd_reg_date:reg_date
            },
            success:function (data, status) {
                readUsers();
            }
        }
    )
}
function readOffices() {
    var readOffices = "readOffices";
    $.ajax({
        url: "backend_ajax.php",
        method: "POST",
        data: {
            readOffices: readOffices
        },
        success:function (data,status) {
            $('#offices_table').html(data);
        }
    });
}
function readUsers() {
    var readUsers = "readUsers";
    $.ajax({
        url: "backend_ajax.php",
        method: "POST",
        data: {
            readUsers: readUsers
        },
        success:function (data,status) {
            $('#users_tab').html(data);
        }
    });
}
function addUserAdmin() {
    var login = $('#login').val();
    var email = $('#email').val();
    var reg_date = $('#reg_date').val();
    var password = $('#password').val();
    //alert('Login' + login + "email " + email + reg_date)



    if ((login == "") || (email == "") || (reg_date == "")|| (password == "")) {
        alert('Info about user need to be filled')
        return
    }
    if (login.length > 30) {
        alert('Login has to be max 30 characters')
        return
    }
    if (email.length > 30) {
        alert('Email has to be max 30 characters')
        return
    }
    if (reg_date.length > 10) {
        alert('Registration date  has to be max 10 characters')
        return
    }
    $.ajax({
        url: "backend_ajax.php",
        method: "POST",
        data: {
            login : login,
            email : email,
            password: password,
            reg_date: reg_date
        },
        success:function (data,status) {
            readUsers();
        }
    });
}

function addEmployee() {
    var name1 = $('#name1').val()
    var description1 = $('#description1').val()
    var photo_path1 = $('#photo_path1').val()
    var name2 = $('#name2').val()
    var description2 = $('#description2').val()
    var photo_path2 = $('#photo_path2').val()
    var name3 = $('#name3').val()
    var description3 = $('#description3').val()
    var photo_path3 = $('#photo_path3').val()
    var name4 = $('#name4').val()
    var description4 = $('#description4').val()
    var photo_path4 = $('#photo_path4').val()

    if ((name1 == "") || (description1 == "") || (photo_path1 == "")) {
        alert('Info about first employee need to be filled')
        return
    }
    if ((name2 == "") || (description2 == "") || (photo_path2 == "")) {
        alert('Info about second employee need to be filled')
        return
    }
    if ((name3 == "") || (description3 == "") || (photo_path3 == "")) {
        alert('Info about third employee need to be filled')
        return
    }
    if ((name4 == "") || (description4 == "") || (photo_path4 == "")) {
        alert('Info about fourth employee need to be filled')
        return
    }
    if ((name1.length > 30) || (name2.length > 30) || (name3.length > 30)|| (name4.length > 30)) {
        alert('Employee name can be max 30 characters')
        return
    }

    $.ajax(
        {
            url: "backend_ajax.php",
            method: "POST",
            data: {
                add_employee:"X",
                name1:name1,
                description1:description1,
                photo_path1:photo_path1,
                name2:name2,
                description2:description2,
                photo_path2:photo_path2,
                name3:name3,
                description3:description3,
                photo_path3:photo_path3,
                name4:name4,
                description4:description4,
                photo_path4:photo_path4
            },
            success:function (data, status) {
                document.location.reload();
            }
        }

    )
}
function addOffice() {
    var country = $('#country').val()
    var city = $('#city').val()
    var address = $('#address').val()
    var phone_number = $('#phone_number').val()
    var working_hours = $('#working_hours').val()

    if ((country == "") || (city == "") || (address == "") || (phone_number == "") || (working_hours == "")) {
        alert('Info about office needs to be filled')
        return
    }

    if ((country.length > 30) || (city.length > 30) || (address.length > 30)|| (phone_number.length > 16) || (working_hours.length > 100)) {
        alert('Wrong input data')
        return
    }

    $.ajax(
        {
            url: "backend_ajax.php",
            method: "POST",
            data: {
                add_office:"X",
                country:country,
                city: city,
                address: address,
                phone_number: phone_number,
                working_hours: working_hours
            },
            success:function (data, status) {
                readOffices();
            }
        }

    )
}




