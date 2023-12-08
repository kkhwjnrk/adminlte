export function updateEntityID() {
  const activeTab = document.querySelector('.nav-treeview .nav-item .nav-link.active');
  let entityType;

  if (activeTab && activeTab.id === 'userTab') {
    entityType = 'user';
  } else if (activeTab && activeTab.id === 'barangTab') {
    entityType = 'barang';
  } else if (activeTab && activeTab.id === 'satuanTab') {
    entityType = 'satuan';
  } else if (activeTab && activeTab.id === 'masukTab') {
    entityType = 'masuk';
  }

  const newEntityID = document.getElementById("inputEntityID");
  newEntityID.value = generateNewEntityID(entityType);
}

export function generateNewEntityID(entityType) {
  if (entityType === 'user') {
    return Math.floor(Math.random() * 900000) + 100000;
  } else if (entityType === 'barang') {
    const lastRow = document.querySelector('#tableBarang tbody tr:last-child');
    let lastIDNumeric = 0;

    if (lastRow) {
      const lastIDCell = lastRow.querySelector('td:nth-child(3)');

      if (lastIDCell && lastIDCell.innerText) {
        const lastID = lastIDCell.innerText;
        lastIDNumeric = parseInt(lastID.replace('B', '')) || 0;
      }
    }

    const newIDNumeric = lastIDNumeric + 1;
    const formattedID = `B${padNumber(newIDNumeric, 4)}`;
    return formattedID;
  } else if (entityType === 'satuan') {
    const lastRow = document.querySelector('#tableSatuan tbody tr:last-child');
    let lastIDNumeric = 0;

    if (lastRow) {
      const lastIDCell = lastRow.querySelector('td:nth-child(2)');

      if (lastIDCell && lastIDCell.innerText) {
        const lastID = lastIDCell.innerText;
        lastIDNumeric = parseInt(lastID) || 0;
      }
    }

    const newIDNumeric = lastIDNumeric + 1;
    const formattedID = padNumber(newIDNumeric, 2);
    return formattedID;
  } else if (entityType === 'masuk') {
    const today = new Date();
    const day = today.getDate().toString().padStart(2, '0');
    const month = (today.getMonth() + 1).toString().padStart(2, '0');
    const year = today.getFullYear().toString().substr(-2);

    const lastRow = document.querySelector('#tableMasuk tbody tr:last-child');
    let lastIDNumeric = 0;

    if (lastRow) {
      const lastIDCell = lastRow.querySelector('td:nth-child(2)');

      if (lastIDCell && lastIDCell.innerText) {
        const lastIDParts = lastIDCell.innerText.split('-');
        lastIDNumeric = parseInt(lastIDParts[lastIDParts.length - 1]);
      }
    }

    const newIDNumeric = lastIDNumeric + 1;
    const formattedID = `BM-${day}${month}${year}-${padNumber(newIDNumeric, 4)}`;

    // Jika tidak ada data, tetap tampilkan ID dimulai dari 1
    if (!lastRow) {
      const defaultFormattedID = `BM-${day}${month}${year}-${padNumber(1, 4)}`;
      return defaultFormattedID;
    }

    return formattedID;
  }

}

function padNumber(num, size) {
  let str = num.toString();
  while (str.length < size) {
    str = '0' + str;
  }
  return str;
}

export function closeModal(modalSelector) {
  const modal = document.getElementById(modalSelector);
  if (modal) {
    modal.classList.remove("show");
  }
  document.body.classList.remove("modal-open");
  const backdrop = document.querySelector(".modal-backdrop");
  if (backdrop) {
    backdrop.remove();
  }
}

export function updateDeleteButtonDataTarget() {
  const editButton = document.querySelector('.btn-edit');
  const deleteButton = document.querySelector('.btn-delete');
  const checkboxes = document.querySelectorAll('#tableBarang input[type="checkbox"]:checked');


  if (checkboxes.length === 1) {
    editButton.setAttribute('data-target', '#edit-barang');
    deleteButton.setAttribute('data-target', '#delete-barang');
  } else if (checkboxes.length > 1) {
    editButton.removeAttribute('data-target');
  } else {
    editButton.removeAttribute('data-target');
    deleteButton.removeAttribute('data-target');
  }
}