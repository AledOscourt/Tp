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


/**-------------------------------------------------------------------------------------------------------------------
 *--------------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------*/


/**-------------------------------------------------------------------------------------------------------------------
*------------------------------------------------Function My Account-----------------------------------------------------  
-------------------------------------------------------------------------------------------------------------------*/

myAccountCoordinateBtn.onclick = () => {
    myAccountCoordinateBtn.classList.add('active');
    myAccountConctact.classList.remove('d-none');
    myAccountSellOrdersBtn.classList.remove('active');
    myAccountOrders.classList.add('d-none');
    myAccountOpinionsBtn.classList.remove('active');
    myAccountOpinions.classList.add('d-none');
}
myAccountSellOrdersBtn.onclick = () => {
    myAccountCoordinateBtn.classList.remove('active');
    myAccountConctact.classList.add('d-none');
    myAccountSellOrdersBtn.classList.add('active');
    myAccountOrders.classList.remove('d-none');
    myAccountOpinionsBtn.classList.remove('active');
    myAccountOpinions.classList.add('d-none');
}
myAccountOpinionsBtn.onclick = () => {
    myAccountCoordinateBtn.classList.remove('active');
    myAccountSellOrdersBtn.classList.remove('active');
    myAccountConctact.classList.add('d-none');
    myAccountOpinionsBtn.classList.add('active');
    myAccountOrders.classList.add('d-none');
    myAccountOpinions.classList.remove('d-none');
}

/**-------------------------------------------------------------------------------------------------------------------
*--------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------*/

/**-------------------------------------------------------------------------------------------------------------------
*-------------------------------------------- Email Modif ------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------*/
email.onChange = () => {
    this.form.submit();
    if (!email.classList.contain('is-invalid')) {
        emailForm.classList.add('d-none');
        myAccountEmailOutput.classList.remove('d-none');
        myAccountEmailOutput.classList.add('d-md-flex');
        myAccountEmail.classList.remove('mt-md-3');
    }
}
email.onblur = () => {
    email.form.submit();
    if (!email.classList.contain('is-invalid')) {
        emailForm.classList.add('d-none');
        myAccountEmailOutput.classList.remove('d-none');
        myAccountEmailOutput.classList.add('d-md-flex');
        myAccountEmail.classList.remove('mt-md-3');
    }
}
myAccountEmailModif.onclick = () => {
    emailForm.classList.remove('d-none');
    myAccountEmailOutput.classList.add('d-none');
    myAccountEmailOutput.classList.remove('d-md-flex');
    myAccountEmail.classList.add('mt-md-3');
}

/**-------------------------------------------------------------------------------------------------------------------
*--------------------------------------------------- Username Modif --------------------------------------------------
-------------------------------------------------------------------------------------------------------------------*/

Username.onChange = () => {
    this.form.submit();
    if (!Username.classList.contain('is-invalid')) {
        userNameForm.classList.add('d-none');
        myAccountPseudo.classList.remove('d-none');
        myAccountUserNameModif.classList.add('d-none');
    }
}
Username.onblur = () => {
    Username.form.submit();
    if (!Username.classList.contain('is-invalid')) {
        userNameForm.classList.add('d-none');
        myAccountPseudo.classList.remove('d-none');
        myAccountUserNameModif.classList.add('d-none');
    }
}
myAccountUserNameModif.onclick = () => {
    userNameForm.classList.remove('d-none');
    myAccountPseudo.classList.add('d-none');
    myAccountUserNameModif.classList.add('d-none');
}



deleteAccount.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget
        // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
    deleteUser.value = recipient;
})

deleteOffers.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget
        // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
    deleteOffer.value = recipient;
})
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