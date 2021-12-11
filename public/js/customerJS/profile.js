const modalUserInfo = document.querySelector(".modal-user-info");
const openModalUserInfoBtn = document.querySelector(".open-modal-user-info-btn");
const iconCloseModalUserInfo = document.querySelector(".modal-user-info__header");

function toggleModalUserInFo() {
    modalUserInfo.classList.toggle("hide-user-info");
}

openModalUserInfoBtn.addEventListener("click", toggleModalUserInFo);
iconCloseModalUserInfo.addEventListener("click", toggleModalUserInFo);

modalUserInfo.addEventListener("click", (e) => {
    if (e.target == e.currentTarget) toggleModalUserInFo();
});

// js phần thay đổi ảnh
const modal = document.querySelector(".modal");
const openModalBtn = document.querySelector(".open-modal-btn");
const iconCloseModal = document.querySelector(".modal__header");

function toggleModal() {
    modal.classList.toggle("hide");
}

openModalBtn.addEventListener("click", toggleModal);
iconCloseModal.addEventListener("click", toggleModal);

modal.addEventListener("click", (e) => {
    if (e.target == e.currentTarget) toggleModal();
});
