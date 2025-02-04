<?php
//#28.0.380.0 Les sentinelles de la mer
ob_start();if (!defined('UNICODE_PAGE_UTF8')) define('UNICODE_PAGE_UTF8',false);
$gszId='Les sentinelles de la mer	PAGE_MENU	20250204195931';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD28.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CImage');
IHM_Include('CChampZoneTexte');
IHM_Include('CChampPlanning');
IHM_Include('CBouton');
IHM_Include('CTableAjax');
IHM_Include('CSaisie');


Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
WB_Include('HF.php');
WB_Include('WL/HF/HF.php');
WB_Include('IHM/Champ/Calendrier/ChampCalendrier.php');
WB_Include('Engine.php');
WB_Include('WL/PAGE/Page.php');
WB_Include('IHM/Champ/Liste/Table/Table.php');
WB_Include('WL/STD/Std.php');
TYPE_Include(TYPEWL_ENTIER);
TYPE_Include(TYPEWL_CHAINE);
// Equivalent de [%URL()%]
$gszURL='PAGE-Menu.php';
$j=1;$i=1;
if (!isset($_SESSION)) session_start();
// protection contre register_globals = on
unset($PAGE_MENU);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(0,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gtabCheminPage['PAGE_ADMINISTRATION']=array(5=>array('NOM'=>'PAGE-Administration','URL'=>'./'));
$gtabCheminPage['PAGE_PARTICIPENT']=array(5=>array('NOM'=>'PAGE-Participent','URL'=>'./'));
$gtabCheminPage['PAGE_INFO_SENTINELLE']=array(5=>array('NOM'=>'PAGE-info-sentinelle','URL'=>'./'));
$gtabCheminPage['PAGE_CONNEXION']=array(5=>array('NOM'=>'index','URL'=>'./'));
$gszCheminPageInverse='./';
$gtabCheminPage['PAGE_MENU']=array(5=>array('NOM'=>'PAGE-Menu','URL'=>'./'));
$gtabCheminPage['PAGE_INSCRIPTION_PLANNING']=array(5=>array('NOM'=>'PAGE-Inscription-planning','URL'=>'./'));

EnvSet('HCreationAutoActive',true);
EnvSet('FORMATDATESYSTEME','JJ/MM/AAAA');
EnvSet('FORMATHEURESYSTEME','HH:MM');
EnvSet('UNITESTAILLESFICHIER',array("o","Ko","Mo","Go","To","Po"));
$_gszSEPDEVISE = "€";
$_gszSEPDEC = ",";
$_gszSEPMIL = " ";
//-----------------------------------------------------------------------
//  Restauration de contexte 
//-----------------------------------------------------------------------
RechargementPageSiBesoin('PAGE_MENU');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_MENU']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_MENU= $gTabVarSession['PAGE_MENU'];
	$PAGE_MENU->WB_RestaureContexte();
$MaPage =& $PAGE_MENU;
$GLOBALS['PAGE_Menu'] =& $MaPage;
if (isset($gnIndiceAgencement) && $gnIndiceAgencement !== $MaPage->m_nIndiceAgencementCourant)
{

}
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_MENU)) {
$PAGE_MENU= new CPage(false);
$PAGE_MENU->Nom = 'PAGE_Menu';
$PAGE_MENU->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_MENU->Alias = 'PAGE_MENU';
$PAGE_MENU->m_sNomPHP = 'PAGE_MENU';
$PAGE_MENU->Libelle = 'Les sentinelles de la mer';
$PAGE_MENU->bUTF8 = true;
$PAGE_MENU->bHTML5 = true;
$PAGE_MENU->bAvecContexte = true;
$PAGE_MENU->sFichierPalette = '.\\res\\Material Blue 2.wpc';
$PAGE_MENU->Plan = 1;
$PAGE_MENU->ImageFond = '';
$MaPage =& $PAGE_MENU;
$GLOBALS['PAGE_Menu'] =& $MaPage;
$A4_IMG_SansNom1=&CreerChamp('CImage',281,76,16447992);$PAGE_MENU->WB_AjouteChamp('IMG_SansNom1','A4',$A4_IMG_SansNom1,'A4_IMG_SansNom1');
$A4_IMG_SansNom1->m_bDefilementAutomatique=false;
$A4_IMG_SansNom1->m_nDefilementTemporisation=1000;
$A4_IMG_SansNom1->m_bDefilementLancementAutomatique=true;
$A4_IMG_SansNom1->m_bDefilementModeRepertoire=true;
$A4_IMG_SansNom1->m_bDefilementTriActif=false;
$A4_IMG_SansNom1->m_nDefilementTriOptions=-1;
$A4_IMG_SansNom1->eTypeImage=4;
$A4_IMG_SansNom1->nModeAffichage=21;
$A4_IMG_SansNom1->nTransparence=1;
$A4_IMG_SansNom1->bForceTailleReelle=true;
$A4_IMG_SansNom1->sConteneurAliasOuFond=0xFFFFFF;

$A1_ZTR_boujour=&CreerChamp('CChampZoneTexte');$PAGE_MENU->WB_AjouteChamp('ZTR_boujour','A1',$A1_ZTR_boujour,'A1_ZTR_boujour');
$A1_ZTR_boujour->m_bLibelleRiche=true;

$A2_PLN_REQ_planing=&CreerChamp('CChampPlanning');$PAGE_MENU->WB_AjouteChamp('PLN_REQ_planing','A2',$A2_PLN_REQ_planing,'A2_PLN_REQ_planing');
$A2_PLN_REQ_planing->SetModeNbJourPlanning(5);
$A2_PLN_REQ_planing->m_nNbJourZoomLibre=6;
$A2_PLN_REQ_planing->SetModeAffichagePlanning(0);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_LIBNOMMOIS);

$elSty->SetNomClassCSS('Normal-Fond A2-sty10654');

$elSty->SetCouleurFondHTML(0x00FFFFFF);

$elSty->m_nEpaisseur = 0;
$elSty->SetStyle(1);
$elSty->SetCouleur(0xFF000000);
$A2_PLN_REQ_planing->m_bSupportJourneeEntiere=false;
$A2_PLN_REQ_planing->m_nHauteurZoneJourneeCompleteEd=34;
$A2_PLN_REQ_planing->m_eModeZoom=0;
$A2_PLN_REQ_planing->m_nNbJourModeSemaine=0;
$A2_PLN_REQ_planing->m_nActionAutoriseeBase=7;
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_LIBHEURE);

$elSty->SetNomClassCSS('Normal-Fond A2-sty10436');

$elSty->SetCouleurFondHTML(0x00FFFFFF);

$elSty->m_nEpaisseur = 1;
$elSty->SetStyle(2);
$elSty->SetCouleur(0x00E0DCDA);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_RDV_CADRE);

$elSty->SetNomClassCSS('rendezvous A2-sty10438');

$elSty->SetCouleurFondHTML(0x00E8F0FE);

$elSty->SetCouleur(0xFF000000);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_RDV_CADRESELECT);

$elSty->SetNomClassCSS('rendezvous-selectionne A2-sty10440');

$elSty->SetCouleurFondHTML(0x00E8F0FE);

$elSty->SetCouleur(0xFF000000);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_RDV_CONTENU);

$elSty->SetNomClassCSS('rendezvous-detail A2-sty10501');

$elSty->SetCouleurFondHTML(0xFF000000);

$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_RDV_CONTENU_SELECT);

$elSty->SetNomClassCSS('rendezvous-selectionne-detail A2-sty10503');

$elSty->SetCouleurFondHTML(0xFF000000);

$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_LIBNUMEROSEMAINE);

$elSty->SetNomClassCSS('Normal-Fond A2-sty10649');

$elSty->SetCouleurFondHTML(0x00FFFFFF);

$elSty->m_nEpaisseur = 1;
$elSty->SetStyle(2);
$elSty->SetCouleur(0x00E0DCDA);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_RDV_TITRE);

$elSty->SetNomClassCSS('rendezvous-titre A2-sty10812');

$elSty->SetCouleurFondHTML(0xFF000000);

$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_RDV_TITRE_SELECT);

$elSty->SetNomClassCSS('rendezvous-selectionne-titre A2-sty10813');

$elSty->SetCouleurFondHTML(0xFF000000);

$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_AGENDA_RDV_SUPPRESSION);

$elSty->SetNomClassCSS('rendezvous-supprimer A2-sty10819');

$elSty->SetCouleurFondHTML(0xFF000000);

$A2_PLN_REQ_planing->m_clOptionsStyleRdvBordure=0;
$A2_PLN_REQ_planing->m_clOptionsStyleRdvContenu=4;
$A2_PLN_REQ_planing->m_clOptionsStyleRdvTitre=4;
$A2_PLN_REQ_planing->m_bMargeFixes=false;
$A2_PLN_REQ_planing->m_tabBoutonSuppr = array(array('m_eAncrage' => 2,'m_nLargeurPx' => 16,'m_nHauteurPx' => 16,'m_nDecalageXPx' => -8,'m_nDecalageYPx' => -8));$A2_PLN_REQ_planing->m_pclStyle->m_czImageBtnPrecedent='./res/BTN_Simple_Left240_Material_Design_2Material_Blue_2.png';
$A2_PLN_REQ_planing->m_pclStyle->m_czImageBtnSuivant='./res/BTN_Simple_Right240_Material_Design_2Material_Blue_2.png';
$A2_PLN_REQ_planing->m_eModesuperposition=1;
$A2_PLN_REQ_planing->m_bRedimEvenementParUser=false;
$A2_PLN_REQ_planing->m_bDeplaceEvenementParUser=false;
$A2_PLN_REQ_planing->m_bSelectPeriodeParUser=true;
$A2_PLN_REQ_planing->m_bEditInPlaceInterdit=false;
$A2_PLN_REQ_planing->bSetPlageHoraireVisible('1500','1800');
$A2_PLN_REQ_planing->m_nHauteurRuptureJour=20;
$A2_PLN_REQ_planing->m_nGraduationLargeurOuHauteurPixel=51;
$A2_PLN_REQ_planing->m_nLargeurOuHauteurMinRessource=43;
$A2_PLN_REQ_planing->bSetPlageHoraireOuvrables('1500','1800');
$A2_PLN_REQ_planing->m_czMasqueHeureForce='';
$A2_PLN_REQ_planing->m_bAvecBoutonChangePeriode=false;
$A2_PLN_REQ_planing->m_nGranulariteRDV_Deplacement=1440;
$A2_PLN_REQ_planing->m_nGranulariteRDV_Redim=1440;
$A2_PLN_REQ_planing->m_nLargeurZoneRessourceInitiale=55;
$A2_PLN_REQ_planing->m_bAfficheNumeroDeSemaine=false;
$A2_PLN_REQ_planing->m_cszMasqueNumeroSemaine='';
$A2_PLN_REQ_planing->m_bAfficherTitreRendezVous=true;
$A2_PLN_REQ_planing->m_bAccesAuxHeuresNonAffichees=true;
$A2_PLN_REQ_planing->m_bAjoutMoisDansPremierLibelle=true;
$A2_PLN_REQ_planing->m_nLargeurZoneHeure=48;
$A2_PLN_REQ_planing->m_nHauteurTitreUneLigne=20;
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_JOURBASE);

$elSty->SetNomClassCSS('PLN-Fond A2-sty10283');

$elSty->SetCouleurFondHTML(0x00FFFFFF);

$elSty->m_nEpaisseur = 1;
$elSty->SetStyle(2);
$elSty->SetCouleur(0x00E0DCDA);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_JOURSELECTION);

$elSty->SetNomClassCSS('Normal-Fond-Negatif A2-sty10285');

$elSty->SetCouleurFondHTML(0x005F6469);

$elSty->m_nEpaisseur = 0;
$elSty->SetStyle(1);
$elSty->SetCouleur(0xFF000000);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_JOURAUJOURDHUI);

$elSty->SetNomClassCSS('Aujourdhui A2-sty10287');

$elSty->SetCouleurFondHTML(0x00F5F5F5);

$elSty->m_nEpaisseur = 0;
$elSty->SetStyle(1);
$elSty->SetCouleur(0xFF000000);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_JOURSAMEDI);

$elSty->SetNomClassCSS('Lignes-Impaires A2-sty10289');

$elSty->SetCouleurFondHTML(0x00F8F8F8);

$elSty->m_nEpaisseur = 0;
$elSty->SetStyle(1);
$elSty->SetCouleur(0xFF000000);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_JOURDIMANCHE);

$elSty->SetNomClassCSS('Lignes-Impaires A2-sty10291');

$elSty->SetCouleurFondHTML(0x00F8F8F8);

$elSty->m_nEpaisseur = 0;
$elSty->SetStyle(1);
$elSty->SetCouleur(0xFF000000);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_JOURHORSBORNES);

$elSty->SetNomClassCSS('Normal-Fond-3 A2-sty10293');

$elSty->SetCouleurFondHTML(0x00F8F9FA);

$elSty->m_nEpaisseur = 0;
$elSty->SetStyle(1);
$elSty->SetCouleur(0xFF000000);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_LIBMOIS);

$elSty->SetNomClassCSS('Normal-Fond A2-sty10301');

$elSty->SetCouleurFondHTML(0x00FFFFFF);

$elSty->m_nEpaisseur = 1;
$elSty->SetStyle(2);
$elSty->SetCouleur(0x00E0DCDA);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_LIBJOURSEMAINE);

$elSty->SetNomClassCSS('Normal-Fond A2-sty10303');

$elSty->SetCouleurFondHTML(0x00FFFFFF);

$elSty->m_nEpaisseur = 1;
$elSty->SetStyle(2);
$elSty->SetCouleur(0x00E0DCDA);
$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_BTNSUIVPREC);

$elSty->SetNomClassCSS('Normal-Fond A2-sty10305');

$elSty->SetCouleurFondHTML(0x00FFFFFF);

$elSty=&$A2_PLN_REQ_planing->vpclGetElementStyleCadreLibelle(ELEMENTSTYLE_CALENDRIER_JOURFERIE);

$elSty->SetNomClassCSS('Attention-3 A2-sty10310');

$elSty->SetCouleurFondHTML(0x00D5EEE2);

$elSty->m_nEpaisseur = 0;
$elSty->SetStyle(1);
$elSty->SetCouleur(0xFF000000);
$A2_PLN_REQ_planing->SetNum1erJourAffiche(1);
$A2_PLN_REQ_planing->nLimiteChargementMemoire=0;

$A3_BTN_admin=&CreerChamp('CBouton');$PAGE_MENU->WB_AjouteChamp('BTN_admin','A3',$A3_BTN_admin,'A3_BTN_admin');
$A3_BTN_admin->m_bLibelleRiche=true;

$A5_BTN_compte=&CreerChamp('CBouton');$PAGE_MENU->WB_AjouteChamp('BTN_compte','A5',$A5_BTN_compte,'A5_BTN_compte');
$A5_BTN_compte->m_bLibelleRiche=true;

$A6_BTN_affiche_participant=&CreerChamp('CBouton');$PAGE_MENU->WB_AjouteChamp('BTN_affiche_participant','A6',$A6_BTN_affiche_participant,'A6_BTN_affiche_participant');
$A6_BTN_affiche_participant->m_bLibelleRiche=true;

$A7_TABLE_REQ_participent_plng=&CreerChamp('CTableAjax');$PAGE_MENU->WB_AjouteChamp('TABLE_REQ_participent_plng','A7',$A7_TABLE_REQ_participent_plng,'A7_TABLE_REQ_participent_plng');
$A7_TABLE_REQ_participent_plng->m_bHauteurLigneVariable=true;
$A7_TABLE_REQ_participent_plng->m_nNbColonnesOuAttributs=3;
$A7_TABLE_REQ_participent_plng->SetMaxLignePage(36);
$A7_TABLE_REQ_participent_plng->SetFirstIndex(0);
$A7_TABLE_REQ_participent_plng->Visible=0;
$A7_TABLE_REQ_participent_plng->Etat=5;
$A7_TABLE_REQ_participent_plng->nModeSelection=1;

$A8_COL_Nom=&CreerChamp('CSaisie');$PAGE_MENU->WB_AjouteChamp('COL_Nom','A8',$A8_COL_Nom,'A8_COL_Nom');
$A7_TABLE_REQ_participent_plng->AjouteColonne('A8_COL_Nom','COL_Nom','A8', 5600, 0,'REQ_participent_plng','Nom');
$A7_TABLE_REQ_participent_plng->TabColonnes[1]->Visible=1;
$A7_TABLE_REQ_participent_plng->TabColonnes[1]->Etat=0;
$A7_TABLE_REQ_participent_plng->TabColonnes[1]->bColonneLien=0;
$A7_TABLE_REQ_participent_plng->TabColonnes[1]->m_eDeplaceInsere = 3;
$A7_TABLE_REQ_participent_plng->TabColonnes[1]->m_sBulle='';
$A8_COL_Nom->m_eAction=6;
$A8_COL_Nom->m_sPageAction='';
$A8_COL_Nom->m_bLibelleRiche=true;

$A9_COL_Sac=&CreerChamp('CSaisie');$PAGE_MENU->WB_AjouteChamp('COL_Sac','A9',$A9_COL_Sac,'A9_COL_Sac');
$A7_TABLE_REQ_participent_plng->AjouteColonne('A9_COL_Sac','COL_Sac','A9', 500, 1,'REQ_participent_plng','Sac');
$A7_TABLE_REQ_participent_plng->TabColonnes[2]->Visible=1;
$A7_TABLE_REQ_participent_plng->TabColonnes[2]->Etat=0;
$A7_TABLE_REQ_participent_plng->TabColonnes[2]->bColonneLien=0;
$A7_TABLE_REQ_participent_plng->TabColonnes[2]->m_eDeplaceInsere = 3;
$A7_TABLE_REQ_participent_plng->TabColonnes[2]->m_sBulle='';
$A9_COL_Sac->m_eAction=6;
$A9_COL_Sac->m_sPageAction='';
$A9_COL_Sac->m_bLibelleRiche=true;

$A10_COL_Covoiturage=&CreerChamp('CSaisie');$PAGE_MENU->WB_AjouteChamp('COL_Covoiturage','A10',$A10_COL_Covoiturage,'A10_COL_Covoiturage');
$A7_TABLE_REQ_participent_plng->AjouteColonne('A10_COL_Covoiturage','COL_Covoiturage','A10', 500, 2,'REQ_participent_plng','Covoiturage');
$A7_TABLE_REQ_participent_plng->TabColonnes[3]->Visible=1;
$A7_TABLE_REQ_participent_plng->TabColonnes[3]->Etat=0;
$A7_TABLE_REQ_participent_plng->TabColonnes[3]->bColonneLien=0;
$A7_TABLE_REQ_participent_plng->TabColonnes[3]->m_eDeplaceInsere = 4;
$A7_TABLE_REQ_participent_plng->TabColonnes[3]->m_sBulle='';
$A10_COL_Covoiturage->m_eAction=6;
$A10_COL_Covoiturage->m_sPageAction='';
$A10_COL_Covoiturage->m_bLibelleRiche=true;

$A12_SAI_idpln=&CreerChamp('CSaisie');$PAGE_MENU->WB_AjouteChamp('SAI_idpln','A12',$A12_SAI_idpln,'A12_SAI_idpln');
$A12_SAI_idpln->SetATTMISEABLANC(true);
$A12_SAI_idpln->SetChampFormate(false);
$A12_SAI_idpln->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A12_SAI_idpln->m_eBarreOutilsMode = 0;
$A12_SAI_idpln->m_bLibelleRiche=true;

$A13_BTN_ajout_participen=&CreerChamp('CBouton');$PAGE_MENU->WB_AjouteChamp('BTN_ajout_participen','A13',$A13_BTN_ajout_participen,'A13_BTN_ajout_participen');
$A13_BTN_ajout_participen->m_bLibelleRiche=true;

$A14_BTN_plus_de_participation=&CreerChamp('CBouton');$PAGE_MENU->WB_AjouteChamp('BTN_plus_de_participation','A14',$A14_BTN_plus_de_participation,'A14_BTN_plus_de_participation');
$A14_BTN_plus_de_participation->m_bLibelleRiche=true;

$A11_BTN_AVANCER=&CreerChamp('CBouton');$PAGE_MENU->WB_AjouteChamp('BTN_AVANCER','A11',$A11_BTN_AVANCER,'A11_BTN_AVANCER');
$A11_BTN_AVANCER->m_bLibelleRiche=true;

$A16_BTN_RECULER=&CreerChamp('CBouton');$PAGE_MENU->WB_AjouteChamp('BTN_RECULER','A16',$A16_BTN_RECULER,'A16_BTN_RECULER');
$A16_BTN_RECULER->m_bLibelleRiche=true;

$A15_SAI_date=&CreerChamp('CSaisie');$PAGE_MENU->WB_AjouteChamp('SAI_date','A15',$A15_SAI_date,'A15_SAI_date');
$A15_SAI_date->SetATTMISEABLANC(true);
$A15_SAI_date->SetChampFormate(false);
$A15_SAI_date->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A15_SAI_date->m_eBarreOutilsMode = 0;
$A15_SAI_date->m_bLibelleRiche=true;

$A17_BTN_sup_plage=&CreerChamp('CBouton');$PAGE_MENU->WB_AjouteChamp('BTN_sup_plage','A17',$A17_BTN_sup_plage,'A17_BTN_sup_plage');
$A17_BTN_sup_plage->m_bLibelleRiche=true;

$A18_IMG_poubelle=&CreerChamp('CImage',29,29,16447992);$PAGE_MENU->WB_AjouteChamp('IMG_poubelle','A18',$A18_IMG_poubelle,'A18_IMG_poubelle');
$A18_IMG_poubelle->m_bDefilementAutomatique=false;
$A18_IMG_poubelle->m_nDefilementTemporisation=1000;
$A18_IMG_poubelle->m_bDefilementLancementAutomatique=true;
$A18_IMG_poubelle->m_bDefilementModeRepertoire=true;
$A18_IMG_poubelle->m_bDefilementTriActif=false;
$A18_IMG_poubelle->m_nDefilementTriOptions=-1;
$A18_IMG_poubelle->eTypeImage=4;
$A18_IMG_poubelle->nModeAffichage=21;
$A18_IMG_poubelle->nTransparence=1;
$A18_IMG_poubelle->bForceTailleReelle=true;
$A18_IMG_poubelle->sConteneurAliasOuFond=0xFFFFFF;



//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------
$A4_IMG_SansNom1->Valeur = '../ext/WhatsApp Image 2025-01-21 at 15.47.27.jpeg';
$A4_IMG_SansNom1->JetonActif = false;


$A4_IMG_SansNom1->lierVM('PAGE_Menu','IMG_SansNom1','A4_IMG_SansNom1');
$A1_ZTR_boujour->Couleur = 0x69645F;
$A1_ZTR_boujour->CouleurInitiale = 0x69645F;
$A1_ZTR_boujour->Valeur = function_exists("construireTexteRiche_A1_ZTR_boujour") ? null : '<p>Saisissez votre texte</p>';
$A1_ZTR_boujour->m_nHauteur = 20;
$A1_ZTR_boujour->m_nLargeur = 343;
$A1_ZTR_boujour->m_nOpacite = 100;
$A1_ZTR_boujour->m_nCadrageHorizontal = 1;
$A1_ZTR_boujour->m_nCadrageVertical = -1;
$A1_ZTR_boujour->m_Police->m_bGras = true;
$A1_ZTR_boujour->m_Police->m_bItalique = false;
$A1_ZTR_boujour->m_Police->m_bSouligne = false;
$A1_ZTR_boujour->m_Police->m_sNom = 'Roboto, Helvetica, Arial, sans-serif';
$A1_ZTR_boujour->m_Police->m_nTaille = '15px';
$A1_ZTR_boujour->m_nX = 17;
$A1_ZTR_boujour->m_nY = 105;
$A1_ZTR_boujour->m_clCouleurJauge = 0x000000;
$A1_ZTR_boujour->BoutonCalendrier = 0;
$A1_ZTR_boujour->EtatInitial = 0;
$A1_ZTR_boujour->VisibleInitial = 1;
$A1_ZTR_boujour->YInitial = 0;
$A1_ZTR_boujour->NombreColonne = 0;
$A1_ZTR_boujour->BulleTitre = '';
$A1_ZTR_boujour->JetonActif = false;
$A1_ZTR_boujour->JetonListeSeparateur = '';
$A1_ZTR_boujour->JetonAutoriseDoublon = false;
$A1_ZTR_boujour->JetonSupprimable = false;


$A1_ZTR_boujour->lierVM('PAGE_Menu','ZTR_boujour','A1_ZTR_boujour');
$A2_PLN_REQ_planing->CouleurFond = 0xFFFFFF;
$A2_PLN_REQ_planing->CouleurFondInitiale = 0xFFFFFF;
$A2_PLN_REQ_planing->Valeur = '';
$A2_PLN_REQ_planing->Libelle = 'Planning';
$A2_PLN_REQ_planing->Masque = 'MMMM AAAA|L|J';
$A2_PLN_REQ_planing->m_nHauteur = 261;
$A2_PLN_REQ_planing->m_nLargeur = 379;
$A2_PLN_REQ_planing->m_nOpacite = 100;
$A2_PLN_REQ_planing->m_Police->m_bGras = false;
$A2_PLN_REQ_planing->m_Police->m_bItalique = false;
$A2_PLN_REQ_planing->m_Police->m_bSouligne = false;
$A2_PLN_REQ_planing->m_nX = 9;
$A2_PLN_REQ_planing->m_nY = 171;
$A2_PLN_REQ_planing->m_clCouleurJauge = 0x000000;
$A2_PLN_REQ_planing->BoutonCalendrier = 0;
$A2_PLN_REQ_planing->EtatInitial = 0;
$A2_PLN_REQ_planing->VisibleInitial = 1;
$A2_PLN_REQ_planing->YInitial = 0;
$A2_PLN_REQ_planing->NombreColonne = 0;
$A2_PLN_REQ_planing->BulleTitre = '';
$A2_PLN_REQ_planing->JetonActif = false;
$A2_PLN_REQ_planing->JetonListeSeparateur = '';
$A2_PLN_REQ_planing->JetonAutoriseDoublon = false;
$A2_PLN_REQ_planing->JetonSupprimable = false;


$A2_PLN_REQ_planing->lierVM('PAGE_Menu','PLN_REQ_planing','A2_PLN_REQ_planing');
$A3_BTN_admin->Libelle = function_exists("construireTexteRiche_A3_BTN_admin") ? null : 'Piloter l’application';
$A3_BTN_admin->JetonActif = false;


$A3_BTN_admin->lierVM('PAGE_Menu','BTN_admin','A3_BTN_admin');
$A5_BTN_compte->Libelle = function_exists("construireTexteRiche_A5_BTN_compte") ? null : 'Gérer mes Infos';
$A5_BTN_compte->JetonActif = false;


$A5_BTN_compte->lierVM('PAGE_Menu','BTN_compte','A5_BTN_compte');
$A6_BTN_affiche_participant->Visible = false;
$A6_BTN_affiche_participant->Couleur = 0xFFFFFF;
$A6_BTN_affiche_participant->CouleurInitiale = 0xFFFFFF;
$A6_BTN_affiche_participant->CouleurFond = 0xF48542;
$A6_BTN_affiche_participant->CouleurFondInitiale = 0xF48542;
$A6_BTN_affiche_participant->Libelle = function_exists("construireTexteRiche_A6_BTN_affiche_participant") ? null : 'Affiche les participents';
$A6_BTN_affiche_participant->Etat = 1;
$A6_BTN_affiche_participant->m_nHauteur = 29;
$A6_BTN_affiche_participant->m_nLargeur = 124;
$A6_BTN_affiche_participant->m_nOpacite = 100;
$A6_BTN_affiche_participant->m_nCadrageHorizontal = 1;
$A6_BTN_affiche_participant->m_nCadrageVertical = 1;
$A6_BTN_affiche_participant->m_Police->m_bGras = false;
$A6_BTN_affiche_participant->m_Police->m_bItalique = false;
$A6_BTN_affiche_participant->m_Police->m_bSouligne = false;
$A6_BTN_affiche_participant->m_Police->m_sNom = 'Roboto, Helvetica, Arial, sans-serif';
$A6_BTN_affiche_participant->m_Police->m_nTaille = '14px';
$A6_BTN_affiche_participant->m_nX = 48;
$A6_BTN_affiche_participant->m_nY = 1453;
$A6_BTN_affiche_participant->m_clCouleurJauge = 0x000000;
$A6_BTN_affiche_participant->BoutonCalendrier = 0;
$A6_BTN_affiche_participant->EtatInitial = 0;
$A6_BTN_affiche_participant->VisibleInitial = 0;
$A6_BTN_affiche_participant->YInitial = 0;
$A6_BTN_affiche_participant->NombreColonne = 0;
$A6_BTN_affiche_participant->BulleTitre = '';
$A6_BTN_affiche_participant->JetonActif = false;
$A6_BTN_affiche_participant->JetonListeSeparateur = '';
$A6_BTN_affiche_participant->JetonAutoriseDoublon = false;
$A6_BTN_affiche_participant->JetonSupprimable = false;


$A6_BTN_affiche_participant->lierVM('PAGE_Menu','BTN_affiche_participant','A6_BTN_affiche_participant');
$A7_TABLE_REQ_participent_plng->Visible = false;
$A7_TABLE_REQ_participent_plng->Valeur = '';
$A7_TABLE_REQ_participent_plng->Etat = 1;
$A7_TABLE_REQ_participent_plng->m_nHauteur = 851;
$A7_TABLE_REQ_participent_plng->m_nLargeur = 381;
$A7_TABLE_REQ_participent_plng->m_nOpacite = 100;
$A7_TABLE_REQ_participent_plng->m_Police->m_bGras = false;
$A7_TABLE_REQ_participent_plng->m_Police->m_bItalique = false;
$A7_TABLE_REQ_participent_plng->m_Police->m_bSouligne = false;
$A7_TABLE_REQ_participent_plng->m_nX = 6;
$A7_TABLE_REQ_participent_plng->m_nY = 492;
$A7_TABLE_REQ_participent_plng->m_clCouleurJauge = 0x000000;
$A7_TABLE_REQ_participent_plng->BoutonCalendrier = 0;
$A7_TABLE_REQ_participent_plng->EtatInitial = 5;
$A7_TABLE_REQ_participent_plng->VisibleInitial = 0;
$A7_TABLE_REQ_participent_plng->YInitial = 0;
$A7_TABLE_REQ_participent_plng->NombreColonne = 3;
$A7_TABLE_REQ_participent_plng->BulleTitre = '';
$A7_TABLE_REQ_participent_plng->JetonActif = false;
$A7_TABLE_REQ_participent_plng->JetonListeSeparateur = '';
$A7_TABLE_REQ_participent_plng->JetonAutoriseDoublon = false;
$A7_TABLE_REQ_participent_plng->JetonSupprimable = false;


$A7_TABLE_REQ_participent_plng->lierVM('PAGE_Menu','TABLE_REQ_participent_plng','A7_TABLE_REQ_participent_plng');
$A8_COL_Nom->Couleur = 0x69645F;
$A8_COL_Nom->CouleurInitiale = 0x69645F;
$A8_COL_Nom->CouleurFond = -1;
$A8_COL_Nom->CouleurFondInitiale = -1;
$A8_COL_Nom->Valeur = '';
$A8_COL_Nom->Libelle = function_exists("construireTexteRiche_A8_COL_Nom") ? null : 'Nom';
$A8_COL_Nom->Masque = '0';
$A8_COL_Nom->m_nHauteur = 851;
$A8_COL_Nom->m_nLargeur = 265;
$A8_COL_Nom->m_nOpacite = 100;
$A8_COL_Nom->m_nCadrageHorizontal = -1;
$A8_COL_Nom->m_nCadrageVertical = -1;
$A8_COL_Nom->m_Police->m_bGras = false;
$A8_COL_Nom->m_Police->m_bItalique = false;
$A8_COL_Nom->m_Police->m_bSouligne = false;
$A8_COL_Nom->m_nX = 0;
$A8_COL_Nom->m_nY = 0;
$A8_COL_Nom->m_clCouleurJauge = 0x000000;
$A8_COL_Nom->BoutonCalendrier = 0;
$A8_COL_Nom->EtatInitial = 0;
$A8_COL_Nom->VisibleInitial = 1;
$A8_COL_Nom->YInitial = 0;
$A8_COL_Nom->NombreColonne = 0;
$A8_COL_Nom->BulleTitre = '';
$A8_COL_Nom->JetonActif = false;
$A8_COL_Nom->JetonListeSeparateur = '';
$A8_COL_Nom->JetonAutoriseDoublon = false;
$A8_COL_Nom->JetonSupprimable = true;


$A8_COL_Nom->lierVM('PAGE_Menu','COL_Nom','A8_COL_Nom');
$A9_COL_Sac->Couleur = 0x69645F;
$A9_COL_Sac->CouleurInitiale = 0x69645F;
$A9_COL_Sac->Libelle = function_exists("construireTexteRiche_A9_COL_Sac") ? null : 'Sac';
$A9_COL_Sac->Masque = 0;
$A9_COL_Sac->m_nHauteur = 851;
$A9_COL_Sac->m_nLargeur = 50;
$A9_COL_Sac->m_nOpacite = 100;
$A9_COL_Sac->m_nCadrageHorizontal = -1;
$A9_COL_Sac->m_nCadrageVertical = -1;
$A9_COL_Sac->m_Police->m_bGras = false;
$A9_COL_Sac->m_Police->m_bItalique = false;
$A9_COL_Sac->m_Police->m_bSouligne = false;
$A9_COL_Sac->m_Police->m_sNom = 'Roboto, Helvetica, Arial, sans-serif';
$A9_COL_Sac->m_Police->m_nTaille = '14px';
$A9_COL_Sac->m_nX = 0;
$A9_COL_Sac->m_nY = 0;
$A9_COL_Sac->m_clCouleurJauge = 0x000000;
$A9_COL_Sac->BoutonCalendrier = 0;
$A9_COL_Sac->EtatInitial = 0;
$A9_COL_Sac->VisibleInitial = 1;
$A9_COL_Sac->YInitial = 0;
$A9_COL_Sac->NombreColonne = 1;
$A9_COL_Sac->BulleTitre = '';
$A9_COL_Sac->JetonActif = false;
$A9_COL_Sac->JetonListeSeparateur = '';
$A9_COL_Sac->JetonAutoriseDoublon = false;
$A9_COL_Sac->JetonSupprimable = false;


$A9_COL_Sac->lierVM('PAGE_Menu','COL_Sac','A9_COL_Sac');
$A10_COL_Covoiturage->Couleur = 0x69645F;
$A10_COL_Covoiturage->CouleurInitiale = 0x69645F;
$A10_COL_Covoiturage->Libelle = function_exists("construireTexteRiche_A10_COL_Covoiturage") ? null : 'Voit';
$A10_COL_Covoiturage->Masque = 0;
$A10_COL_Covoiturage->m_nHauteur = 851;
$A10_COL_Covoiturage->m_nLargeur = 50;
$A10_COL_Covoiturage->m_nOpacite = 100;
$A10_COL_Covoiturage->m_nCadrageHorizontal = -1;
$A10_COL_Covoiturage->m_nCadrageVertical = -1;
$A10_COL_Covoiturage->m_Police->m_bGras = false;
$A10_COL_Covoiturage->m_Police->m_bItalique = false;
$A10_COL_Covoiturage->m_Police->m_bSouligne = false;
$A10_COL_Covoiturage->m_Police->m_sNom = 'Roboto, Helvetica, Arial, sans-serif';
$A10_COL_Covoiturage->m_Police->m_nTaille = '14px';
$A10_COL_Covoiturage->m_nX = 0;
$A10_COL_Covoiturage->m_nY = 0;
$A10_COL_Covoiturage->m_clCouleurJauge = 0x000000;
$A10_COL_Covoiturage->BoutonCalendrier = 0;
$A10_COL_Covoiturage->EtatInitial = 0;
$A10_COL_Covoiturage->VisibleInitial = 1;
$A10_COL_Covoiturage->YInitial = 0;
$A10_COL_Covoiturage->NombreColonne = 1;
$A10_COL_Covoiturage->BulleTitre = '';
$A10_COL_Covoiturage->JetonActif = false;
$A10_COL_Covoiturage->JetonListeSeparateur = '';
$A10_COL_Covoiturage->JetonAutoriseDoublon = false;
$A10_COL_Covoiturage->JetonSupprimable = false;


$A10_COL_Covoiturage->lierVM('PAGE_Menu','COL_Covoiturage','A10_COL_Covoiturage');
$A12_SAI_idpln->Visible = false;
$A12_SAI_idpln->Couleur = 0x69645F;
$A12_SAI_idpln->CouleurInitiale = 0x69645F;
$A12_SAI_idpln->CouleurFond = 0xFFFFFF;
$A12_SAI_idpln->CouleurFondInitiale = 0xFFFFFF;
$A12_SAI_idpln->Valeur = '';
$A12_SAI_idpln->Libelle = function_exists("construireTexteRiche_A12_SAI_idpln") ? null : 'Champ de saisie';
$A12_SAI_idpln->Etat = 1;
$A12_SAI_idpln->Masque = '0';
$A12_SAI_idpln->m_nHauteur = 31;
$A12_SAI_idpln->m_nLargeur = 248;
$A12_SAI_idpln->m_nOpacite = 100;
$A12_SAI_idpln->m_nCadrageHorizontal = -1;
$A12_SAI_idpln->m_nCadrageVertical = 1;
$A12_SAI_idpln->m_Police->m_bGras = false;
$A12_SAI_idpln->m_Police->m_bItalique = false;
$A12_SAI_idpln->m_Police->m_bSouligne = false;
$A12_SAI_idpln->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A12_SAI_idpln->m_Police->m_nTaille = '14px';
$A12_SAI_idpln->m_nX = 48;
$A12_SAI_idpln->m_nY = 1482;
$A12_SAI_idpln->m_clCouleurJauge = 0x000000;
$A12_SAI_idpln->BoutonCalendrier = 0;
$A12_SAI_idpln->EtatInitial = 0;
$A12_SAI_idpln->VisibleInitial = 0;
$A12_SAI_idpln->YInitial = 0;
$A12_SAI_idpln->NombreColonne = 0;
$A12_SAI_idpln->BulleTitre = '';
$A12_SAI_idpln->JetonActif = false;
$A12_SAI_idpln->JetonListeSeparateur = '';
$A12_SAI_idpln->JetonAutoriseDoublon = false;
$A12_SAI_idpln->JetonSupprimable = true;


$A12_SAI_idpln->lierVM('PAGE_Menu','SAI_idpln','A12_SAI_idpln');
$A13_BTN_ajout_participen->Visible = false;
$A13_BTN_ajout_participen->Couleur = 0x803F00;
$A13_BTN_ajout_participen->CouleurInitiale = 0x803F00;
$A13_BTN_ajout_participen->CouleurFond = 0xFFFFFF;
$A13_BTN_ajout_participen->CouleurFondInitiale = 0xFFFFFF;
$A13_BTN_ajout_participen->Valeur = '';
$A13_BTN_ajout_participen->Libelle = function_exists("construireTexteRiche_A13_BTN_ajout_participen") ? null : 'Rejoindre l’observation';
$A13_BTN_ajout_participen->Etat = 1;
$A13_BTN_ajout_participen->m_nHauteur = 22;
$A13_BTN_ajout_participen->m_nLargeur = 155;
$A13_BTN_ajout_participen->m_nOpacite = 100;
$A13_BTN_ajout_participen->m_nCadrageHorizontal = 1;
$A13_BTN_ajout_participen->m_nCadrageVertical = 1;
$A13_BTN_ajout_participen->m_Police->m_bGras = true;
$A13_BTN_ajout_participen->m_Police->m_bItalique = false;
$A13_BTN_ajout_participen->m_Police->m_bSouligne = false;
$A13_BTN_ajout_participen->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A13_BTN_ajout_participen->m_Police->m_nTaille = '14px';
$A13_BTN_ajout_participen->m_nX = 226;
$A13_BTN_ajout_participen->m_nY = 456;
$A13_BTN_ajout_participen->m_clCouleurJauge = 0x000000;
$A13_BTN_ajout_participen->BoutonCalendrier = 0;
$A13_BTN_ajout_participen->EtatInitial = 0;
$A13_BTN_ajout_participen->VisibleInitial = 0;
$A13_BTN_ajout_participen->YInitial = 0;
$A13_BTN_ajout_participen->NombreColonne = 0;
$A13_BTN_ajout_participen->BulleTitre = '';
$A13_BTN_ajout_participen->JetonActif = false;
$A13_BTN_ajout_participen->JetonListeSeparateur = '';
$A13_BTN_ajout_participen->JetonAutoriseDoublon = false;
$A13_BTN_ajout_participen->JetonSupprimable = false;


$A13_BTN_ajout_participen->lierVM('PAGE_Menu','BTN_ajout_participen','A13_BTN_ajout_participen');
$A14_BTN_plus_de_participation->Visible = false;
$A14_BTN_plus_de_participation->Couleur = 0x803F00;
$A14_BTN_plus_de_participation->CouleurInitiale = 0x803F00;
$A14_BTN_plus_de_participation->CouleurFond = 0xFFFFFF;
$A14_BTN_plus_de_participation->CouleurFondInitiale = 0xFFFFFF;
$A14_BTN_plus_de_participation->Libelle = function_exists("construireTexteRiche_A14_BTN_plus_de_participation") ? null : 'Je me retire';
$A14_BTN_plus_de_participation->Etat = 1;
$A14_BTN_plus_de_participation->m_nHauteur = 22;
$A14_BTN_plus_de_participation->m_nLargeur = 155;
$A14_BTN_plus_de_participation->m_nOpacite = 100;
$A14_BTN_plus_de_participation->m_nCadrageHorizontal = 1;
$A14_BTN_plus_de_participation->m_nCadrageVertical = 1;
$A14_BTN_plus_de_participation->m_Police->m_bGras = true;
$A14_BTN_plus_de_participation->m_Police->m_bItalique = false;
$A14_BTN_plus_de_participation->m_Police->m_bSouligne = false;
$A14_BTN_plus_de_participation->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A14_BTN_plus_de_participation->m_Police->m_nTaille = '14px';
$A14_BTN_plus_de_participation->m_nX = 8;
$A14_BTN_plus_de_participation->m_nY = 456;
$A14_BTN_plus_de_participation->m_clCouleurJauge = 0x000000;
$A14_BTN_plus_de_participation->BoutonCalendrier = 0;
$A14_BTN_plus_de_participation->EtatInitial = 0;
$A14_BTN_plus_de_participation->VisibleInitial = 0;
$A14_BTN_plus_de_participation->YInitial = 0;
$A14_BTN_plus_de_participation->NombreColonne = 0;
$A14_BTN_plus_de_participation->BulleTitre = '';
$A14_BTN_plus_de_participation->JetonActif = false;
$A14_BTN_plus_de_participation->JetonListeSeparateur = '';
$A14_BTN_plus_de_participation->JetonAutoriseDoublon = false;
$A14_BTN_plus_de_participation->JetonSupprimable = false;


$A14_BTN_plus_de_participation->lierVM('PAGE_Menu','BTN_plus_de_participation','A14_BTN_plus_de_participation');
$A11_BTN_AVANCER->Libelle = function_exists("construireTexteRiche_A11_BTN_AVANCER") ? null : '&gt;';
$A11_BTN_AVANCER->JetonActif = false;


$A11_BTN_AVANCER->lierVM('PAGE_Menu','BTN_AVANCER','A11_BTN_AVANCER');
$A16_BTN_RECULER->Libelle = function_exists("construireTexteRiche_A16_BTN_RECULER") ? null : '&lt;';
$A16_BTN_RECULER->JetonActif = false;


$A16_BTN_RECULER->lierVM('PAGE_Menu','BTN_RECULER','A16_BTN_RECULER');
$A15_SAI_date->Couleur = 0x69645F;
$A15_SAI_date->CouleurInitiale = 0x69645F;
$A15_SAI_date->CouleurFond = 0xFFFFFF;
$A15_SAI_date->CouleurFondInitiale = 0xFFFFFF;
$A15_SAI_date->Libelle = function_exists("construireTexteRiche_A15_SAI_date") ? null : 'Date';
$A15_SAI_date->Masque = '0';
$A15_SAI_date->m_nHauteur = 31;
$A15_SAI_date->m_nLargeur = 248;
$A15_SAI_date->m_nOpacite = 100;
$A15_SAI_date->m_nCadrageHorizontal = -1;
$A15_SAI_date->m_nCadrageVertical = 1;
$A15_SAI_date->m_Police->m_bGras = false;
$A15_SAI_date->m_Police->m_bItalique = false;
$A15_SAI_date->m_Police->m_bSouligne = false;
$A15_SAI_date->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A15_SAI_date->m_Police->m_nTaille = '14px';
$A15_SAI_date->m_nX = 28;
$A15_SAI_date->m_nY = 1416;
$A15_SAI_date->m_clCouleurJauge = 0x000000;
$A15_SAI_date->BoutonCalendrier = 0;
$A15_SAI_date->EtatInitial = 0;
$A15_SAI_date->VisibleInitial = 1;
$A15_SAI_date->YInitial = 0;
$A15_SAI_date->NombreColonne = 0;
$A15_SAI_date->BulleTitre = '';
$A15_SAI_date->JetonActif = false;
$A15_SAI_date->JetonListeSeparateur = '';
$A15_SAI_date->JetonAutoriseDoublon = false;
$A15_SAI_date->JetonSupprimable = true;


$A15_SAI_date->lierVM('PAGE_Menu','SAI_date','A15_SAI_date');
$A17_BTN_sup_plage->Visible = false;
$A17_BTN_sup_plage->Couleur = 0xFFFFFF;
$A17_BTN_sup_plage->CouleurInitiale = 0xFFFFFF;
$A17_BTN_sup_plage->CouleurFond = 0xF48542;
$A17_BTN_sup_plage->CouleurFondInitiale = 0xF48542;
$A17_BTN_sup_plage->Libelle = function_exists("construireTexteRiche_A17_BTN_sup_plage") ? null : 'Supprimer une plage';
$A17_BTN_sup_plage->Etat = 1;
$A17_BTN_sup_plage->m_nHauteur = 28;
$A17_BTN_sup_plage->m_nLargeur = 67;
$A17_BTN_sup_plage->m_nOpacite = 100;
$A17_BTN_sup_plage->m_nCadrageHorizontal = 1;
$A17_BTN_sup_plage->m_nCadrageVertical = 1;
$A17_BTN_sup_plage->m_Police->m_bGras = false;
$A17_BTN_sup_plage->m_Police->m_bItalique = false;
$A17_BTN_sup_plage->m_Police->m_bSouligne = false;
$A17_BTN_sup_plage->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A17_BTN_sup_plage->m_Police->m_nTaille = '14px';
$A17_BTN_sup_plage->m_nX = 113;
$A17_BTN_sup_plage->m_nY = 1542;
$A17_BTN_sup_plage->m_clCouleurJauge = 0x000000;
$A17_BTN_sup_plage->BoutonCalendrier = 0;
$A17_BTN_sup_plage->EtatInitial = 0;
$A17_BTN_sup_plage->VisibleInitial = 0;
$A17_BTN_sup_plage->YInitial = 0;
$A17_BTN_sup_plage->NombreColonne = 0;
$A17_BTN_sup_plage->BulleTitre = '';
$A17_BTN_sup_plage->JetonActif = false;
$A17_BTN_sup_plage->JetonListeSeparateur = '';
$A17_BTN_sup_plage->JetonAutoriseDoublon = false;
$A17_BTN_sup_plage->JetonSupprimable = false;


$A17_BTN_sup_plage->lierVM('PAGE_Menu','BTN_sup_plage','A17_BTN_sup_plage');
$A18_IMG_poubelle->Visible = false;
$A18_IMG_poubelle->Couleur = 0x69645F;
$A18_IMG_poubelle->CouleurInitiale = 0x69645F;
$A18_IMG_poubelle->Valeur = '../ext/poubelle.png';
$A18_IMG_poubelle->Etat = 1;
$A18_IMG_poubelle->m_nHauteur = 29;
$A18_IMG_poubelle->m_nLargeur = 29;
$A18_IMG_poubelle->m_nOpacite = 100;
$A18_IMG_poubelle->m_nCadrageHorizontal = -1;
$A18_IMG_poubelle->m_nCadrageVertical = -1;
$A18_IMG_poubelle->m_Police->m_bGras = false;
$A18_IMG_poubelle->m_Police->m_bItalique = false;
$A18_IMG_poubelle->m_Police->m_bSouligne = false;
$A18_IMG_poubelle->m_nX = 358;
$A18_IMG_poubelle->m_nY = 136;
$A18_IMG_poubelle->Image = '../ext/poubelle.png';
$A18_IMG_poubelle->m_clCouleurJauge = 0x000000;
$A18_IMG_poubelle->BoutonCalendrier = 0;
$A18_IMG_poubelle->EtatInitial = 0;
$A18_IMG_poubelle->VisibleInitial = 0;
$A18_IMG_poubelle->YInitial = 0;
$A18_IMG_poubelle->NombreColonne = 0;
$A18_IMG_poubelle->BulleTitre = '';
$A18_IMG_poubelle->JetonActif = false;
$A18_IMG_poubelle->JetonListeSeparateur = '';
$A18_IMG_poubelle->JetonAutoriseDoublon = false;
$A18_IMG_poubelle->JetonSupprimable = false;


$A18_IMG_poubelle->lierVM('PAGE_Menu','IMG_poubelle','A18_IMG_poubelle');


// fin de bloc pour 'if (isset())' qui gère le cas ou session.bug_compat_42 est à VRAI
}
if (!$_bContexteProjetExiste) {
	// Pas de contexte, il faut initialiser le conctexte globlal
	$MonProjet= new CProjet();
//  Ouverture de l'analyse 
	HOuvreAnalyse($CheminRepRes.'Les sentinelles de la mer.xdd');
	// on charge le code du projet, 
	if (	Res_Include('Les sentinelles de la mer-prj.php',RES_PROJET)) {DeclMonProjet(); }
	$MonProjet->InitProjet('Les sentinelles de la mer');
}
 else { 
	Res_Include('Les sentinelles de la mer-prj.php',RES_PROJET);
}
if (isset($gnIndiceAgencement)) $MaPage->m_nIndiceAgencementCourant = $gnIndiceAgencement;
//-----------------------------------------------------------------------
// Implémentation des Traitements 
//-----------------------------------------------------------------------
//-----------------------------------------------------------------------
// Procédures locales de la page
//-----------------------------------------------------------------------
// Code d'initialisation de page
// Code de chaque affichage de page
//Initialisation de ZTR_boujour (serveur) :: (PCode de Initialisation de %1!s!)
function& A1_ZTR_boujour12()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A1_ZTR_boujour');
	global $A1_ZTR_boujour;
	
	
	if (VersBooleen(Operateur(24866,Rubrique('Sentinelle','Expert'),getRef(true))))
	{
		Operateur(95,$A1_ZTR_boujour,Operateur(6166,Operateur(6166,getRef('Bonjour '),Rubrique('Sentinelle','Prénom')),getRef(' (Référent(e))')));
	}
	else 
	{
		Operateur(95,$A1_ZTR_boujour,Operateur(6166,Operateur(6166,getRef('Bonjour '),Rubrique('Sentinelle','Prénom')),getRef(' (Bénévole)')));
	}
	return _return ($_PHP_VAR_RETURN_);
}
//Avant création du rendez-vous dans PLN_REQ_planing (serveur) :: (PCode de Avant création du rendez-vous dans %1!s!)
function& A2_PLN_REQ_planing135(&$rdvCree)
{
	if (!is_object($rdvCree))CreerType($rdvCree,'rdvCréé',TYPEWL_DINO,array('CDinoRendezVous','',$rdvCree));
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A2_PLN_REQ_planing');
	global $A2_PLN_REQ_planing;
	
	
	HLitRecherchePremier(getRef('Sites'),Rubrique('Sites','Abreviation'),VersPrimitif(GetProp($rdvCree,'Ressource')));
	if (VersBooleen(Operateur(24866,Rubrique('Sentinelle','Admin'),getRef(true))))
	{
		$_PHP_VAR_TMP_92=;
		if (Operateur(24866,$_PHP_VAR_TMP_92,getRef(1)))
		{
			HRAZ(getRef('PLANING'), getRef('*'));
			Operateur(95,Rubrique('PLANING','DATE'),GetProp($rdvCree,'DateDebut'));
			Operateur(95,Rubrique('PLANING','IDSites'),Rubrique('Sites','IDSites'));
			Operateur(95,Rubrique('PLANING','Titre'),getRef('Sentinelle'));
			Operateur(95,Rubrique('PLANING','Nb_sentinelle'),getRef(0));
			Operateur(95,Rubrique('PLANING','Couleur'),getRef(255));
			Operateur(95,Rubrique('PLANING','Contenue'),getRef(0));
			HAjoute(getRef('PLANING'));
			VerifieMethodeEtAppel("CChampPlanning",'PlanningAffiche','Avant création du rendez-vous dans PLN_REQ_planing (serveur)',"Planning",$A2_PLN_REQ_planing);
		}
		else if (Operateur(24866,$_PHP_VAR_TMP_92,getRef(2)))
		{
			HRAZ(getRef('PLANING'), getRef('*'));
			Operateur(95,Rubrique('PLANING','DATE'),GetProp($rdvCree,'DateDebut'));
			Operateur(95,Rubrique('PLANING','IDSites'),Rubrique('Sites','IDSites'));
			Operateur(95,Rubrique('PLANING','Titre'),getRef('Formation'));
			Operateur(95,Rubrique('PLANING','Nb_sentinelle'),getRef(0));
			Operateur(95,Rubrique('PLANING','Couleur'),getRef(16751001));
			Operateur(95,Rubrique('PLANING','Contenue'),getRef(0));
			Operateur(95,Rubrique('PLANING','conférence'),getRef(true));
			HAjoute(getRef('PLANING'));
			VerifieMethodeEtAppel("CChampPlanning",'PlanningAffiche','Avant création du rendez-vous dans PLN_REQ_planing (serveur)',"Planning",$A2_PLN_REQ_planing);
		}
		else if (Operateur(24866,$_PHP_VAR_TMP_92,getRef(3)))
		{
			VerifieMethodeEtAppel("CChampPlanning",'PlanningAffiche','Avant création du rendez-vous dans PLN_REQ_planing (serveur)',"Planning",$A2_PLN_REQ_planing);
		}
		unset($_PHP_VAR_TMP_92);
	}
	return _return ($_PHP_VAR_RETURN_);
}
//Sortie de saisie du rendez-vous de PLN_REQ_planing (serveur) :: (PCode de Sortie de saisie du rendez-vous de %1!s!)
function& A2_PLN_REQ_planing137(&$rdvModifie)
{
	if (!is_object($rdvModifie))CreerType($rdvModifie,'rdvModifié',TYPEWL_DINO,array('CDinoRendezVous','',$rdvModifie));
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A2_PLN_REQ_planing');
	return _return ($_PHP_VAR_RETURN_);
}
//Déplacement d'un rendez-vous de PLN_REQ_planing (serveur) :: (PCode de Déplacement d'un rendez-vous de %1!s!)
function& A2_PLN_REQ_planing131(&$rdvDeplace)
{
	if (!is_object($rdvDeplace))CreerType($rdvDeplace,'rdvDéplacé',TYPEWL_DINO,array('CDinoRendezVous','',$rdvDeplace));
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A2_PLN_REQ_planing');
	return _return ($_PHP_VAR_RETURN_);
}
//Redimensionnement d'un rendez-vous de PLN_REQ_planing (serveur) :: (PCode de Redimensionnement d'un rendez-vous de %1!s!)
function& A2_PLN_REQ_planing132(&$rdvRedimensionne)
{
	if (!is_object($rdvRedimensionne))CreerType($rdvRedimensionne,'rdvRedimensionné',TYPEWL_DINO,array('CDinoRendezVous','',$rdvRedimensionne));
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A2_PLN_REQ_planing');
	return _return ($_PHP_VAR_RETURN_);
}
//Suppression d'un rendez-vous de PLN_REQ_planing (serveur) :: (PCode de Suppression d'un rendez-vous de %1!s!)
function& A2_PLN_REQ_planing134(&$rdvSupprime)
{
	if (!is_object($rdvSupprime))CreerType($rdvSupprime,'rdvSupprimé',TYPEWL_DINO,array('CDinoRendezVous','',$rdvSupprime));
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A2_PLN_REQ_planing');
	return _return ($_PHP_VAR_RETURN_);
}
//Réaffectation d'un rendez-vous de PLN_REQ_planing (serveur) :: (PCode de Réaffectation d'un rendez-vous de %1!s!)
function& A2_PLN_REQ_planing139(&$rdvReaffecte)
{
	if (!is_object($rdvReaffecte))CreerType($rdvReaffecte,'rdvReaffecté',TYPEWL_DINO,array('CDinoRendezVous','',$rdvReaffecte));
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A2_PLN_REQ_planing');
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_admin (serveur) :: (PCode de Clic sur %1!s!)
function& A3_BTN_admin16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A3_BTN_admin');
	
	
	if (VersBooleen(Operateur(24866,Rubrique('Sentinelle','Admin'),getRef(true))))
	{
		;
	}
	else 
	{
		Info(getRef('Oups ! Ce bouton est réservé aux administrateurs. Si tu as besoin d’aide, n’hésite pas à contacter l’un d’eux pour te guider !'));
	}
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_compte (serveur) :: (PCode de Clic sur %1!s!)
function& A5_BTN_compte16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A5_BTN_compte');
	
	
	;
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_affiche_participant (serveur) :: (PCode de Clic sur %1!s!)
function& A6_BTN_affiche_participant16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A6_BTN_affiche_participant');
	global $A18_IMG_poubelle;
	global $A12_SAI_idpln;
	global $A7_TABLE_REQ_participent_plng;
	global $A13_BTN_ajout_participen;
	global $A14_BTN_plus_de_participation;
	
	
	if (VersBooleen(Operateur(24866,Rubrique('Sentinelle','Admin'),getRef(true))))
	{
		Operateur(95,GetProp($A18_IMG_poubelle,'Visible'),getRef(true));
	}
	Operateur(95,GetProp(Requete('REQ_participent_plng'),'ParamIDPLANING_PL'),$A12_SAI_idpln);
	HExecuteRequete(Requete('REQ_participent_plng'),null,null);
	if (VersBooleen(Operateur(24866,HNbEnr(getRef('REQ_participent_plng')),getRef(0))))
	{
		Operateur(95,GetProp($A7_TABLE_REQ_participent_plng,'Visible'),getRef(false));
		if (VersBooleen(Operateur(24866,getRef(),getRef(1))))
		{
			ExecuteTraitement($A13_BTN_ajout_participen,getRef(18),true,false);
		}
		else 
		{
			VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_affiche_participant (serveur)',"Table",$A7_TABLE_REQ_participent_plng);
			Operateur(95,GetProp($A14_BTN_plus_de_participation,'Visible'),getRef(false));
			Operateur(95,GetProp($A13_BTN_ajout_participen,'Visible'),getRef(false));
		}
	}
	else 
	{
		Operateur(95,GetProp($A7_TABLE_REQ_participent_plng,'Visible'),getRef(true));
		VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_affiche_participant (serveur)',"Table",$A7_TABLE_REQ_participent_plng);
		HLitPremier(getRef('REQ_participent_plng'),getRef(''));
		HLitRecherchePremier(getRef('REQ_participent_plng'),Rubrique('REQ_participent_plng','IDSentinelle'),VersPrimitif(Rubrique('Sentinelle','IDSentinelle')));
		if (VersBooleen(HTrouve(getRef('REQ_participent_plng'))))
		{
			Operateur(95,GetProp($A13_BTN_ajout_participen,'Visible'),getRef(false));
			Operateur(95,GetProp($A14_BTN_plus_de_participation,'Visible'),getRef(true));
		}
		else 
		{
			Operateur(95,GetProp($A13_BTN_ajout_participen,'Visible'),getRef(true));
			Operateur(95,GetProp($A14_BTN_plus_de_participation,'Visible'),getRef(false));
		}
	}
	return _return ($_PHP_VAR_RETURN_);
}
//Affichage d'une ligne de TABLE_REQ_participent_plng (serveur) :: (PCode de Affichage d'une ligne de %1!s!)
function& A7_TABLE_REQ_participent_plng19()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A7_TABLE_REQ_participent_plng');
	global $A8_COL_Nom;
	global $A7_TABLE_REQ_participent_plng;
	
	
	if (VersBooleen(Operateur(24866,Rubrique('REQ_participent_plng','Expert'),getRef(true))))
	{
		Operateur(95,GetProp(SousType($A8_COL_Nom,GetValeur($A7_TABLE_REQ_participent_plng)),'CouleurFond'),getRef(16751001));
		Operateur(95,GetProp(SousType($A8_COL_Nom,GetValeur($A7_TABLE_REQ_participent_plng)),'Couleur'),getRef(16777215));
	}
	Operateur(95,$A8_COL_Nom,Operateur(6166,Operateur(6166,Rubrique('REQ_participent_plng','Prénom'),getRef(' ')),Rubrique('REQ_participent_plng','Nom')));
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_ajout_participen (serveur) :: (PCode de Clic sur %1!s!)
function& A13_BTN_ajout_participen16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A13_BTN_ajout_participen');
	global $A12_SAI_idpln;
	global $A7_TABLE_REQ_participent_plng;
	global $A2_PLN_REQ_planing;
	global $A13_BTN_ajout_participen;
	global $A14_BTN_plus_de_participation;
	
	
	HRAZ(getRef('Participent_planning'), getRef('*'));
	Operateur(95,Rubrique('Participent_planning','IDPLANING'),$A12_SAI_idpln);
	Operateur(95,Rubrique('Participent_planning','IDSentinelle'),Rubrique('Sentinelle','IDSentinelle'));
	if (VersBooleen(Operateur(24866,getRef(),getRef(1))))
	{
		Operateur(95,Rubrique('Participent_planning','Covoiturage'),getRef(true));
	}
	if (VersBooleen(Operateur(24866,getRef(),getRef(1))))
	{
		Operateur(95,Rubrique('Participent_planning','Sac'),getRef(true));
	}
	HAjoute(getRef('Participent_planning'));
	Operateur(95,GetProp(Requete('REQ_participent_plng'),'ParamIDPLANING_PL'),$A12_SAI_idpln);
	HExecuteRequete(Requete('REQ_participent_plng'),null,null);
	Operateur(95,GetProp($A7_TABLE_REQ_participent_plng,'Visible'),getRef(true));
	VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_ajout_participen (serveur)',"Table",$A7_TABLE_REQ_participent_plng);
	HLitRecherche(getRef('PLANING'),Rubrique('PLANING','IDPLANING'),VersPrimitif($A12_SAI_idpln));
	Operateur(95,Rubrique('PLANING','Nb_sentinelle'),Operateur(6166,Rubrique('PLANING','Nb_sentinelle'),getRef(1)));
	Operateur(95,Rubrique('PLANING','Contenue'),Operateur(6166,Rubrique('PLANING','Contenue'),getRef(1)));
	if (VersBooleen(Operateur(24866,Rubrique('PLANING','conférence'),getRef(false))))
	{
		if (VersBooleen(Operateur(24866,Rubrique('PLANING','Contenue'),getRef(0))))
		{
			Operateur(95,Rubrique('PLANING','Couleur'),getRef(10066431));
		}
		if (VersBooleen(Operateur(2908714,Rubrique('PLANING','Contenue'),getRef(1))))
		{
			Operateur(95,Rubrique('PLANING','Couleur'),getRef(42495));
		}
		if (VersBooleen(Operateur(2646566,Rubrique('PLANING','Contenue'),getRef(2))))
		{
			Operateur(95,Rubrique('PLANING','Couleur'),getRef(65280));
		}
	}
	HModifie(getRef('PLANING'));
	HExecuteRequete(Requete('REQ_planing'),null,null);
	VerifieMethodeEtAppel("CChampPlanning",'PlanningAffiche','Clic sur BTN_ajout_participen (serveur)',"Planning",$A2_PLN_REQ_planing);
	VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_ajout_participen (serveur)',"Table",$A7_TABLE_REQ_participent_plng);
	Operateur(95,GetProp($A13_BTN_ajout_participen,'Visible'),getRef(false));
	Operateur(95,GetProp($A14_BTN_plus_de_participation,'Visible'),getRef(true));
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_plus_de_participation (serveur) :: (PCode de Clic sur %1!s!)
function& A14_BTN_plus_de_participation16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A14_BTN_plus_de_participation');
	global $A12_SAI_idpln;
	global $A7_TABLE_REQ_participent_plng;
	global $A2_PLN_REQ_planing;
	global $A14_BTN_plus_de_participation;
	global $A13_BTN_ajout_participen;
	
	
	if (VersBooleen(Operateur(24866,getRef(),getRef(1))))
	{
		Operateur(95,GetProp(Requete('REQ_sup_participation'),'ParamIDPLANING'),Rubrique('REQ_participent_plng','IDPLANING'));
		Operateur(95,GetProp(Requete('REQ_sup_participation'),'ParamIDSentinelle'),Rubrique('Sentinelle','IDSentinelle'));
		HExecuteRequete(Requete('REQ_sup_participation'), getRef(8192), null);
		HLitPremier(getRef('REQ_sup_participation'),getRef(''));
		HSupprime(getRef('REQ_sup_participation'));
		Operateur(95,GetProp(Requete('REQ_participent_plng'),'ParamIDPLANING_PL'),$A12_SAI_idpln);
		HExecuteRequete(Requete('REQ_participent_plng'),null,null);
		VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_plus_de_participation (serveur)',"Table",$A7_TABLE_REQ_participent_plng);
		HLitRecherche(getRef('PLANING'),Rubrique('PLANING','IDPLANING'),VersPrimitif($A12_SAI_idpln));
		Operateur(95,Rubrique('PLANING','Nb_sentinelle'),Operateur(24866,Rubrique('PLANING','Nb_sentinelle'),getRef(-1)));
		Operateur(95,Rubrique('PLANING','Contenue'),Operateur(6168,Rubrique('PLANING','Contenue'),getRef(1)));
		if (VersBooleen(Operateur(24866,Rubrique('PLANING','conférence'),getRef(false))))
		{
			if (VersBooleen(Operateur(24866,Rubrique('PLANING','Contenue'),getRef(0))))
			{
				Operateur(95,Rubrique('PLANING','Couleur'),getRef(10066431));
			}
			if (VersBooleen(Operateur(2908714,Rubrique('PLANING','Contenue'),getRef(1))))
			{
				Operateur(95,Rubrique('PLANING','Couleur'),getRef(42495));
			}
			if (VersBooleen(Operateur(2646566,Rubrique('PLANING','Contenue'),getRef(2))))
			{
				Operateur(95,Rubrique('PLANING','Couleur'),getRef(65280));
			}
		}
		HModifie(getRef('PLANING'));
		HExecuteRequete(Requete('REQ_planing'),null,null);
		VerifieMethodeEtAppel("CChampPlanning",'PlanningAffiche','Clic sur BTN_plus_de_participation (serveur)',"Planning",$A2_PLN_REQ_planing);
		Operateur(95,GetProp($A14_BTN_plus_de_participation,'Visible'),getRef(false));
		if (VersBooleen(Operateur(2646566,HNbEnr(getRef('REQ_participent_plng')),getRef(0))))
		{
			Operateur(95,GetProp($A13_BTN_ajout_participen,'Visible'),getRef(true));
		}
		else 
		{
			Operateur(95,GetProp($A7_TABLE_REQ_participent_plng,'Visible'),getRef(false));
		}
	}
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_AVANCER (serveur) :: (PCode de Clic sur %1!s!)
function& A11_BTN_AVANCER16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A11_BTN_AVANCER');
	global $A15_SAI_date;
	global $A2_PLN_REQ_planing;
	
	
	HExecuteRequete(Requete('REQ_planing'),null,null);
	if (VersBooleen(Operateur(24866,$A15_SAI_date,getRef(''))))
	{
		Operateur(95,$A15_SAI_date,getRef(DateSys()));
	}
	CreerType($dAFF,'dAFF',TYPEWL_DATE,null);
	Operateur(95,$A15_SAI_date,getRef(PremierJourDeLaSemaine(VersPrimitif($A15_SAI_date))));
	Operateur(95,$dAFF,$A15_SAI_date);
	Operateur(28777,GetProp($dAFF,'Jour'),getRef(7));
	Operateur(95,$A15_SAI_date,$dAFF);
	VerifieMethodeEtAppel("CChampPlanning",'PlanningPosition','Clic sur BTN_AVANCER (serveur)',"Planning",$A2_PLN_REQ_planing,VersPrimitif(getRef(PremierJourDeLaSemaine(VersPrimitif($dAFF)))));
	VerifieMethodeEtAppel("CChampPlanning",'PlanningAffiche','Clic sur BTN_AVANCER (serveur)',"Planning",$A2_PLN_REQ_planing);
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_RECULER (serveur) :: (PCode de Clic sur %1!s!)
function& A16_BTN_RECULER16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A16_BTN_RECULER');
	global $A15_SAI_date;
	global $A2_PLN_REQ_planing;
	
	
	HExecuteRequete(Requete('REQ_planing'),null,null);
	if (VersBooleen(Operateur(24866,$A15_SAI_date,getRef(''))))
	{
		Operateur(95,$A15_SAI_date,getRef(DateSys()));
	}
	CreerType($dAFF,'dAFF',TYPEWL_DATE,null);
	Operateur(95,$A15_SAI_date,getRef(PremierJourDeLaSemaine(VersPrimitif($A15_SAI_date))));
	Operateur(95,$dAFF,$A15_SAI_date);
	Operateur(28779,GetProp($dAFF,'Jour'),getRef(7));
	Operateur(95,$A15_SAI_date,$dAFF);
	VerifieMethodeEtAppel("CChampPlanning",'PlanningPosition','Clic sur BTN_RECULER (serveur)',"Planning",$A2_PLN_REQ_planing,VersPrimitif(getRef(PremierJourDeLaSemaine(VersPrimitif($dAFF)))));
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_sup_plage (serveur) :: (PCode de Clic sur %1!s!)
function& A17_BTN_sup_plage16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','A17_BTN_sup_plage');
	global $A12_SAI_idpln;
	global $A2_PLN_REQ_planing;
	global $A18_IMG_poubelle;
	global $A7_TABLE_REQ_participent_plng;
	global $A14_BTN_plus_de_participation;
	
	
	if (VersBooleen(Operateur(24866,Rubrique('Sentinelle','Admin'),getRef(true))))
	{
		if (VersBooleen(Operateur(24866,getRef(),getRef(1))))
		{
			Operateur(95,GetProp(Requete('REQ_participent_plng'),'ParamIDPLANING_PL'),$A12_SAI_idpln);
			HExecuteRequete(Requete('REQ_participent_plng'), getRef(8192), null);
			HLitPremier(getRef('REQ_participent_plng'),getRef(''));
			HLitPremier(getRef('PLANING'),getRef(''));
			for (WB_Boucle_Pour_Tout_Fichier($_PHP_VAR_TMP_93,Fichier('Participent_planning'),getRef(null),0,null,true);$_PHP_VAR_TMP_93->bContinuer();$_PHP_VAR_TMP_93->continuer())
			{
			if (VersBooleen(Operateur(24866,Rubrique('Participent_planning','IDPLANING'),Rubrique('REQ_planing','IDPLANING'))))
			{
				HSupprime(getRef('Participent_planning'));
			}
			HLitSuivant(getRef('REQ_participent_plng'),getRef(''));
			}unset($_PHP_VAR_TMP_93);
			HLitRecherchePremier(getRef('PLANING'),Rubrique('PLANING','IDPLANING'),VersPrimitif(Rubrique('REQ_planing','IDPLANING')));
			HSupprime(getRef('PLANING'));
			HExecuteRequete(Requete('REQ_planing'),null,null);
			VerifieMethodeEtAppel("CChampPlanning",'PlanningAffiche','Clic sur BTN_sup_plage (serveur)',"Planning",$A2_PLN_REQ_planing);
		}
		Operateur(95,GetProp($A18_IMG_poubelle,'Visible'),getRef(false));
		Operateur(95,GetProp($A7_TABLE_REQ_participent_plng,'Visible'),getRef(false));
		Operateur(95,GetProp($A14_BTN_plus_de_participation,'Visible'),getRef(false));
	}
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_MENU','PAGE_Menu');
$A2_PLN_REQ_planing->SetSourceRemplissage('REQ_planing',array(0 => 'Titre',100 => 'Abreviation',3 => 'DATE',4 => 'DATE',1 => 'IDPLANING',5 => 'Contenue',7 => 'Lieu',2 => 'Couleur'));
$A7_TABLE_REQ_participent_plng->SetSourceRemplissage("REQ_participent_plng", "Nom", "", "", 1, "", 0);

// Code de déclaration des globales de page
function& PAGE_Menu0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Menu','PAGE_Menu');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_Menu
	PAGE_Menu0();

// Code d'initalisation de A1_ZTR_boujour
	A1_ZTR_boujour12();

$A2_PLN_REQ_planing->InitRemplissage();
$A7_TABLE_REQ_participent_plng->InitRemplissage();


}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_MENU','PAGE_Menu');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_MENU)){
$_BTNACTION = TrouveBouton( $PAGE_MENU );
if ($_BTNACTION=='A3') { 
//-------------------------------------------------------------------
//  PCodes de A3_BTN_admin
//-------------------------------------------------------------------
	A3_BTN_admin16();

}
if ($_BTNACTION=='A5') { 
//-------------------------------------------------------------------
//  PCodes de A5_BTN_compte
//-------------------------------------------------------------------
	A5_BTN_compte16();

}
if ($_BTNACTION=='A6') { 
//-------------------------------------------------------------------
//  PCodes de A6_BTN_affiche_participant
//-------------------------------------------------------------------
	A6_BTN_affiche_participant16();

}
if ($_BTNACTION=='A13') { 
//-------------------------------------------------------------------
//  PCodes de A13_BTN_ajout_participen
//-------------------------------------------------------------------
	A13_BTN_ajout_participen16();

}
if ($_BTNACTION=='A14') { 
//-------------------------------------------------------------------
//  PCodes de A14_BTN_plus_de_participation
//-------------------------------------------------------------------
	A14_BTN_plus_de_participation16();

}
if ($_BTNACTION=='A11') { 
//-------------------------------------------------------------------
//  PCodes de A11_BTN_AVANCER
//-------------------------------------------------------------------
	A11_BTN_AVANCER16();

}
if ($_BTNACTION=='A16') { 
//-------------------------------------------------------------------
//  PCodes de A16_BTN_RECULER
//-------------------------------------------------------------------
	A16_BTN_RECULER16();

}
if ($_BTNACTION=='A17') { 
//-------------------------------------------------------------------
//  PCodes de A17_BTN_sup_plage
//-------------------------------------------------------------------
	A17_BTN_sup_plage16();

}

}
if ( !bRenvoitCodeHTML($PAGE_MENU,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_Menu 04/02/2025 19:59 WEBDEV 28 28.0.459.4 --><html lang="fr" class="htmlstd html5">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $MaPage->GetLibelle(); ?></title><meta name="generator" content="WEBDEV">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="Description" lang="fr" content="<?php echo $MaPage->GetDescription(); ?>">
<meta name="keywords" lang="fr" content="<?php echo $MaPage->GetMotsCles(); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge"><?php echo $MaPage->GetHTMLEnteteHTML(); ?><style type="text/css">.wblien,.wblienHorsZTR {border:0;background:transparent;padding:0;text-align:center;box-shadow:none;_line-height:normal;-webkit-box-decoration-break: clone;box-decoration-break: clone; color:#4285f4;}.wblienHorsZTR {border:0 !important;background:transparent !important;outline-width:0 !important;} .wblienHorsZTR:not([class^=l-]) {box-shadow: none !important;}a:active{}a:visited{}</style><link rel="stylesheet" type="text/css" href="res/standard.css?10001b541ee06">
<link rel="stylesheet" type="text/css" href="res/static.css?10002d78e9734">
<style type="text/css">.webdevclass-riche { transition:font-size 300ms; }</style><link rel="stylesheet" type="text/css" href="MaterialDesign2240MaterialDesign2MaterialBlue2_rwd.css?1000093b0a0c6">
<link rel="stylesheet" type="text/css" href="Lessentinellesdelamer240MaterialDesign2MaterialBlue2_rwd.css?10000763b4dce">
<link rel="stylesheet" type="text/css" href="palette-MaterialBlue2_rwd.css?10000d9ea9ffc">
<link rel="stylesheet" type="text/css" href="PAGE_Menu_style.css?10000c7722124">
<style type="text/css">
body{ position:relative;line-height:normal;height:auto; min-height:100%; color:#5f6469;} body{}html {background-color:#f8f9fa;position:relative;}#page{position:relative; background-color:#ffffff;}html {height:100%;overflow-x:hidden;} body,form {height:auto; min-height:100%;margin:0 auto !important;box-sizing:border-box;} .dzA4{width:281px;height:76px;;overflow-x:hidden;;overflow-y:hidden;position:static;}#A1,#tzA1{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:15px;font-size:0.9375rem;font-weight:bold;color:#5F6469;line-height:1.4;text-align:center;}#A1.wbgrise,.wbgrise #A1,#A1[disabled],#tzA1.wbgrise,.wbgrise #tzA1,#tzA1[disabled]{color:#808080;}#A2,#bzA2{vertical-align:middle;background-color:#FFFFFF;border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}#A2.wbgrise,.wbgrise #A2,#A2[disabled],#bzA2.wbgrise,.wbgrise #bzA2,#bzA2[disabled]{color:#808080;}.A2-sty10649,.A2-sty10654{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:#5F6469;vertical-align:middle;background-color:#FFFFFF;}.htmlstd .padding.A2-sty10649,.htmlstd .webdevclass-riche .A2-sty10649,.htmlstd .webdevclass-riche.A2-sty10649,.htmlstd .padding.A2-sty10654,.htmlstd .webdevclass-riche .A2-sty10654,.htmlstd .webdevclass-riche.A2-sty10654{padding:0;}.A2-sty10812{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:10px;font-size:0.625rem;color:#FFFFFF;text-align:center;vertical-align:middle;border-radius:2px;outline:none;}.htmlstd .padding.A2-sty10812,.htmlstd .webdevclass-riche .A2-sty10812,.htmlstd .webdevclass-riche.A2-sty10812,.htmlstd .padding.A2-sty10813,.htmlstd .webdevclass-riche .A2-sty10813,.htmlstd .webdevclass-riche.A2-sty10813{padding:3px;}.A2-sty10813{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:10px;font-size:0.625rem;color:#5F6469;text-align:left;vertical-align:middle;border-radius:2px;outline:none;}.A2-sty10819{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;text-align:center;background-image:url(res/Btn_Appointment_Close_01240_Material_Design_2Material_Blue_2.png);background-position:center center ;background-repeat:no-repeat;}#A3,#bzA3{color:#003F80;border-left:1px solid #003F80;border-top:1px solid #003F80;border-right:1px solid #003F80;border-bottom:1px solid #003F80;}#A5,#bzA5{color:#003F80;border-left:1px solid #003F80;border-top:1px solid #003F80;border-right:1px solid #003F80;border-bottom:1px solid #003F80;}#A6,#bzA6{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:#FFFFFF;text-align:center;text-decoration:none ;vertical-align:middle;background-color:#4285F4;border-radius:4px;box-shadow:0 2px 10px 0 rgba(0,0,0, 0.16);-ms-transition:background-color 200ms ease 0ms,border 200ms ease 0ms,box-shadow 200ms ease 0ms,color 200ms ease 0ms,font 200ms ease 0ms,opacity 200ms ease 0ms,outline 200ms ease 0ms;-moz-transition:background-color 200ms ease 0ms,border 200ms ease 0ms,box-shadow 200ms ease 0ms,color 200ms ease 0ms,font 200ms ease 0ms,opacity 200ms ease 0ms,outline 200ms ease 0ms;-webkit-transition:background-color 200ms ease 0ms,border 200ms ease 0ms,box-shadow 200ms ease 0ms,color 200ms ease 0ms,font 200ms ease 0ms,opacity 200ms ease 0ms,outline 200ms ease 0ms;-o-transition:background-color 200ms ease 0ms,border 200ms ease 0ms,box-shadow 200ms ease 0ms,color 200ms ease 0ms,font 200ms ease 0ms,opacity 200ms ease 0ms,outline 200ms ease 0ms;transition:background-color 200ms ease 0ms,border 200ms ease 0ms,box-shadow 200ms ease 0ms,color 200ms ease 0ms,font 200ms ease 0ms,opacity 200ms ease 0ms,outline 200ms ease 0ms;}#A6.wbSurvol,#bzA6.wbSurvol,#A6:hover,#bzA6:hover{color:#FFFFFF;background-color:#2979FF;box-shadow:0 3px 12px 0 rgba(0,0,0, 0.36);}#A6.wbFocus,#bzA6.wbFocus,#A6:focus,#bzA6:focus{background-color:#4285F4;outline:none;}.padding#A6.wbFocus,.webdevclass-riche #A6.wbFocus,.webdevclass-riche#A6.wbFocus,.padding#bzA6.wbFocus,.webdevclass-riche #bzA6.wbFocus,.webdevclass-riche#bzA6.wbFocus,.padding#A6:focus,.webdevclass-riche #A6:focus,.webdevclass-riche#A6:focus,.padding#bzA6:focus,.webdevclass-riche #bzA6:focus,.webdevclass-riche#bzA6:focus{padding-left:0;}#A6.wbActif,#bzA6.wbActif,#A6:active,#bzA6:active{color:#FFFFFF;background-color:#4285F4;outline:none;}#A6.wbgrise,.wbgrise #A6,#A6[disabled],#bzA6.wbgrise,.wbgrise #bzA6,#bzA6[disabled]{color:#909090;text-shadow:0 1px 0 rgba(255,255,255, 0.50);}
#b-A7{border-style:none;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}#ttA8,.ttA8{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:11px;font-size:0.6875rem;color:#FFFFFF;text-align:center;vertical-align:middle;background-color:#607D8B;border-top:none;border-right:none 1px #dadce0;border-bottom:none 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.padding#ttA8,.webdevclass-riche #ttA8,.webdevclass-riche#ttA8,.htmlstd .padding.ttA8,.htmlstd .webdevclass-riche .ttA8,.htmlstd .webdevclass-riche.ttA8{padding-top:5px;padding-bottom:5px;padding-left:0;}#ttA8.wbgrise,.wbgrise #ttA8,#ttA8[disabled],.htmlstd .ttA8.wbgrise,.wbgrise .ttA8,.ttA8[disabled]{color:#808080;}#ttA9,.ttA9,#ttA10,.ttA10{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:11px;font-size:0.6875rem;color:#FFFFFF;text-align:center;vertical-align:middle;background-color:#607D8B;border-top:none;border-right:none 1px #dadce0;border-bottom:none 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.padding#ttA9,.webdevclass-riche #ttA9,.webdevclass-riche#ttA9,.htmlstd .padding.ttA9,.htmlstd .webdevclass-riche .ttA9,.htmlstd .webdevclass-riche.ttA9,.padding#ttA10,.webdevclass-riche #ttA10,.webdevclass-riche#ttA10,.htmlstd .padding.ttA10,.htmlstd .webdevclass-riche .ttA10,.htmlstd .webdevclass-riche.ttA10{padding-top:5px;padding-bottom:5px;padding-left:0;}#ttA9.wbgrise,.wbgrise #ttA9,#ttA9[disabled],.htmlstd .ttA9.wbgrise,.wbgrise .ttA9,.ttA9[disabled],#ttA10.wbgrise,.wbgrise #ttA10,#ttA10[disabled],.htmlstd .ttA10.wbgrise,.wbgrise .ttA10,.ttA10[disabled]{color:#808080;}#tzcA7{border-top:none 1px #dadce0;border-right:none 1px #dadce0;border-bottom:none;border-left:none 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}#tzdA7{border-top:none;border-right:none 1px #dadce0;border-bottom:none 1px #dadce0;border-left:none 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}.communbc-A8{border-top:none;border-right:none 1px #dadce0;border-bottom:none 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA8{}.communbc-A9{border-top:none;border-right:none 1px #dadce0;border-bottom:none 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA9{}.communbc-A10{border-top:none;border-right:none 1px #dadce0;border-bottom:none 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA10{}#ctzA7 .Normal-Centre{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:10px;font-size:0.625rem;color:#5F6469;text-align:center;vertical-align:middle;}#ctzA7 .wbPaire{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;font-size:0.8125rem;color:#5F6469;vertical-align:middle;background-color:#FFFFFF;box-shadow:999px 999px 0 0 rgba(95,100,105, 0.0) inset;-ms-transition:all 150ms ease-out 0ms;-moz-transition:all 150ms ease-out 0ms;-webkit-transition:all 150ms ease-out 0ms;-o-transition:all 150ms ease-out 0ms;transition:all 150ms ease-out 0ms;}#ctzA7 .wbImpaire{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;font-size:0.8125rem;color:#5F6469;vertical-align:middle;background-color:#FFFFFF;box-shadow:999px 999px 0 0 rgba(95,100,105, 0.0) inset;-ms-transition:all 150ms ease-out 0ms;-moz-transition:all 150ms ease-out 0ms;-webkit-transition:all 150ms ease-out 0ms;-o-transition:all 150ms ease-out 0ms;transition:all 150ms ease-out 0ms;}#ctzA7 .Selection{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:#2979FF;vertical-align:middle;background-color:#E8F0FE;background-position:center top ;background-repeat:repeat-x;}.A12{-webkit-appearance:none;}#A13,#bzA13{color:#003F80;border-left:1px solid #003F80;border-top:1px solid #003F80;border-right:1px solid #003F80;border-bottom:1px solid #003F80;}#A14,#bzA14{color:#003F80;border-left:1px solid #003F80;border-top:1px solid #003F80;border-right:1px solid #003F80;border-bottom:1px solid #003F80;}#A11{background-color:#003F80;}#A16{background-color:#003F80;}.A15{-webkit-appearance:none;}.dzA18{width:29px;height:29px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_MENU',15,'_COM')(event); " class="wbRwd"><form name="PAGE_MENU" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_MENU',18,void 0)(event); " method="post" class="clearfix"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_MENU->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value=""><input type="hidden" name="WD_ACTION_" value=""></div><div  class="clearfix pos1"><div  id="page" class="clearfix pos2" data-window-width="397" data-window-height="1535" data-width="397" data-height="1529"><table style="position:relative;width:100%;height:100%;"><tr style="height:100%"><td><div  class="clearfix pos3"><div  class="clearfix ancragecenter pos4"><div class="lh0 dzSpan dzA4" id="dzA4" style=""><img src="../ext/WhatsApp%20Image%202025-01-21%20at%2015.47.27.jpeg" alt="" id="A4" class="Image wbImgHomothetiqueModeAdapteCentre padding" style=" width:281px; height:76px;display:block;border:0;"></div></div><div  class="clearfix pos5"><table style=" width:100%;"><tr><td id="A1" class="TXT-Normal padding webdevclass-riche"><?php echo $A1_ZTR_boujour->pszGetLibelleHTML(); ?></td></tr></table></div><div  class="clearfix pos6"><div  class="clearfix lh0 pos7"><div  class="clearfix lh0 pos8"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_MENU',18,void 0)()){_JAEE(_PAGE_,'A16',16,2,48);} " id="A16" class="BTN-Defaut wblien bbox padding webdevclass-riche" style="width:100%;height:auto;min-height:17px;width:auto;min-width:34px;width:34px\9;height:auto;min-height:17px;display:inline-block;">&lt;</button></div></div><div  class="clearfix lh0 pos9"><div  class="clearfix lh0 pos10"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_MENU',18,void 0)()){_JAEE(_PAGE_,'A11',16,2,48);} " id="A11" class="BTN-Defaut wblien bbox padding webdevclass-riche" style="width:100%;height:auto;min-height:17px;width:auto;min-width:33px;width:33px\9;height:auto;min-height:17px;display:inline-block;">&gt;</button></div></div><div  class="clearfix lh0 pos11"><div  class="clearfix lh0 pos12"><table style=" width:122px;border-spacing:0;height:17px;border-collapse:separate;border:0;outline:none;" id="bzA5"><tr><td style="border:none;" id="tzA5" class="valignmiddle"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_MENU',18,void 0)()){_JAEE(_PAGE_,'A5',16,2,48);} " id="A5" class="BTN-Style-1 wblien bbox padding webdevclass-riche" style="display:block;width:100%;height:auto;min-height:17px;width:auto;min-width:122px;width:122px\9;height:auto;min-height:17px;">Gérer mes Infos</button></td></tr></table></div></div><div  class="clearfix lh0 pos13"><div  class="clearfix lh0 pos14"><table style=" width:136px;border-spacing:0;height:17px;border-collapse:separate;border:0;outline:none;" id="bzA3"><tr><td style="border:none;" id="tzA3" class="valignmiddle"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_MENU',18,void 0)()){_JAEE(_PAGE_,'A3',16,2,48);} " id="A3" class="BTN-Style-1 wblien bbox padding webdevclass-riche" style="display:block;width:100%;height:auto;min-height:17px;width:auto;min-width:136px;width:136px\9;height:auto;min-height:17px;">Piloter l’application</button></td></tr></table></div></div><div  class="clearfix pos15"><div class="lh0 dzSpan dzA18" id="dzA18" style="<?php if (($A18_IMG_poubelle->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>"><img src="../ext/poubelle.png" alt="<?php echo $A18_IMG_poubelle->Libelle; ?>" onclick="clWDUtil.pfGetTraitement('A18',0,void 0)(event); " id="A18" class="Image wbImgHomothetiqueModeAdapteCentre padding" style=" width:29px; height:29px;display:block;border:0;"></div></div></div><div  class="clearfix ancragecenter pos16"><table style="border-spacing:0;border-collapse:separate;background:none;outline:none;" id="bzA2"><tr><td style="background-color:#ffffff;border:none;" id="tzA2" class="valignmiddle"><input type="hidden" name="A2_DATA" id="A2_DATA" value="<?php echo $A2_PLN_REQ_planing->GetValeurAfficheeHTML(); ?>"><div id="A2_HTE" style="width:377px;height:259px;position:relative;overflow:hidden;" ondblclick="clWDUtil.pfGetTraitement('A2',1,void 0)(event); "></div></td></tr></table></div><div  class="clearfix pos17"><div  class="clearfix pos18"><table style=" width:155px;border-spacing:0;height:22px;border-collapse:separate;border:0;outline:none;<?php if (($A14_BTN_plus_de_participation->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>" id="bzA14"><tr><td style="border:none;" id="tzA14" class="valignmiddle"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_MENU',18,void 0)()){_JAEE(_PAGE_,'A14',16,2,48);} " id="A14" class="BTN-Style-1 wblien bbox padding webdevclass-riche" style="display:block;width:100%;height:auto;min-height:22px;width:auto;min-width:155px;width:155px\9;height:auto;min-height:22px;">Je me retire</button></td></tr></table></div><div  class="clearfix pos19"><table style=" width:155px;border-spacing:0;height:22px;border-collapse:separate;border:0;outline:none;<?php if (($A13_BTN_ajout_participen->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>" id="bzA13"><tr><td style="border:none;" id="tzA13" class="valignmiddle"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_MENU',18,void 0)()){_JAEE(_PAGE_,'A13',16,2,48);} " id="A13" class="BTN-Style-1 wblien bbox padding webdevclass-riche" style="display:block;width:100%;height:auto;min-height:22px;width:auto;min-width:155px;width:155px\9;height:auto;min-height:22px;">Rejoindre l’observation</button></td></tr></table></div></div><div  class="clearfix pos20"><input type=hidden name="A7" value="<?php echo $A7_TABLE_REQ_participent_plng->Valeur ?>"><input type=hidden name="A7_DEB" value="<?php echo $A7_TABLE_REQ_participent_plng->GetFirstIndex()+1 ?>"><input type=hidden name="_A7_OCC" value="<?php echo $A7_TABLE_REQ_participent_plng->GetNbEnregAffiche() ?>"><table id="ctzA7" style="border-spacing:0; width:381px;;<?php if (($A7_TABLE_REQ_participent_plng->Visible)==0) {
 ?>border-collapse:separate;<?php if (($A7_TABLE_REQ_participent_plng->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?><?php 
 } ?>" class="cellpadding0">
<tr style="border:0;height:0;" id="ttA7"><td id="tzcA7" style="width:100%;border-bottom-width:0"><div style="overflow:hidden;position:relative;width:364px;"><table id="A7_TITRES_POS" style="border-spacing:0; width:100%;<?php if (($A7_TABLE_REQ_participent_plng->Visible)==0) {
 ?>border-collapse:separate;<?php 
 } ?>"><tr id="A7_TITRES"><td id="ttA8" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;<?php if (($A8_COL_Nom->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A8:0px;" class="wbcolA8"><div id="A7_TITRES_0" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA8"><?php echo $A8_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div></div></td><td style="<?php if (($A8_COL_Nom->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA8"><div onmousedown="oGetObjetChamp('A7').OnRedimCol(event,0,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA9" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;<?php if (($A9_COL_Sac->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A9:0px;" class="wbcolA9"><div id="A7_TITRES_1" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA9"><?php echo $A9_COL_Sac->pszGetLibelleHTML(); ?></td></tr></table></div></div></td><td style="<?php if (($A9_COL_Sac->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA9"><div onmousedown="oGetObjetChamp('A7').OnRedimCol(event,1,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA10" style="border-left-width:0;border-top-width:0;border-right-width:0;box-sizing:border-box;position:relative;padding-left:0;<?php if (($A10_COL_Covoiturage->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A10:0px;" class="wbcolA10"><div id="A7_TITRES_2" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA10"><?php echo $A10_COL_Covoiturage->pszGetLibelleHTML(); ?></td></tr></table></div></div></td></tr>
<tr style="border:0;height:0;"><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;<?php if (($A8_COL_Nom->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA8"></td><td style="<?php if (($A8_COL_Nom->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;padding:0;" class="wbtablesep Titre-Colonne ttA8"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;<?php if (($A9_COL_Sac->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA9"></td><td style="<?php if (($A9_COL_Sac->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;padding:0;" class="wbtablesep Titre-Colonne ttA9"></td><td style="border-left-width:0;border-top-width:0;border-right-width:0;padding:0;padding-left:0;border:0;<?php if (($A10_COL_Covoiturage->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA10"></td></tr></table></div></td><td></td></tr>
<tr><td id="tzdA7" style="width:100%;border-top-width:0;"><div style="overflow-x:auto;overflow-y:hidden;width:364px;height:824px;position:relative;z-index:1"><div style="position:relative;width:100%" id="A7_POS"><table id="A7_TB" style="border-spacing:0; width:100%;<?php if (($A7_TABLE_REQ_participent_plng->Visible)==0) {
 ?>border-collapse:separate;<?php 
 } ?>height:824px;"><!-- { thead :  { contenu :  [  { debut : "<tr style=\"border:0;height:0;\" id=\"ttA7\">",contenu :  [ "<td id=\"ttA8\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;<?php if (($A8_COL_Nom->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A8:0px;\" class=\"wbcolA8\"><div id=\"A7_TITRES_0\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA8\"><?php echo $A8_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div></div></td><td style=\"<?php if (($A8_COL_Nom->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA8\"><div onmousedown=\"oGetObjetChamp('A7').OnRedimCol(event,0,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA9\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;<?php if (($A9_COL_Sac->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A9:0px;\" class=\"wbcolA9\"><div id=\"A7_TITRES_1\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA9\"><?php echo $A9_COL_Sac->pszGetLibelleHTML(); ?></td></tr></table></div></div></td><td style=\"<?php if (($A9_COL_Sac->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA9\"><div onmousedown=\"oGetObjetChamp('A7').OnRedimCol(event,1,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA10\" style=\"border-left-width:0;border-top-width:0;border-right-width:0;box-sizing:border-box;position:relative;padding-left:0;<?php if (($A10_COL_Covoiturage->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A10:0px;\" class=\"wbcolA10\"><div id=\"A7_TITRES_2\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA10\"><?php echo $A10_COL_Covoiturage->pszGetLibelleHTML(); ?></td></tr></table></div></div></td>", ] ,fin : "</tr>" } , { debut : "<tr style=\"border:0;height:0;\">",contenu :  [ "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;<?php if (($A8_COL_Nom->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA8\"></td><td style=\"<?php if (($A8_COL_Nom->Visible)==0) { ?>display:none;<?php  } ?>border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA8\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;<?php if (($A9_COL_Sac->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA9\"></td><td style=\"<?php if (($A9_COL_Sac->Visible)==0) { ?>display:none;<?php  } ?>border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA9\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;border-right-width:0;padding:0;padding-left:0;border:0;<?php if (($A10_COL_Covoiturage->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA10\"></td>", ] ,fin : "</tr>" }  ]  } ,tbody :  { contenu :  [  { debut : " <tr class=\"Lignes-Paires padding\" id=\"A7_[%_INDICE_%]\" style=\"visibility:hidden;height:23px\">",contenu :  [ "<td onclick=\"oGetObjetChamp('A7').OnSelectLigne([%_INDICE_%],0,event)\" style=\" height:21px;<?php $colTmp = $A7_TABLE_REQ_participent_plng->GetColonne(1); ?><?php $TmpCoul=$colTmp->GetCouleurIHTML($j-1);if ($TmpCoul!=-1) {echo ' color:#'.$TmpCoul.';';} ?><?php $colTmp = $A7_TABLE_REQ_participent_plng->GetColonne(1); ?><?php $TmpCoul=$colTmp->GetCouleurFondIHTML($j-1);if ($TmpCoul!=-1) {echo ' background-color:#'.$TmpCoul.';';} ?>border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A8\" class=\"l-4 wbcolA8 communbc-A8 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA8\"><div id=\"A7_[%_INDICE_%]_0\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A7').OnRedimCol(event,0,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A7').OnSelectLigne([%_INDICE_%],1,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A9\" class=\"l-7 wbcolA9 communbc-A9 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA9\"><div id=\"A7_[%_INDICE_%]_1\" style=\"text-align:center;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A7').OnRedimCol(event,1,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A7').OnSelectLigne([%_INDICE_%],2,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;border-right-width:0;\" id=\"c[%_INDICE_%]-A10\" class=\"l-10 wbcolA10 communbc-A10 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA10\"><div id=\"A7_[%_INDICE_%]_2\" style=\"text-align:center;\"></div></div></td>", ] ,fin : "</tr>" }  ]  }  } --><tr><td></td></tr></table></div><table style="position:absolute;top:0;left:0;width:100%;border:solid 2px #dadce0;height:100%;visibility:hidden;z-index:100" id="A7_MASQUE"><tr><td class="aligncenter valignmiddle"><img src="res/timer240%20Material%20Design%202.gif" alt="none"></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;height:100%;visibility:hidden;z-index:101" id="A7_MASQUETR"><tr><td class="aligncenter valignmiddle"><!-- --></td></tr></table></div></td><td style="width:17px;height:824px;vertical-align:top"><div style="width:15px;"><div style="position:absolute;overflow-x:hidden;width:17px;height:824px;"><div style="position:absolute;left:-5px;width:20px;height:824px;overflow-x:hidden;overflow-y:auto"><div style="width:1px;height:1px;overflow:hidden" id="A7_SB"></div></div></div></div></td></tr>
</table></div><div  class="clearfix pos21"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA15">
<tr><td style=" height:31px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA15">
<li style=" height:31px;"><table style=" width:248px;height:31px;"><tr><td id="lzA15" class="Normal padding webdevclass-riche"><label for="A15"><?php echo $A15_SAI_date->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:31px;border-collapse:separate;border:0;outline:none;" id="bzA15"><tr><td style="border:none;" id="tzA15" class="valignmiddle"><INPUT TYPE="text" NAME="A15" VALUE="<?php echo $A15_SAI_date->GetValeurHTML(); ?>" id="A15" class="SAI A15 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div><div  class="clearfix pos22"><button type="button" onclick="clWDUtil.pfGetTraitement('A6',0,void 0)(event); " id="A6" class="BTN-Defaut wblien bbox padding webdevclass-riche" style="width:100%;height:auto;min-height:29px;width:auto;min-width:124px;width:124px\9;height:auto;min-height:29px;display:inline-block;<?php if (($A6_BTN_affiche_participant->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>"><?php echo $A6_BTN_affiche_participant->pszGetLibelleHTML(); ?></button></div><div  class="clearfix pos23"><TABLE style=" width:248px;border-collapse:separate;">
<TR><TD style=" width:248px;"><table style="<?php if (($A12_SAI_idpln->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>" id="czA12">
<tr><td style=" height:31px; width:248px;"><ul style=" width:248px;" class="wbLibChamp wbLibChampA12">
<li style=" height:31px;"><table style=" width:248px;height:31px;"><tr><td id="lzA12" class="Normal padding webdevclass-riche"><label for="A12">Champ de saisie</label></td></tr></table></li><li><table style=" width:132px;border-spacing:0;height:31px;border-collapse:separate;border:0;outline:none;" id="bzA12"><tr><td style="border:none;" id="tzA12" class="valignmiddle"><INPUT TYPE="text" NAME="A12" VALUE="<?php echo $A12_SAI_idpln->GetValeurHTML(); ?>" id="A12" class="SAI A12 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div></td></tr><tr style="height:0"><td><div id="dwwA17" style="position:absolute;left:113px;top:1542px;width:67px;height:28px;z-index:13;<?php if (($A17_BTN_sup_plage->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="ancragesupl" style="position:absolute;left:113px;top:1542px;width:67px;height:28px;z-index:13;<?php if (($A17_BTN_sup_plage->Visible)==0) {
 ?>display:none;<?php 
 } ?>" data-width="67" data-min-width="67"><button type="button" onclick="clWDUtil.pfGetTraitement('A17',0,void 0)(event); " id="A17" class="BTN-Defaut wblien bbox padding webdevclass-riche" style="width:100%;height:auto;min-height:28px;width:100%;height:auto;min-height:28px;display:inline-block;" data-width="67" data-min-width="67"><?php echo $A17_BTN_sup_plage->pszGetLibelleHTML(); ?></button></div></td></tr></table></div></div><?php function construireTexteRiche_A17_BTN_sup_plage(){ global $A17_BTN_sup_plage,$A17_BTN_sup_plage;$s="Supprimer une plage";return $s;}function construireTexteRiche_A6_BTN_affiche_participant(){ global $A6_BTN_affiche_participant,$A6_BTN_affiche_participant;$s="Affiche les participents";return $s;}function construireTexteRiche_A15_SAI_date(){ global $A15_SAI_date,$A15_SAI_date;$s="Date";return $s;}function construireTexteRiche_A10_COL_Covoiturage($j){ global $A10_COL_Covoiturage,$A10_COL_Covoiturage,$A7_TABLE_REQ_participent_plng;$s="Voit";return $s;}function construireTexteRiche_A9_COL_Sac($j){ global $A9_COL_Sac,$A9_COL_Sac,$A7_TABLE_REQ_participent_plng;$s="Sac";return $s;}function construireTexteRiche_A8_COL_Nom($j){ global $A8_COL_Nom,$A8_COL_Nom,$A7_TABLE_REQ_participent_plng;$s="Nom";return $s;}function construireTexteRiche_A1_ZTR_boujour(){ global $A1_ZTR_boujour,$A1_ZTR_boujour;$s="<p>Saisissez votre texte</p>";return $s;} ?>
</form>
<script type="text/javascript">var _bTable16_=false;
</script>
<script type="text/javascript" src="./res/WWConstante5.js?3fffede2f4ed5"></script>
<script type="text/javascript" src="./res/WDUtil.js?3ffff5c0b400e"></script>
<script type="text/javascript" src="./res/StdAction.js?3000082445df6"></script>
<script type="text/javascript" src="./res/WDChamp.js?300018421ea7d"></script>
<script type="text/javascript" src="./res/WDXML.js?30003a1ac501a"></script>
<script type="text/javascript" src="./res/WDDrag.js?300065c0b400e"></script>
<script type="text/javascript" src="./res/WDAJAX.js?3000c5c0b400e"></script>
<script type="text/javascript" src="./res/WDTableZRCommun.js?3000dd5135078"></script>
<script type="text/javascript" src="./res/WDTable.js?3000e8421ea7d"></script>
<script type="text/javascript" src="./res/WDLangage.js?3001382445df6"></script>
<script type="text/javascript" src="./res/WDPlanning.js?3001ebd2fd671"></script>
<script type="text/javascript" src="./res/WD.js?3002cbe23185d"></script>
<script type="text/javascript">
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJ4X3Bjc29mdF9ub21fbG9naXF1ZSI6IlBBR0VfTWVudSIsInhfcGNzb2Z0X3R5cGVfbG9naXF1ZSI6IjY1NTM4IiwieF9wY3NvZnRfaWRfZW5zZW1ibGUiOiI1MTU2NTczNDEzODcwOTk2MTM5IiwibWFwcGluZ3MiOiJBIn0=
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/LES_SENTINELLES_DE_LA_MER_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _PHPID_="<?php echo session_name() . '=' . session_id(); ?>";
var _PU_="PAGE-Menu.php";
var _PAGE_=document["PAGE_MENU"];
clWDUtil.DeclareChamp("A2",void 0,void 0,void 0,WDPlanning,[<?php echo $A2_PLN_REQ_planing->pszGetChampParametresHTML(); ?>,<?php echo $A2_PLN_REQ_planing->pszGetChampDonneesHTML(); ?>],true,true);
clWDUtil.DeclareChamp("A7",void 0,void 0,void 0,WDTable,["<?php echo $A7_TABLE_REQ_participent_plng->pszGetAjaxInitInline(); ?>",0,23,2,4,1,["Lignes-Paires wbImpaire","Lignes-Paires wbPaire","Selection"],[["res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Sorting_Increasing240_Material_Design_2Material_Blue_2.png","res/TABLE_Sorting_Decreasing240_Material_Design_2Material_Blue_2.png"],["res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Search_Hover240_Material_Design_2Material_Blue_2.png","res/TABLE_Search_Active240_Material_Design_2Material_Blue_2.png"],["res/TABLE_Filter_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Filter_Hover240_Material_Design_2Material_Blue_2.png","res/TABLE_Filter_Active240_Material_Design_2Material_Blue_2.png"],["./res/TableDeplaceDroite.png","./res/TableDeplaceGauche.png"]],true,0],true,true);
NSPCS.NSWDW.SetDeclaration("DAAAAAEAAAABAAAABAAAAAAAAAAIAAAAAAAAAA==");
<!--
var _COL={0:"#ffffff",5:"#e8f0fe",9:"#f5cbc8",10:"#5f6469",15:"#2979ff",16:"#dadce0",21:"#f8f8f8",66:"#d93025"};
function _SET_A12_1(){document.getElementsByName("A12")[0].value=arguments[0];}
function _GET_A7_1(){return parseInt(document.getElementsByName("A7")[0].value||-1,10);}
function _SET_A7_1(){document.getElementsByName("A7")[0].value=parseInt(arguments[0],10)-1;}
clWDUtil.DeclareTraitementEx("PAGE_MENU",true,[18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("A2",false,[1,function(event,_WW_ACTION_SPEC_){var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,0);try{clWDUtil.Try();{clWDUtil.pfGetTraitement("A17",0,void 0)(event);void 0;}}catch(_E){clWDUtil.xbCatchThrow(_E,event);return;}finally{clWDUtil&&clWDUtil.oFinally();}},void 0,true,32,function(event,_WW_ACTION_SPEC_){var __VARS0=new NSPCS.NSValues.CVariablesLocales(1,2);__VARS0.xDeclareParametre(NSPCS.NSTypes.oGetDescriptionDINO(70,0).m_oDescriptionStatique,false,arguments[0+arguments.callee.length]);try{clWDUtil.Try();{NSPCS.NSChamps.oGetChamp("A12",2,{}).vSetValeur(__VARS0.oGetVariable(0).viGetMembre2("ID","ID",0,4),0,{});clWDUtil.pfGetTraitement("A6",0,void 0)(event);void 0;}}catch(_E){return clWDUtil.xbCatchThrow(_E,event);}finally{clWDUtil&&clWDUtil.oFinally();}},void 0,true,33,function(event,_WW_ACTION_SPEC_){var __VARS0=new NSPCS.NSValues.CVariablesLocales(1,2);__VARS0.xDeclareParametre(NSPCS.NSTypes.oGetDescriptionDINO(70,0).m_oDescriptionStatique,false,arguments[0+arguments.callee.length]);{void 0;}if(clWDUtil.pfGetTraitement("PAGE_MENU",18,void 0)()){_JAEE(_PAGE_,"A2",_WW_ACTION_SPEC_,9,53);}},void 0,true,34,function(event,_WW_ACTION_SPEC_){var __VARS0=new NSPCS.NSValues.CVariablesLocales(1,2);__VARS0.xDeclareParametre(NSPCS.NSTypes.oGetDescriptionDINO(70,0).m_oDescriptionStatique,false,arguments[0+arguments.callee.length]);{void 0;}if(clWDUtil.pfGetTraitement("PAGE_MENU",18,void 0)()){_JAEE(_PAGE_,"A2",_WW_ACTION_SPEC_,9,54);}},void 0,true,36,function(event,_WW_ACTION_SPEC_){var __VARS0=new NSPCS.NSValues.CVariablesLocales(1,2);__VARS0.xDeclareParametre(NSPCS.NSTypes.oGetDescriptionDINO(70,0).m_oDescriptionStatique,false,arguments[0+arguments.callee.length]);{void 0;}if(clWDUtil.pfGetTraitement("PAGE_MENU",18,void 0)()){_JAEE(_PAGE_,"A2",_WW_ACTION_SPEC_,9,55);}},void 0,true,37,function(event,_WW_ACTION_SPEC_){var __VARS0=new NSPCS.NSValues.CVariablesLocales(1,2);__VARS0.xDeclareParametre(NSPCS.NSTypes.oGetDescriptionDINO(70,0).m_oDescriptionStatique,false,arguments[0+arguments.callee.length]);{void 0;}if(clWDUtil.pfGetTraitement("PAGE_MENU",18,void 0)()){_JAEE(_PAGE_,"A2",_WW_ACTION_SPEC_,9,56);}},void 0,true,39,function(event,_WW_ACTION_SPEC_){var __VARS0=new NSPCS.NSValues.CVariablesLocales(1,2);__VARS0.xDeclareParametre(NSPCS.NSTypes.oGetDescriptionDINO(70,0).m_oDescriptionStatique,false,arguments[0+arguments.callee.length]);{void 0;}if(clWDUtil.pfGetTraitement("PAGE_MENU",18,void 0)()){_JAEE(_PAGE_,"A2",_WW_ACTION_SPEC_,9,57);}},void 0,true,40,function(event,_WW_ACTION_SPEC_){var __VARS0=new NSPCS.NSValues.CVariablesLocales(1,2);__VARS0.xDeclareParametre(NSPCS.NSTypes.oGetDescriptionDINO(70,0).m_oDescriptionStatique,false,arguments[0+arguments.callee.length]);{void 0;}},void 0,true]);
clWDUtil.DeclareTraitementEx("A6",false,[0,function(event){var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,0);try{clWDUtil.Try();{NSPCS.NSOperations.DonneFocus(NSPCS.NSChamps.oGetChamp("A7",9,{}));void 0;}}catch(_E){clWDUtil.xbCatchThrow(_E,event);return;}finally{clWDUtil&&clWDUtil.oFinally();}if(clWDUtil.pfGetTraitement("PAGE_MENU",18,void 0)()){_JAEE(_PAGE_,"A6",16,2,48);}},void 0,true]);
clWDUtil.DeclareTraitementEx("A17",false,[0,function(event){if(clWDUtil.pfGetTraitement("PAGE_MENU",18,void 0)()){_JAEE(_PAGE_,"A17",16,2,48);}},void 0,true]);
clWDUtil.DeclareTraitementEx("A18",false,[0,function(event){var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,0);try{clWDUtil.Try();{clWDUtil.pfGetTraitement("A17",0,void 0)(event);void 0;}}catch(_E){clWDUtil.xbCatchThrow(_E,event);return;}finally{clWDUtil&&clWDUtil.oFinally();}},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_MENU",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript" src="res/jquery-3.js?2000086c54b0a"></script><script type="text/javascript" src="res/jquery-ui.js?20006598c0fa6"></script><script type="text/javascript" src="res/jquery-effet.js?20004374c605b"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200051bfcee3e"></script><style type="text/css">.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ delay : 1000,	items: "[title]:not(iframe,svg)", position : {my: 'left top+20',collision: 'flip'},	track : false, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); ui.tooltip.position( { my: 'left+15 center', at: 'right center', of : event} ); },content: function(callback) { callback($(this).prop('title').replace(/\n/g, '\x3Cbr /\x3E')); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><script type="text/javascript">if (bOpr) document.getElementsByTagName("head")[0].innerHTML+='\x3cstyle type="text/css"\x3e.wbtablesep{position:static !important;}\x3c/style\x3e';</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_94=ob_get_contents();ob_end_clean();echo tidyHTML(_cp1252_to_utf8($_PHP_VAR_TMP_94)); ?>