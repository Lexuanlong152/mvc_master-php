let BASEPATH = "http://localhost/CodeCamp/";
(function() {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
     * Easy on scroll event listener 
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select('#navbar .scrollto', true)
    const navbarlinksActive = () => {
        let position = window.scrollY + 200
        navbarlinks.forEach(navbarlink => {
            if (!navbarlink.hash) return
            let section = select(navbarlink.hash)
            if (!section) return
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                navbarlink.classList.add('active')
            } else {
                navbarlink.classList.remove('active')
            }
        })
    }
    window.addEventListener('load', navbarlinksActive)
    onscroll(document, navbarlinksActive)

    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
        let header = select('#header')
        let offset = header.offsetHeight

        if (!header.classList.contains('header-scrolled')) {
            offset -= 16
        }

        let elementPos = select(el).offsetTop
        window.scrollTo({
            top: elementPos - offset,
            behavior: 'smooth'
        })
    }

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select('#header')
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add('header-scrolled')
            } else {
                selectHeader.classList.remove('header-scrolled')
            }
        }
        window.addEventListener('load', headerScrolled)
        onscroll(document, headerScrolled)
    }

    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    /**
     * Mobile nav toggle
     */
    on('click', '.mobile-nav-toggle', function(e) {
        select('#navbar').classList.toggle('navbar-mobile')
        this.classList.toggle('bi-list')
        this.classList.toggle('bi-x')
    })

    /**
     * Mobile nav dropdowns activate
     */
    on('click', '.navbar .dropdown > a', function(e) {
        if (select('#navbar').classList.contains('navbar-mobile')) {
            e.preventDefault()
            this.nextElementSibling.classList.toggle('dropdown-active')
        }
    }, true)

    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on('click', '.scrollto', function(e) {
        if (select(this.hash)) {
            e.preventDefault()

            let navbar = select('#navbar')
            if (navbar.classList.contains('navbar-mobile')) {
                navbar.classList.remove('navbar-mobile')
                let navbarToggle = select('.mobile-nav-toggle')
                navbarToggle.classList.toggle('bi-list')
                navbarToggle.classList.toggle('bi-x')
            }
            scrollto(this.hash)
        }
    }, true)

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener('load', () => {
        if (window.location.hash) {
            if (select(window.location.hash)) {
                scrollto(window.location.hash)
            }
        }
    });

    /**
     * Preloader
     */
    let preloader = select('#preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.remove()
        });
    }

    /**
     * Testimonials slider
     */
    new Swiper('.testimonials-slider', {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 40
            },

            1200: {
                slidesPerView: 3,
                spaceBetween: 40
            }
        }
    });


    /**
     * Animation on scroll
     */
    // window.addEventListener('load', () => {
    //   AOS.init({
    //     duration: 1000,
    //     easing: 'ease-in-out',
    //     once: true,
    //     mirror: false
    //   })
    // });

})()
const togglePassword = document.querySelectorAll(".togglePassword");
const password = document.querySelectorAll(".password");
// togglePassword.forEach((e) => {
//   let i=0;
//   e.addEventListener("click", () => {
//     e.classList.toggle('bi-eye');
//   }
// })
for (let i = 0; i < password.length; i++) {
    togglePassword[i].addEventListener("click", () => {
        togglePassword[i].classList.toggle('bi-eye');
        const type = password[i].getAttribute('type') === 'password' ? 'text' : 'password';
        password[i].setAttribute('type', type);
    })
}
// togglePassword.addEventListener('click', function (e) {
//   // toggle the type attribute
//   const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//   password.setAttribute('type', type);
//   // toggle the eye / eye slash icon
//   this.classList.toggle('bi-eye');
// });

//------------------- PHÁT ----------------------
// ----------------------------------------------
function clickLikeButton(event) {
    var domElement = $(event.target).parent();
    var likeId = domElement.attr('id');
    const myArray = likeId.split("like");
    var user_id = parseInt(myArray[0]);
    var course_id = parseInt(myArray[1]);
    let liked = 0;
    if (domElement.hasClass("liked")) {
        domElement.html('<i class="far fa-heart-o fa-heart fa-2x" aria-hidden="true"></i>');
        domElement.removeClass("liked");
        liked = 0;
    } else {
        domElement.html('<i class="fa fa-heart fa-2x" aria-hidden="true"></i>');
        domElement.addClass("liked");
        liked = 1;
    }
    $.ajax({
        type: "POST",
        url:  BASEPATH + "Course/userlikeCourse",
        data: { user_id: user_id, course_id: course_id, liked: liked }
    });

}

function letLogin() {
    window.location = "Login"
}
// ------------------PHI-----------------------
// --------------------------------------------
// -----------------INFO-----------------------
// --------------------------------------------
function changeInfo() {
    $(".update-info").toggleClass("d-none");
    $(".info-user-2").toggleClass("d-none");
}
//==================UPDATE AVATAR=============
function triggerClick() {
    document.querySelector('#profileImage').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}

function isVietnamesePhoneNumber(number) {
    return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
}
$("#profile-button").on("click", function() {
        var fullname = $("#fullname-user").val();
        var birthday = $("#birthday-user").val();
        var phonenumber = $("#phonenumber-user").val();
        var address = $("#address-user").val();
        var email = $("#email-user").val();
        var facebook = $("#facebook-user").val();
        var grade = $("#grade-user").val();
        if (!isVietnamesePhoneNumber(phonenumber)) {
            $(".checked-phonenumber").html("Số điện thoại không hợp lệ!");
        } else {
            $.ajax({
                type: "post",
                url:  BASEPATH + "UpdateInfo/SayHi",
                data: {
                    fullnameP: fullname,
                    birthdayP: birthday,
                    phonenumberP: phonenumber,
                    addressP: address,
                    emailP: email,
                    facebookP: facebook,
                    gradeP: grade,
                    flag: 1
                },
                success: function(data) {
                    changeInfo();
                    $("#updated-fullname").html(fullname);
                    $("#updated-birthday").html(birthday);
                    $("#updated-phonenumber").html(phonenumber);
                    $("#updated-address").html(address);
                    $("#updated-email").html(email);
                    $("#updated-facebook").html(facebook);
                    $("#updated-grade").html(grade);
                }
            })
        }
    })
    // ========== Update pass =================================================================
$("#confirm").on("click", function() {
        if ($("#password0").val().length < 6 || $("#password1").val().length < 6 || $("#password2").val().length < 6) {
            $("#checkPass2").html("Vui lòng nhập đầy đủ mật khẩu. Mật khẩu chứa ít nhất 6 kí tự.");
        } else {
            $.ajax({
                method: "POST",
                url: BASEPATH + "UpdateInfo/updatePass",
                dataType: "json",
                data: {
                    flag: 1,
                    pass0: $("#password0").val(),
                    pass1: $("#password1").val(),
                    pass2: $("#password2").val()
                },
                success: function(data) {
                    if (data.status == "success") {
                        $(".changePass").toggleClass("d-none");
                        $(".success-confirm").toggleClass("d-none");
                    } else {
                        $("#checkPass0").html(data.error0);
                        $("#checkPass1").html(data.error1);
                        $("#checkPass2").html(data.error2);
                    }
                }
            })
        }
    })
    //Update username
$("#username-update-button").on("click", function() {
    var username = $("#username-update");
    if (username.val() == "") {
        $(".check-user-update").html("Bạn chưa điền tên đăng nhập");
    }
    // else if(username.val()=="<?php echo $username?>"){
    //     $(".check-user-update").html("Tên đăng nhập này giống với tên cũ");
    // }
    else {
        $.ajax({
            type: "POST",
            url: BASEPATH + "UpdateInfo/updateUsername",
            dataType: "json",
            data: {
                flag: 1,
                userName: username.val()
            },
            success: function(data) {
                if (data.status == "success") {
                    $("#success-confirm,#update-info").toggleClass("d-none");
                } else {
                    $(".check-user-update").html(data.response);
                }
            }
        })
    }
})

// Forgot pass
// =====================================
let email = $("#email");
let emailHelp = $("#emailHelp");
let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function validatePass() {
    if (email.val() == "") {
        emailHelp.html("Bạn phải nhập email để lấy lại mật khẩu.");
        return false;
    } else {
        if (!re.test(String(email.val()).toLowerCase())) {
            emailHelp.html("Địa chỉ email không hợp lệ.");
            return false;
        }
    }
    return true;
}
$(".setPass").on("click", function() {

        if (validatePass()) {
            $.ajax({
                url:  BASEPATH+ "Resetpass/SayHi",
                method: "POST",
                dataType: "json",
                data: {
                    submit: 1,
                    email: email.val()
                },
                success: function(data) {
                    // $("form").html("Check mail");
                    console.log(data);
                    if (data.status == "success") {
                        $(".contain").html(`
           <div class="justify-content-center container card my-5 w-50 h-100">
                 <div class="card-body ">
                   <div class="w-100 h-50 text-center"><h1 class="text-center"></h1></div>
                   <div class="text-center">
                     <i class="bi bi-check-circle text-success display-3"></i>
                   </div>
                   <div class="text-center fw-bold fs-4 my-3">Vui lòng kiểm tra email và làm theo hướng dẫn!</div>
                 </div>
                 <div class="card-footer text-center"> <a href="${BASEPATH}Resetpass" class="btn btn-danger">Trở về</a> </div>
         </div>
           `)
                    } else {
                        $("#emailHelp").html(data.response);
                    }
                }
            })
        }
    })
    // MANAGE INFO

function deleteCar(id) {
    $.ajax({
        type: "POST",
        url: BASEPATH+"Dashboard/deleteUser",
        data: {
            flagUser: 1,
            userDeleteId: id
        },
        success: function(data) {
            $('#row' + id).remove();
        }
    })
}

function validate(isUpdate, error) {
    let isNotInTable = true;
    error["id"] = "";
    error["name"] = "";
    error["year"] = "";
    let id = $("#id").val();
    let username = $("#username").val();
    let birthday = $("#birthday").val();
    let phonenumber = $("#phonenumber").val();
    let address = $("#address").val();
    let = $("#year").val();
    if (id == "") {
        error["id"] = 'ID không được bỏ trống. \n';
    } else {
        if (!$.isNumeric(id)) {
            error["id"] = 'Id phải là một số\n';
        } else {
            document.querySelectorAll(".id_cell").forEach((idCell) => {
                if (idCell.innerHTML == id) {
                    isNotInTable = false;
                }
            })
            if (isNotInTable == true && isUpdate == true) {
                error["id"] = "ID này không có trong bảng\n";
            }
            if (isUpdate == false && isNotInTable == false) {
                error["id"] = "ID này đã có trong bảng\n";
            }
        }
    }
    if (username == "") {
        error['username'] = 'Tên đăng nhập không được bỏ trống \n';
    }
    if (phonenumber == "") {
        error['phonenumber'] = 'Số điên thoại không được bỏ trống\n';
    } else {
        if (!isVietnamesePhoneNumber(phonenumber)) {
            error['phonenumber'] = 'Số điện thoại không hợp lệ\n';
        }
    }
}

function updateCar(isUpdate) {
    // validate(isUpdate);
    let error = [];
    validate(isUpdate, error)
    if (error["id"] == "" && error["name"] == "" && error["year"] == "") {
        let idVal = $("#id").val();
        let usernameVal = $("#username").val();
        let birthdayVal = $("#birthday").val();
        let phonenumberVal = $("#phonenumber").val();
        let addressVal = $("#address").val();
        $.ajax({
            type: "POST",
            url: BASEPATH+"Dashboard/updateUser",
            data: {
                flagUpdateUser: 1,
                id: idVal,
                username: usernameVal,
                birthday: birthdayVal,
                phonenumber: phonenumberVal,
                address: addressVal
            },
            success: function(data) {
                // Update in html
                $('#' + idVal).html(idVal);
                $('#username' + idVal).html(usernameVal);
                $('#birthday' + idVal).html(birthdayVal);
                $('#phonenumber' + idVal).html(phonenumberVal);
                $('#address' + idVal).html(addressVal);
            }
        })
    } else {
        alert(error["id"] + error["name"] + error["year"]);
    }
}

function addCar(isUpdate) {
    // validate(isUpdate);
    let error = [];
    validate(isUpdate, error);
    if (error["id"] == "" && error["name"] == "" && error["year"] == "") {
        let idVal = $("#id").val();
        let usernameVal = $("#username").val();
        let birthdayVal = $("#birthday").val();
        let phonenumberVal = $("#phonenumber").val();
        let addressVal = $("#address").val();
        $.ajax({
            type: "POST",
            url: BASEPATH+"Dashboard/addUser",
            data: {
                flagAddUser: 1,
                id: idVal,
                username: usernameVal,
                birthday: birthdayVal,
                phonenumber: phonenumberVal,
                address: addressVal
            },
            success: function(data) {
                // Add in html
                let tr = document.createElement("tr");
                let idAttribute = "row" + idVal;
                tr.setAttribute("id", idAttribute);
                tr.innerHTML = `
                      <td scope="row" class="text-sm id_cell fw-bold text-dark text-center" id="${idVal}">${idVal}</td>
                      <td class="mb-0 text-sm fw-bold text-dark" id='username${idVal}'>${usernameVal}</td>
  
                      <td class="align-middle text-sm text-center fw-bold text-dark" id='birthday${idVal}'>
                          ${birthdayVal}
                      </td>
                      <td class="align-middle text-sm text-center fw-bold text-dark" id='phonenumber${idVal}'>
                          ${phonenumberVal}
                      </td>
                      <td class="align-middle text-sm text-center fw-bold text-dark" id='address${idVal}'>
                          ${addressVal}
                      </td>
                      <td class="align-middle">
                          <button class="btn btn-danger text-white font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="deleteCar(${idVal})">
                              Delete
                          </button>
                      </td>
                  `
                let table = document.getElementById("table");
                table.appendChild(tr);
            }
        })
    } else {
        alert("Yêu cầu bị hủy. Thử lại");
    }
}

// MANAGE CONTACT INFO 
function toggleBar1() {
    $("#rowFix,#rowInfo").toggleClass("d-none");
}

function toggleBar2() {
    let addressVal = $("#addressContact").val();
    let emailVal = $("#emailContact").val();
    let phoneVal = $("#phoneContact").val();
    $.ajax({
        type: "POST",
        url: BASEPATH+"Dashboard/updateContactInfo",
        data: {
            flag: 1,
            address: addressVal,
            email: emailVal,
            phone: phoneVal
        },
        success: function(data) {
            $("#rowFix,#rowInfo").toggleClass("d-none");
            $(".addressInfo").html(addressVal);
            $(".phoneInfo").html(phoneVal);
            $(".emailInfo").html(emailVal);
        }
    })
}
// --------------------COMMENT SYSTEM--------------------------
var maxComment = 100;
var isReply = false;
var commentID = 0;
$("#addCmt,#addReply").on('click', function() {
    var comment = "";
    if (!isReply) {
        comment = $("#mainComment").val();
    } else {
        comment = $("#replyComment").val();
    }
    if (comment.length > 5) {
        $.ajax({
            type: "POST",
            url: BASEPATH+"Detail",
            data: {
                addComment: 10,
                comment: comment,
                isReply: isReply,
                commentID: commentID
            },
            success: function(data) {
                maxComment++;
                $("#numComment").text(maxComment + " Comments");
                if (!isReply) {
                    $(".userComment").prepend(data);
                    $("#mainComment").val("");
                } else {
                    commentID = 0;
                    $("replyComment").val("");
                    $(".replyRow").hide();
                    $(".replyRow").parent().next().append(data);
                }
            }
        })
    }
})
renderComment(0, maxComment)

function renderComment(start, maxlength) {
    if (start > maxlength) {
        return;
    }
    $.ajax({
        type: "POST",
        url: BASEPATH+"Detail",
        data: {
            start: start,
            flagRender: 1
        },
        success: function(data) {
            $(".userComment").append(data)
            renderComment((start + 20), maxlength);
        }
    })
}

function reply(caller) {
    commentID = $(caller).attr("data-commentID");
    $(".replyRow").insertAfter(caller);
    $(".replyRow").show();
}

function addCourseBtn(){
    $("#addCourse").toggleClass("d-none");
}
function toggleAdduser(){
    $("#addUserDashboard").toggleClass("d-none");
}
function deleteCourse(id){
    $.ajax({
        type: "POST",
        url: BASEPATH+"Dashboard/deleteCourse",
        data: {
            flagCourse: 1,
            courseDeleteId: id
        },
        success: function(data) {
            $('#rowC' + id).remove();
        }
    })
}