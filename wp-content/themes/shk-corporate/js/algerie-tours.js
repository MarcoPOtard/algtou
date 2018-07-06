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

});