<?php
//#28.0.380.0 Les sentinelles de la mer
ob_start();if (!defined('UNICODE_PAGE_UTF8')) define('UNICODE_PAGE_UTF8',false);
$gszId='Les sentinelles de la mer	PAGE_PARTICIPENT	20250204195930';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD28.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CImage');
IHM_Include('CTableAjax');
IHM_Include('CSaisieNumerique');
IHM_Include('CSaisieDate');
IHM_Include('CSaisie');
IHM_Include('CBouton');


Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
WB_Include('HF.php');
WB_Include('WL/HF/HF.php');
WB_Include('IHM/Champ/Liste/Table/Table.php');
WB_Include('Engine.php');
// Equivalent de [%URL()%]
$gszURL='PAGE-Participent.php';
$j=1;$i=1;
if (!isset($_SESSION)) session_start();
// protection contre register_globals = on
unset($PAGE_PARTICIPENT);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(0,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gtabCheminPage['PAGE_ADMINISTRATION']=array(5=>array('NOM'=>'PAGE-Administration','URL'=>'./'));
$gszCheminPageInverse='./';
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
RechargementPageSiBesoin('PAGE_PARTICIPENT');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_PARTICIPENT']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_PARTICIPENT= $gTabVarSession['PAGE_PARTICIPENT'];
	$PAGE_PARTICIPENT->WB_RestaureContexte();
$MaPage =& $PAGE_PARTICIPENT;
$GLOBALS['PAGE_Participent'] =& $MaPage;
if (isset($gnIndiceAgencement) && $gnIndiceAgencement !== $MaPage->m_nIndiceAgencementCourant)
{

}
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_PARTICIPENT)) {
$PAGE_PARTICIPENT= new CPage(false);
$PAGE_PARTICIPENT->Nom = 'PAGE_Participent';
$PAGE_PARTICIPENT->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_PARTICIPENT->Alias = 'PAGE_PARTICIPENT';
$PAGE_PARTICIPENT->m_sNomPHP = 'PAGE_PARTICIPENT';
$PAGE_PARTICIPENT->Libelle = 'sites';
$PAGE_PARTICIPENT->bUTF8 = true;
$PAGE_PARTICIPENT->bHTML5 = true;
$PAGE_PARTICIPENT->bAvecContexte = true;
$PAGE_PARTICIPENT->sFichierPalette = '.\\res\\Material Blue 2.wpc';
$PAGE_PARTICIPENT->Plan = 1;
$PAGE_PARTICIPENT->ImageFond = '';
$MaPage =& $PAGE_PARTICIPENT;
$GLOBALS['PAGE_Participent'] =& $MaPage;
$A4_IMG_SansNom1=&CreerChamp('CImage',292,76,16447992);$PAGE_PARTICIPENT->WB_AjouteChamp('IMG_SansNom1','A4',$A4_IMG_SansNom1,'A4_IMG_SansNom1');
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

$A1_TABLE_REQ_participent_plng=&CreerChamp('CTableAjax');$PAGE_PARTICIPENT->WB_AjouteChamp('TABLE_REQ_participent_plng','A1',$A1_TABLE_REQ_participent_plng,'A1_TABLE_REQ_participent_plng');
$A1_TABLE_REQ_participent_plng->m_bHauteurLigneVariable=true;
$A1_TABLE_REQ_participent_plng->m_nNbColonnesOuAttributs=4;
$A1_TABLE_REQ_participent_plng->SetMaxLignePage(10);
$A1_TABLE_REQ_participent_plng->SetFirstIndex(0);
$A1_TABLE_REQ_participent_plng->Visible=1;
$A1_TABLE_REQ_participent_plng->Etat=0;
$A1_TABLE_REQ_participent_plng->nModeSelection=1;

$A2_COL_IDPLANING=&CreerChamp('CSaisieNumerique');$PAGE_PARTICIPENT->WB_AjouteChamp('COL_IDPLANING','A2',$A2_COL_IDPLANING,'A2_COL_IDPLANING');
$A1_TABLE_REQ_participent_plng->AjouteColonne('A2_COL_IDPLANING','COL_IDPLANING','A2', 5601, 0,'REQ_participent_plng','IDPLANING');
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->ChampFormat->Masque='999 999 999 999 999';
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->Visible=1;
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->Etat=0;
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->bColonneLien=0;
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->SetTriable(true);
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->SetAvecLoupe(true);
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->m_bAvecFiltre=true;
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->m_nFiltreEncours=31980;
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->m_eDeplaceInsere = 4;
$A1_TABLE_REQ_participent_plng->TabColonnes[1]->m_sBulle='';
$A2_COL_IDPLANING->m_eAction=6;
$A2_COL_IDPLANING->m_sPageAction='';
$A2_COL_IDPLANING->m_bLibelleRiche=true;

$A3_COL_DATE=&CreerChamp('CSaisieDate');$PAGE_PARTICIPENT->WB_AjouteChamp('COL_DATE','A3',$A3_COL_DATE,'A3_COL_DATE');
$A1_TABLE_REQ_participent_plng->AjouteColonne('A3_COL_DATE','COL_DATE','A3', 5602, 1,'REQ_participent_plng','DATE');
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->ChampFormat->Masque='JJ/MM/AAAA';
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->ChampFormat->FormatMemorise='AAAAMMJJ';
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->Visible=1;
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->Etat=0;
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->bColonneLien=0;
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->SetTriable(true);
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->SetAvecLoupe(true);
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->m_bAvecFiltre=true;
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->m_nFiltreEncours=31980;
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->m_eDeplaceInsere = 4;
$A1_TABLE_REQ_participent_plng->TabColonnes[2]->m_sBulle='';
$A3_COL_DATE->m_eAction=6;
$A3_COL_DATE->m_sPageAction='';
$A3_COL_DATE->m_bLibelleRiche=true;

$A5_COL_IDPLANING_PL=&CreerChamp('CSaisieNumerique');$PAGE_PARTICIPENT->WB_AjouteChamp('COL_IDPLANING_PL','A5',$A5_COL_IDPLANING_PL,'A5_COL_IDPLANING_PL');
$A1_TABLE_REQ_participent_plng->AjouteColonne('A5_COL_IDPLANING_PL','COL_IDPLANING_PL','A5', 5601, 2,'REQ_participent_plng','IDPLANING_PL');
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->ChampFormat->Masque='999 999 999 999 999';
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->Visible=1;
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->Etat=0;
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->bColonneLien=0;
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->SetTriable(true);
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->SetAvecLoupe(true);
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->m_bAvecFiltre=true;
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->m_nFiltreEncours=31980;
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->m_eDeplaceInsere = 4;
$A1_TABLE_REQ_participent_plng->TabColonnes[3]->m_sBulle='';
$A5_COL_IDPLANING_PL->m_eAction=6;
$A5_COL_IDPLANING_PL->m_sPageAction='';
$A5_COL_IDPLANING_PL->m_bLibelleRiche=true;

$A6_COL_Nom=&CreerChamp('CSaisie');$PAGE_PARTICIPENT->WB_AjouteChamp('COL_Nom','A6',$A6_COL_Nom,'A6_COL_Nom');
$A1_TABLE_REQ_participent_plng->AjouteColonne('A6_COL_Nom','COL_Nom','A6', 5600, 3,'REQ_participent_plng','Nom');
$A1_TABLE_REQ_participent_plng->TabColonnes[4]->Visible=1;
$A1_TABLE_REQ_participent_plng->TabColonnes[4]->Etat=0;
$A1_TABLE_REQ_participent_plng->TabColonnes[4]->bColonneLien=0;
$A1_TABLE_REQ_participent_plng->TabColonnes[4]->SetTriable(true);
$A1_TABLE_REQ_participent_plng->TabColonnes[4]->SetAvecLoupe(true);
$A1_TABLE_REQ_participent_plng->TabColonnes[4]->m_bAvecFiltre=true;
$A1_TABLE_REQ_participent_plng->TabColonnes[4]->m_nFiltreEncours=31980;
$A1_TABLE_REQ_participent_plng->TabColonnes[4]->m_eDeplaceInsere = 4;
$A1_TABLE_REQ_participent_plng->TabColonnes[4]->m_sBulle='';
$A6_COL_Nom->m_eAction=6;
$A6_COL_Nom->m_sPageAction='';
$A6_COL_Nom->m_bLibelleRiche=true;

$A7_BTN_SansNom1=&CreerChamp('CBouton');$PAGE_PARTICIPENT->WB_AjouteChamp('BTN_SansNom1','A7',$A7_BTN_SansNom1,'A7_BTN_SansNom1');
$A7_BTN_SansNom1->m_bLibelleRiche=true;

$A8_BTN_SansNom2=&CreerChamp('CBouton');$PAGE_PARTICIPENT->WB_AjouteChamp('BTN_SansNom2','A8',$A8_BTN_SansNom2,'A8_BTN_SansNom2');
$A8_BTN_SansNom2->m_bLibelleRiche=true;



//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------
$A4_IMG_SansNom1->Valeur = '../ext/WhatsApp Image 2025-01-21 at 15.47.27.jpeg';
$A4_IMG_SansNom1->JetonActif = false;


$A4_IMG_SansNom1->lierVM('PAGE_Participent','IMG_SansNom1','A4_IMG_SansNom1');
$A1_TABLE_REQ_participent_plng->Valeur = '';
$A1_TABLE_REQ_participent_plng->Libelle = ' REQ_participent_plng';
$A1_TABLE_REQ_participent_plng->m_nHauteur = 316;
$A1_TABLE_REQ_participent_plng->m_nLargeur = 299;
$A1_TABLE_REQ_participent_plng->m_nOpacite = 100;
$A1_TABLE_REQ_participent_plng->m_Police->m_bGras = false;
$A1_TABLE_REQ_participent_plng->m_Police->m_bItalique = false;
$A1_TABLE_REQ_participent_plng->m_Police->m_bSouligne = false;
$A1_TABLE_REQ_participent_plng->m_nX = 6;
$A1_TABLE_REQ_participent_plng->m_nY = 100;
$A1_TABLE_REQ_participent_plng->m_clCouleurJauge = 0x000000;
$A1_TABLE_REQ_participent_plng->BoutonCalendrier = 0;
$A1_TABLE_REQ_participent_plng->EtatInitial = 0;
$A1_TABLE_REQ_participent_plng->VisibleInitial = 1;
$A1_TABLE_REQ_participent_plng->YInitial = 0;
$A1_TABLE_REQ_participent_plng->NombreColonne = 4;
$A1_TABLE_REQ_participent_plng->BulleTitre = '';
$A1_TABLE_REQ_participent_plng->JetonActif = false;
$A1_TABLE_REQ_participent_plng->JetonListeSeparateur = '';
$A1_TABLE_REQ_participent_plng->JetonAutoriseDoublon = false;
$A1_TABLE_REQ_participent_plng->JetonSupprimable = false;


$A1_TABLE_REQ_participent_plng->lierVM('PAGE_Participent','TABLE_REQ_participent_plng','A1_TABLE_REQ_participent_plng');
$A2_COL_IDPLANING->Couleur = 0x69645F;
$A2_COL_IDPLANING->CouleurInitiale = 0x69645F;
$A2_COL_IDPLANING->Libelle = function_exists("construireTexteRiche_A2_COL_IDPLANING") ? null : 'Identifiant de PLANING';
$A2_COL_IDPLANING->Masque = '999 999 999 999 999';
$A2_COL_IDPLANING->m_nHauteur = 316;
$A2_COL_IDPLANING->m_nLargeur = 271;
$A2_COL_IDPLANING->m_nOpacite = 100;
$A2_COL_IDPLANING->m_nCadrageHorizontal = -1;
$A2_COL_IDPLANING->m_nCadrageVertical = -1;
$A2_COL_IDPLANING->m_Police->m_bGras = false;
$A2_COL_IDPLANING->m_Police->m_bItalique = false;
$A2_COL_IDPLANING->m_Police->m_bSouligne = false;
$A2_COL_IDPLANING->m_nX = 0;
$A2_COL_IDPLANING->m_nY = 0;
$A2_COL_IDPLANING->m_clCouleurJauge = 0x000000;
$A2_COL_IDPLANING->BoutonCalendrier = 0;
$A2_COL_IDPLANING->EtatInitial = 0;
$A2_COL_IDPLANING->VisibleInitial = 1;
$A2_COL_IDPLANING->YInitial = 0;
$A2_COL_IDPLANING->NombreColonne = 0;
$A2_COL_IDPLANING->BulleTitre = '';
$A2_COL_IDPLANING->JetonActif = false;
$A2_COL_IDPLANING->JetonListeSeparateur = '';
$A2_COL_IDPLANING->JetonAutoriseDoublon = false;
$A2_COL_IDPLANING->JetonSupprimable = true;


$A2_COL_IDPLANING->lierVM('PAGE_Participent','COL_IDPLANING','A2_COL_IDPLANING');
$A3_COL_DATE->Couleur = 0x69645F;
$A3_COL_DATE->CouleurInitiale = 0x69645F;
$A3_COL_DATE->Libelle = function_exists("construireTexteRiche_A3_COL_DATE") ? null : 'Date';
$A3_COL_DATE->Masque = 'JJ/MM/AAAA';
$A3_COL_DATE->m_nHauteur = 316;
$A3_COL_DATE->m_nLargeur = 100;
$A3_COL_DATE->m_nOpacite = 100;
$A3_COL_DATE->m_nCadrageHorizontal = 2;
$A3_COL_DATE->m_nCadrageVertical = -1;
$A3_COL_DATE->m_Police->m_bGras = false;
$A3_COL_DATE->m_Police->m_bItalique = false;
$A3_COL_DATE->m_Police->m_bSouligne = false;
$A3_COL_DATE->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A3_COL_DATE->m_Police->m_nTaille = '14px';
$A3_COL_DATE->m_nX = 0;
$A3_COL_DATE->m_nY = 0;
$A3_COL_DATE->m_clCouleurJauge = 0x000000;
$A3_COL_DATE->BoutonCalendrier = 0;
$A3_COL_DATE->EtatInitial = 0;
$A3_COL_DATE->VisibleInitial = 1;
$A3_COL_DATE->YInitial = 0;
$A3_COL_DATE->NombreColonne = 0;
$A3_COL_DATE->BulleTitre = '';
$A3_COL_DATE->JetonActif = false;
$A3_COL_DATE->JetonListeSeparateur = '';
$A3_COL_DATE->JetonAutoriseDoublon = false;
$A3_COL_DATE->JetonSupprimable = true;


$A3_COL_DATE->lierVM('PAGE_Participent','COL_DATE','A3_COL_DATE');
$A5_COL_IDPLANING_PL->Couleur = 0x69645F;
$A5_COL_IDPLANING_PL->CouleurInitiale = 0x69645F;
$A5_COL_IDPLANING_PL->Libelle = function_exists("construireTexteRiche_A5_COL_IDPLANING_PL") ? null : 'Identifiant de PLANING';
$A5_COL_IDPLANING_PL->Masque = '999 999 999 999 999';
$A5_COL_IDPLANING_PL->m_nHauteur = 316;
$A5_COL_IDPLANING_PL->m_nLargeur = 100;
$A5_COL_IDPLANING_PL->m_nOpacite = 100;
$A5_COL_IDPLANING_PL->m_nCadrageHorizontal = 2;
$A5_COL_IDPLANING_PL->m_nCadrageVertical = -1;
$A5_COL_IDPLANING_PL->m_Police->m_bGras = false;
$A5_COL_IDPLANING_PL->m_Police->m_bItalique = false;
$A5_COL_IDPLANING_PL->m_Police->m_bSouligne = false;
$A5_COL_IDPLANING_PL->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A5_COL_IDPLANING_PL->m_Police->m_nTaille = '14px';
$A5_COL_IDPLANING_PL->m_nX = 0;
$A5_COL_IDPLANING_PL->m_nY = 0;
$A5_COL_IDPLANING_PL->m_clCouleurJauge = 0x000000;
$A5_COL_IDPLANING_PL->BoutonCalendrier = 0;
$A5_COL_IDPLANING_PL->EtatInitial = 0;
$A5_COL_IDPLANING_PL->VisibleInitial = 1;
$A5_COL_IDPLANING_PL->YInitial = 0;
$A5_COL_IDPLANING_PL->NombreColonne = 0;
$A5_COL_IDPLANING_PL->BulleTitre = '';
$A5_COL_IDPLANING_PL->JetonActif = false;
$A5_COL_IDPLANING_PL->JetonListeSeparateur = '';
$A5_COL_IDPLANING_PL->JetonAutoriseDoublon = false;
$A5_COL_IDPLANING_PL->JetonSupprimable = true;


$A5_COL_IDPLANING_PL->lierVM('PAGE_Participent','COL_IDPLANING_PL','A5_COL_IDPLANING_PL');
$A6_COL_Nom->Couleur = 0x69645F;
$A6_COL_Nom->CouleurInitiale = 0x69645F;
$A6_COL_Nom->Libelle = function_exists("construireTexteRiche_A6_COL_Nom") ? null : 'Nom';
$A6_COL_Nom->Masque = '0';
$A6_COL_Nom->m_nHauteur = 316;
$A6_COL_Nom->m_nLargeur = 100;
$A6_COL_Nom->m_nOpacite = 100;
$A6_COL_Nom->m_nCadrageVertical = -1;
$A6_COL_Nom->m_Police->m_bGras = false;
$A6_COL_Nom->m_Police->m_bItalique = false;
$A6_COL_Nom->m_Police->m_bSouligne = false;
$A6_COL_Nom->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A6_COL_Nom->m_Police->m_nTaille = '14px';
$A6_COL_Nom->m_nX = 0;
$A6_COL_Nom->m_nY = 0;
$A6_COL_Nom->m_clCouleurJauge = 0x000000;
$A6_COL_Nom->BoutonCalendrier = 0;
$A6_COL_Nom->EtatInitial = 0;
$A6_COL_Nom->VisibleInitial = 1;
$A6_COL_Nom->YInitial = 0;
$A6_COL_Nom->NombreColonne = 0;
$A6_COL_Nom->BulleTitre = '';
$A6_COL_Nom->JetonActif = false;
$A6_COL_Nom->JetonListeSeparateur = '';
$A6_COL_Nom->JetonAutoriseDoublon = false;
$A6_COL_Nom->JetonSupprimable = true;


$A6_COL_Nom->lierVM('PAGE_Participent','COL_Nom','A6_COL_Nom');
$A7_BTN_SansNom1->Libelle = function_exists("construireTexteRiche_A7_BTN_SansNom1") ? null : 'Bouton';
$A7_BTN_SansNom1->JetonActif = false;


$A7_BTN_SansNom1->lierVM('PAGE_Participent','BTN_SansNom1','A7_BTN_SansNom1');
$A8_BTN_SansNom2->Libelle = function_exists("construireTexteRiche_A8_BTN_SansNom2") ? null : 'Bouton';
$A8_BTN_SansNom2->JetonActif = false;


$A8_BTN_SansNom2->lierVM('PAGE_Participent','BTN_SansNom2','A8_BTN_SansNom2');


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
//Initialisation de TABLE_REQ_participent_plng (serveur) :: (PCode de Initialisation de %1!s!)
function& A1_TABLE_REQ_participent_plng12()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Participent','A1_TABLE_REQ_participent_plng');
	global $A1_TABLE_REQ_participent_plng;
	
	
	Operateur(95,SousType(MaSource($A1_TABLE_REQ_participent_plng),'ParamIDPLANING_PL'),getRef('24'));
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_SansNom1 (serveur) :: (PCode de Clic sur %1!s!)
function& A7_BTN_SansNom116()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Participent','A7_BTN_SansNom1');
	global $A1_TABLE_REQ_participent_plng;
	
	
	HRAZ(getRef('Participent_planning'), getRef('*'));
	Operateur(95,Rubrique('Participent_planning','IDSentinelle'),Rubrique('Sentinelle','IDSentinelle'));
	if (VersBooleen(Operateur(24866,getRef(),getRef(1))))
	{
		Operateur(95,Rubrique('Participent_planning','Covoiturage'),getRef(true));
	}
	if (VersBooleen(Operateur(24866,getRef(),getRef(true))))
	{
		Operateur(95,Rubrique('Participent_planning','Sac'),getRef(true));
	}
	HAjoute(getRef('Participent_planning'));
	HExecuteRequete(Requete('REQ_participent_plng'),null,null);
	VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_SansNom1 (serveur)',"Table",$A1_TABLE_REQ_participent_plng);
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_SansNom2 (serveur) :: (PCode de Clic sur %1!s!)
function& A8_BTN_SansNom216()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Participent','A8_BTN_SansNom2');
	
	
	;
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_PARTICIPENT','PAGE_Participent');
$A1_TABLE_REQ_participent_plng->SetSourceRemplissage("REQ_participent_plng", "", "", "", 1, "", 0);

// Code de déclaration des globales de page
function& PAGE_Participent0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Participent','PAGE_Participent');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_Participent
	PAGE_Participent0();

// Code d'initalisation de A1_TABLE_REQ_participent_plng
	A1_TABLE_REQ_participent_plng12();

$A1_TABLE_REQ_participent_plng->InitRemplissage();


}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_PARTICIPENT','PAGE_Participent');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_PARTICIPENT)){
$_BTNACTION = TrouveBouton( $PAGE_PARTICIPENT );
if ($_BTNACTION=='A7') { 
//-------------------------------------------------------------------
//  PCodes de A7_BTN_SansNom1
//-------------------------------------------------------------------
	A7_BTN_SansNom116();

}
if ($_BTNACTION=='A8') { 
//-------------------------------------------------------------------
//  PCodes de A8_BTN_SansNom2
//-------------------------------------------------------------------
	A8_BTN_SansNom216();

}

}
if ( !bRenvoitCodeHTML($PAGE_PARTICIPENT,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_Participent 04/02/2025 19:59 WEBDEV 28 28.0.459.4 --><html lang="fr" class="htmlstd html5">
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
<link rel="stylesheet" type="text/css" href="PAGE_Participent_style.css?1000095b5efeb">
<style type="text/css">
body{ position:relative;line-height:normal;height:auto; min-height:100%; color:#5f6469;} body{}html {background-color:#f8f9fa;position:relative;}#page{position:relative; background-color:#ffffff;}html {height:100%;overflow-x:hidden;} body,form {height:auto; min-height:100%;margin:0 auto !important;box-sizing:border-box;} .dzA4{width:100%;height:76px;;overflow-x:hidden;;overflow-y:hidden;position:relative;}
#b-A1{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}#lzA1{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#lzA1{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#lzA1{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#ttA2,.ttA2{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#ttA2,.ttA2{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#ttA2,.ttA2{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#ttA3,.ttA3,#ttA5,.ttA5,#ttA6,.ttA6{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#ttA3,.ttA3,#ttA5,.ttA5,#ttA6,.ttA6{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#ttA3,.ttA3,#ttA5,.ttA5,#ttA6,.ttA6{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#tzclzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#tzclzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#tzclzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}#tzdlzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}@media only all and (min-width: 312px){#tzdlzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}@media only all and (min-width: 841px){#tzdlzA1{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}}.communbc-A2{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA2{}.communbc-A3{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA3{}.communbc-A5{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA5{}.communbc-A6{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA6{}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_PARTICIPENT',15,void 0)(event); " class="wbRwd"><form name="PAGE_PARTICIPENT" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_PARTICIPENT',18,void 0)(event); " method="post" class="clearfix"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_PARTICIPENT->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value=""><input type="hidden" name="WD_ACTION_" value=""></div><div  class="clearfix pos1"><div  id="page" class="clearfix pos2" data-window-width="311" data-window-height="557" data-width="311" data-height="557" data-media="[{'query':'@media only all and (min-width: 312px)','attr':{'data-window-width':'312','data-window-height':'1386','data-width':'312','data-height':'1386'}},{'query':'@media only all and (min-width: 841px)','attr':{'data-window-width':'841','data-window-height':'2182','data-width':'841','data-height':'2182'}}]"><div  class="clearfix pos3"><div  class="clearfix pos4"><div class="lh0 dzSpan dzA4" id="dzA4" style=""><span style="position:absolute;top:0px;left:0px;width:100%;height:100%;"><img src="../ext/WhatsApp%20Image%202025-01-21%20at%2015.47.27.jpeg" alt="" id="A4" class="Image wbImgHomothetiqueModeAdapteCentre padding" style=" width:100%; height:76px;display:block;border:0;"></span></div></div><div  class="clearfix pos5"><input type=hidden name="A1" value="<?php echo $A1_TABLE_REQ_participent_plng->Valeur ?>"><input type=hidden name="A1_DEB" value="<?php echo $A1_TABLE_REQ_participent_plng->GetFirstIndex()+1 ?>"><input type=hidden name="_A1_OCC" value="<?php echo $A1_TABLE_REQ_participent_plng->GetNbEnregAffiche() ?>"><INPUT TYPE="hidden" NAME="A1_FORMAT_0" VALUE="" onkeypress="return VerifSaisieNombre(event,'999 999 999 999 999'); " onblur="reinitNombre(event,'999 999 999 999 999');return VerifRegExp(this,'^(\\d|'+_WW_SEPMILLIER_+'){1,19}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'999 999 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A1_FORMAT_0" class="A1_FORMAT_0 wbgrise padding" DISABLED autocomplete="off"><INPUT TYPE="hidden" NAME="A1_FORMAT_1" VALUE="" onkeypress="return JJMMAA(event,'JJ/MM/AAAA'); " onblur="reinit(event,'JJ/MM/AAAA');return VerifRegExp(this,'^([1-9]|[0-2]\\d|3[0-1])\\/((0){0,1}[1-9]|1[0-2])\\/\\d{1,4}$'); " onfocus="var b=(this.value.length==0);init(event,'JJ/MM/AAAA');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A1_FORMAT_1" class="A1_FORMAT_1 wbgrise padding" DISABLED autocomplete="off"><INPUT TYPE="hidden" NAME="A1_FORMAT_2" VALUE="" onkeypress="return VerifSaisieNombre(event,'999 999 999 999 999'); " onblur="reinitNombre(event,'999 999 999 999 999');return VerifRegExp(this,'^(\\d|'+_WW_SEPMILLIER_+'){1,19}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'999 999 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A1_FORMAT_2" class="A1_FORMAT_2 wbgrise padding" DISABLED autocomplete="off"><table id="ctzA1" data-media="[{'query':'@media only all and (min-width: 312px)','attr':{'class':''}},{'query':'@media only all and (min-width: 841px)','attr':{'class':''}}]" style="border-spacing:0; width:100%;;" class="cellpadding0">
 <tr><td colspan=1  style="height:19px;" id="lzA1" class="aligncenter Normal-Centre padding">&nbsp;REQ_participent_plng</td><td></td></tr><tr style="border:0;height:0;" id="ttA1"><td id="tzclzA1" style="width:100%;border-bottom-width:0"><div style="overflow:hidden;position:relative;width:100%;"><table id="A1_TITRES_POS" style=" width:100%;"><tr id="A1_TITRES"><td id="ttA2" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A2:0px;" class="wbcolA2"><div id="A1_TITRES_0" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:51px;" class="Titre-Colonne ttA2"><?php echo $A2_COL_IDPLANING->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_0" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(0,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_0" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA2"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,0,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:61px"><!-- --></div></td><td id="ttA3" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A3:0px;" class="wbcolA3"><div id="A1_TITRES_1" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:51px;" class="Titre-Colonne ttA3"><?php echo $A3_COL_DATE->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_1" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(1,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_1" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA3"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,1,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:61px"><!-- --></div></td><td id="ttA5" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A5:0px;" class="wbcolA5"><div id="A1_TITRES_2" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:51px;" class="Titre-Colonne ttA5"><?php echo $A5_COL_IDPLANING_PL->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_2" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(2,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_2" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA5"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,2,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:61px"><!-- --></div></td><td id="ttA6" style="border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;" class="Titre-Colonne padding webdevclass-riche"><div style="overflow:hidden;--wb-table-padding-horiz-A6:0px;" class="wbcolA6"><div id="A1_TITRES_3" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:51px;" class="Titre-Colonne ttA6"><?php echo $A6_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A1_TITRES_TRI_3" onclick="this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(3,event)" alt="none"><img src="res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A1_TITRES_RECH_3" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA6"><div onmousedown="oGetObjetChamp('A1').OnRedimCol(event,3,14)" style="margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:61px"><!-- --></div></td></tr>
<tr style="border:0;height:0;"><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA2"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA2"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA3"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA3"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA5"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA5"></td><td style="border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;" class="wbcolA6"></td><td style="border:0;padding:0;" class="wbtablesep Titre-Colonne ttA6"></td></tr></table></div></td><td></td></tr>
<tr><td id="tzdlzA1" style="width:100%;border-top-width:0;"><div style="overflow-x:auto;overflow-y:hidden;width:100%;height:232px;position:relative;z-index:1"><div style="position:relative;width:100%" id="A1_POS"><table id="A1_TB" style=" width:100%;height:232px;"><!-- { thead :  { contenu :  [  { debut : "<tr style=\"border:0;height:0;\" id=\"ttA1\">",contenu :  [ "<td id=\"ttA2\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A2:0px;\" class=\"wbcolA2\"><div id=\"A1_TITRES_0\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:51px;\" class=\"Titre-Colonne ttA2\"><?php echo $A2_COL_IDPLANING->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_0\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(0,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_0\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA2\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,0,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:61px\">[%COMMENT%]</div></td>" , "<td id=\"ttA3\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A3:0px;\" class=\"wbcolA3\"><div id=\"A1_TITRES_1\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:51px;\" class=\"Titre-Colonne ttA3\"><?php echo $A3_COL_DATE->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_1\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(1,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_1\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA3\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,1,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:61px\">[%COMMENT%]</div></td>" , "<td id=\"ttA5\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A5:0px;\" class=\"wbcolA5\"><div id=\"A1_TITRES_2\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:51px;\" class=\"Titre-Colonne ttA5\"><?php echo $A5_COL_IDPLANING_PL->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_2\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(2,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_2\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA5\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,2,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:61px\">[%COMMENT%]</div></td>" , "<td id=\"ttA6\" style=\"border-left-width:0;border-top-width:0;box-sizing:border-box;position:relative;padding-left:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"overflow:hidden;--wb-table-padding-horiz-A6:0px;\" class=\"wbcolA6\"><div id=\"A1_TITRES_3\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:51px;\" class=\"Titre-Colonne ttA6\"><?php echo $A6_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A1_TITRES_TRI_3\" onclick=\"this.classList.remove('wbTableFaaSurvolImg')||oGetObjetChamp('A1').OnTriColonne(3,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A1_TITRES_RECH_3\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA6\"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,3,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:61px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" } , { debut : "<tr style=\"border:0;height:0;\">",contenu :  [ "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA2\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA2\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA3\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA3\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA5\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA5\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding:0;padding-left:0;border:0;\" class=\"wbcolA6\"></td><td style=\"border:0;padding:0;\" class=\"wbtablesep Titre-Colonne ttA6\"></td>", ] ,fin : "</tr>" }  ]  } ,tbody :  { contenu :  [  { debut : " <tr class=\"Lignes-Paires padding\" id=\"A1_[%_INDICE_%]\" style=\"visibility:hidden;height:23px\">",contenu :  [ "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],0,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A2\" class=\"l-1 wbcolA2 communbc-A2 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA2\"><div id=\"A1_[%_INDICE_%]_0\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,0,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],1,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A3\" class=\"alignright l-4 wbcolA3 communbc-A3 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA3\"><div id=\"A1_[%_INDICE_%]_1\" style=\"padding-right:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,1,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],2,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A5\" class=\"alignright l-7 wbcolA5 communbc-A5 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA5\"><div id=\"A1_[%_INDICE_%]_2\" style=\"padding-right:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,2,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A1').OnSelectLigne([%_INDICE_%],3,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A6\" class=\"l-10 wbcolA6 communbc-A6 padding webdevclass-riche\"><div style=\"overflow-x:hidden;\" class=\"wbcolA6\"><div id=\"A1_[%_INDICE_%]_3\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A1').OnRedimCol(event,3,14)\" style=\"margin-left:-3px;width:4px;cursor:col-resize;overflow:hidden;position:absolute;top:0;bottom:0;min-height:21px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" }  ]  }  } --><tr><td></td></tr></table></div><table style="position:absolute;top:0;left:0;width:100%;border:solid 2px #dadce0;height:100%;visibility:hidden;z-index:100" id="A1_MASQUE"><tr><td class="aligncenter valignmiddle"><img src="res/timer240%20Material%20Design%202.gif" alt="none"></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;height:100%;visibility:hidden;z-index:101" id="A1_MASQUETR"><tr><td class="aligncenter valignmiddle"><!-- --></td></tr></table></div></td><td style="width:17px;height:232px;vertical-align:top"><div style="width:15px;"><div style="position:absolute;overflow-x:hidden;width:17px;height:232px;"><div style="position:absolute;left:-5px;width:20px;height:232px;overflow-x:hidden;overflow-y:auto"><div style="width:1px;height:1px;overflow:hidden" id="A1_SB"></div></div></div></div></td></tr>
</table></div><div  class="clearfix pos6"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_PARTICIPENT',18,void 0)()){_JAEE(_PAGE_,'A7',16,2,48);} " id="A7" class="BTN-Defaut wblien bbox padding webdevclass-riche" style="width:100%;height:auto;min-height:37px;width:100%;height:auto;min-height:37px;display:inline-block;">Bouton</button></div><div  class="clearfix pos7"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_PARTICIPENT',18,void 0)()){_JAEE(_PAGE_,'A8',16,2,48);} " id="A8" class="BTN-Defaut wblien bbox padding webdevclass-riche" style="width:100%;height:auto;min-height:37px;width:100%;height:auto;min-height:37px;display:inline-block;">Bouton</button></div></div></div></div><?php function construireTexteRiche_A6_COL_Nom($j){ global $A6_COL_Nom,$A6_COL_Nom,$A1_TABLE_REQ_participent_plng;$s="Nom";return $s;}function construireTexteRiche_A5_COL_IDPLANING_PL($j){ global $A5_COL_IDPLANING_PL,$A5_COL_IDPLANING_PL,$A1_TABLE_REQ_participent_plng;$s="Identifiant de PLANING";return $s;}function construireTexteRiche_A3_COL_DATE($j){ global $A3_COL_DATE,$A3_COL_DATE,$A1_TABLE_REQ_participent_plng;$s="Date";return $s;}function construireTexteRiche_A2_COL_IDPLANING($j){ global $A2_COL_IDPLANING,$A2_COL_IDPLANING,$A1_TABLE_REQ_participent_plng;$s="Identifiant de PLANING";return $s;} ?>
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
<script type="text/javascript" src="./res/WD.js?3002cbe23185d"></script>
<script type="text/javascript">
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJ4X3Bjc29mdF9ub21fbG9naXF1ZSI6IlBBR0VfUGFydGljaXBlbnQiLCJ4X3Bjc29mdF90eXBlX2xvZ2lxdWUiOiI2NTUzOCIsInhfcGNzb2Z0X2lkX2Vuc2VtYmxlIjoiNTE1NjU3MzQxMzg3MDk5NjEzOSIsIm1hcHBpbmdzIjoiQSJ9
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/LES_SENTINELLES_DE_LA_MER_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _WW_SEPMILLIER_="<?php echo ($_gszSEPMIL) ?>";
var _WW_SEPDECIMAL_="<?php echo ($_gszSEPDEC) ?>";
var _PHPID_="<?php echo session_name() . '=' . session_id(); ?>";
var _PU_="PAGE-Participent.php";
var _PAGE_=document["PAGE_PARTICIPENT"];
clWDUtil.DeclareChamp("A1",void 0,void 0,void 0,WDTable,["<?php echo $A1_TABLE_REQ_participent_plng->pszGetAjaxInitInline(); ?>",0,23,2,4,1,["Lignes-Paires wbImpaire","Lignes-Paires wbPaire","Selection"],[["res/TABLE_Sorting_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Sorting_Increasing240_Material_Design_2Material_Blue_2.png","res/TABLE_Sorting_Decreasing240_Material_Design_2Material_Blue_2.png"],["res/TABLE_Search_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Search_Hover240_Material_Design_2Material_Blue_2.png","res/TABLE_Search_Active240_Material_Design_2Material_Blue_2.png"],["res/TABLE_Filter_Normal240_Material_Design_2Material_Blue_2.png","res/TABLE_Filter_Hover240_Material_Design_2Material_Blue_2.png","res/TABLE_Filter_Active240_Material_Design_2Material_Blue_2.png"],["./res/TableDeplaceDroite.png","./res/TableDeplaceGauche.png"]],true,0],true,true);
NSPCS.NSWDW.SetDeclaration("DAAAAAEAAAABAAAABAAAAAAAAAAIAAAAAAAAAA==");
<!--
var _COL={0:"#ffffff",5:"#e8f0fe",9:"#f5cbc8",10:"#5f6469",15:"#2979ff",16:"#dadce0",21:"#f8f8f8",66:"#d93025"};
function _GET_A2_1_I_C(){return clWDUtil.sWLVersNumerique(arguments[0],_WW_SEPDECIMAL_);}
function _SET_A2_1_I_C(){return __reinitNombre(clWDUtil.sNumeriqueVersWL(arguments[0],_WW_SEPDECIMAL_),"999 999 999 999 999",false);}
function _GET_A3_1_I_C(){return clWDUtil.sChaineVersDate(arguments[0],"JJ/MM/AAAA");}
function _SET_A3_1_I_C(){return clWDUtil.sDateVersChaine(arguments[0],"JJ/MM/AAAA");}
function _GET_A5_1_I_C(){return clWDUtil.sWLVersNumerique(arguments[0],_WW_SEPDECIMAL_);}
function _SET_A5_1_I_C(){return __reinitNombre(clWDUtil.sNumeriqueVersWL(arguments[0],_WW_SEPDECIMAL_),"999 999 999 999 999",false);}
clWDUtil.DeclareTraitementEx("PAGE_PARTICIPENT",true,[15,function(event){clWDUtil.pfGetTraitement("PAGE_PARTICIPENT",15,"_COM")(event);var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,0);{void 0;}},void 0,true,18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_PARTICIPENT",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript">var bPCSFR=true;</script><script type="text/javascript" src="res/WDLIB.JS?20007a4537def"></script><script type="text/javascript" src="res/jquery-3.js?2000086c54b0a"></script><script type="text/javascript" src="res/jquery-ui.js?20006598c0fa6"></script><script type="text/javascript" src="res/jquery-effet.js?20004374c605b"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200051bfcee3e"></script><style type="text/css">.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}@media only all and (min-width: 312px){.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}}@media only all and (min-width: 841px){.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ delay : 1000,	items: "[title]:not(iframe,svg)", position : {my: 'left top+20',collision: 'flip'},	track : false, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); ui.tooltip.position( { my: 'left+15 center', at: 'right center', of : event} ); },content: function(callback) { callback($(this).prop('title').replace(/\n/g, '\x3Cbr /\x3E')); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><script type="text/javascript">if (bOpr) document.getElementsByTagName("head")[0].innerHTML+='\x3cstyle type="text/css"\x3e.wbtablesep{position:static !important;}\x3c/style\x3e';</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_89=ob_get_contents();ob_end_clean();echo tidyHTML(_cp1252_to_utf8($_PHP_VAR_TMP_89)); ?>