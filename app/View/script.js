// Função para aplicar o tema à seção conteudo
function setTheme(theme) {
  const content = document.getElementById('conteudo');
  if (content) {
      content.classList.remove("light", "dark");
      content.classList.add(theme);
      localStorage.setItem('theme', theme);
  }
}
function toggleIcon() {
  const icon = document.getElementById('mode');
  if (icon.classList.contains('fa-moon')) {
    icon.classList.remove('fa-moon')
    icon.classList.add('fa-sun')
  } else {
    icon.classList.remove('fa-sun')
    icon.classList.add('fa-moon')
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
  document.getElementById('mode').addEventListener('click', toggleTheme, toggleIcon); // Adiciona o evento de clique
});