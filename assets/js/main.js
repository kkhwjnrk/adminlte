import { userCrud, barangCrud, satuanCrud } from './crud-handler.js';
import { updateEntityID, closeModal, updateDeleteButtonDataTarget } from './ui-handler.js';

document.addEventListener("DOMContentLoaded", function () {
  const tableUser = document.getElementById("tableUser");
  const tableBarang = document.getElementById("tableBarang");
  const tableSatuan = document.getElementById("tableSatuan");

  const dataTableUser = new DataTable(tableUser, {});
  const dataTableBarang = new DataTable(tableBarang, {});

  const addUserForm = document.getElementById("addUserForm");
  const editUserForm = document.getElementById("editUserForm");

  const addBarangForm = document.getElementById("addBarangForm");
  const editBarangForm = document.getElementById("editBarangForm");

  const addSatuanForm = document.getElementById("addSatuanForm");
  const editSatuanForm = document.getElementById("editSatuanForm");

  if (addUserForm) {
    addUserForm.addEventListener("submit", handleAddFormSubmit.bind(null, userCrud));
  }

  if (addBarangForm) {
    addBarangForm.addEventListener("submit", handleAddFormSubmit.bind(null, barangCrud));
  }

  if (addSatuanForm) {
    addSatuanForm.addEventListener("submit", handleAddFormSubmit.bind(null, satuanCrud));
  }

  if (editUserForm) {
    editUserForm.addEventListener("submit", function (event) {
      event.preventDefault();
      const formData = new FormData(event.target);
      userCrud.editData(formData, handleResponse("diperbarui", "memperbarui", "edit-user"));
    });
  }

  if (editBarangForm) {
    editBarangForm.addEventListener("submit", function (event) {
      event.preventDefault();
      const formData = new FormData(event.target);
      barangCrud.editData(formData, handleResponse("diperbarui", "memperbarui", "edit-barang"));
    });
  }

  if (editSatuanForm) {
    editSatuanForm.addEventListener("submit", function (event) {
      event.preventDefault();
      const formData = new FormData(event.target);
      satuanCrud.editData(formData, handleResponse("diperbarui", "memperbarui", "edit-satuan"));
    });
  }

  if (document) {
    document.addEventListener("click", function (event) {
      const activeTab = document.querySelector('.nav-treeview .nav-item .nav-link.active');
      const entity = activeTab && activeTab.id === 'userTab' ? 'user' : (activeTab && activeTab.id === 'barangTab' ? 'barang' : 'satuan');

      if (entity === 'user') {
        handleButtonClick(userCrud, event, entity);
        handleEditButtonClick(userCrud, event, entity);
      } else if (entity === 'barang') {
        handleButtonClick(barangCrud, event, entity);
        handleEditButtonClick(barangCrud, event, entity);
      } else if (entity === 'satuan') {
        handleButtonClick(satuanCrud, event, entity);
        handleEditButtonClick(satuanCrud, event, entity);
      }
    });

    const checkboxes = document.querySelectorAll('#tableBarang input[type="checkbox"]');
    checkboxes.forEach((checkbox,) => {
      checkbox.addEventListener('change', updateDeleteButtonDataTarget);
    });
  }

  function handleAddFormSubmit(crud, event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    crud.addData(formData, handleResponse("ditambahkan", "menambahkan", `#add-${crud.entity}`));
    closeModal(`add-${crud.entity}`);
  }

  function handleButtonClick(crud, event, entity) {
    if (event.target) {
      if (event.target.classList.contains("btn-delete")) {
        handleDeleteButtonClick(event, crud, entity);
      } else if (event.target.classList.contains("btn-edit")) {
        handleEditButtonClick(event, crud, entity);
      }
    }
  }

  function handleEditButtonClick(event, crud, entity) {
    const entityID = event.target.getAttribute(`data-${entity}id`);
    const editModal = document.getElementById('edit-barang');

    if (entity === "user") {
      crud.loadEditFormData(entityID, function (entityData) {
        document.getElementById("editIdUser").value = entityData.id_user;
        document.getElementById("editUsername").value = entityData.username;
        document.getElementById("editPassword").value = entityData.password;
        document.getElementById("editStatus").value = entityData.status;
      });
    } else if (entity === "barang") {
      const checkboxes = document.querySelectorAll('#tableBarang input[type="checkbox"]:checked');
      if (checkboxes.length === 1) {
        $(editModal).modal('show');
        const checkboxValue = checkboxes[0].value;
        crud.loadEditFormData(checkboxValue, function (entityData) {
          document.getElementById("editIdBarang").value = entityData.id_barang;
          document.getElementById("editNama").value = entityData.nama;
          document.getElementById("editJenis").value = entityData.jenis;
          document.getElementById("editSatuan").value = entityData.satuan;
          document.getElementById("editStok").value = entityData.stok;
          document.getElementById("editHarga").value = entityData.harga;
        });
      } else {
        toastr.warning("Pilih satu data untuk diedit.", "Peringatan");
      }
    } else if (entity === "satuan") {
      crud.loadEditFormData(entityID, function (entityData) {
        document.getElementById("editIdSatuan").value = entityData.id_satuan;
        document.getElementById("editSatuan").value = entityData.satuan;
      });
    }
  }

  function handleDeleteButtonClick(event, crud, entity) {
    const checkboxes = document.querySelectorAll('#tableBarang input[type="checkbox"]:checked');
    const submitBtn = document.getElementById('submit-btn');
    const deleteModal = document.getElementById('delete-barang');

    if (entity === 'barang') {
      if (checkboxes.length > 0) {
        $(deleteModal).modal('show');

        submitBtn.addEventListener("click", function () {
          const entityIDs = Array.from(checkboxes).map(checkbox => checkbox.closest('tr').querySelector('td:nth-child(3)').innerText);
          const formData = new FormData();
          formData.append(`id_${entity}`, entityIDs);
          crud.deleteData(formData, handleResponse("dihapus", "menghapus", "delete-barang"));
        });
      } else {
        toastr.warning("Pilih setidaknya satu data untuk dihapus.", "Peringatan");
      }
    } else if (entity === 'user' || 'satuan') {
      const entityID = event.target.getAttribute(`data-${entity}id`);
      submitBtn.addEventListener("click", function () {
        const formData = new FormData();
        formData.append(`id_${entity}`, entityID);
        crud.deleteData(formData, handleResponse("dihapus", "menghapus", `delete-${entity}`));
      });
    }
  }

  function handleResponse(successMessage, errorMessage, modalSelector) {
    return function (response) {
      if (response === "Data updated successfully" || response === "Data added successfully" || response === "Data deleted successfully") {
        console.log(response);
        loadDataForCurrentEntity();
        if (modalSelector) {
          closeModal(modalSelector);
        }
        toastr.success(`Data berhasil ${successMessage}`, "Sukses");

        const forms = document.querySelectorAll('.form');
        forms.forEach((form) => form.reset());
      } else {
        console.log(response);
        toastr.error(`Gagal ${errorMessage} data. Silakan coba lagi.`, "Error");
      }
    };
  }

  function loadDataForCurrentEntity() {
    const activeTab = document.querySelector('.nav-treeview .nav-item .nav-link.active');
    if (activeTab && activeTab.id === 'userTab') {
      userCrud.loadData(tableUser, updateEntityID);
    } else if (activeTab && activeTab.id === 'barangTab') {
      barangCrud.loadData(tableBarang, updateEntityID);
    } else if (activeTab && activeTab.id === 'satuanTab') {
      satuanCrud.loadData(tableSatuan, updateEntityID);
    }
  }

  loadDataForCurrentEntity();
});