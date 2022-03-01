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
        secondNavList.lastChild.firstChild.setAttribute('href', 'Boutique-1');
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
        subSubNavbar.lastElementChild.setAttribute('href', 'Boutique-1');
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

descriptionBtn.onclick = () => {
    description.classList.remove('d-none');
    opinion.classList.add('d-none');
    if (opinionBtn.classList.contains('active')) {
        opinionBtn.classList.remove('active');
        descriptionBtn.classList.add('active');
    }

}
opinionBtn.onclick = () => {
    description.classList.add('d-none');
    opinion.classList.remove('d-none');
    if (descriptionBtn.classList.contains('active')) {
        descriptionBtn.classList.remove('active');
        opinionBtn.classList.add('active');
    }
}

starContainer1.onclick = () => {
    star1.classList.add('fas');
    star1.classList.remove('far');
    star2.classList.add('far');
    star2.classList.remove('fas');
    star3.classList.add('far');
    star3.classList.remove('fas');
    star4.classList.add('far');
    star4.classList.remove('fas');
    star5.classList.add('far');
    star5.classList.remove('fas');
}
starContainer2.onclick = () => {
    star2.classList.add('fas');
    star2.classList.remove('far');
    star1.classList.add('fas');
    star1.classList.remove('far');
    star3.classList.add('far');
    star3.classList.remove('fas');
    star4.classList.add('far');
    star4.classList.remove('fas');
    star5.classList.add('far');
    star5.classList.remove('fas');
}
starContainer3.onclick = () => {
    star3.classList.add('fas');
    star3.classList.remove('far');
    star2.classList.add('fas');
    star2.classList.remove('far');
    star1.classList.add('fas');
    star1.classList.remove('far');
    star4.classList.add('far');
    star4.classList.remove('fas');
    star5.classList.add('far');
    star5.classList.remove('fas');
}
starContainer4.onclick = () => {
    star4.classList.add('fas');
    star4.classList.remove('far');
    star3.classList.add('fas');
    star3.classList.remove('far');
    star2.classList.add('fas');
    star2.classList.remove('far');
    star1.classList.add('fas');
    star1.classList.remove('far');
    star5.classList.add('far');
    star5.classList.remove('fas');
}
starContainer5.onclick = () => {
    star4.classList.add('fas');
    star4.classList.remove('far');
    star5.classList.add('fas');
    star5.classList.remove('far');
    star3.classList.add('fas');
    star3.classList.remove('far');
    star2.classList.add('fas');
    star2.classList.remove('far');
    star1.classList.add('fas');
    star1.classList.remove('far');
}
deleteOpinions.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget
        // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
    deleteOpinion.value = recipient;
})