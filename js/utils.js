const displayMemberDropdown = document.querySelector(".nav__dropDown");
displayMemberDropdown.addEventListener("click", () => {
    const activeDropdown = document.querySelector(".member__drop__link");
    activeDropdown.classList.toggle("member__drop__link__active");
})

document.displayDropdown = (item) => {
    item.children[1].children[0].classList.toggle("fa-rotate-180");
    item.parentNode.children[1].classList.toggle("side__dropdown__link__active");
}