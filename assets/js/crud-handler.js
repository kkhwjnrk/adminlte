import { sendGetRequest, sendPostRequest } from './ajax-handler.js';

export function loadData(table, updateUserID) {
  const url = "./controller/load-data.php";
  sendGetRequest(url, function (response) {
    table.querySelector("tbody").innerHTML = response;
    updateUserID();
  });
}

export function addData(formData, callback) {
  const url = "./controller/add-data.php";
  sendPostRequest(url, formData, callback);
}

export function deleteData(formData, callback) {
  const url = "./controller/delete-data.php";
  sendPostRequest(url, formData, callback);
}

export function editData(formData, callback) {
  const url = "./controller/edit-data.php";
  sendPostRequest(url, formData, callback);
}

export function loadEditFormData(userID, callback) {
  const url = `./controller/get-user.php?user_id=${userID}`;
  sendGetRequest(url, function (response) {
    const userData = JSON.parse(response);
    callback(userData);
  });
}

export function login(formData, callback) {
  const url = "./controller/login-process.php";
  sendPostRequest(url, formData, callback);
}