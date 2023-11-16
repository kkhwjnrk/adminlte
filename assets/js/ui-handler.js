export function updateUserID() {
  var newUserID = document.getElementById("inputUserID");
  newUserID.value = generateNewUserID();
}

export function closeModal(modalSelector) {
  var modal = document.querySelector(modalSelector);
  if (modal) {
    modal.classList.remove("show");
  }
  document.body.classList.remove("modal-open");
  var backdrop = document.querySelector(".modal-backdrop");
  if (backdrop) {
    backdrop.remove();
  }
}

export function generateNewUserID() {
  return Math.floor(Math.random() * 900000) + 100000;
}