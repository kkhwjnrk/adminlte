export function sendGetRequest(url, callback) {
  fetch(url)
    .then(response => response.text())
    .then(callback)
    .catch(error => console.error("Gagal:", error));
}

export function sendPostRequest(url, data, callback) {
  fetch(url, {
    method: 'POST',
    body: data,
  })
    .then(response => response.text())
    .then(callback)
    .catch(error => console.error("Gagal:", error));
}