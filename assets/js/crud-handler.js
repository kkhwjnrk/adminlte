import { sendGetRequest, sendPostRequest } from './ajax-handler.js';

function createCrudFunctions(entity) {
  return {
    loadData: function (table, updateEntityID) {
      const url = `./app/${entity}/load-data-${entity}.php`;
      sendGetRequest(url, function (response) {
        table.querySelector("tbody").innerHTML = response;
        updateEntityID();
      });
    },

    addData: function (formData, callback) {
      const url = `./app/${entity}/add-${entity}.php`;
      sendPostRequest(url, formData, callback);
    },

    editData: function (formData, callback) {
      const url = `./app/${entity}/edit-${entity}.php`;
      sendPostRequest(url, formData, callback);
    },

    loadEditFormData: function (entityID, callback) {
      const url = `./app/${entity}/get-${entity}.php?id_${entity}=${entityID}`;
      sendGetRequest(url, function (response) {
        const entityData = JSON.parse(response);
        callback(entityData);
      });
    },

    deleteData: function (formData, callback) {
      const url = `./app/${entity}/delete-${entity}.php`;
      sendPostRequest(url, formData, callback);
    },

    entity: entity,
  };
}

export function login(formData, callback) {
  const url = "./app/controller/login-process.php";
  sendPostRequest(url, formData, callback);
}

export const userCrud = createCrudFunctions('user');
export const barangCrud = createCrudFunctions('barang');
export const satuanCrud = createCrudFunctions('satuan');