

let header_button = document.querySelector(".mobile-icon");
header_button.addEventListener("click", function () {
    document.querySelector("header").classList.add("open");
    header_button.querySelector("img").src="cancel.png"
    if(header_button.classList.contains("open")) {
        close_popup();
    }
    else {
        header_button.classList.add("open");
        header_button.querySelector("img").src="close.png"
    }
});


function close_popup() {
    document.querySelector("header").classList.remove("open");
    header_button.querySelector("img").src = "free-icon-menu-bar-2311552.png"
};

document.querySelector("#grid").addEventListener("click", close_popup, false);
document.querySelector("header .popup").addEventListener("click", close_popup, false);

document.querySelector("#show_add_photo").addEventListener("click", function () {
    document.querySelector("#add_new_photo").classList.add("open");
});

document.querySelector("#cancel").addEventListener("click", function (e) {
    e.preventDefault();
    document.querySelector("#add_new_photo").classList.remove("open");
});

