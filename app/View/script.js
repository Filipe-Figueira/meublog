/*var modo = document.getElementById('mode');
//modo.addEventListener('click', muda)
function muda() {
    var corpo = document.querySelector('.conteudo');
    corpo.classList.toggle('dark')
    //const getStoredTheme = localStorage.getItem('theme');
}
function fundo() {
    var corpo = document.querySelector('.conteudo');
    var data = new Date();
    var hora = data.getHours();
    if (hora >= 18) {
        corpo.classList.add('dark')
    }
}*/
/*var content = document.getElementById('conteudo');
function setTheme(theme) {
    content.classList.remove("light", "dark");
    content.classList.add(theme);
    localStorage.setItem('theme', theme);
  }

let btnToggleTheme = document.getElementById('mode').addEventListener('click', function () {
    const isDark = content.classList.contains("dark");
    setTheme(isDark ?  "light": "dark");
});

// Função para carregar o tema ao abrir a página
function loadTheme() {
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme) {
      setTheme(storedTheme);
    } else {
      setTheme("dark"); // Tema padrão
    }
  }
// Carregar o tema ao abrir a página
document.addEventListener('DOMContentLoaded', loadTheme);*/

var content = document.querySelector('.conteudo');
function setTheme(theme) {
  content.classList.remove("light", "dark");
  content.classList.add(theme);
  localStorage.setItem('theme', theme);
}
let btnToggleTheme;
btnToggleTheme = document.getElementById('mode');

btnToggleTheme.addEventListener('click', function () {
  const isDark = content.classList.contains("dark");
  setTheme(isDark ? "light" : "dark");
});

// Função para carregar o tema ao abrir a página
function loadTheme() {
  const storedTheme = localStorage.getItem('theme');
  if (storedTheme) {
    setTheme(storedTheme);
  } else {
    setTheme("dark"); // Tema padrão
  }
}
// Carregar o tema ao abrir a página
document.addEventListener('DOMContentLoaded', loadTheme);