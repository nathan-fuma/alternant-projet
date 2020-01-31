$(document).ready(function() {
    $('#listes').load("listesRecherches.php", {
        formationChoisie: null,
        promotionChoisie: null
    });

    $('div #tableau').load("tableauStatistiques.php", {
        formationChoisie: null,
        promotionChoisie: null
    });

    $(document).on('change', '#selectionFormation', function(){
        valeurFormation = this.value;

        if(valeurFormation == 'default'){
            $('div #tableau').load("tableauStatistiques.php", {
                formationChoisie: null,
                promotionChoisie: null
            });

            $('div #listes').load("listesRecherches.php", {
                formationChoisie: null,
                promotionChoisie: null
            });
        } else {
            $('div #tableau').load("tableauStatistiques.php", {
                formationChoisie: valeurFormation,
                promotionChoisie: null
            });

            $('div #listes').load("listesRecherches.php", {
                formationChoisie: valeurFormation,
                promotionChoisie: null
            });
        }
    });

    $(document).on('change', '#selectionPromotion', function(){
        valeurPromotion = this.value;
        valeurFormation = selectionFormation.options[selectionFormation.selectedIndex].value;

        if(valeurPromotion == 'default'){
            // A enlever si l'on souhaite ne pas bloquer la sélection de formation à tout moment
            document.getElementById('selectionFormation').disabled=false;

            if(valeurFormation == 'default'){
                $('div #tableau').load("tableauStatistiques.php", {
                    formationChoisie: null,
                    promotionChoisie: null
                });
            } else {
                $('div #tableau').load("tableauStatistiques.php", {
                    formationChoisie: valeurFormation,
                    promotionChoisie: null
                });
            }
        } else {
            // A enlever si l'on souhaite ne pas bloquer la sélection de formation à tout moment
            document.getElementById('selectionFormation').disabled=true;

            $('div #tableau').load("tableauStatistiques.php", {
                formationChoisie: null,
                promotionChoisie: valeurPromotion
            });
        }
    });
});
