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
// Função para aplicar o tema à seção conteudo
function setTheme(theme) {
  const content = document.getElementById('conteudo');
  if (content) {
      content.classList.remove("light", "dark");
      content.classList.add(theme);
      localStorage.setItem('theme', theme);
  }
}

// Função para alternar o tema ao clicar no botão
function toggleTheme() {
  const content = document.getElementById('conteudo');
  const currentTheme = content.classList.contains("dark") ? "dark" : "light";
  const newTheme = currentTheme === "dark" ? "light" : "dark";
  setTheme(newTheme);
}

// Função para carregar o tema ao abrir a página
function loadTheme() {
  const storedTheme = localStorage.getItem('theme') || "dark"; // Define dark como padrão
  setTheme(storedTheme);
}

// Evento para carregar o tema quando o DOM estiver completamente carregado
document.addEventListener('DOMContentLoaded', function () {
  loadTheme(); // Carrega o tema armazenado
  document.getElementById('mode').addEventListener('click', toggleTheme); // Adiciona o evento de clique
});