function togglenav() {
    let nav = document.querySelector("#mytopnav");
    if(nav.className === "topnav") {
        nav.classList += " responsive";
    } else {
        nav.classList = " topnav";
    }
}