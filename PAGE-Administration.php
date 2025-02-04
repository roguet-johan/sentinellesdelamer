<?php
//#28.0.380.0 Les sentinelles de la mer
ob_start();if (!defined('UNICODE_PAGE_UTF8')) define('UNICODE_PAGE_UTF8',false);
$gszId='Les sentinelles de la mer	PAGE_ADMINISTRATION	20250204195931';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD28.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CImage');
IHM_Include('CBouton');
IHM_Include('CTableAjax');
IHM_Include('CSaisie');
IHM_Include('CSaisieNumerique');

WB_Include('WL/HF/HF.php');
WB_Include('HF.php');
WB_Include('WL/PAGE/Page.php');

Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
// Equivalent de [%URL()%]
$gszURL='PAGE-Administration.php';
$j=1;$i=1;
if (!isset($_SESSION)) session_start();
// protection contre register_globals = on
unset($PAGE_ADMINISTRATION);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(0,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gszCheminPageInverse='./';
$gtabCheminPage['PAGE_ADMINISTRATION']=array(5=>array('NOM'=>'PAGE-Administration','URL'=>'./'));
$gtabCheminPage['PAGE_PARTICIPENT']=array(5=>array('NOM'=>'PAGE-Participent','URL'=>'./'));
$gtabCheminPage['PAGE_INFO_SENTINELLE']=array(5=>array('NOM'=>'PAGE-info-sentinelle','URL'=>'./'));
$gtabCheminPage['PAGE_CONNEXION']=array(5=>array('NOM'=>'index','URL'=>'./'));
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
RechargementPageSiBesoin('PAGE_ADMINISTRATION');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_ADMINISTRATION']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_ADMINISTRATION= $gTabVarSession['PAGE_ADMINISTRATION'];
	$PAGE_ADMINISTRATION->WB_RestaureContexte();
$MaPage =& $PAGE_ADMINISTRATION;
$GLOBALS['PAGE_Administration'] =& $MaPage;
if (isset($gnIndiceAgencement) && $gnIndiceAgencement !== $MaPage->m_nIndiceAgencementCourant)
{

}
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_ADMINISTRATION)) {
$PAGE_ADMINISTRATION= new CPage(false);
$PAGE_ADMINISTRATION->Nom = 'PAGE_Administration';
$PAGE_ADMINISTRATION->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_ADMINISTRATION->Alias = 'PAGE_ADMINISTRATION';
$PAGE_ADMINISTRATION->m_sNomPHP = 'PAGE_ADMINISTRATION';
$PAGE_ADMINISTRATION->Libelle = 'Administration';
$PAGE_ADMINISTRATION->bUTF8 = true;
$PAGE_ADMINISTRATION->bHTML5 = true;
$PAGE_ADMINISTRATION->bAvecContexte = true;
$PAGE_ADMINISTRATION->sFichierPalette = '.\\res\\Material Blue 2.wpc';
$PAGE_ADMINISTRATION->Plan = 1;
$PAGE_ADMINISTRATION->ImageFond = '';
$MaPage =& $PAGE_ADMINISTRATION;
$GLOBALS['PAGE_Administration'] =& $MaPage;
$A4_IMG_SansNom1=&CreerChamp('CImage',292,76,16447992);$PAGE_ADMINISTRATION->WB_AjouteChamp('IMG_SansNom1','A4',$A4_IMG_SansNom1,'A4_IMG_SansNom1');
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

$A9_BTN_valider=&CreerChamp('CBouton');$PAGE_ADMINISTRATION->WB_AjouteChamp('BTN_valider','A9',$A9_BTN_valider,'A9_BTN_valider');
$A9_BTN_valider->m_bLibelleRiche=true;

$A2_TABLE_Sites=&CreerChamp('CTableAjax');$PAGE_ADMINISTRATION->WB_AjouteChamp('TABLE_Sites','A2',$A2_TABLE_Sites,'A2_TABLE_Sites');
$A2_TABLE_Sites->m_bHauteurLigneVariable=true;
$A2_TABLE_Sites->m_nNbColonnesOuAttributs=4;
$A2_TABLE_Sites->SetMaxLignePage(7);
$A2_TABLE_Sites->SetFirstIndex(0);
$A2_TABLE_Sites->Visible=1;
$A2_TABLE_Sites->Etat=0;
$A2_TABLE_Sites->nModeSelection=1;
$A2_TABLE_Sites->m_bSaisieCascade=true;

$A3_COL_Lieu=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Lieu','A3',$A3_COL_Lieu,'A3_COL_Lieu');
$A2_TABLE_Sites->AjouteColonne('A3_COL_Lieu','COL_Lieu','A3', 5600, 0,'Sites','Lieu');
$A2_TABLE_Sites->TabColonnes[1]->Visible=1;
$A2_TABLE_Sites->TabColonnes[1]->Etat=0;
$A2_TABLE_Sites->TabColonnes[1]->bColonneLien=0;
$A2_TABLE_Sites->TabColonnes[1]->SetTriable(true);
$A2_TABLE_Sites->TabColonnes[1]->SetAvecLoupe(true);
$A2_TABLE_Sites->TabColonnes[1]->m_bAvecFiltre=true;
$A2_TABLE_Sites->TabColonnes[1]->m_nFiltreEncours=31980;
$A2_TABLE_Sites->TabColonnes[1]->m_eDeplaceInsere = 4;
$A2_TABLE_Sites->TabColonnes[1]->m_sBulle='';
$A3_COL_Lieu->m_eAction=6;
$A3_COL_Lieu->m_sPageAction='';
$A3_COL_Lieu->m_bLibelleRiche=true;

$A20_COL_AB=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_AB','A20',$A20_COL_AB,'A20_COL_AB');
$A2_TABLE_Sites->AjouteColonne('A20_COL_AB','COL_AB','A20', 5600, 1,'Sites','Abreviation');
$A2_TABLE_Sites->TabColonnes[2]->Visible=1;
$A2_TABLE_Sites->TabColonnes[2]->Etat=0;
$A2_TABLE_Sites->TabColonnes[2]->bColonneLien=0;
$A2_TABLE_Sites->TabColonnes[2]->SetTriable(true);
$A2_TABLE_Sites->TabColonnes[2]->SetAvecLoupe(true);
$A2_TABLE_Sites->TabColonnes[2]->m_bAvecFiltre=true;
$A2_TABLE_Sites->TabColonnes[2]->m_nFiltreEncours=31980;
$A2_TABLE_Sites->TabColonnes[2]->m_eDeplaceInsere = 4;
$A2_TABLE_Sites->TabColonnes[2]->m_sBulle='';
$A20_COL_AB->m_eAction=6;
$A20_COL_AB->m_sPageAction='';
$A20_COL_AB->m_bLibelleRiche=true;

$A5_COL_Geolocalisation=&CreerChamp('CSaisieNumerique');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Geolocalisation','A5',$A5_COL_Geolocalisation,'A5_COL_Geolocalisation');
$A2_TABLE_Sites->AjouteColonne('A5_COL_Geolocalisation','COL_Geolocalisation','A5', 5601, 2,'Sites','geolocalisation');
$A2_TABLE_Sites->TabColonnes[3]->ChampFormat->Masque='+999 999 999';
$A2_TABLE_Sites->TabColonnes[3]->Visible=1;
$A2_TABLE_Sites->TabColonnes[3]->Etat=0;
$A2_TABLE_Sites->TabColonnes[3]->bColonneLien=0;
$A2_TABLE_Sites->TabColonnes[3]->SetTriable(true);
$A2_TABLE_Sites->TabColonnes[3]->SetAvecLoupe(true);
$A2_TABLE_Sites->TabColonnes[3]->m_bAvecFiltre=true;
$A2_TABLE_Sites->TabColonnes[3]->m_nFiltreEncours=31980;
$A2_TABLE_Sites->TabColonnes[3]->m_eDeplaceInsere = 4;
$A2_TABLE_Sites->TabColonnes[3]->m_sBulle='';
$A5_COL_Geolocalisation->m_eAction=6;
$A5_COL_Geolocalisation->m_sPageAction='';
$A5_COL_Geolocalisation->m_bLibelleRiche=true;

$A6_COL_Nn_sac=&CreerChamp('CSaisieNumerique');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Nn_sac','A6',$A6_COL_Nn_sac,'A6_COL_Nn_sac');
$A2_TABLE_Sites->AjouteColonne('A6_COL_Nn_sac','COL_Nn_sac','A6', 5601, 3,'Sites','Nn_sac');
$A2_TABLE_Sites->TabColonnes[4]->ChampFormat->Masque='+999 999 999';
$A2_TABLE_Sites->TabColonnes[4]->Visible=1;
$A2_TABLE_Sites->TabColonnes[4]->Etat=0;
$A2_TABLE_Sites->TabColonnes[4]->bColonneLien=0;
$A2_TABLE_Sites->TabColonnes[4]->SetTriable(true);
$A2_TABLE_Sites->TabColonnes[4]->SetAvecLoupe(true);
$A2_TABLE_Sites->TabColonnes[4]->m_bAvecFiltre=true;
$A2_TABLE_Sites->TabColonnes[4]->m_nFiltreEncours=31980;
$A2_TABLE_Sites->TabColonnes[4]->m_eDeplaceInsere = 4;
$A2_TABLE_Sites->TabColonnes[4]->m_sBulle='';
$A6_COL_Nn_sac->m_eAction=6;
$A6_COL_Nn_sac->m_sPageAction='';
$A6_COL_Nn_sac->m_bLibelleRiche=true;

$A1_TABLE_Sentinelle=&CreerChamp('CTableAjax');$PAGE_ADMINISTRATION->WB_AjouteChamp('TABLE_Sentinelle','A1',$A1_TABLE_Sentinelle,'A1_TABLE_Sentinelle');
$A1_TABLE_Sentinelle->m_bHauteurLigneVariable=true;
$A1_TABLE_Sentinelle->m_nNbColonnesOuAttributs=12;
$A1_TABLE_Sentinelle->SetMaxLignePage(23);
$A1_TABLE_Sentinelle->SetFirstIndex(0);
$A1_TABLE_Sentinelle->Visible=1;
$A1_TABLE_Sentinelle->Etat=0;
$A1_TABLE_Sentinelle->nModeSelection=1;
$A1_TABLE_Sentinelle->m_bSaisieCascade=true;

$A7_COL_Nom=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Nom','A7',$A7_COL_Nom,'A7_COL_Nom');
$A1_TABLE_Sentinelle->AjouteColonne('A7_COL_Nom','COL_Nom','A7', 5600, 0,'Sentinelle','Nom');
$A1_TABLE_Sentinelle->TabColonnes[1]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[1]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[1]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[1]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[1]->SetAvecLoupe(true);
$A1_TABLE_Sentinelle->TabColonnes[1]->m_bAvecFiltre=true;
$A1_TABLE_Sentinelle->TabColonnes[1]->m_nFiltreEncours=31980;
$A1_TABLE_Sentinelle->TabColonnes[1]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[1]->m_sBulle='';
$A7_COL_Nom->m_eAction=6;
$A7_COL_Nom->m_sPageAction='';
$A7_COL_Nom->m_bLibelleRiche=true;

$A8_COL_Prenom=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Prénom','A8',$A8_COL_Prenom,'A8_COL_Prenom');
$A1_TABLE_Sentinelle->AjouteColonne('A8_COL_Prenom','COL_Prenom','A8', 5600, 1,'Sentinelle','Prénom');
$A1_TABLE_Sentinelle->TabColonnes[2]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[2]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[2]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[2]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[2]->SetAvecLoupe(true);
$A1_TABLE_Sentinelle->TabColonnes[2]->m_bAvecFiltre=true;
$A1_TABLE_Sentinelle->TabColonnes[2]->m_nFiltreEncours=31980;
$A1_TABLE_Sentinelle->TabColonnes[2]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[2]->m_sBulle='';
$A8_COL_Prenom->m_eAction=6;
$A8_COL_Prenom->m_sPageAction='';
$A8_COL_Prenom->m_bLibelleRiche=true;

$A11_COL_Adresse=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Adresse','A11',$A11_COL_Adresse,'A11_COL_Adresse');
$A1_TABLE_Sentinelle->AjouteColonne('A11_COL_Adresse','COL_Adresse','A11', 5600, 2,'Sentinelle','Adresse');
$A1_TABLE_Sentinelle->TabColonnes[3]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[3]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[3]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[3]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[3]->SetAvecLoupe(true);
$A1_TABLE_Sentinelle->TabColonnes[3]->m_bAvecFiltre=true;
$A1_TABLE_Sentinelle->TabColonnes[3]->m_nFiltreEncours=31980;
$A1_TABLE_Sentinelle->TabColonnes[3]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[3]->m_sBulle='';
$A11_COL_Adresse->m_eAction=6;
$A11_COL_Adresse->m_sPageAction='';
$A11_COL_Adresse->m_bLibelleRiche=true;

$A12_COL_CP=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_CP','A12',$A12_COL_CP,'A12_COL_CP');
$A1_TABLE_Sentinelle->AjouteColonne('A12_COL_CP','COL_CP','A12', 5600, 3,'Sentinelle','CP');
$A1_TABLE_Sentinelle->TabColonnes[4]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[4]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[4]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[4]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[4]->SetAvecLoupe(true);
$A1_TABLE_Sentinelle->TabColonnes[4]->m_bAvecFiltre=true;
$A1_TABLE_Sentinelle->TabColonnes[4]->m_nFiltreEncours=31980;
$A1_TABLE_Sentinelle->TabColonnes[4]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[4]->m_sBulle='';
$A12_COL_CP->m_eAction=6;
$A12_COL_CP->m_sPageAction='';
$A12_COL_CP->m_bLibelleRiche=true;

$A13_COL_Ville=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Ville','A13',$A13_COL_Ville,'A13_COL_Ville');
$A1_TABLE_Sentinelle->AjouteColonne('A13_COL_Ville','COL_Ville','A13', 5600, 4,'Sentinelle','Ville');
$A1_TABLE_Sentinelle->TabColonnes[5]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[5]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[5]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[5]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[5]->SetAvecLoupe(true);
$A1_TABLE_Sentinelle->TabColonnes[5]->m_bAvecFiltre=true;
$A1_TABLE_Sentinelle->TabColonnes[5]->m_nFiltreEncours=31980;
$A1_TABLE_Sentinelle->TabColonnes[5]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[5]->m_sBulle='';
$A13_COL_Ville->m_eAction=6;
$A13_COL_Ville->m_sPageAction='';
$A13_COL_Ville->m_bLibelleRiche=true;

$A14_COL_Mdp=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Mdp','A14',$A14_COL_Mdp,'A14_COL_Mdp');
$A1_TABLE_Sentinelle->AjouteColonne('A14_COL_Mdp','COL_Mdp','A14', 5600, 5,'Sentinelle','mdp');
$A1_TABLE_Sentinelle->TabColonnes[6]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[6]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[6]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[6]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[6]->SetAvecLoupe(true);
$A1_TABLE_Sentinelle->TabColonnes[6]->m_bAvecFiltre=true;
$A1_TABLE_Sentinelle->TabColonnes[6]->m_nFiltreEncours=31980;
$A1_TABLE_Sentinelle->TabColonnes[6]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[6]->m_sBulle='';
$A14_COL_Mdp->m_eAction=6;
$A14_COL_Mdp->m_sPageAction='';
$A14_COL_Mdp->m_bLibelleRiche=true;

$A15_COL_Login=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Login','A15',$A15_COL_Login,'A15_COL_Login');
$A1_TABLE_Sentinelle->AjouteColonne('A15_COL_Login','COL_Login','A15', 5600, 6,'Sentinelle','Login');
$A1_TABLE_Sentinelle->TabColonnes[7]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[7]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[7]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[7]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[7]->SetAvecLoupe(true);
$A1_TABLE_Sentinelle->TabColonnes[7]->m_bAvecFiltre=true;
$A1_TABLE_Sentinelle->TabColonnes[7]->m_nFiltreEncours=31980;
$A1_TABLE_Sentinelle->TabColonnes[7]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[7]->m_sBulle='';
$A15_COL_Login->m_eAction=6;
$A15_COL_Login->m_sPageAction='';
$A15_COL_Login->m_bLibelleRiche=true;

$A10_COL_Maim=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Maim','A10',$A10_COL_Maim,'A10_COL_Maim');
$A1_TABLE_Sentinelle->AjouteColonne('A10_COL_Maim','COL_Maim','A10', 5600, 7,'Sentinelle','email');
$A1_TABLE_Sentinelle->TabColonnes[8]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[8]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[8]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[8]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[8]->SetAvecLoupe(true);
$A1_TABLE_Sentinelle->TabColonnes[8]->m_bAvecFiltre=true;
$A1_TABLE_Sentinelle->TabColonnes[8]->m_nFiltreEncours=31980;
$A1_TABLE_Sentinelle->TabColonnes[8]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[8]->m_sBulle='';
$A10_COL_Maim->m_eAction=6;
$A10_COL_Maim->m_sPageAction='';
$A10_COL_Maim->m_bLibelleRiche=true;

$A16_COL_Expert=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Expert','A16',$A16_COL_Expert,'A16_COL_Expert');
$A1_TABLE_Sentinelle->AjouteColonne('A16_COL_Expert','COL_Expert','A16', 500, 8,'Sentinelle','Expert');
$A1_TABLE_Sentinelle->TabColonnes[9]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[9]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[9]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[9]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[9]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[9]->m_sBulle='';
$A16_COL_Expert->m_eAction=6;
$A16_COL_Expert->m_sPageAction='';
$A16_COL_Expert->m_bLibelleRiche=true;

$A17_COL_Benevol=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Bénévol','A17',$A17_COL_Benevol,'A17_COL_Benevol');
$A1_TABLE_Sentinelle->AjouteColonne('A17_COL_Benevol','COL_Benevol','A17', 500, 9,'Sentinelle','Bénévol');
$A1_TABLE_Sentinelle->TabColonnes[10]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[10]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[10]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[10]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[10]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[10]->m_sBulle='';
$A17_COL_Benevol->m_eAction=6;
$A17_COL_Benevol->m_sPageAction='';
$A17_COL_Benevol->m_bLibelleRiche=true;

$A18_COL_Gps=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Gps','A18',$A18_COL_Gps,'A18_COL_Gps');
$A1_TABLE_Sentinelle->AjouteColonne('A18_COL_Gps','COL_Gps','A18', 5600, 10,'Sentinelle','gps');
$A1_TABLE_Sentinelle->TabColonnes[11]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[11]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[11]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[11]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[11]->SetAvecLoupe(true);
$A1_TABLE_Sentinelle->TabColonnes[11]->m_bAvecFiltre=true;
$A1_TABLE_Sentinelle->TabColonnes[11]->m_nFiltreEncours=31980;
$A1_TABLE_Sentinelle->TabColonnes[11]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[11]->m_sBulle='';
$A18_COL_Gps->m_eAction=6;
$A18_COL_Gps->m_sPageAction='';
$A18_COL_Gps->m_bLibelleRiche=true;

$A19_COL_Admin=&CreerChamp('CSaisie');$PAGE_ADMINISTRATION->WB_AjouteChamp('COL_Admin','A19',$A19_COL_Admin,'A19_COL_Admin');
$A1_TABLE_Sentinelle->AjouteColonne('A19_COL_Admin','COL_Admin','A19', 500, 11,'Sentinelle','Admin');
$A1_TABLE_Sentinelle->TabColonnes[12]->Visible=1;
$A1_TABLE_Sentinelle->TabColonnes[12]->Etat=0;
$A1_TABLE_Sentinelle->TabColonnes[12]->bColonneLien=0;
$A1_TABLE_Sentinelle->TabColonnes[12]->SetTriable(true);
$A1_TABLE_Sentinelle->TabColonnes[12]->m_eDeplaceInsere = 4;
$A1_TABLE_Sentinelle->TabColonnes[12]->m_sBulle='';
$A19_COL_Admin->m_eAction=6;
$A19_COL_Admin->m_sPageAction='';
$A19_COL_Admin->m_bLibelleRiche=true;



//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------
$A4_IMG_SansNom1->Valeur = '../ext/WhatsApp Image 2025-01-21 at 15.47.27.jpeg';
$A4_IMG_SansNom1->JetonActif = false;


$A4_IMG_SansNom1->lierVM('PAGE_Administration','IMG_SansNom1','A4_IMG_SansNom1');
$A9_BTN_valider->Libelle = function_exists("construireTexteRiche_A9_BTN_valider") ? null : 'Retour';
$A9_BTN_valider->JetonActif = false;


$A9_BTN_valider->lierVM('PAGE_Administration','BTN_valider','A9_BTN_valider');
$A2_TABLE_Sites->Libelle = ' Sites';
$A2_TABLE_Sites->JetonActif = false;


$A2_TABLE_Sites->lierVM('PAGE_Administration','TABLE_Sites','A2_TABLE_Sites');
$A3_COL_Lieu->Couleur = 0x69645F;
$A3_COL_Lieu->CouleurInitiale = 0x69645F;
$A3_COL_Lieu->Libelle = function_exists("construireTexteRiche_A3_COL_Lieu") ? null : 'Lieu du site';
$A3_COL_Lieu->Masque = '0';
$A3_COL_Lieu->m_nHauteur = 220;
$A3_COL_Lieu->m_nLargeur = 149;
$A3_COL_Lieu->m_nOpacite = 100;
$A3_COL_Lieu->m_nCadrageHorizontal = -1;
$A3_COL_Lieu->m_nCadrageVertical = -1;
$A3_COL_Lieu->m_Police->m_bGras = false;
$A3_COL_Lieu->m_Police->m_bItalique = false;
$A3_COL_Lieu->m_Police->m_bSouligne = false;
$A3_COL_Lieu->m_nX = 0;
$A3_COL_Lieu->m_nY = 0;
$A3_COL_Lieu->m_clCouleurJauge = 0x000000;
$A3_COL_Lieu->BoutonCalendrier = 0;
$A3_COL_Lieu->EtatInitial = 0;
$A3_COL_Lieu->VisibleInitial = 1;
$A3_COL_Lieu->YInitial = 0;
$A3_COL_Lieu->NombreColonne = 0;
$A3_COL_Lieu->BulleTitre = '';
$A3_COL_Lieu->JetonActif = false;
$A3_COL_Lieu->JetonListeSeparateur = '';
$A3_COL_Lieu->JetonAutoriseDoublon = false;
$A3_COL_Lieu->JetonSupprimable = true;


$A3_COL_Lieu->lierVM('PAGE_Administration','COL_Lieu','A3_COL_Lieu');
$A20_COL_AB->Couleur = 0x69645F;
$A20_COL_AB->CouleurInitiale = 0x69645F;
$A20_COL_AB->Libelle = function_exists("construireTexteRiche_A20_COL_AB") ? null : 'Abréviation';
$A20_COL_AB->Masque = '0';
$A20_COL_AB->m_nHauteur = 220;
$A20_COL_AB->m_nLargeur = 100;
$A20_COL_AB->m_nOpacite = 100;
$A20_COL_AB->m_nCadrageHorizontal = -1;
$A20_COL_AB->m_nCadrageVertical = -1;
$A20_COL_AB->m_Police->m_bGras = false;
$A20_COL_AB->m_Police->m_bItalique = false;
$A20_COL_AB->m_Police->m_bSouligne = false;
$A20_COL_AB->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A20_COL_AB->m_Police->m_nTaille = '14px';
$A20_COL_AB->m_nX = 0;
$A20_COL_AB->m_nY = 0;
$A20_COL_AB->m_clCouleurJauge = 0x000000;
$A20_COL_AB->BoutonCalendrier = 0;
$A20_COL_AB->EtatInitial = 0;
$A20_COL_AB->VisibleInitial = 1;
$A20_COL_AB->YInitial = 0;
$A20_COL_AB->NombreColonne = 0;
$A20_COL_AB->BulleTitre = '';
$A20_COL_AB->JetonActif = false;
$A20_COL_AB->JetonListeSeparateur = '';
$A20_COL_AB->JetonAutoriseDoublon = false;
$A20_COL_AB->JetonSupprimable = true;


$A20_COL_AB->lierVM('PAGE_Administration','COL_AB','A20_COL_AB');
$A5_COL_Geolocalisation->Couleur = 0x69645F;
$A5_COL_Geolocalisation->CouleurInitiale = 0x69645F;
$A5_COL_Geolocalisation->Libelle = function_exists("construireTexteRiche_A5_COL_Geolocalisation") ? null : 'Géolocalisation';
$A5_COL_Geolocalisation->Masque = '+999 999 999';
$A5_COL_Geolocalisation->m_nHauteur = 220;
$A5_COL_Geolocalisation->m_nLargeur = 66;
$A5_COL_Geolocalisation->m_nOpacite = 100;
$A5_COL_Geolocalisation->m_nCadrageHorizontal = 2;
$A5_COL_Geolocalisation->m_nCadrageVertical = -1;
$A5_COL_Geolocalisation->m_Police->m_bGras = false;
$A5_COL_Geolocalisation->m_Police->m_bItalique = false;
$A5_COL_Geolocalisation->m_Police->m_bSouligne = false;
$A5_COL_Geolocalisation->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A5_COL_Geolocalisation->m_Police->m_nTaille = '14px';
$A5_COL_Geolocalisation->m_nX = 0;
$A5_COL_Geolocalisation->m_nY = 0;
$A5_COL_Geolocalisation->m_clCouleurJauge = 0x000000;
$A5_COL_Geolocalisation->BoutonCalendrier = 0;
$A5_COL_Geolocalisation->EtatInitial = 0;
$A5_COL_Geolocalisation->VisibleInitial = 1;
$A5_COL_Geolocalisation->YInitial = 0;
$A5_COL_Geolocalisation->NombreColonne = 0;
$A5_COL_Geolocalisation->BulleTitre = '';
$A5_COL_Geolocalisation->JetonActif = false;
$A5_COL_Geolocalisation->JetonListeSeparateur = '';
$A5_COL_Geolocalisation->JetonAutoriseDoublon = false;
$A5_COL_Geolocalisation->JetonSupprimable = true;


$A5_COL_Geolocalisation->lierVM('PAGE_Administration','COL_Geolocalisation','A5_COL_Geolocalisation');
$A6_COL_Nn_sac->Couleur = 0x69645F;
$A6_COL_Nn_sac->CouleurInitiale = 0x69645F;
$A6_COL_Nn_sac->Libelle = function_exists("construireTexteRiche_A6_COL_Nn_sac") ? null : 'Nombre de sac';
$A6_COL_Nn_sac->Masque = '+999 999 999';
$A6_COL_Nn_sac->m_nHauteur = 220;
$A6_COL_Nn_sac->m_nLargeur = 100;
$A6_COL_Nn_sac->m_nOpacite = 100;
$A6_COL_Nn_sac->m_nCadrageHorizontal = 2;
$A6_COL_Nn_sac->m_nCadrageVertical = -1;
$A6_COL_Nn_sac->m_Police->m_bGras = false;
$A6_COL_Nn_sac->m_Police->m_bItalique = false;
$A6_COL_Nn_sac->m_Police->m_bSouligne = false;
$A6_COL_Nn_sac->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A6_COL_Nn_sac->m_Police->m_nTaille = '14px';
$A6_COL_Nn_sac->m_nX = 0;
$A6_COL_Nn_sac->m_nY = 0;
$A6_COL_Nn_sac->m_clCouleurJauge = 0x000000;
$A6_COL_Nn_sac->BoutonCalendrier = 0;
$A6_COL_Nn_sac->EtatInitial = 0;
$A6_COL_Nn_sac->VisibleInitial = 1;
$A6_COL_Nn_sac->YInitial = 0;
$A6_COL_Nn_sac->NombreColonne = 0;
$A6_COL_Nn_sac->BulleTitre = '';
$A6_COL_Nn_sac->JetonActif = false;
$A6_COL_Nn_sac->JetonListeSeparateur = '';
$A6_COL_Nn_sac->JetonAutoriseDoublon = false;
$A6_COL_Nn_sac->JetonSupprimable = true;


$A6_COL_Nn_sac->lierVM('PAGE_Administration','COL_Nn_sac','A6_COL_Nn_sac');
$A1_TABLE_Sentinelle->Libelle = ' Sentinelle';
$A1_TABLE_Sentinelle->JetonActif = false;


$A1_TABLE_Sentinelle->lierVM('PAGE_Administration','TABLE_Sentinelle','A1_TABLE_Sentinelle');
$A7_COL_Nom->Couleur = 0x69645F;
$A7_COL_Nom->CouleurInitiale = 0x69645F;
$A7_COL_Nom->Libelle = function_exists("construireTexteRiche_A7_COL_Nom") ? null : 'Nom';
$A7_COL_Nom->Masque = '0';
$A7_COL_Nom->m_nHauteur = 582;
$A7_COL_Nom->m_nLargeur = 137;
$A7_COL_Nom->m_nOpacite = 100;
$A7_COL_Nom->m_nCadrageHorizontal = -1;
$A7_COL_Nom->m_nCadrageVertical = -1;
$A7_COL_Nom->m_Police->m_bGras = false;
$A7_COL_Nom->m_Police->m_bItalique = false;
$A7_COL_Nom->m_Police->m_bSouligne = false;
$A7_COL_Nom->m_nX = 0;
$A7_COL_Nom->m_nY = 0;
$A7_COL_Nom->m_clCouleurJauge = 0x000000;
$A7_COL_Nom->BoutonCalendrier = 0;
$A7_COL_Nom->EtatInitial = 0;
$A7_COL_Nom->VisibleInitial = 1;
$A7_COL_Nom->YInitial = 0;
$A7_COL_Nom->NombreColonne = 0;
$A7_COL_Nom->BulleTitre = '';
$A7_COL_Nom->JetonActif = false;
$A7_COL_Nom->JetonListeSeparateur = '';
$A7_COL_Nom->JetonAutoriseDoublon = false;
$A7_COL_Nom->JetonSupprimable = true;


$A7_COL_Nom->lierVM('PAGE_Administration','COL_Nom','A7_COL_Nom');
$A8_COL_Prenom->Couleur = 0x69645F;
$A8_COL_Prenom->CouleurInitiale = 0x69645F;
$A8_COL_Prenom->Libelle = function_exists("construireTexteRiche_A8_COL_Prenom") ? null : 'Prénom';
$A8_COL_Prenom->Masque = '0';
$A8_COL_Prenom->m_nHauteur = 582;
$A8_COL_Prenom->m_nLargeur = 93;
$A8_COL_Prenom->m_nOpacite = 100;
$A8_COL_Prenom->m_nCadrageVertical = -1;
$A8_COL_Prenom->m_Police->m_bGras = false;
$A8_COL_Prenom->m_Police->m_bItalique = false;
$A8_COL_Prenom->m_Police->m_bSouligne = false;
$A8_COL_Prenom->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A8_COL_Prenom->m_Police->m_nTaille = '14px';
$A8_COL_Prenom->m_nX = 0;
$A8_COL_Prenom->m_nY = 0;
$A8_COL_Prenom->m_clCouleurJauge = 0x000000;
$A8_COL_Prenom->BoutonCalendrier = 0;
$A8_COL_Prenom->EtatInitial = 0;
$A8_COL_Prenom->VisibleInitial = 1;
$A8_COL_Prenom->YInitial = 0;
$A8_COL_Prenom->NombreColonne = 0;
$A8_COL_Prenom->BulleTitre = '';
$A8_COL_Prenom->JetonActif = false;
$A8_COL_Prenom->JetonListeSeparateur = '';
$A8_COL_Prenom->JetonAutoriseDoublon = false;
$A8_COL_Prenom->JetonSupprimable = true;


$A8_COL_Prenom->lierVM('PAGE_Administration','COL_Prénom','A8_COL_Prenom');
$A11_COL_Adresse->Couleur = 0x69645F;
$A11_COL_Adresse->CouleurInitiale = 0x69645F;
$A11_COL_Adresse->Libelle = function_exists("construireTexteRiche_A11_COL_Adresse") ? null : 'Adresse';
$A11_COL_Adresse->Masque = '0';
$A11_COL_Adresse->m_nHauteur = 582;
$A11_COL_Adresse->m_nLargeur = 100;
$A11_COL_Adresse->m_nOpacite = 100;
$A11_COL_Adresse->m_nCadrageVertical = -1;
$A11_COL_Adresse->m_Police->m_bGras = false;
$A11_COL_Adresse->m_Police->m_bItalique = false;
$A11_COL_Adresse->m_Police->m_bSouligne = false;
$A11_COL_Adresse->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A11_COL_Adresse->m_Police->m_nTaille = '14px';
$A11_COL_Adresse->m_nX = 0;
$A11_COL_Adresse->m_nY = 0;
$A11_COL_Adresse->m_clCouleurJauge = 0x000000;
$A11_COL_Adresse->BoutonCalendrier = 0;
$A11_COL_Adresse->EtatInitial = 0;
$A11_COL_Adresse->VisibleInitial = 1;
$A11_COL_Adresse->YInitial = 0;
$A11_COL_Adresse->NombreColonne = 0;
$A11_COL_Adresse->BulleTitre = '';
$A11_COL_Adresse->JetonActif = false;
$A11_COL_Adresse->JetonListeSeparateur = '';
$A11_COL_Adresse->JetonAutoriseDoublon = false;
$A11_COL_Adresse->JetonSupprimable = true;


$A11_COL_Adresse->lierVM('PAGE_Administration','COL_Adresse','A11_COL_Adresse');
$A12_COL_CP->Couleur = 0x69645F;
$A12_COL_CP->CouleurInitiale = 0x69645F;
$A12_COL_CP->Libelle = function_exists("construireTexteRiche_A12_COL_CP") ? null : 'Code postal';
$A12_COL_CP->Masque = '0';
$A12_COL_CP->m_nHauteur = 582;
$A12_COL_CP->m_nLargeur = 100;
$A12_COL_CP->m_nOpacite = 100;
$A12_COL_CP->m_nCadrageVertical = -1;
$A12_COL_CP->m_Police->m_bGras = false;
$A12_COL_CP->m_Police->m_bItalique = false;
$A12_COL_CP->m_Police->m_bSouligne = false;
$A12_COL_CP->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A12_COL_CP->m_Police->m_nTaille = '14px';
$A12_COL_CP->m_nX = 0;
$A12_COL_CP->m_nY = 0;
$A12_COL_CP->m_clCouleurJauge = 0x000000;
$A12_COL_CP->BoutonCalendrier = 0;
$A12_COL_CP->EtatInitial = 0;
$A12_COL_CP->VisibleInitial = 1;
$A12_COL_CP->YInitial = 0;
$A12_COL_CP->NombreColonne = 0;
$A12_COL_CP->BulleTitre = '';
$A12_COL_CP->JetonActif = false;
$A12_COL_CP->JetonListeSeparateur = '';
$A12_COL_CP->JetonAutoriseDoublon = false;
$A12_COL_CP->JetonSupprimable = true;


$A12_COL_CP->lierVM('PAGE_Administration','COL_CP','A12_COL_CP');
$A13_COL_Ville->Couleur = 0x69645F;
$A13_COL_Ville->CouleurInitiale = 0x69645F;
$A13_COL_Ville->Libelle = function_exists("construireTexteRiche_A13_COL_Ville") ? null : 'Ville';
$A13_COL_Ville->Masque = '0';
$A13_COL_Ville->m_nHauteur = 582;
$A13_COL_Ville->m_nLargeur = 100;
$A13_COL_Ville->m_nOpacite = 100;
$A13_COL_Ville->m_nCadrageVertical = -1;
$A13_COL_Ville->m_Police->m_bGras = false;
$A13_COL_Ville->m_Police->m_bItalique = false;
$A13_COL_Ville->m_Police->m_bSouligne = false;
$A13_COL_Ville->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A13_COL_Ville->m_Police->m_nTaille = '14px';
$A13_COL_Ville->m_nX = 0;
$A13_COL_Ville->m_nY = 0;
$A13_COL_Ville->m_clCouleurJauge = 0x000000;
$A13_COL_Ville->BoutonCalendrier = 0;
$A13_COL_Ville->EtatInitial = 0;
$A13_COL_Ville->VisibleInitial = 1;
$A13_COL_Ville->YInitial = 0;
$A13_COL_Ville->NombreColonne = 0;
$A13_COL_Ville->BulleTitre = '';
$A13_COL_Ville->JetonActif = false;
$A13_COL_Ville->JetonListeSeparateur = '';
$A13_COL_Ville->JetonAutoriseDoublon = false;
$A13_COL_Ville->JetonSupprimable = true;


$A13_COL_Ville->lierVM('PAGE_Administration','COL_Ville','A13_COL_Ville');
$A14_COL_Mdp->Couleur = 0x69645F;
$A14_COL_Mdp->CouleurInitiale = 0x69645F;
$A14_COL_Mdp->Libelle = function_exists("construireTexteRiche_A14_COL_Mdp") ? null : 'Mot de passe';
$A14_COL_Mdp->Masque = '1';
$A14_COL_Mdp->m_nHauteur = 582;
$A14_COL_Mdp->m_nLargeur = 100;
$A14_COL_Mdp->m_nOpacite = 100;
$A14_COL_Mdp->m_nCadrageVertical = -1;
$A14_COL_Mdp->m_Police->m_bGras = false;
$A14_COL_Mdp->m_Police->m_bItalique = false;
$A14_COL_Mdp->m_Police->m_bSouligne = false;
$A14_COL_Mdp->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A14_COL_Mdp->m_Police->m_nTaille = '14px';
$A14_COL_Mdp->m_nX = 0;
$A14_COL_Mdp->m_nY = 0;
$A14_COL_Mdp->m_clCouleurJauge = 0x000000;
$A14_COL_Mdp->BoutonCalendrier = 0;
$A14_COL_Mdp->EtatInitial = 0;
$A14_COL_Mdp->VisibleInitial = 1;
$A14_COL_Mdp->YInitial = 0;
$A14_COL_Mdp->NombreColonne = 0;
$A14_COL_Mdp->BulleTitre = '';
$A14_COL_Mdp->JetonActif = false;
$A14_COL_Mdp->JetonListeSeparateur = '';
$A14_COL_Mdp->JetonAutoriseDoublon = false;
$A14_COL_Mdp->JetonSupprimable = true;


$A14_COL_Mdp->lierVM('PAGE_Administration','COL_Mdp','A14_COL_Mdp');
$A15_COL_Login->Couleur = 0x69645F;
$A15_COL_Login->CouleurInitiale = 0x69645F;
$A15_COL_Login->Libelle = function_exists("construireTexteRiche_A15_COL_Login") ? null : 'Login';
$A15_COL_Login->Masque = '0';
$A15_COL_Login->m_nHauteur = 582;
$A15_COL_Login->m_nLargeur = 100;
$A15_COL_Login->m_nOpacite = 100;
$A15_COL_Login->m_nCadrageVertical = -1;
$A15_COL_Login->m_Police->m_bGras = false;
$A15_COL_Login->m_Police->m_bItalique = false;
$A15_COL_Login->m_Police->m_bSouligne = false;
$A15_COL_Login->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A15_COL_Login->m_Police->m_nTaille = '14px';
$A15_COL_Login->m_nX = 0;
$A15_COL_Login->m_nY = 0;
$A15_COL_Login->m_clCouleurJauge = 0x000000;
$A15_COL_Login->BoutonCalendrier = 0;
$A15_COL_Login->EtatInitial = 0;
$A15_COL_Login->VisibleInitial = 1;
$A15_COL_Login->YInitial = 0;
$A15_COL_Login->NombreColonne = 0;
$A15_COL_Login->BulleTitre = '';
$A15_COL_Login->JetonActif = false;
$A15_COL_Login->JetonListeSeparateur = '';
$A15_COL_Login->JetonAutoriseDoublon = false;
$A15_COL_Login->JetonSupprimable = true;


$A15_COL_Login->lierVM('PAGE_Administration','COL_Login','A15_COL_Login');
$A10_COL_Maim->Couleur = 0x69645F;
$A10_COL_Maim->CouleurInitiale = 0x69645F;
$A10_COL_Maim->Libelle = function_exists("construireTexteRiche_A10_COL_Maim") ? null : 'Maim';
$A10_COL_Maim->Masque = '0';
$A10_COL_Maim->m_nHauteur = 582;
$A10_COL_Maim->m_nLargeur = 100;
$A10_COL_Maim->m_nOpacite = 100;
$A10_COL_Maim->m_nCadrageVertical = -1;
$A10_COL_Maim->m_Police->m_bGras = false;
$A10_COL_Maim->m_Police->m_bItalique = false;
$A10_COL_Maim->m_Police->m_bSouligne = false;
$A10_COL_Maim->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A10_COL_Maim->m_Police->m_nTaille = '14px';
$A10_COL_Maim->m_nX = 0;
$A10_COL_Maim->m_nY = 0;
$A10_COL_Maim->m_clCouleurJauge = 0x000000;
$A10_COL_Maim->BoutonCalendrier = 0;
$A10_COL_Maim->EtatInitial = 0;
$A10_COL_Maim->VisibleInitial = 1;
$A10_COL_Maim->YInitial = 0;
$A10_COL_Maim->NombreColonne = 0;
$A10_COL_Maim->BulleTitre = '';
$A10_COL_Maim->JetonActif = false;
$A10_COL_Maim->JetonListeSeparateur = '';
$A10_COL_Maim->JetonAutoriseDoublon = false;
$A10_COL_Maim->JetonSupprimable = true;


$A10_COL_Maim->lierVM('PAGE_Administration','COL_Maim','A10_COL_Maim');
$A16_COL_Expert->Couleur = 0x69645F;
$A16_COL_Expert->CouleurInitiale = 0x69645F;
$A16_COL_Expert->Libelle = function_exists("construireTexteRiche_A16_COL_Expert") ? null : 'Référent';
$A16_COL_Expert->Masque = 0;
$A16_COL_Expert->m_nHauteur = 582;
$A16_COL_Expert->m_nLargeur = 100;
$A16_COL_Expert->m_nOpacite = 100;
$A16_COL_Expert->m_nCadrageHorizontal = -1;
$A16_COL_Expert->m_nCadrageVertical = -1;
$A16_COL_Expert->m_Police->m_bGras = false;
$A16_COL_Expert->m_Police->m_bItalique = false;
$A16_COL_Expert->m_Police->m_bSouligne = false;
$A16_COL_Expert->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A16_COL_Expert->m_Police->m_nTaille = '14px';
$A16_COL_Expert->m_nX = 0;
$A16_COL_Expert->m_nY = 0;
$A16_COL_Expert->m_clCouleurJauge = 0x000000;
$A16_COL_Expert->BoutonCalendrier = 0;
$A16_COL_Expert->EtatInitial = 0;
$A16_COL_Expert->VisibleInitial = 1;
$A16_COL_Expert->YInitial = 0;
$A16_COL_Expert->NombreColonne = 1;
$A16_COL_Expert->BulleTitre = '';
$A16_COL_Expert->JetonActif = false;
$A16_COL_Expert->JetonListeSeparateur = '';
$A16_COL_Expert->JetonAutoriseDoublon = false;
$A16_COL_Expert->JetonSupprimable = false;


$A16_COL_Expert->lierVM('PAGE_Administration','COL_Expert','A16_COL_Expert');
$A17_COL_Benevol->Couleur = 0x69645F;
$A17_COL_Benevol->CouleurInitiale = 0x69645F;
$A17_COL_Benevol->Libelle = function_exists("construireTexteRiche_A17_COL_Benevol") ? null : 'Bénévole';
$A17_COL_Benevol->Masque = 0;
$A17_COL_Benevol->m_nHauteur = 582;
$A17_COL_Benevol->m_nLargeur = 100;
$A17_COL_Benevol->m_nOpacite = 100;
$A17_COL_Benevol->m_nCadrageHorizontal = -1;
$A17_COL_Benevol->m_nCadrageVertical = -1;
$A17_COL_Benevol->m_Police->m_bGras = false;
$A17_COL_Benevol->m_Police->m_bItalique = false;
$A17_COL_Benevol->m_Police->m_bSouligne = false;
$A17_COL_Benevol->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A17_COL_Benevol->m_Police->m_nTaille = '14px';
$A17_COL_Benevol->m_nX = 0;
$A17_COL_Benevol->m_nY = 0;
$A17_COL_Benevol->m_clCouleurJauge = 0x000000;
$A17_COL_Benevol->BoutonCalendrier = 0;
$A17_COL_Benevol->EtatInitial = 0;
$A17_COL_Benevol->VisibleInitial = 1;
$A17_COL_Benevol->YInitial = 0;
$A17_COL_Benevol->NombreColonne = 1;
$A17_COL_Benevol->BulleTitre = '';
$A17_COL_Benevol->JetonActif = false;
$A17_COL_Benevol->JetonListeSeparateur = '';
$A17_COL_Benevol->JetonAutoriseDoublon = false;
$A17_COL_Benevol->JetonSupprimable = false;


$A17_COL_Benevol->lierVM('PAGE_Administration','COL_Bénévol','A17_COL_Benevol');
$A18_COL_Gps->Couleur = 0x69645F;
$A18_COL_Gps->CouleurInitiale = 0x69645F;
$A18_COL_Gps->Libelle = function_exists("construireTexteRiche_A18_COL_Gps") ? null : 'GPS';
$A18_COL_Gps->Masque = '0';
$A18_COL_Gps->m_nHauteur = 582;
$A18_COL_Gps->m_nLargeur = 100;
$A18_COL_Gps->m_nOpacite = 100;
$A18_COL_Gps->m_nCadrageVertical = -1;
$A18_COL_Gps->m_Police->m_bGras = false;
$A18_COL_Gps->m_Police->m_bItalique = false;
$A18_COL_Gps->m_Police->m_bSouligne = false;
$A18_COL_Gps->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A18_COL_Gps->m_Police->m_nTaille = '14px';
$A18_COL_Gps->m_nX = 0;
$A18_COL_Gps->m_nY = 0;
$A18_COL_Gps->m_clCouleurJauge = 0x000000;
$A18_COL_Gps->BoutonCalendrier = 0;
$A18_COL_Gps->EtatInitial = 0;
$A18_COL_Gps->VisibleInitial = 1;
$A18_COL_Gps->YInitial = 0;
$A18_COL_Gps->NombreColonne = 0;
$A18_COL_Gps->BulleTitre = '';
$A18_COL_Gps->JetonActif = false;
$A18_COL_Gps->JetonListeSeparateur = '';
$A18_COL_Gps->JetonAutoriseDoublon = false;
$A18_COL_Gps->JetonSupprimable = true;


$A18_COL_Gps->lierVM('PAGE_Administration','COL_Gps','A18_COL_Gps');
$A19_COL_Admin->Couleur = 0x69645F;
$A19_COL_Admin->CouleurInitiale = 0x69645F;
$A19_COL_Admin->Libelle = function_exists("construireTexteRiche_A19_COL_Admin") ? null : 'Admin';
$A19_COL_Admin->Masque = 0;
$A19_COL_Admin->m_nHauteur = 582;
$A19_COL_Admin->m_nLargeur = 100;
$A19_COL_Admin->m_nOpacite = 100;
$A19_COL_Admin->m_nCadrageHorizontal = -1;
$A19_COL_Admin->m_nCadrageVertical = -1;
$A19_COL_Admin->m_Police->m_bGras = false;
$A19_COL_Admin->m_Police->m_bItalique = false;
$A19_COL_Admin->m_Police->m_bSouligne = false;
$A19_COL_Admin->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A19_COL_Admin->m_Police->m_nTaille = '14px';
$A19_COL_Admin->m_nX = 0;
$A19_COL_Admin->m_nY = 0;
$A19_COL_Admin->m_clCouleurJauge = 0x000000;
$A19_COL_Admin->BoutonCalendrier = 0;
$A19_COL_Admin->EtatInitial = 0;
$A19_COL_Admin->VisibleInitial = 1;
$A19_COL_Admin->YInitial = 0;
$A19_COL_Admin->NombreColonne = 1;
$A19_COL_Admin->BulleTitre = '';
$A19_COL_Admin->JetonActif = false;
$A19_COL_Admin->JetonListeSeparateur = '';
$A19_COL_Admin->JetonAutoriseDoublon = false;
$A19_COL_Admin->JetonSupprimable = false;


$A19_COL_Admin->lierVM('PAGE_Administration','COL_Admin','A19_COL_Admin');


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
function& PAGE_Administration28()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Administration','PAGE_Administration');
	
	
	HLitPremier(getRef('Sites'),getRef(''));
	FichierVersEcran(VersPrimitif('PAGE_Administration'));
	return _return ($_PHP_VAR_RETURN_);
}
// Code de chaque affichage de page
//Clic sur BTN_valider (serveur) :: (PCode de Clic sur %1!s!)
function& A9_BTN_valider16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Administration','A9_BTN_valider');
	
	
	;
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_ADMINISTRATION','PAGE_Administration');
$A2_TABLE_Sites->SetSourceRemplissage("Sites", "IDSites", "", "", 1, "", 0);
$A1_TABLE_Sentinelle->SetSourceRemplissage("Sentinelle", "IDSentinelle", "", "", 1, "", 0);

// Code de déclaration des globales de page
function& PAGE_Administration0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Administration','PAGE_Administration');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_Administration
	PAGE_Administration0();


$A2_TABLE_Sites->InitRemplissage();
$A1_TABLE_Sentinelle->InitRemplissage();

// Code d'initialisation de page
	PAGE_Administration28();

}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_ADMINISTRATION','PAGE_Administration');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_ADMINISTRATION)){
$_BTNACTION = TrouveBouton( $PAGE_ADMINISTRATION );
if ($_BTNACTION=='A9') { 
//-------------------------------------------------------------------
//  PCodes de A9_BTN_valider
//-------------------------------------------------------------------
	A9_BTN_valider16();

}

}
if ( !bRenvoitCodeHTML($PAGE_ADMINISTRATION,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_Administration 04/02/2025 19:59 WEBDEV 28 28.0.459.4 --><html lang="fr" class="htmlstd html5">
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
<link rel="stylesheet" type="text/css" href="PAGE_Administration_style.css?1000023f54380">
<style type="text/css">
body{ position:relative;line-height:normal;height:auto; min-height:100%; color:#5f6469;} body{}html {background-color:#f8f9fa;position:relative;}#page{position:relative; background-color:#ffffff;}html {height:100%;overflow-x:hidden;} body,form {height:auto; min-height:100%;margin:0 auto !important;box-sizing:border-box;} .dzA4{width:100%;height:76px;;overflow-x:hidden;;overflow-y:hidden;position:relative;}
#b-A2{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}#lzA2{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#lzA2{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#lzA2{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#ttA3,.ttA3{font-size:11px;font-size:0.6875rem;border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#ttA3,.ttA3{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#ttA3,.ttA3{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#ttA20,.ttA20,#ttA5,.ttA5,#ttA6,.ttA6{font-size:11px;font-size:0.6875rem;border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#ttA20,.ttA20,#ttA5,.ttA5,#ttA6,.ttA6{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#ttA20,.ttA20,#ttA5,.ttA5,#ttA6,.ttA6{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#tzclzA2{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#tzclzA2{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#tzclzA2{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#tzdlzA2{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#tzdlzA2{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#tzdlzA2{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}.communbc-A3{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA3{}.communbc-A20{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA20{}.communbc-A5{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA5{}.communbc-A6{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA6{}#ctzA2 .Normal-Centre{font-size:12px;font-size:0.75rem;font-weight:bold;}#ctzA2 .wbPaire{font-size:11px;font-size:0.6875rem;}#ctzA2 .wbImpaire{font-size:11px;font-size:0.6875rem;}
#b-A1{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}#lzA1{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#lzA1{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#lzA1{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#ttA7,.ttA7{font-size:11px;font-size:0.6875rem;border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#ttA7,.ttA7{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#ttA7,.ttA7{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#ttA8,.ttA8,#ttA11,.ttA11,#ttA12,.ttA12,#ttA13,.ttA13,#ttA14,.ttA14,#ttA15,.ttA15,#ttA10,.ttA10,#ttA16,.ttA16,#ttA17,.ttA17,#ttA18,.ttA18,#ttA19,.ttA19{font-size:11px;font-size:0.6875rem;border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#ttA8,.ttA8,#ttA11,.ttA11,#ttA12,.ttA12,#ttA13,.ttA13,#ttA14,.ttA14,#ttA15,.ttA15,#ttA10,.ttA10,#ttA16,.ttA16,#ttA17,.ttA17,#ttA18,.ttA18,#ttA19,.ttA19{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#ttA8,.ttA8,#ttA11,.ttA11,#ttA12,.ttA12,#ttA13,.ttA13,#ttA14,.ttA14,#ttA15,.ttA15,#ttA10,.ttA10,#ttA16,.ttA16,#ttA17,.ttA17,#ttA18,.ttA18,#ttA19,.ttA19{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#tzclzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#tzclzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#tzclzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#tzdlzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#tzdlzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#tzdlzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}.communbc-A7{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA7{}.communbc-A8{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA8{}.communbc-A11{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA11{}.communbc-A12{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA12{}.communbc-A13{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA13{}.communbc-A14{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA14{}.communbc-A15{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA15{}.communbc-A10{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA10{}.communbc-A16{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA16{}.communbc-A17{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA17{}.communbc-A18{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA18{}.communbc-A19{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA19{}#ctzA1 .Normal-Centre{font-size:12px;font-size:0.75rem;font-weight:bold;}#ctzA1 .wbPaire{font-size:11px;font-size:0.6875rem;}#ctzA1 .wbImpaire{font-size:11px;font-size:0.6875rem;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_ADMINISTRATION',15,void 0)(event); " class="wbRwd"><form name="PAGE_ADMINISTRATION" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_ADMINISTRATION',18,void 0)(event); " method="post" class="clearfix"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_ADMINISTRATION->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value="A9"><input type="hidden" name="WD_ACTION_" value=""></div><div  class="clearfix pos1"><div  id="page" class="clearfix pos2" data-window-width="311" data-window-height="991" data-width="311" data-height="991" data-media="[{'query':'@media only all and (min-width: 312px)','attr':{'data-window-width':'312','data-window-height':'1386','data-width':'312','data-height':'1386'}},{'query':'@media only all and (min-width: 841px)','attr':{'data-window-width':'841','data-window-height':'2182','data-width':'841','data-height':'2182'}}]"><div  class="clearfix pos3"><div  class="clearfix pos4"><div class="lh0 dzSpan dzA4" id="dzA4" style=""><span style="position:absolute;top:0px;left:0px;width:100%;height:100%;"><img src="../ext/WhatsApp%20Image%202025-01-21%20at%2015.47.27.jpeg" alt="" id="A4" class="Image wbImgHomothetiqueModeAdapteCentre padding" style=" width:100%; height:76px;display:block;border:0;"></span></div></div><div  class="clearfix lh0 pos5"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_ADMINISTRATION',18,void 0)()){_JAEE(_PAGE_,'A9',16,2,48);} " id="A9" class="BTN-Defaut wblien bbox padding webdevclass-riche" style="width:100%;height:auto;min-height:18px;width:100%;height:auto;min-height:18px;display:inline-block;">Retour</button></div><div  class="clearfix pos6"><input type=hidden name="A2" value="<?php echo $A2_TABLE_Sites->Valeur ?>"><input type=hidden name="A2_DEB" value="<?php echo $A2_TABLE_Sites->GetFirstIndex()+1 ?>"><input type=hidden name="_A2_OCC" value="<?php echo $A2_TABLE_Sites->GetNbEnregAffiche() ?>"><INPUT TYPE="hidden" NAME="A2_FORMAT_2" VALUE="" onkeypress="return VerifSaisieNombre(event,'+999 999 999'); " onblur="reinitNombre(event,'+999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,11}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A2_FORMAT_2" class="A2_FORMAT_2 wbgrise padding" DISABLED autocomplete="off"><INPUT TYPE="hidden" NAME="A2_FORMAT_3" VALUE="" onkeypress="return VerifSaisieNombre(event,'+999 999 999'); " onblur="reinitNombre(event,'+999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,11}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A2_FORMAT_3" class="A2_FORMAT_3 wbgrise padding" DISABLED autocomplete="off"><table id="ctzA2" data-media="[{'query':'@media only all and (min-width: 312px)','attr':{'class':''}},{'query':'@media only all and (min-width: 841px)','attr':{'class':''}}]" style="border-spacing:0; width:100%;;" class="cellpadding0">
 <tr><td colspan=1  style="height:16px;" id="lzA2" class="aligncenter Normal-Centre padding">&nbsp;Sites</td><td></td></tr><tr style="border:0;height:0;" id="ttA2"><td id="tzclzA2" style="width:100%;border-bottom-width:0"><div style="overflow:hidden;position:relative;width:100%;"><table id="A2_TITRES_POS" style=" width:100%;"><tr id="A2_TITRES"><td id="ttA3" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A3:0px;" class="wbcolA3"><div id="A2_TITRES_0" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA3"><?php echo $A3_COL_Lieu->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A2_TITRES_TRI_0" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A2').OnTriColonne(0,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A2_TITRES_RECH_0" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA3"><div onmousedown="oGetObjetChamp('A2').OnRedimCol(event,0,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA20" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A20:0px;" class="wbcolA20"><div id="A2_TITRES_1" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA20"><?php echo $A20_COL_AB->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A2_TITRES_TRI_1" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A2').OnTriColonne(1,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A2_TITRES_RECH_1" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA20"><div onmousedown="oGetObjetChamp('A2').OnRedimCol(event,1,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA5" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A5:0px;" class="wbcolA5"><div id="A2_TITRES_2" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA5"><?php echo $A5_COL_Geolocalisation->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A2_TITRES_TRI_2" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A2').OnTriColonne(2,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A2_TITRES_RECH_2" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA5"><div onmousedown="oGetObjetChamp('A2').OnRedimCol(event,2,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA6" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A6:0px;" class="wbcolA6"><div id="A2_TITRES_3" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA6"><?php echo $A6_COL_Nn_sac->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A2_TITRES_TRI_3" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A2').OnTriColonne(3,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A2_TITRES_RECH_3" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA6"><div onmousedown="oGetObjetChamp('A2').OnRedimCol(event,3,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td></tr>
<tr style="border:0;height:0;"><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA3"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA3"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA20"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA20"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA5"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA5"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA6"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA6"></td></tr></table></div></td><td></td></tr>
<tr><td id="tzdlzA2" style="width:100%;border-top-width:0;"><div style="overflow-x:auto;overflow-y:hidden;width:100%;height:177px;position:relative;z-index:1"><div style="position:relative;width:100%" id="A2_POS"><table id="A2_TB" style=" width:100%;height:177px;"><!-- { thead :  { contenu :  [  { debut : "<tr style=\"border:0;height:0;\" id=\"ttA2\">",contenu :  [ "<td id=\"ttA3\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A3:0px;\" class=\"wbcolA3\"><div id=\"A2_TITRES_0\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA3\"><?php echo $A3_COL_Lieu->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A2_TITRES_TRI_0\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A2').OnTriColonne(0,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A2_TITRES_RECH_0\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA3\"><div onmousedown=\"oGetObjetChamp('A2').OnRedimCol(event,0,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA20\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A20:0px;\" class=\"wbcolA20\"><div id=\"A2_TITRES_1\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA20\"><?php echo $A20_COL_AB->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A2_TITRES_TRI_1\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A2').OnTriColonne(1,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A2_TITRES_RECH_1\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA20\"><div onmousedown=\"oGetObjetChamp('A2').OnRedimCol(event,1,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA5\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A5:0px;\" class=\"wbcolA5\"><div id=\"A2_TITRES_2\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA5\"><?php echo $A5_COL_Geolocalisation->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A2_TITRES_TRI_2\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A2').OnTriColonne(2,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A2_TITRES_RECH_2\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA5\"><div onmousedown=\"oGetObjetChamp('A2').OnRedimCol(event,2,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA6\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A6:0px;\" class=\"wbcolA6\"><div id=\"A2_TITRES_3\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA6\"><?php echo $A6_COL_Nn_sac->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A2_TITRES_TRI_3\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A2').OnTriColonne(3,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A2_TITRES_RECH_3\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA6\"><div onmousedown=\"oGetObjetChamp('A2').OnRedimCol(event,3,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" } , { debut : "<tr style=\"border:0;height:0;\">",contenu :  [ "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA3\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA3\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA20\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA20\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA5\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA5\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA6\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA6\"></td>", ] ,fin : "</tr>" }  ]  } ,tbody :  { contenu :  [  { debut : " <tr class=\"Lignes-Paires padding\" id=\"A2_[%_INDICE_%]\" style=\"visibility:hidden;height:23px\">",contenu :  [ "<td onclick=\"oGetObjetChamp('A2').OnSelectLigne([%_INDICE_%],0,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A3\" class=\"l-1 wbcolA3 communbc-A3 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA3\"><div id=\"A2_[%_INDICE_%]_0\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A2').OnRedimCol(event,0,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A2').OnSelectLigne([%_INDICE_%],1,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A20\" class=\"l-4 wbcolA20 communbc-A20 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA20\"><div id=\"A2_[%_INDICE_%]_1\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A2').OnRedimCol(event,1,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A2').OnSelectLigne([%_INDICE_%],2,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A5\" class=\"alignright l-7 wbcolA5 communbc-A5 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA5\"><div id=\"A2_[%_INDICE_%]_2\" style=\"padding-right:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A2').OnRedimCol(event,2,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A2').OnSelectLigne([%_INDICE_%],3,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A6\" class=\"alignright l-10 wbcolA6 communbc-A6 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA6\"><div id=\"A2_[%_INDICE_%]_3\" style=\"padding-right:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A2').OnRedimCol(event,3,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" }  ]  }  } --><tr><td></td></tr></table></div><table style="position:absolute;top:0;left:0;width:100%;border:solid 2px #dadce0;height:100%;visibility:hidden;z-index:100" id="A2_MASQUE"><tr><td class="aligncenter valignmiddle"><img src="res/timer240%20Material%20Design%202.gif" alt="none"></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;height:100%;visibility:hidden;z-index:101" id="A2_MASQUETR"><tr><td class="aligncenter valignmiddle"><!-- --></td></tr></table></div></td><td style="width:17px;height:177px;vertical-align:top"><div style="width:15px;"><div style="position:absolute;overflow-x:hidden;width:17px;height:177px;"><div style="position:absolute;left:-5px;width:20px;height:177px;overflow-x:hidden;overflow-y:auto"><div style="width:1px;height:1px;overflow:hidden" id="A2_SB"></div></div></div></div></td></tr>
</table></div><div  class="clearfix pos7"><input type=hidden name="A1" value="<?php echo $A1_TABLE_Sentinelle->Valeur ?>"><input type=hidden name="A1_DEB" value="<?php echo $A1_TABLE_Sentinelle->GetFirstIndex()+1 ?>"><input type=hidden name="_A1_OCC" value="<?php echo $A1_TABLE_Sentinelle->GetNbEnregAffiche() ?>"><INPUT TYPE="hidden" NAME="A1_FORMAT_5" VALUE="" onkeypress="return PremiereLettreMaj(event); " onblur="reinit(event,''); " onfocus="var b=(this.value.length==0);init(event,'');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A1_FORMAT_5" class="A1_FORMAT_5 wbgrise padding" DISABLED autocomplete="off"><table id="ctzA1" data-media="[{'query':'@media only all and (min-width: 312px)','attr':{'class':''}},{'query':'@media only all and (min-width: 841px)','attr':{'class':''}}]" style="border-spacing:0; width:100%;; height:100%;" class="cellpadding0">
 <tr><td colspan=1  style="height:16px;" id="lzA1" class="aligncenter Normal-Centre padding">&nbsp;Sentinelle</td><td></td></tr><tr style="border:0;height:0;" id="ttA1"><td id="tzclzA1" style="width:100%;border-bottom-width:0"><div style="overflow:hidden;position:relative;width:100%;"><table id="A1_TITRES_POS" style=" width:100%;"><tr id="A1_TITRES"><td id="ttA7" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A7:0px;" class="wbcolA7"><div id="A1_TITRES_0" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA7"><?php echo $A7_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_0" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(0,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_0" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA7"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,0,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA8" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A8:0px;" class="wbcolA8"><div id="A1_TITRES_1" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA8"><?php echo $A8_COL_Prenom->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_1" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(1,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_1" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA8"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,1,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA11" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A11:0px;" class="wbcolA11"><div id="A1_TITRES_2" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA11"><?php echo $A11_COL_Adresse->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_2" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(2,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_2" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA11"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,2,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA12" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A12:0px;" class="wbcolA12"><div id="A1_TITRES_3" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA12"><?php echo $A12_COL_CP->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_3" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(3,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_3" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA12"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,3,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA13" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A13:0px;" class="wbcolA13"><div id="A1_TITRES_4" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA13"><?php echo $A13_COL_Ville->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_4" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(4,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_4" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA13"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,4,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA14" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A14:0px;" class="wbcolA14"><div id="A1_TITRES_5" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA14"><?php echo $A14_COL_Mdp->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_5" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(5,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_5" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA14"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,5,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA15" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A15:0px;" class="wbcolA15"><div id="A1_TITRES_6" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA15"><?php echo $A15_COL_Login->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_6" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(6,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_6" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA15"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,6,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA10" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A10:0px;" class="wbcolA10"><div id="A1_TITRES_7" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA10"><?php echo $A10_COL_Maim->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_7" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(7,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_7" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA10"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,7,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA16" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A16:0px;" class="wbcolA16"><div id="A1_TITRES_8" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA16"><?php echo $A16_COL_Expert->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_8" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(8,event)" alt="none"></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA16"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,8,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA17" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A17:0px;" class="wbcolA17"><div id="A1_TITRES_9" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA17"><?php echo $A17_COL_Benevol->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_9" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(9,event)" alt="none"></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA17"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,9,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA18" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A18:0px;" class="wbcolA18"><div id="A1_TITRES_10" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA18"><?php echo $A18_COL_Gps->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_10" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(10,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_10" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA18"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,10,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td><td id="ttA19" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A19:0px;" class="wbcolA19"><div id="A1_TITRES_11" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:13px;" class="Titre-Colonne ttA19"><?php echo $A19_COL_Admin->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_11" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(11,event)" alt="none"></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA19"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,11,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px"><!-- --></div></td></tr>
<tr style="border:0;height:0;"><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA7"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA7"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA8"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA8"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA11"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA11"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA12"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA12"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA13"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA13"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA14"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA14"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA15"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA15"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA10"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA10"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA16"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA16"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA17"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA17"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA18"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA18"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA19"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA19"></td></tr></table></div></td><td></td></tr>
<tr style="height:100%;"><td id="tzdlzA1" style="width:100%;border-top-width:0;"><div style="overflow-x:auto;overflow-y:hidden;width:100%;height:100%;position:relative;z-index:1"><div style="position:relative;width:100%" id="A1_POS"><table id="A1_TB" style=" width:100%;"><!-- { thead :  { contenu :  [  { debut : "<tr style=\"border:0;height:0;\" id=\"ttA1\">",contenu :  [ "<td id=\"ttA7\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A7:0px;\" class=\"wbcolA7\"><div id=\"A1_TITRES_0\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA7\"><?php echo $A7_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_0\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(0,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_0\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA7\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,0,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA8\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A8:0px;\" class=\"wbcolA8\"><div id=\"A1_TITRES_1\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA8\"><?php echo $A8_COL_Prenom->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_1\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(1,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_1\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA8\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,1,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA11\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A11:0px;\" class=\"wbcolA11\"><div id=\"A1_TITRES_2\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA11\"><?php echo $A11_COL_Adresse->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_2\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(2,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_2\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA11\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,2,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA12\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A12:0px;\" class=\"wbcolA12\"><div id=\"A1_TITRES_3\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA12\"><?php echo $A12_COL_CP->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_3\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(3,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_3\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA12\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,3,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA13\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A13:0px;\" class=\"wbcolA13\"><div id=\"A1_TITRES_4\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA13\"><?php echo $A13_COL_Ville->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_4\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(4,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_4\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA13\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,4,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA14\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A14:0px;\" class=\"wbcolA14\"><div id=\"A1_TITRES_5\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA14\"><?php echo $A14_COL_Mdp->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_5\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(5,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_5\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA14\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,5,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA15\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A15:0px;\" class=\"wbcolA15\"><div id=\"A1_TITRES_6\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA15\"><?php echo $A15_COL_Login->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_6\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(6,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_6\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA15\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,6,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA10\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A10:0px;\" class=\"wbcolA10\"><div id=\"A1_TITRES_7\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA10\"><?php echo $A10_COL_Maim->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_7\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(7,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_7\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA10\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,7,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA16\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A16:0px;\" class=\"wbcolA16\"><div id=\"A1_TITRES_8\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA16\"><?php echo $A16_COL_Expert->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_8\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(8,event)\" alt=\"none\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA16\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,8,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA17\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A17:0px;\" class=\"wbcolA17\"><div id=\"A1_TITRES_9\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA17\"><?php echo $A17_COL_Benevol->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_9\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(9,event)\" alt=\"none\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA17\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,9,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA18\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A18:0px;\" class=\"wbcolA18\"><div id=\"A1_TITRES_10\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA18\"><?php echo $A18_COL_Gps->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_10\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(10,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_10\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA18\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,10,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>" , "<td id=\"ttA19\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A19:0px;\" class=\"wbcolA19\"><div id=\"A1_TITRES_11\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:13px;\" class=\"Titre-Colonne ttA19\"><?php echo $A19_COL_Admin->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_11\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(11,event)\" alt=\"none\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA19\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,11,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:23px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" } , { debut : "<tr style=\"border:0;height:0;\">",contenu :  [ "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA7\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA7\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA8\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA8\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA11\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA11\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA12\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA12\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA13\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA13\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA14\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA14\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA15\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA15\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA10\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA10\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA16\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA16\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA17\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA17\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA18\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA18\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA19\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA19\"></td>", ] ,fin : "</tr>" }  ]  } ,tbody :  { contenu :  [  { debut : " <tr class=\"Lignes-Paires padding\" id=\"A1_[%_INDICE_%]\" style=\"visibility:hidden;height:23px\">",contenu :  [ "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],0,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A7\" class=\"l-14 wbcolA7 communbc-A7 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA7\"><div id=\"A1_[%_INDICE_%]_0\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,0,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],1,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A8\" class=\"l-17 wbcolA8 communbc-A8 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA8\"><div id=\"A1_[%_INDICE_%]_1\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,1,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],2,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A11\" class=\"l-20 wbcolA11 communbc-A11 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA11\"><div id=\"A1_[%_INDICE_%]_2\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,2,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],3,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A12\" class=\"l-23 wbcolA12 communbc-A12 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA12\"><div id=\"A1_[%_INDICE_%]_3\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,3,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],4,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A13\" class=\"l-26 wbcolA13 communbc-A13 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA13\"><div id=\"A1_[%_INDICE_%]_4\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,4,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],5,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A14\" class=\"l-29 wbcolA14 communbc-A14 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA14\"><div id=\"A1_[%_INDICE_%]_5\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,5,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],6,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A15\" class=\"l-32 wbcolA15 communbc-A15 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA15\"><div id=\"A1_[%_INDICE_%]_6\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,6,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],7,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A10\" class=\"l-35 wbcolA10 communbc-A10 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA10\"><div id=\"A1_[%_INDICE_%]_7\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,7,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],8,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A16\" class=\"l-38 wbcolA16 communbc-A16 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA16\"><div id=\"A1_[%_INDICE_%]_8\" style=\"text-align:center;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,8,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],9,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A17\" class=\"l-41 wbcolA17 communbc-A17 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA17\"><div id=\"A1_[%_INDICE_%]_9\" style=\"text-align:center;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,9,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],10,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A18\" class=\"l-44 wbcolA18 communbc-A18 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA18\"><div id=\"A1_[%_INDICE_%]_10\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,10,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],11,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A19\" class=\"l-47 wbcolA19 communbc-A19 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA19\"><div id=\"A1_[%_INDICE_%]_11\" style=\"text-align:center;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,11,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" }  ]  }  } --><tr><td></td></tr></table></div><table style="position:absolute;top:0;left:0;width:100%;border:solid 2px #dadce0;height:100%;visibility:hidden;z-index:100" id="A1_MASQUE"><tr><td class="aligncenter valignmiddle"><img src="res/timer240%20Material%20Design%202.gif" alt="none"></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;height:100%;visibility:hidden;z-index:101" id="A1_MASQUETR"><tr><td class="aligncenter valignmiddle"><!-- --></td></tr></table></div></td><td style="width:17px;vertical-align:top"><div style="width:15px;height:100%;position:relative;"><div style="position:absolute;overflow-x:hidden;width:17px;height:100%;"><div style="position:absolute;left:-5px;width:20px;height:539px;overflow-x:hidden;overflow-y:auto"><div style="width:1px;height:1px;overflow:hidden" id="A1_SB"></div></div></div></div></td></tr>
</table></div></div></div></div><?php function construireTexteRiche_A19_COL_Admin($j){ global $A19_COL_Admin,$A19_COL_Admin,$A1_TABLE_Sentinelle;$s="Admin";return $s;}function construireTexteRiche_A18_COL_Gps($j){ global $A18_COL_Gps,$A18_COL_Gps,$A1_TABLE_Sentinelle;$s="GPS";return $s;}function construireTexteRiche_A17_COL_Benevol($j){ global $A17_COL_Benevol,$A17_COL_Benevol,$A1_TABLE_Sentinelle;$s="Bénévole";return $s;}function construireTexteRiche_A16_COL_Expert($j){ global $A16_COL_Expert,$A16_COL_Expert,$A1_TABLE_Sentinelle;$s="Référent";return $s;}function construireTexteRiche_A10_COL_Maim($j){ global $A10_COL_Maim,$A10_COL_Maim,$A1_TABLE_Sentinelle;$s="Maim";return $s;}function construireTexteRiche_A15_COL_Login($j){ global $A15_COL_Login,$A15_COL_Login,$A1_TABLE_Sentinelle;$s="Login";return $s;}function construireTexteRiche_A14_COL_Mdp($j){ global $A14_COL_Mdp,$A14_COL_Mdp,$A1_TABLE_Sentinelle;$s="Mot de passe";return $s;}function construireTexteRiche_A13_COL_Ville($j){ global $A13_COL_Ville,$A13_COL_Ville,$A1_TABLE_Sentinelle;$s="Ville";return $s;}function construireTexteRiche_A12_COL_CP($j){ global $A12_COL_CP,$A12_COL_CP,$A1_TABLE_Sentinelle;$s="Code postal";return $s;}function construireTexteRiche_A11_COL_Adresse($j){ global $A11_COL_Adresse,$A11_COL_Adresse,$A1_TABLE_Sentinelle;$s="Adresse";return $s;}function construireTexteRiche_A8_COL_Prenom($j){ global $A8_COL_Prenom,$A8_COL_Prenom,$A1_TABLE_Sentinelle;$s="Prénom";return $s;}function construireTexteRiche_A7_COL_Nom($j){ global $A7_COL_Nom,$A7_COL_Nom,$A1_TABLE_Sentinelle;$s="Nom";return $s;}function construireTexteRiche_A6_COL_Nn_sac($j){ global $A6_COL_Nn_sac,$A6_COL_Nn_sac,$A2_TABLE_Sites;$s="Nombre de sac";return $s;}function construireTexteRiche_A5_COL_Geolocalisation($j){ global $A5_COL_Geolocalisation,$A5_COL_Geolocalisation,$A2_TABLE_Sites;$s="Géolocalisation";return $s;}function construireTexteRiche_A20_COL_AB($j){ global $A20_COL_AB,$A20_COL_AB,$A2_TABLE_Sites;$s="Abréviation";return $s;}function construireTexteRiche_A3_COL_Lieu($j){ global $A3_COL_Lieu,$A3_COL_Lieu,$A2_TABLE_Sites;$s="Lieu du site";return $s;} ?>
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
<script type="text/javascript" src="./res/WD.js?3002cbe23185d"></script>
<script type="text/javascript">
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJ4X3Bjc29mdF9ub21fbG9naXF1ZSI6IlBBR0VfQWRtaW5pc3RyYXRpb24iLCJ4X3Bjc29mdF90eXBlX2xvZ2lxdWUiOiI2NTUzOCIsInhfcGNzb2Z0X2lkX2Vuc2VtYmxlIjoiNTE1NjU3MzQxMzg3MDk5NjEzOSIsIm1hcHBpbmdzIjoiQSJ9
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/LES_SENTINELLES_DE_LA_MER_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _WW_SEPMILLIER_="<?php echo ($_gszSEPMIL) ?>";
var _WW_SEPDECIMAL_="<?php echo ($_gszSEPDEC) ?>";
var _PHPID_="<?php echo session_name() . '=' . session_id(); ?>";
var _PU_="PAGE-Administration.php";
var _PAGE_=document["PAGE_ADMINISTRATION"];
clWDUtil.DeclareChamp("A2",void 0,void 0,void 0,WDTable,["<?php echo $A2_TABLE_Sites->pszGetAjaxInitInline(); ?>",0,23,2,4,1,["Lignes-Paires wbImpaire","Lignes-Paires wbPaire","Selection"],[["res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Sorting_Increasing240_Material_Design_2Material_Blue_2.png","res/TABLE_Sorting_Decreasing240_Material_Design_2Material_Blue_2.png"],["res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Search_Hover240_Material_Design_2Material_Blue_2.png","res/TABLE_Search_Active240_Material_Design_2Material_Blue_2.png"],["res/TABLE_Filter_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Filter_Hover240_Material_Design_2Material_Blue_2.png","res/TABLE_Filter_Active240_Material_Design_2Material_Blue_2.png"],["./res/TableDeplaceDroite.png","./res/TableDeplaceGauche.png"]],true,0],true,true);
clWDUtil.DeclareChamp("A1",void 0,void 0,void 0,WDTable,["<?php echo $A1_TABLE_Sentinelle->pszGetAjaxInitInline(); ?>",0,23,2,4,1,["Lignes-Paires wbImpaire","Lignes-Paires wbPaire","Selection"],[["res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Sorting_Increasing240_Material_Design_2Material_Blue_2.png","res/TABLE_Sorting_Decreasing240_Material_Design_2Material_Blue_2.png"],["res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Search_Hover240_Material_Design_2Material_Blue_2.png","res/TABLE_Search_Active240_Material_Design_2Material_Blue_2.png"],["res/TABLE_Filter_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Filter_Hover240_Material_Design_2Material_Blue_2.png","res/TABLE_Filter_Active240_Material_Design_2Material_Blue_2.png"],["./res/TableDeplaceDroite.png","./res/TableDeplaceGauche.png"]],true,0],true,true);
NSPCS.NSWDW.SetDeclaration("DAAAAAEAAAABAAAABAAAAAAAAAAIAAAAAAAAAA==");
<!--
var _COL={0:"#ffffff",5:"#e8f0fe",9:"#f5cbc8",10:"#5f6469",15:"#2979ff",16:"#dadce0",21:"#f8f8f8",66:"#d93025"};
function _GET_A5_1_I_C(){return clWDUtil.sWLVersNumerique(arguments[0],_WW_SEPDECIMAL_);}
function _SET_A5_1_I_C(){return __reinitNombre(clWDUtil.sNumeriqueVersWL(arguments[0],_WW_SEPDECIMAL_),"+999 999 999",false);}
function _GET_A6_1_I_C(){return clWDUtil.sWLVersNumerique(arguments[0],_WW_SEPDECIMAL_);}
function _SET_A6_1_I_C(){return __reinitNombre(clWDUtil.sNumeriqueVersWL(arguments[0],_WW_SEPDECIMAL_),"+999 999 999",false);}
function _GET_A14_1_I_C(){return arguments[0];}
function _SET_A14_1_I_C(){return arguments[0];}
clWDUtil.DeclareTraitementEx("PAGE_ADMINISTRATION",true,[15,function(event){clWDUtil.pfGetTraitement("PAGE_ADMINISTRATION",15,"_COM")(event);var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,0);{void 0;}},void 0,true,18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_ADMINISTRATION",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript">var bPCSFR=true;</script><script type="text/javascript" src="res/WDLIB.JS?20007a4537def"></script><script type="text/javascript" src="res/jquery-3.js?2000086c54b0a"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-ie.js?2000372e64bb0"></script><script type="text/javascript" src="res/jquery-ui.js?20006598c0fa6"></script><script type="text/javascript" src="res/jquery-effet.js?20004374c605b"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200051bfcee3e"></script><style type="text/css">.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}@media only all and (min-width: 312px){.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}}@media only all and (min-width: 841px){.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ delay : 1000,	items: "[title]:not(iframe,svg)", position : {my: 'left top+20',collision: 'flip'},	track : false, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); ui.tooltip.position( { my: 'left+15 center', at: 'right center', of : event} ); },content: function(callback) { callback($(this).prop('title').replace(/\n/g, '\x3Cbr /\x3E')); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><script type="text/javascript">if (bOpr) document.getElementsByTagName("head")[0].innerHTML+='\x3cstyle type="text/css"\x3e.wbtablesep{position:static !important;}\x3c/style\x3e';</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_95=ob_get_contents();ob_end_clean();echo tidyHTML(_cp1252_to_utf8($_PHP_VAR_TMP_95)); ?>