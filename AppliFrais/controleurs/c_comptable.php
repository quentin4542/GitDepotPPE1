<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$typeUser = $_SESSION['typeUser'];
switch($action){
	case 'selectionnerMois':{
		$lesMois=$pdo->getLesMois();
		$visiteur=$pdo->getLesUsers();
		include("vues/v_listeVisiteurMois.php");
		break;
	}
	case 'selectionnerMoisC':{
		$lesMois=$pdo->getLesMois();
		$visiteur=$pdo->getLesUsers();
		include("vues/v_listeVisiteurMoisC.php");
		break;
	}
	case 'voirFiche':{
		$id = 0;
		$leMois = $_REQUEST['lstMois'];
		$idVisiteur = $_REQUEST['lstVisiteur'];
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("vues/v_validerFiche.php");
		break;
	}
	case 'voirFicheC':{
		$id = 0;
		$leMois = $_REQUEST['lstMois'];
		$idVisiteur = $_REQUEST['lstVisiteur'];
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("vues/v_confirmation.php");
		break;
	}
	case 'validation':{
		$mois = str_replace('-', '',$_REQUEST['lstMois']);
		header('Location: index.php?uc=comptable&action=voirFiche&lstMois='.$mois.'&lstVisiteur='.$_GET['lstVisiteur']);
		break;
	}
	case 'validationC':{
		$mois = str_replace('-', '',$_REQUEST['lstMois']);
		header('Location: index.php?uc=comptable&action=voirFicheC&lstMois='.$mois.'&lstVisiteur='.$_GET['lstVisiteur']);
		break;
	}
	case 'changerForfaits':{
		$mois = $_REQUEST['lstMois'];
		$visiteur = $_REQUEST['lstVisiteur'];
		$frais = array('ETP'=>$_POST['0'],'KM'=>$_POST['1'],'NUIT'=>$_POST['2'],'REP'=>$_POST['3']);
		$pdo->majFraisForfait($visiteur,$mois, $frais);

		header('Location: index.php?uc=comptable&action=voirFiche&lstMois='.$mois.'&lstVisiteur='.$visiteur);
		break;
	}
	case 'justificatif':{
		$mois = $_REQUEST['lstMois'];
		$visiteur = $_REQUEST['lstVisiteur'];
		$newJusti = $_REQUEST['modifJusti'];
		$pdo->majNbJustificatifs($visiteur, $mois, $newJusti);

		header('Location: index.php?uc=comptable&action=voirFiche&lstMois='.$mois.'&lstVisiteur='.$visiteur);
		break;
	}
	case 'modification':{
		$mois = $_REQUEST['lstMois'];
		$visiteur = $_REQUEST['lstVisiteur'];
		$idFrais = $_REQUEST['idFrais'];
		
		$newDate = $_REQUEST['modifDate'];
		$newDate = dateFrancaisVersAnglais($newDate);
		$newLibelle = $_REQUEST['modifLibelle'];
		$newMontant = $_REQUEST['modifMontant'];
		$pdo->majFraisHorsForfait($idFrais, $newDate, $newLibelle, $newMontant);

		header('Location: index.php?uc=comptable&action=voirFiche&lstMois='.$mois.'&lstVisiteur='.$visiteur);
		break;
	}
	case 'suppression':{
		$mois = $_REQUEST['lstMois'];
		$visiteur = $_REQUEST['lstVisiteur'];
		$idFrais = $_REQUEST['idFrais'];

		$pdo->supprimerFraisHorsForfait($idFrais);
		header('Location: index.php?uc=comptable&action=voirFiche&lstMois='.$mois.'&lstVisiteur='.$visiteur);
		break;
	}
	case 'ajout':{
		$mois = $_REQUEST['lstMois'];
		$visiteur = $_REQUEST['lstVisiteur'];

		$idFrais = $_REQUEST['idFrais'];
		$pdo->ajoutMoisFraisHorsForfait($idFrais);

		header('Location: index.php?uc=comptable&action=voirFiche&lstMois='.$mois.'&lstVisiteur='.$visiteur);
		break;
	}
	case 'rembourser':{
        $mois = $_REQUEST['lstMois'];
		$visiteur = $_REQUEST['lstVisiteur'];
        $pdo->updateEtatRembourser($visiteur, $mois);
        header('Location: index.php?uc=comptable&action=voirFicheC&lstMois='.$mois.'&lstVisiteur='.$visiteur);
    break;
    }
    case 'creer':{
        $mois = $_REQUEST['lstMois'];
		$visiteur = $_REQUEST['lstVisiteur'];
        $pdo->updateEtatCreer($visiteur, $mois);
        header('Location: index.php?uc=comptable&action=voirFicheC&lstMois='.$mois.'&lstVisiteur='.$visiteur);
    break;
    }
    case 'saisie':{
        $mois = $_REQUEST['lstMois'];
		$visiteur = $_REQUEST['lstVisiteur'];
        $pdo->updateEtatSaisie($visiteur, $mois);
        header('Location: index.php?uc=comptable&action=voirFicheC&lstMois='.$mois.'&lstVisiteur='.$visiteur);
    break;
    }
    case 'valider':{
        $mois = $_REQUEST['lstMois'];
		$visiteur = $_REQUEST['lstVisiteur'];
        $pdo->updateEtatValider($visiteur, $mois);
        header('Location: index.php?uc=comptable&action=voirFicheC&lstMois='.$mois.'&lstVisiteur='.$visiteur);
    break;
    }
}
?>
