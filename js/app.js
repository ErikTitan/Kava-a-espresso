document.addEventListener('DOMContentLoaded', function() {
// nacitanie premennych'
const nav = document.querySelector('.navbar');
const transition = document.querySelector('.text-show');
const images = document.querySelectorAll('.animate-fly-in');

// premena transparentneho navbaru na sivý pri scrollovani
window.addEventListener('scroll', () => {
  // Ak je aktuálna pozícia scrollovania vacsia ako 56 pixelov pridá triedu 'navbar-scroll' k navigačnému panelu zo style.css
  if (window.scrollY > 250) {
    nav.classList.add('navbar-scroll');
  }
  // ak je aktualna pozicia scrollovania mensia ako 56 pixelov odstrani triedu 'navbar-scroll' z navigačného panelu
  else if (window.scrollY < 250) {
    nav.classList.remove('navbar-scroll');
  }
});

/* clearnutie localStorage pre optrebu debugovania
localStorage.clear()
*/

/* Zobrazi cookie banner */
function zobrazCookieBanner() {
  let cookieBanner = document.getElementById("cb-cookie-banner");
  cookieBanner.style.display = "block";
}

/* Skryje cookie banner a ulozi hodnotu do localStorage*/
function skryCookieBanner() {
  localStorage.setItem("cb_isCookieAccepted", "yes");

  let cookieBanner = document.getElementById("cb-cookie-banner");
  cookieBanner.style.display = "none";
}

/*Skontroluje localStorage a zobrazi alebo skryje Cookie banner podla toho.*/
function inicializujCookieBanner() {
  let isCookieAccepted = localStorage.getItem("cb_isCookieAccepted");
  if (isCookieAccepted === null) {
    localStorage.setItem("cb_isCookieAccepted", "no");
    zobrazCookieBanner();
  }
  if (isCookieAccepted === "no") {
    zobrazCookieBanner();
  }
}

// Priradenie hodnot do window
window.onload = inicializujCookieBanner();
window.cb_skryCookieBanner = skryCookieBanner;


// transition pre uvitaci text
window.addEventListener('DOMContentLoaded', () => {
  const transition = document.querySelector('.text-show');
  transition.classList.add('visible');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 200) {
      transition.classList.remove('visible');
    } else {
      transition.classList.add('visible');
    }
  });
});

/* animacie obrazkov v sekcii2 */
// Funkcia na spracovanie spatnej vazby z Intersection Observera
function handleIntersection(entries, observer) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('appear');
      observer.unobserve(entry.target);
    }
  });
}

// Nastavenie Intersection Observera pre obrazky
const observer = new IntersectionObserver(handleIntersection, {
  root: null,
  rootMargin: '0px',
  threshold: 0.2,
});


// Sledovanie kazdeho elementu obrazku
images.forEach(image => {
  observer.observe(image);
});

//recepty editovacie okno
if (window.location.href.includes('recepty.php')) {
document.querySelectorAll('.edit-recipe').forEach(button => {
  button.addEventListener('click', function (event) {
    event.preventDefault();
    const recipeItem = this.closest('.recipe-item');
    recipeItem.querySelector('.recipe-details').style.display = 'none';
    recipeItem.querySelector('.edit-form').style.display = 'block';
  });
});
}

if (window.location.href.includes('recepty.php')) {
document.querySelectorAll('.cancel-edit').forEach(button => {
  button.addEventListener('click', function (event) {
    event.preventDefault();
    const recipeItem = this.closest('.recipe-item');
    recipeItem.querySelector('.edit-form').style.display = 'none';
    recipeItem.querySelector('.recipe-details').style.display = 'block';
  });
});
}

/* galeria - obrazky efekt*/
const imgContent = document.querySelectorAll('.img-content-hover');

function showImgContent(e) {
  for (var i = 0; i < imgContent.length; i++) {
    x = e.pageX;
    y = e.pageY;
    imgContent[i].style.transform = `translate3d(${x}px, ${y}px, 0)`;
  }
};

document.addEventListener('mousemove', showImgContent);


/* formulare */
if (window.location.href.includes('kontakt.php')) {
  const kontaktForm = document.getElementById('kontaktForm');
  kontaktForm.addEventListener('submit', function(event) {
      if (!kontaktForm.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
      }
      kontaktForm.classList.add('was-validated');
  });
}
if (window.location.href.includes('prihlasenie.php')) {
const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', function(event) {
        if (!loginForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        loginForm.classList.add('was-validated');
    });
  }
  if (window.location.href.includes('prihlasenie.php')) {
    const myForm = document.getElementById('myForm');
    myForm.addEventListener('submit', function(event) {
        if (!myForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        myForm.classList.add('was-validated');
    });
  }
  if (window.location.href.includes('recepty.php')) {
    const recipeForm = document.getElementById('recipeForm');
    recipeForm.addEventListener('submit', function(event) {
        if (!recipeForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        recipeForm.classList.add('was-validated');
    });
  }
});

