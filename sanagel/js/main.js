function post() {
    if (document.querySelector(".add-post").style.opacity == "1" && document.querySelector(".add-post").style.visibility == "visible") {
        document.querySelector(".add-post").style.opacity = "0";
        document.querySelector(".add-post").style.visibility = "hidden";
        document.querySelector(".add-post").style.transform = "translateY(-60px)";
    } else {
        post_on();
    }
}

function profile() {
    if (document.querySelector(".profile-option").style.visibility == "visible") {
        document.querySelector(".profile-option").style.visibility = "hidden";
        document.querySelector(".profile-option").style.opacity = "0";
        document.querySelector(".profile-option").style.transform = "translateY(-30px)";
    } else {
        profile_on();
    }
}

function notifcation() {
    if (document.querySelector(".notifcation-panel").style.opacity == "1" && document.querySelector(".notifcation-panel").style.visibility == "visible") {
        document.querySelector(".notifcation-panel").style.opacity = "0";
        document.querySelector(".notifcation-panel").style.visibility = "hidden";
    } else {
        notifcation_on();
    }
}

function profile_on() {
    document.querySelector(".profile-option").style.visibility = "visible";
    document.querySelector(".profile-option").style.opacity = "1";
    document.querySelector(".profile-option").style.transform = "translateY(0px)";
    document.querySelector(".add-post").style.opacity = "0";
    document.querySelector(".add-post").style.visibility = "hidden";
    document.querySelector(".add-post").style.transform = "translateY(-60px)";
    document.querySelector(".notifcation-panel").style.opacity = "0";
    document.querySelector(".notifcation-panel").style.visibility = "hidden";
}

function notifcation_on() {
    document.querySelector(".notifcation-panel").style.opacity = "1";
    document.querySelector(".notifcation-panel").style.visibility = "visible";
    document.querySelector(".add-post").style.opacity = "0";
    document.querySelector(".add-post").style.visibility = "hidden";
    document.querySelector(".add-post").style.transform = "translateY(-60px)";
    document.querySelector(".profile-option").style.visibility = "hidden";
    document.querySelector(".profile-option").style.opacity = "0";
    document.querySelector(".profile-option").style.transform = "translateY(-30px)";
}

function post_on() {
    document.querySelector(".add-post").style.opacity = "1";
    document.querySelector(".add-post").style.visibility = "visible";
    document.querySelector(".add-post").style.transform = "translateY(0px)";
    document.querySelector(".profile-option").style.visibility = "hidden";
    document.querySelector(".profile-option").style.opacity = "0";
    document.querySelector(".profile-option").style.transform = "translateY(-30px)";
    document.querySelector(".notifcation-panel").style.opacity = "0";
    document.querySelector(".notifcation-panel").style.visibility = "hidden";
}

for (let i = 0; i < document.getElementsByClassName("optiones").length; i++) {
    l = document.getElementsByClassName("love-btn")[i];
    l.addEventListener("click", function () {
        li = document.getElementsByClassName("love")[i];
        pl = document.getElementsByClassName("plove")[i];
        love(li, pl);
    });

    function love(li, pl) {
        if (li.classList.contains('far')) {
            li.classList.remove('far');
            li.classList.add('fas');
            pl.innerHTML = "Loved";
        } else {
            li.classList.remove('fas');
            li.classList.add('far');
            pl.innerHTML = "Love";
        }
    }
};

function rotate() {
    document.querySelector(".formom").style.transform = "rotateY(180deg)";
    document.querySelector(".login-form").style.opacity = "0";
}
function rotatee() {
    document.querySelector(".formom").style.transform = "rotateY(0deg)";
    document.querySelector(".login-form").style.opacity = "1";
}




// document.getElementsByClassName("more").addEventListener("click", function () {
//     // function more() {
//     if (document.getElementsByClassName("optiones").style.visibility == "visible") {
//         document.getElementsByClassName("optiones").style.opacity = "0";
//         document.getElementsByClassName("optiones").style.visibility = "hidden";
//         document.getElementsByClassName("optiones").style.width = "150%";
//         document.getElementsByClassName("optiones").style.transform = "translateY(-25px)";
//     } else {
//         document.getElementsByClassName("optiones").style.opacity = "1";
//         document.getElementsByClassName("optiones").style.visibility = "visible";
//         document.getElementsByClassName("optiones").style.width = "250%";
//         document.getElementsByClassName("optiones").style.transform = "translateY(0px)";
//     }
// });

for (let i = 0; i < document.getElementsByClassName("optiones").length; i++) {
    m = document.getElementsByClassName("more")[i];
    m.addEventListener("click", function () {
        o = document.getElementsByClassName("optiones")[i];
        more(o);
    });
}
function more(o) {
    if (o.style.visibility == "visible") {
        o.style.opacity = "0";
        o.style.visibility = "hidden";
        o.style.width = "150%";
        o.style.transform = "translateY(-25px)";
    } else {
        o.style.opacity = "1";
        o.style.visibility = "visible";
        o.style.width = "250%";
        o.style.transform = "translateY(0px)";
    }
}


for (let g = 0; g < document.getElementsByClassName("optiones").length; g++) {
    e = document.getElementsByClassName("edit-btn")[g];
    e.addEventListener("click", function () {
        c = document.getElementsByClassName("content")[g];
        l = document.getElementsByClassName("left-action")[g];
        li = document.getElementsByClassName("likes")[g];
        co = document.getElementsByClassName("comments")[g];
        ef = document.getElementsByClassName("edit-form")[g];
        ebs = document.getElementsByClassName("ebs")[g];
        ebc = document.getElementsByClassName("ebc")[g];
        m = document.getElementsByClassName("more")[g];
        o = document.getElementsByClassName("optiones")[g];
        edit(c, l, li, co, ef, ebs, ebc, o, m);
    });
}
function edit(c, l, li, co, ef, ebs, ebc, o, m) {
    c.style.display = "none";
    l.style.display = "none";
    li.style.display = "none";
    co.style.display = "none";
    ef.style.display = "block";
    ebs.style.display = "inline-block";
    ebc.style.display = "inline-block";
    o.style.opacity = "0";
    o.style.visibility = "hidden";
    o.style.width = "150%";
    o.style.transform = "translateY(-25px)";
    m.style.visibility = "hidden"
};

for (let h = 0; h < document.getElementsByClassName("optiones").length; h++) {
    ebc = document.getElementsByClassName("ebc")[h];
    ebc.addEventListener("click", function () {
        m = document.getElementsByClassName("more")[h];
        c = document.getElementsByClassName("content")[h];
        l = document.getElementsByClassName("left-action")[h];
        li = document.getElementsByClassName("likes")[h];
        co = document.getElementsByClassName("comments")[h];
        ef = document.getElementsByClassName("edit-form")[h];
        ebs = document.getElementsByClassName("ebs")[h];
        ebc = document.getElementsByClassName("ebc")[h];
        undo_edit(m, c, l, li, co, ef, ebs, ebc);
    });
    function undo_edit(m, c, l, li, co, ef, ebs, ebc) {
        m.style.visibility = "visible";
        c.style.display = "block";
        l.style.display = "inline-block";
        li.style.display = "inline-block";
        co.style.display = "inline-block";
        ef.style.display = "none";
        ebs.style.display = "none";
        ebc.style.display = "none";
    };
}

for (let f = 0; f < document.getElementsByClassName("comment-section").length; f++) {
    c = document.getElementsByClassName("comment")[f];
    c.addEventListener("click", function () {
        cs = document.getElementsByClassName("comment-section")[f];
        comment(cs);
    });
}
function comment(cs) {
    if (cs.style.visibility == "visible") {
        cs.animate({ "transform", "translateY(-145px)"}, 1000);
        cs.css("display", "none");
        //cs.style.transform = "translateY(-145px)";
        //cs.style.visibility = "hidden";
        cs.style.margin = "0 auto -145px"
    } else {
        cs.style.transform = "translateY(-2px)";
        cs.style.visibility = "visible";
        cs.style.margin = "0 auto"
    };
}

function edit_profile() {
    document.querySelector(".edit-profile").style.display = "none";
    document.querySelector(".view").style.display = "none";
    document.querySelector("#edit-form").style.display = "block";
}


function cancel_edit_profile() {
    document.querySelector(".edit-profile").style.display = "block";
    document.querySelector(".view").style.display = "block";
    document.querySelector("#edit-form").style.display = "none";
}

// $(".comment").click(function (){
//     //$(".comment-section").slideDown(1000);
//     $(".comment-section").fadeIn(1000);
// });