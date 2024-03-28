$("#toggleTheme").on("change", function () {
  // ak je prepinac oznaceny
  if ($(this).is(":checked")) {
    $(this).attr("value", "true"); // nastavi hodnotu atribútu na true
    document.cookie = "theme=dark"; // Nastaví cookie theme na dark
    location.reload(); // refresh stranky
  } else {
    // ak je prepinac oznaceny
    $(this).attr("value", "false"); // nastavi hodnotu atribútu na false
    document.cookie = "theme=; Max-Age=0"; // Odstráni cookie theme
    location.reload(); // refresh stranky
  }
});
