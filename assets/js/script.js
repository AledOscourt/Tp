//pour les animation en html avec AOS https://michalsnik.github.io/aos/
AOS.init();
//Créer les élement de la seconde navbar avec leurs attributs pour categorie
function categoryNavbar() {
    if (window.innerWidth > 700) {
        secondNavbar.classList.remove('d-none');
        for (let i = 0; i < categoryLink.length; i++) {
            let secondNavLi = document.createElement('li');
            secondNavList.appendChild(secondNavLi);
            secondNavLi.classList.add('nav-item', 'col')
            let secondNavLink = document.createElement('a');
            secondNavLi.appendChild(secondNavLink);
            secondNavLink.classList.add('nav-link')
            secondNavLink.innerText = categoryLink[i];
        }
    } else {
        for (let i = 0; i < categoryLink.length; i++) {
            let subNavLi = document.createElement('li');
            subSubNavbar.appendChild(subNavLi);
            subNavLi.classList.add('nav-item', 'col')
            let subNavLink = document.createElement('a');
            subSubNavbar.appendChild(subNavLink);
            subNavLink.classList.add('nav-link')
            subNavLink.innerText = categoryLink[i];
        }
    }
}
//Créer les élement de la seconde navbar avec leurs attributs pour franchise
function brandNavbar() {
    if (window.innerWidth > 700) {
        secondNavbar.classList.remove('d-none');
        for (let i = 0; i < brandLink.length; i++) {
            let secondNavLi = document.createElement('li');
            secondNavList.appendChild(secondNavLi);
            secondNavLi.classList.add('nav-item', 'col')
            let secondNavLink = document.createElement('a');
            secondNavLi.appendChild(secondNavLink);
            secondNavLink.classList.add('nav-link')
            secondNavLink.innerText = brandLink[i];
        }
    } else {
        for (let i = 0; i < brandLink.length; i++) {
            let subNavLi = document.createElement('li');
            subSubNavbar.appendChild(subNavLi);
            subNavLi.classList.add('nav-item', 'col')
            let subNavLink = document.createElement('a');
            subSubNavbar.appendChild(subNavLink);
            subNavLink.classList.add('nav-link')
            subNavLink.innerText = brandLink[i];
        }
    }
}
//Créer les élement de la seconde navbar avec leurs attributs pour exclusivité
function exclusivityNavbar() {
    if (window.innerWidth > 700) {
        secondNavbar.classList.remove('d-none');
        for (let i = 0; i < exclusivityLink.length; i++) {
            let secondNavLi = document.createElement('li');
            secondNavList.appendChild(secondNavLi);
            secondNavLi.classList.add('nav-item', 'col')
            let secondNavLink = document.createElement('a');
            secondNavLi.appendChild(secondNavLink);
            secondNavLink.classList.add('nav-link')
            secondNavLink.innerText = exclusivityLink[i];
        }
    } else {
        for (let i = 0; i < exclusivityLink.length; i++) {
            let subNavLi = document.createElement('li');
            subSubNavbar.appendChild(subNavLi);
            subNavLi.classList.add('nav-item', 'col')
            let subNavLink = document.createElement('a');
            subSubNavbar.appendChild(subNavLink);
            subNavLink.classList.add('nav-link')
            subNavLink.innerText = exclusivityLink[i];
        }
    }
}
//tableaux des links
let categoryLink = ['Anime', 'Comics', 'Dessin Animé', 'Gaming', 'Music', 'Movie', 'Serie', 'See All'];
let brandLink = ['One Piece', 'Simpsons', 'Game Of Thrones', 'Rick & Morty', 'Borderlands', 'Star War', 'Attack on Titans', 'See All'];
let exclusivityLink = ['Rare', 'Mini', 'Géant', 'Perfect'];
//cache l'élément ayant la classe secondNavbar
let secondNavList = document.getElementById('secondNavList');
let category = document.getElementById('category');
let brand = document.getElementById('brand');
let exclusivity = document.getElementById('exclusivity');
let comingSoon = document.getElementById('comingSoon');
let secondNavbar = document.getElementById('secondNavbar');
let firstNavbar = document.getElementById('firstNavbar');
let subNavbar = document.getElementById('subNavbar');
let subSubNavbar = document.getElementById('subSubNavbar');
let navBackButton = document.getElementById('navBackButton');
window.onmouseover = () => {
    if (window.innerWidth > 700) {
        subNavbar.classList.add('d-none');
        //si la taille de l'écran est inférieure à p60 pixels ne réalise pas les fonction
        category.onmouseover = () => {
                secondNavList.innerHTML = ' ';
                categoryNavbar()
            }
            //
        brand.onmouseover = () => {
                secondNavList.innerHTML = ' ';
                brandNavbar()

            }
            //
        exclusivity.onmouseover = () => {
                secondNavList.innerHTML = ' ';
                exclusivityNavbar();
            }
            //
        comingSoon.onmouseover = () => {
            secondNavbar.classList.add('d-none');
        };
        //
        secondNavList.onmouseleave = () => {
            secondNavbar.classList.add('d-none');
        };
        //
        $('header').hover(function() {
            secondNavbar.classList.add('d-none');
        });
    } else {
        secondNavbar.classList.add('d-none');
        category.onclick = () => {
            subNavbar.classList.remove('d-none');
            firstNavbar.classList.add('d-none');
            subSubNavbar.innerHTML = ' ';
            categoryNavbar()
        }
        navBackButton.onclick = () => {
            subNavbar.classList.add('d-none');
            firstNavbar.classList.remove('d-none')
        }
        brand.onclick = () => {
            subNavbar.classList.remove('d-none');
            firstNavbar.classList.add('d-none');
            subSubNavbar.innerHTML = ' ';
            brandNavbar()
        }
        navBackButton.onclick = () => {
            subNavbar.classList.add('d-none');
            firstNavbar.classList.remove('d-none')
        }
        exclusivity.onclick = () => {
            subNavbar.classList.remove('d-none');
            firstNavbar.classList.add('d-none');
            subSubNavbar.innerHTML = ' ';
            exclusivityNavbar()
        }
        navBackButton.onclick = () => {
            subNavbar.classList.add('d-none');
            firstNavbar.classList.remove('d-none')
        }
    }
}