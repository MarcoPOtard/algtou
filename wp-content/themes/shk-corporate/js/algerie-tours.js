jQuery(function($) {
    // Js pour carousel sur 3 colonnes
    // for every slide in carousel, copy the next slide's item in the slide.
    // Do the same for the next, next item.
    $('.multi-item-carousel .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });

    if($('#dropdown-cat').length > 0) {
        var dropdown = document.getElementById("dropdown-cat"),
            idCat,
            idCatParent = dropdown.getAttribute('class').replace('js-', '');
        console.log(idCatParent);

        function onCatChange() {
            if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                idCat = dropdown.options[dropdown.selectedIndex].value
            } else {
                idCat = idCatParent;
            }
            location.href = "/?cat=" + idCat;
        }
        dropdown.onchange = onCatChange;
    }

    $('.pum-trigger[class*="popmake"]').click(function(){
        var elemInSelect = $(this).parent('[data-select]').attr('data-select');
        if (elemInSelect.length > 0) {
            var elemToSelect = parseInt(elemInSelect);
            console.log(elemToSelect);
            var infoPopup = $(this).attr('class').replace('pum-trigger','').replace(/ /g,"");
            // console.log(infoPopup);
            window.setTimeout(modifSelect,1);

            function modifSelect() {
                $('select', '#'+infoPopup)[0].options[elemToSelect].selected = 'selected';

                var mySelect = $('select option:nth-child('+elemToSelect+')', '#'+infoPopup)[0];
                console.log(mySelect);
                // mySelect.attr('selected','selected');
            }

        }

    });

    // fonction pour le menu qui reste colé en haut quand on scroll
    if (window.matchMedia("(min-width: 1200px)").matches) {
        var positionHeight = $(window).scrollTop(), // je rÃ©cupÃ¨re la position de la fenÃªtre
            // heightHeader = cssVariables['headerDesktopHeight'] * 10, // taille du header en rem -> * 10 pour le passer en px car sur ce site 1rem = 10px
            containerMenu = $('[data-action="menu"]'),
            scrollMenu = containerMenu.offset().top; // je rÃ©cupÃ©re la position de la sticky bar

        $(document).on('scroll', function () {
            var scrollHeight = $(document).scrollTop(), // je rÃ©cupÃ¨re la position du document lors du scroll
                scrollHeightMenu = $(window).scrollTop(); // je rÃ©cupÃ¨re la position du scroll en cours + la hauteur du header

            if (scrollHeightMenu > scrollMenu) {
                // si le scroll courrant est plus grand que la position de la sticky barre
                containerMenu.addClass('menu-scrolled');
            } else {
                containerMenu.removeClass('menu-scrolled')/*.removeClass('sticky-scrolled-with-preheader')*/;
            }

            // // si la position du document aprÃ¨s scroll est plus grande que la position de la fen^tre alors je cache le pre-header
            // if (scrollHeight > positionHeight) {
            //     if (scrollHeight > 50) {
            //         containerMenu.removeClass('sticky-scrolled-with-preheader');
            //     }
            //     // sinon
            // } else {
            //     containerMenu.addClass('sticky-scrolled-with-preheader');
            // }
            positionHeight = scrollHeight;
        });
    }

});