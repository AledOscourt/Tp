//pour les animation en html avec AOS https://michalsnik.github.io/aos/
AOS.init();
/**-------------------------------------------------------------------------------------------------------------------
 *------------------------------------------------Function Navbar-----------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------*/

//Créer les élement de la seconde navbar avec leurs attributs pour categorie
function categoryNavbar() {
    if (window.innerWidth > 756) {
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
        secondNavList.lastChild.firstChild.setAttribute('href', 'Boutique');
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
        subSubNavbar.lastElementChild.setAttribute('href', 'Boutique');
    }
}
//Créer les élement de la seconde navbar avec leurs attributs pour franchise

//Créer les élement de la seconde navbar avec leurs attributs pour exclusivité
function exclusivityNavbar() {
    if (window.innerWidth > 756) {
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
let exclusivityLink = ['Rare', 'Mini', 'Géant', 'Perfect'];


/**-------------------------------------------------------------------------------------------------------------------
 *--------------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------*/

/**-------------------------------------------------------------------------------------------------------------------
 * ------------------------------------------------Function Fléché Navbar---------------------------------------------- 
 -------------------------------------------------------------------------------------------------------------------*/

window.onmouseover = () => {
    /**-------------------------------------------------------------------------------------------------------------------
     *-----------------------si la taille de l'écran est inférieure à 756 pixels ne réalise pas les fonction-----------------------------------------*/
    if (window.innerWidth > 756) {
        subNavbar.classList.add('d-none');

        category.onmouseover = () => {
            secondNavList.innerHTML = ' ';
            categoryNavbar()
        }
        exclusivity.onmouseover = () => {
            secondNavList.innerHTML = ' ';
            exclusivityNavbar();
        }
        comingSoon.onmouseover = () => {
            secondNavbar.classList.add('d-none');
        }
        shop.onmouseover = () => {
            secondNavbar.classList.add('d-none');
        }
        secondNavList.onmouseleave = () => {
            secondNavbar.classList.add('d-none');
        }
        header.onmouseover = () => {
            secondNavbar.classList.add('d-none');
        }
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
        exclusivity.onclick = () => {
            subNavbar.classList.remove('d-none');
            firstNavbar.classList.add('d-none');
            subSubNavbar.innerHTML = ' ';
            exclusivityNavbar()
        }

    }
}

/**-------------------------------------------------------------------------------------------------------------------
 *--------------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------*/


let page = 1;

function paginationAjax(pageValue) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let offers = JSON.parse(this.responseText);
            offersList.innerHTML = ' ';
            for (offer of offers) {
                offersList.innerHTML +=
                    '<a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 text-decoration-none" href="Article-' + offer.id + '"> <img src = "uploads/' + offer.officialPopImageInTheBox + '" class = "img-fluid inner-Border-Article my-2" alt = "' + offer.name + '" / >' + '<div class = "d-flex justify-content-between text-center" >' +
                    '<div class = "inner-Border-Name col-7 col-sm-8 col-md-7 align-items-center justify-content-center p-xl-2 p-md-1"> <p> ' + offer.name + '</p> </div> <' +
                    'div class = "inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1" > <p > ' + offer.price + ' €</p></div></div></a>';
            }
            bottomPreviousPageBtn.innerText = pageValue - 1;
            bottomNextPageBtn.innerText = pageValue + 1;
            bottomPageBtn.innerText = pageValue;
            topPreviousPageBtn.innerText = pageValue - 1;
            topNextPageBtn.innerText = pageValue + 1;
            topPageBtn.innerText = pageValue;
            if (page == 1) {
                bottomPreviousPageBtn.classList.add('d-none');
                bottomPreviousBtn.classList.add('d-none');
                topPreviousPageBtn.classList.add('d-none');
                topPreviousBtn.classList.add('d-none');
            } else {
                bottomPreviousPageBtn.classList.remove('d-none');
                bottomPreviousBtn.classList.remove('d-none');
                topPreviousPageBtn.classList.remove('d-none');
                topPreviousBtn.classList.remove('d-none');
            }
            if (page == pageNumber.value) {
                bottomNextPageBtn.classList.add('d-none');
                bottomNextBtn.classList.add('d-none');
                topNextPageBtn.classList.add('d-none');
                topNextBtn.classList.add('d-none');
            } else {
                bottomNextPageBtn.classList.remove('d-none');
                bottomNextBtn.classList.remove('d-none');
                topNextPageBtn.classList.remove('d-none');
                topNextBtn.classList.remove('d-none');
            }

        }
    }
    ajax.open('GET', 'controllers/shopController.php?page=' + pageValue, true);
    ajax.send();
}
bottomNextBtn.onclick = () => {
    page += 1;
    paginationAjax(page);
}
bottomPreviousBtn.onclick = () => {
    page -= 1;
    paginationAjax(page);
}
bottomPreviousPageBtn.onclick = () => {
    page -= 1;
    paginationAjax(page);
}
bottomNextPageBtn.onclick = () => {
    page += 1;
    paginationAjax(page);
}
topNextBtn.onclick = () => {
    page += 1;
    paginationAjax(page);
}
topPreviousBtn.onclick = () => {
    page -= 1;
    paginationAjax(page);
}
topPreviousPageBtn.onclick = () => {
    page -= 1;
    paginationAjax(page);
}
topNextPageBtn.onclick = () => {
    page += 1;
    paginationAjax(page);
}