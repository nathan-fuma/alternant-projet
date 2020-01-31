<?php

//requetes SQL du l'appli

$apprentissage = mysqli_query($link, "SELECT (SELECT DISTINCT f.niveau FROM apprentissage a, etudiant e, formation f WHERE a.id = $selectionApprentissage AND a.formation = f.id) AS promotion,
                                                                                        (SELECT f.nom FROM apprentissage a, formation f WHERE a.formation = f.id AND a.id = $selectionApprentissage) AS formation,
                                                                                        (SELECT a.description FROM apprentissage a WHERE a.id = $selectionApprentissage) AS appellation,
                                                                                        (SELECT COUNT(*) FROM etudiant e WHERE UPPER(e.promo) LIKE UPPER('$selectionPromotion')) AS nbetudiant, (SELECT count(*) AS nbAcquis FROM resultat r, etudiant e WHERE UPPER(r.notation) = UPPER('a') and r.apprentissage = $selectionApprentissage AND r.etudiant = e.id AND UPPER(e.promo) = UPPER('$selectionPromotion')) AS nbetudiantAcquis, 
                                                                                        (SELECT COUNT(*) AS nbAcquis FROM resultat r, etudiant e WHERE UPPER(r.notation) = UPPER('ea') AND r.apprentissage = $selectionApprentissage AND r.etudiant = e.id AND UPPER(e.promo) = UPPER('$selectionPromotion')) AS nbetudiantEnCoursAcquis, 
                                                                                        (SELECT COUNT(*) AS nbAcquis FROM resultat r, etudiant e WHERE UPPER(r.notation) = UPPER('na') AND r.apprentissage = $selectionApprentissage AND r.etudiant = e.id AND UPPER(e.promo) = UPPER('$selectionPromotion')) AS nbetudiantNonAcquis, 
                                                                                        (SELECT nbetudiantAcquis / nbetudiant *100) AS pourcentageReussite, (SELECT nbetudiantEnCoursAcquis / nbetudiant * 100) AS pourcentageEnCoursReussite, 
                                                                                        (SELECT nbetudiantNonAcquis / nbetudiant *100) AS pourcentageNonReussite;");

