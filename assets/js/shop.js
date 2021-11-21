//pour les animation en html avec AOS https://michalsnik.github.io/aos/
AOS.init();
/**-------------------------------------------------------------------------------------------------------------------
 *------------------------------------------------Function Navbar-----------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------*/
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
        secondNavList.lastChild.firstChild.setAttribute('href', '../html/shop.html');
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
        subSubNavbar.lastElementChild.setAttribute('href', '../html/shop.html');
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
        secondNavList.lastChild.firstChild.setAttribute('href', '../html/shop.html');
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
        subSubNavbar.lastElementChild.setAttribute('href', '../html/shop.html');
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

/**-------------------------------------------------------------------------------------------------------------------
 *--------------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------*/

/**-------------------------------------------------------------------------------------------------------------------
 *------------------------------------------------Variable-----------------------------------------------------  
 -------------------------------------------------------------------------------------------------------------------*/

//tableaux des links
let categoryLink = ['Anime', 'Comics', 'Dessin Animé', 'Gaming', 'Music', 'Movie', 'Serie', 'See All'];
let brandLink = ['One Piece', 'Simpsons', 'Game Of Thrones', 'Rick & Morty', 'Borderlands', 'Star War', 'Attack on Titans', 'See All'];
let exclusivityLink = ['Rare', 'Mini', 'Géant', 'Perfect'];
//variable
let collapsed = true;
//variable d'élément
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
let categoryShopList = document.getElementById('collapseCategory');
let categoryShopButton = document.getElementById('categoryShopButton');
let brandShopList = document.getElementById('collapseBrand');
let brandShopButton = document.getElementById('brandShopButton');
let exclusivityShopList = document.getElementById('collapseExclusivity');
let exclusivityShopButton = document.getElementById('exclusivityShopButton');
/**-------------------------------------------------------------------------------------------------------------------
 *--------------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------*/

/**-------------------------------------------------------------------------------------------------------------------
 * ------------------------------------------------Function Fléché Navbar---------------------------------------------- 
 -------------------------------------------------------------------------------------------------------------------*/
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

/**-------------------------------------------------------------------------------------------------------------------
 *--------------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------*/

/**-------------------------------------------------------------------------------------------------------------------
*------------------------------------------------Function Shop-----------------------------------------------------  
-------------------------------------------------------------------------------------------------------------------*/
window.onload = () => {
    while (collapsed == true) {
        for (let i = 0; i < categoryLink.length; i++) {
            let categoryShopLi = document.createElement('li');
            categoryShopList.appendChild(categoryShopLi);
            categoryShopLi.classList.add('d-flex', 'align-items-center')
            let categoryShopInput = document.createElement('input');
            categoryShopLi.appendChild(categoryShopInput);
            categoryShopInput.setAttribute('type', 'radio');
            categoryShopInput.setAttribute('name', 'category');
            categoryShopInput.setAttribute('id', categoryLink[i]);
            categoryShopInput.classList.add('form-check-input');
            let categoryShopLabel = document.createElement('label');
            categoryShopLi.appendChild(categoryShopLabel);
            categoryShopLabel.setAttribute('for', categoryLink[i]);
            categoryShopLabel.classList.add('form-check-label', 'ms-md-5', 'fs-5');
            categoryShopLabel.innerText = categoryLink[i];
        }
        for (let i = 0; i < (brandLink.length); i++) {
            let brandShopLi = document.createElement('li');
            brandShopList.appendChild(brandShopLi);
            brandShopLi.classList.add('d-flex', 'align-items-center')
            let brandShopInput = document.createElement('input');
            brandShopLi.appendChild(brandShopInput);
            brandShopInput.setAttribute('type', 'radio');
            brandShopInput.setAttribute('name', 'brand');
            brandShopInput.setAttribute('id', brandLink[i]);
            brandShopInput.classList.add('form-check-input');
            let brandShopLabel = document.createElement('label');
            brandShopLi.appendChild(brandShopLabel);
            brandShopLabel.setAttribute('for', brandLink[i]);
            brandShopLabel.classList.add('form-check-label', 'ms-md-5', 'fs-5');
            brandShopLabel.innerText = brandLink[i];
        }
        for (let i = 0; i < (exclusivityLink.length); i++) {
            let exclusivityShopLi = document.createElement('li');
            exclusivityShopList.appendChild(exclusivityShopLi);
            exclusivityShopLi.classList.add('d-flex', 'align-items-center')
            let exclusivityShopInput = document.createElement('input');
            exclusivityShopLi.appendChild(exclusivityShopInput);
            exclusivityShopInput.setAttribute('type', 'radio');
            exclusivityShopInput.setAttribute('name', 'exclusivity');
            exclusivityShopInput.setAttribute('id', exclusivityLink[i]);
            exclusivityShopInput.classList.add('form-check-input');
            let exclusivityShopLabel = document.createElement('label');
            exclusivityShopLi.appendChild(exclusivityShopLabel);
            exclusivityShopLabel.setAttribute('for', exclusivityLink[i]);
            exclusivityShopLabel.classList.add('form-check-label', 'ms-md-5', 'fs-5');
            exclusivityShopLabel.innerText = exclusivityLink[i];
        }
        categoryShopList.lastChild.firstChild.setAttribute('checked', '');
        brandShopList.lastChild.firstChild.setAttribute('checked', '');
        collapsed = false;
    }
}

/**-------------------------------------------------------------------------------------------------------------------
 *--------------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------*/