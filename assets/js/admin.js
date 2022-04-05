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
const ctx2 = document.getElementById('chartUsers').getContext('2d');
const chartUsers = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre', ],
        datasets: [{
                label: 'Nouvels utilisateurs',
                data: [25, 50, 40, 50, 90, 30, 70, 25, 35, 10, 20, 60],
                backgroundColor: [
                    'rgba(47,107,47,0.4)',

                ],
                borderColor: [
                    'rgba(47,107,47,0.4)',

                ],
                borderWidth: 1,
                stack: 0,
            },
            {
                label: 'Visiteurs',
                data: [-25, -15, -8, -35, -20, -45, -10, -25, -5, -10, -2, -8],
                backgroundColor: [
                    'rgba(255,40,40,0.4)',

                ],
                borderColor: [
                    'rgba(255,40,40,0.4)',

                ],
                borderWidth: 1,
                stack: 0,
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});

const ctx1 = document.getElementById('chartOffers').getContext('2d');
const chartOffers = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre', ],
        datasets: [{
            label: 'Offres créer',
            data: [25, 50, 40, 50, 90, 30, 70, 25, 35, 10, 20, 60],
            backgroundColor: [
                'rgba(47,107,47,0.4)',

            ],
            borderColor: [
                'rgba(47,107,47,0.4)',

            ],
            borderWidth: 1,
            stack: 0,
        }, {
            label: 'Offres vendu',
            data: [-25, -15, -8, -35, -20, -45, -10, -25, -5, -10, -2, -8],
            backgroundColor: [
                'rgba(255,40,40,0.4)',

            ],
            borderColor: [
                'rgba(255,40,40,0.4)',

            ],
            borderWidth: 1,
            stack: 0,

        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});