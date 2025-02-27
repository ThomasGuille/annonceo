document.DropdownDisplay = (elem) => {
    elem.children[1].classList.toggle("member__drop__link__active");
}

document.displayDropdown = (item) => {
    item.children[1].children[0].classList.toggle("fa-rotate-180");
    item.parentNode.children[1].classList.toggle("side__dropdown__link__active");
}

document.pictureSelect = (pic) => {
    const bigPicture = document.querySelector(".photo__big");
    bigPicture.src = pic.src;
}

document.displaySignInModal = () => {
    const signInModal = document.querySelector(".signInModal");
    signInModal.classList.add("signIn__active");
}

document.displayLogInModal = () => {
    const logInModal = document.querySelector(".logInModal");
    logInModal.classList.add("signIn__active");
}