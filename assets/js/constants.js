const localhost = window.location.hostname == "localhost";

const baseUrl = localhost
    ? "http://localhost/AtelierElizeuManoel"
    : "https://hostdeprojetosdoifsp.gru.br/atelier";

const apiUrl = localhost
    ? "http://localhost/AtelierElizeuManoel/api"
    : "https://hostdeprojetosdoifsp.gru.br/atelier/api";
