import { loadData, addData, deleteData, editData, loadEditFormData } from './crud-handler.js';
import { updateUserID, closeModal } from './ui-handler.js';

document.addEventListener("DOMContentLoaded", function () {
  const table = document.getElementById("table");
  const dataTable = new DataTable(table, {});
  const addForm = document.getElementById("addForm");
  const editForm = document.getElementById("editForm");

  addForm.addEventListener("submit", handleAddFormSubmit);
  document.addEventListener("click", handleButtonClick);

  function handleAddFormSubmit(event) {
    event.preventDefault();
    const formData = new FormData(addForm);
    addData(formData, handleResponse("ditambahkan", "menambahkan", "#add-user"));
  }

  function handleButtonClick(event) {
    if (event.target && event.target.classList.contains("btn-danger")) {
      handleDeleteButtonClick(event);
    } else if (event.target && event.target.classList.contains("btn-secondary")) {
      handleEditButtonClick(event);
    }
  }

  function handleDeleteButtonClick(event) {
    const userID = event.target.getAttribute("data-userid");
    const isConfirmed = window.confirm("Apakah Anda yakin ingin menghapus data ini?");
    if (isConfirmed) {
      const formData = new FormData();
      formData.append("user_id", userID);
      deleteData(formData, handleResponse("dihapus", "menghapus", ""));
    }
  }

  function handleEditButtonClick(event) {
    const userID = event.target.getAttribute("data-userid");
    loadEditFormData(userID, function (userData) {
      fillEditForm(userData);
    });
  }

  function fillEditForm(userData) {
    document.getElementById("editUserID").value = userData.user_id;
    document.getElementById("editUsername").value = userData.username;
    document.getElementById("editPassword").value = userData.password;
    document.getElementById("editStatus").value = userData.status;
  }

  editForm.addEventListener("submit", handleEditFormSubmit);

  function handleEditFormSubmit(event) {
    event.preventDefault();
    const formData = new FormData(editForm);
    editData(formData, handleResponse("diperbarui", "memperbarui", "#edit-user"));
  }

  function handleResponse(successMessage, errorMessage, modalSelector) {
    return function (response) {
      if (response === "Data updated successfully" || response === "Data added successfully" || response === "Data deleted successfully") {
        loadData(table, updateUserID);
        if (modalSelector) {
          closeModal(modalSelector);
        }
        toastr.success(`Data berhasil ${successMessage}`, "Sukses");

        const forms = document.querySelectorAll('.form');
        forms.forEach((form) => form.reset());
      } else {
        toastr.error(`Gagal ${errorMessage} data. Silakan coba lagi.`, "Error");
      }
    };
  }

  loadData(table, updateUserID);
});