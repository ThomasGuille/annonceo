const displayMemberDropdown = document.querySelector(".nav__dropDown");
displayMemberDropdown.addEventListener("click", () => {
    const activeDropdown = document.querySelector(".member__drop__link");
    activeDropdown.classList.toggle("member__drop__link__active");
})