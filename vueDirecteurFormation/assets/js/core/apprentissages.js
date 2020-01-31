$(document).ready(function() {
    $('#listes').load("rechercheApprentissages.php", {
        formationChoisie: null,
        promotionChoisie: null,
        competenceChoisie: null
    });

    $('div #tableau').load("tableauApprentissages.php", {
        formationChoisie: null,
        promotionChoisie: null,
        competenceChoisie: null
    });

    $(document).on('change', '#selectionFormation', function(){
        valeurFormation = this.value;

        if(valeurFormation == 'default'){
            $('div #tableau').load("tableauApprentissages.php", {
                formationChoisie: null,
                promotionChoisie: null,
                competenceChoisie: null
            });

            $('div #listes').load("rechercheApprentissages.php", {
                formationChoisie: null,
                promotionChoisie: null,
                competenceChoisie: null
            });
        } else {
            $('div #tableau').load("tableauApprentissages.php", {
                formationChoisie: valeurFormation,
                promotionChoisie: null,
                competenceChoisie: null
            });

            $('div #listes').load("rechercheApprentissages.php", {
                formationChoisie: valeurFormation,
                promotionChoisie: null,
                competenceChoisie: null
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
                $('div #tableau').load("tableauApprentissages.php", {
                    formationChoisie: null,
                    promotionChoisie: null,
                    competenceChoisie: null
                });
            } else if (valeurCompetence != null) {
                $('div #tableau').load("tableauApprentissages.php", {
                    formationChoisie: valeurFormation,
                    promotionChoisie: null,
                    competenceChoisie: valeurCompetence
                });
            } else {
                $('div #tableau').load("tableauApprentissages.php", {
                    formationChoisie: valeurFormation,
                    promotionChoisie: null,
                    competenceChoisie: null
                });
            }
        } else {
            // A enlever si l'on souhaite ne pas bloquer la sélection de formation à tout moment
            document.getElementById('selectionFormation').disabled=true;

            if(valeurFormation == 'default'){
                $('div #tableau').load("tableauApprentissages.php", {
                    formationChoisie: null,
                    promotionChoisie: valeurPromotion,
                    competenceChoisie: null
                });
            } else {
                $('div #tableau').load("tableauApprentissages.php", {
                    formationChoisie: valeurFormation,
                    promotionChoisie: valeurPromotion,
                    competenceChoisie: null
                });
            }
        }
    });

    $(document).on('change', '#selectionCompetence', function(){
        valeurCompetence = this.value;
        valeurPromotion = selectionPromotion.options[selectionPromotion.selectedIndex].value;
        valeurFormation = selectionFormation.options[selectionFormation.selectedIndex].value;

        if(valeurFormation == 'default' && valeurPromotion == 'default'){
            // A enlever si l'on souhaite ne pas bloquer la sélection de formation à tout moment
            document.getElementById('selectionFormation').disabled=true;
            document.getElementById('selectionPromotion').disabled=true;

            if(valeurCompetence == 'default'){
                document.getElementById('selectionFormation').disabled=false;
                document.getElementById('selectionPromotion').disabled=false;
            }

            $('div #tableau').load("tableauApprentissages.php", {
                formationChoisie: null,
                promotionChoisie: null,
                competenceChoisie: valeurCompetence
            });
        } else if (valeurPromotion != 'default' && valeurFormation !='default'){
            // A enlever si l'on souhaite ne pas bloquer la sélection de formation à tout moment
            document.getElementById('selectionPromotion').disabled=true;

            $('div #tableau').load("tableauApprentissages.php", {
                formationChoisie: valeurFormation,
                promotionChoisie: valeurPromotion,
                competenceChoisie: valeurCompetence
            });
        } else {
            $('div #tableau').load("tableauApprentissages.php", {
                formationChoisie: valeurFormation,
                promotionChoisie: null,
                competenceChoisie: valeurCompetence
            });
        }
    });
});
