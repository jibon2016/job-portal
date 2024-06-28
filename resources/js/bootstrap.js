import axios from 'axios';
window.axios = axios;

function getImageUrl(name) {
  return new URL(`/resources/images/${name}`, import.meta.url).href
}

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
