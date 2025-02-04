<?php
//#28.0.380.0 Les sentinelles de la mer
ob_start();if (!defined('UNICODE_PAGE_UTF8')) define('UNICODE_PAGE_UTF8',false);
$gszId='Les sentinelles de la mer	PAGE_INFO_SENTINELLE	20250204195930';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD28.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CImage');
IHM_Include('CSaisie');
IHM_Include('CBouton');

WB_Include('WL/PAGE/Page.php');

Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
WB_Include('WL/HF/HF.php');
WB_Include('HF.php');
// Equivalent de [%URL()%]
$gszURL='PAGE-info-sentinelle.php';
$j=1;$i=1;
if (!isset($_SESSION)) session_start();
// protection contre register_globals = on
unset($PAGE_INFO_SENTINELLE);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(0,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gtabCheminPage['PAGE_ADMINISTRATION']=array(5=>array('NOM'=>'PAGE-Administration','URL'=>'./'));
$gtabCheminPage['PAGE_PARTICIPENT']=array(5=>array('NOM'=>'PAGE-Participent','URL'=>'./'));
$gszCheminPageInverse='./';
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
RechargementPageSiBesoin('PAGE_INFO_SENTINELLE');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_INFO_SENTINELLE']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_INFO_SENTINELLE= $gTabVarSession['PAGE_INFO_SENTINELLE'];
	$PAGE_INFO_SENTINELLE->WB_RestaureContexte();
$MaPage =& $PAGE_INFO_SENTINELLE;
$GLOBALS['PAGE_info_sentinelle'] =& $MaPage;
if (isset($gnIndiceAgencement) && $gnIndiceAgencement !== $MaPage->m_nIndiceAgencementCourant)
{

}
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_INFO_SENTINELLE)) {
$PAGE_INFO_SENTINELLE= new CPage(false);
$PAGE_INFO_SENTINELLE->Nom = 'PAGE_info_sentinelle';
$PAGE_INFO_SENTINELLE->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_INFO_SENTINELLE->Alias = 'PAGE_INFO_SENTINELLE';
$PAGE_INFO_SENTINELLE->m_sNomPHP = 'PAGE_INFO_SENTINELLE';
$PAGE_INFO_SENTINELLE->Libelle = 'info_sentinelle';
$PAGE_INFO_SENTINELLE->bUTF8 = true;
$PAGE_INFO_SENTINELLE->bHTML5 = true;
$PAGE_INFO_SENTINELLE->bAvecContexte = true;
$PAGE_INFO_SENTINELLE->sFichierPalette = '.\\res\\Material Blue 2.wpc';
$PAGE_INFO_SENTINELLE->Plan = 1;
$PAGE_INFO_SENTINELLE->ImageFond = '';
$MaPage =& $PAGE_INFO_SENTINELLE;
$GLOBALS['PAGE_info_sentinelle'] =& $MaPage;
$A4_IMG_SansNom1=&CreerChamp('CImage',292,76,16447992);$PAGE_INFO_SENTINELLE->WB_AjouteChamp('IMG_SansNom1','A4',$A4_IMG_SansNom1,'A4_IMG_SansNom1');
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

$A1_SAI_Nom=&CreerChamp('CSaisie');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('SAI_Nom','A1',$A1_SAI_Nom,'A1_SAI_Nom');
$A1_SAI_Nom->SetATTMISEABLANC(true);
$A1_SAI_Nom->SetChampFormate(false);
$A1_SAI_Nom->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A1_SAI_Nom->m_eBarreOutilsMode = 0;
$A1_SAI_Nom->m_bLibelleRiche=true;

$A2_SAI_Prenom=&CreerChamp('CSaisie');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('SAI_Prénom','A2',$A2_SAI_Prenom,'A2_SAI_Prenom');
$A2_SAI_Prenom->SetATTMISEABLANC(true);
$A2_SAI_Prenom->SetChampFormate(false);
$A2_SAI_Prenom->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A2_SAI_Prenom->m_eBarreOutilsMode = 0;
$A2_SAI_Prenom->m_bLibelleRiche=true;

$A3_SAI_Adresse=&CreerChamp('CSaisie');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('SAI_Adresse','A3',$A3_SAI_Adresse,'A3_SAI_Adresse');
$A3_SAI_Adresse->SetATTMISEABLANC(true);
$A3_SAI_Adresse->SetChampFormate(false);
$A3_SAI_Adresse->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A3_SAI_Adresse->m_eBarreOutilsMode = 0;
$A3_SAI_Adresse->m_bLibelleRiche=true;

$A5_SAI_CP=&CreerChamp('CSaisie');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('SAI_CP','A5',$A5_SAI_CP,'A5_SAI_CP');
$A5_SAI_CP->SetATTMISEABLANC(true);
$A5_SAI_CP->SetChampFormate(false);
$A5_SAI_CP->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A5_SAI_CP->m_eBarreOutilsMode = 0;
$A5_SAI_CP->m_bLibelleRiche=true;

$A6_SAI_Ville=&CreerChamp('CSaisie');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('SAI_Ville','A6',$A6_SAI_Ville,'A6_SAI_Ville');
$A6_SAI_Ville->SetATTMISEABLANC(true);
$A6_SAI_Ville->SetChampFormate(false);
$A6_SAI_Ville->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A6_SAI_Ville->m_eBarreOutilsMode = 0;
$A6_SAI_Ville->m_bLibelleRiche=true;

$A7_SAI_Login=&CreerChamp('CSaisie');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('SAI_Login','A7',$A7_SAI_Login,'A7_SAI_Login');
$A7_SAI_Login->SetATTMISEABLANC(true);
$A7_SAI_Login->SetChampFormate(false);
$A7_SAI_Login->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A7_SAI_Login->m_eBarreOutilsMode = 0;
$A7_SAI_Login->m_bLibelleRiche=true;

$A9_BTN_valider=&CreerChamp('CBouton');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('BTN_valider','A9',$A9_BTN_valider,'A9_BTN_valider');
$A9_BTN_valider->m_bLibelleRiche=true;

$A10_BTN_fermer=&CreerChamp('CBouton');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('BTN_fermer','A10',$A10_BTN_fermer,'A10_BTN_fermer');
$A10_BTN_fermer->m_bLibelleRiche=true;

$A14_SAI_Telephone=&CreerChamp('CSaisie');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('SAI_Telephone','A14',$A14_SAI_Telephone,'A14_SAI_Telephone');
$A14_SAI_Telephone->SetChampFormate(false);
$A14_SAI_Telephone->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A14_SAI_Telephone->m_eBarreOutilsMode = 0;
$A14_SAI_Telephone->m_bLibelleRiche=true;

$A13_SAI_EMail=&CreerChamp('CSaisie');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('SAI_EMail','A13',$A13_SAI_EMail,'A13_SAI_EMail');
$A13_SAI_EMail->SetChampFormate(false);
$A13_SAI_EMail->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A13_SAI_EMail->m_eBarreOutilsMode = 0;
$A13_SAI_EMail->m_bLibelleRiche=true;

$A8_SAI_Mot_de_passe=&CreerChamp('CSaisie');$PAGE_INFO_SENTINELLE->WB_AjouteChamp('SAI_Mot_de_passe','A8',$A8_SAI_Mot_de_passe,'A8_SAI_Mot_de_passe');
$A8_SAI_Mot_de_passe->SetATTMISEABLANC(true);
$A8_SAI_Mot_de_passe->SetChampFormate(false);
$A8_SAI_Mot_de_passe->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A8_SAI_Mot_de_passe->m_eBarreOutilsMode = 0;
$A8_SAI_Mot_de_passe->m_bLibelleRiche=true;



//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------
$A4_IMG_SansNom1->Valeur = '../ext/WhatsApp Image 2025-01-21 at 15.47.27.jpeg';
$A4_IMG_SansNom1->JetonActif = false;


$A4_IMG_SansNom1->lierVM('PAGE_info_sentinelle','IMG_SansNom1','A4_IMG_SansNom1');
$A1_SAI_Nom->Couleur = 0x69645F;
$A1_SAI_Nom->CouleurInitiale = 0x69645F;
$A1_SAI_Nom->CouleurFond = 0xFFFFFF;
$A1_SAI_Nom->CouleurFondInitiale = 0xFFFFFF;
$A1_SAI_Nom->Libelle = function_exists("construireTexteRiche_A1_SAI_Nom") ? null : 'Nom';
$A1_SAI_Nom->Masque = '0';
$A1_SAI_Nom->m_nHauteur = 31;
$A1_SAI_Nom->m_nLargeur = 296;
$A1_SAI_Nom->m_nOpacite = 100;
$A1_SAI_Nom->m_nCadrageHorizontal = -1;
$A1_SAI_Nom->m_nCadrageVertical = 1;
$A1_SAI_Nom->m_Police->m_bGras = false;
$A1_SAI_Nom->m_Police->m_bItalique = false;
$A1_SAI_Nom->m_Police->m_bSouligne = false;
$A1_SAI_Nom->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A1_SAI_Nom->m_Police->m_nTaille = '14px';
$A1_SAI_Nom->m_nX = 7;
$A1_SAI_Nom->m_nY = 126;
$A1_SAI_Nom->m_clCouleurJauge = 0x000000;
$A1_SAI_Nom->BoutonCalendrier = 0;
$A1_SAI_Nom->EtatInitial = 0;
$A1_SAI_Nom->VisibleInitial = 1;
$A1_SAI_Nom->YInitial = 0;
$A1_SAI_Nom->NombreColonne = 0;
$A1_SAI_Nom->BulleTitre = '';
$A1_SAI_Nom->JetonActif = false;
$A1_SAI_Nom->JetonListeSeparateur = '';
$A1_SAI_Nom->JetonAutoriseDoublon = false;
$A1_SAI_Nom->JetonSupprimable = true;

$A1_SAI_Nom->SetLiaisonFichier('Sentinelle', 'Nom');

$A1_SAI_Nom->lierVM('PAGE_info_sentinelle','SAI_Nom','A1_SAI_Nom');
$A2_SAI_Prenom->Couleur = 0x69645F;
$A2_SAI_Prenom->CouleurInitiale = 0x69645F;
$A2_SAI_Prenom->CouleurFond = 0xFFFFFF;
$A2_SAI_Prenom->CouleurFondInitiale = 0xFFFFFF;
$A2_SAI_Prenom->Libelle = function_exists("construireTexteRiche_A2_SAI_Prenom") ? null : 'Prénom';
$A2_SAI_Prenom->Masque = '0';
$A2_SAI_Prenom->m_nHauteur = 31;
$A2_SAI_Prenom->m_nLargeur = 301;
$A2_SAI_Prenom->m_nOpacite = 100;
$A2_SAI_Prenom->m_nCadrageHorizontal = -1;
$A2_SAI_Prenom->m_nCadrageVertical = 1;
$A2_SAI_Prenom->m_Police->m_bGras = false;
$A2_SAI_Prenom->m_Police->m_bItalique = false;
$A2_SAI_Prenom->m_Police->m_bSouligne = false;
$A2_SAI_Prenom->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A2_SAI_Prenom->m_Police->m_nTaille = '14px';
$A2_SAI_Prenom->m_nX = 7;
$A2_SAI_Prenom->m_nY = 163;
$A2_SAI_Prenom->m_clCouleurJauge = 0x000000;
$A2_SAI_Prenom->BoutonCalendrier = 0;
$A2_SAI_Prenom->EtatInitial = 0;
$A2_SAI_Prenom->VisibleInitial = 1;
$A2_SAI_Prenom->YInitial = 0;
$A2_SAI_Prenom->NombreColonne = 0;
$A2_SAI_Prenom->BulleTitre = '';
$A2_SAI_Prenom->JetonActif = false;
$A2_SAI_Prenom->JetonListeSeparateur = '';
$A2_SAI_Prenom->JetonAutoriseDoublon = false;
$A2_SAI_Prenom->JetonSupprimable = true;

$A2_SAI_Prenom->SetLiaisonFichier('Sentinelle', 'Prénom');

$A2_SAI_Prenom->lierVM('PAGE_info_sentinelle','SAI_Prénom','A2_SAI_Prenom');
$A3_SAI_Adresse->Couleur = 0x69645F;
$A3_SAI_Adresse->CouleurInitiale = 0x69645F;
$A3_SAI_Adresse->CouleurFond = 0xFFFFFF;
$A3_SAI_Adresse->CouleurFondInitiale = 0xFFFFFF;
$A3_SAI_Adresse->Libelle = function_exists("construireTexteRiche_A3_SAI_Adresse") ? null : 'Adresse';
$A3_SAI_Adresse->Masque = '0';
$A3_SAI_Adresse->m_nHauteur = 31;
$A3_SAI_Adresse->m_nLargeur = 301;
$A3_SAI_Adresse->m_nOpacite = 100;
$A3_SAI_Adresse->m_nCadrageHorizontal = -1;
$A3_SAI_Adresse->m_nCadrageVertical = 1;
$A3_SAI_Adresse->m_Police->m_bGras = false;
$A3_SAI_Adresse->m_Police->m_bItalique = false;
$A3_SAI_Adresse->m_Police->m_bSouligne = false;
$A3_SAI_Adresse->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A3_SAI_Adresse->m_Police->m_nTaille = '14px';
$A3_SAI_Adresse->m_nX = 7;
$A3_SAI_Adresse->m_nY = 205;
$A3_SAI_Adresse->m_clCouleurJauge = 0x000000;
$A3_SAI_Adresse->BoutonCalendrier = 0;
$A3_SAI_Adresse->EtatInitial = 0;
$A3_SAI_Adresse->VisibleInitial = 1;
$A3_SAI_Adresse->YInitial = 0;
$A3_SAI_Adresse->NombreColonne = 0;
$A3_SAI_Adresse->BulleTitre = '';
$A3_SAI_Adresse->JetonActif = false;
$A3_SAI_Adresse->JetonListeSeparateur = '';
$A3_SAI_Adresse->JetonAutoriseDoublon = false;
$A3_SAI_Adresse->JetonSupprimable = true;

$A3_SAI_Adresse->SetLiaisonFichier('Sentinelle', 'Adresse');

$A3_SAI_Adresse->lierVM('PAGE_info_sentinelle','SAI_Adresse','A3_SAI_Adresse');
$A5_SAI_CP->Couleur = 0x69645F;
$A5_SAI_CP->CouleurInitiale = 0x69645F;
$A5_SAI_CP->CouleurFond = 0xFFFFFF;
$A5_SAI_CP->CouleurFondInitiale = 0xFFFFFF;
$A5_SAI_CP->Libelle = function_exists("construireTexteRiche_A5_SAI_CP") ? null : 'Code postal';
$A5_SAI_CP->Masque = '0';
$A5_SAI_CP->m_nHauteur = 31;
$A5_SAI_CP->m_nLargeur = 301;
$A5_SAI_CP->m_nOpacite = 100;
$A5_SAI_CP->m_nCadrageHorizontal = -1;
$A5_SAI_CP->m_nCadrageVertical = 1;
$A5_SAI_CP->m_Police->m_bGras = false;
$A5_SAI_CP->m_Police->m_bItalique = false;
$A5_SAI_CP->m_Police->m_bSouligne = false;
$A5_SAI_CP->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A5_SAI_CP->m_Police->m_nTaille = '14px';
$A5_SAI_CP->m_nX = 7;
$A5_SAI_CP->m_nY = 242;
$A5_SAI_CP->m_clCouleurJauge = 0x000000;
$A5_SAI_CP->BoutonCalendrier = 0;
$A5_SAI_CP->EtatInitial = 0;
$A5_SAI_CP->VisibleInitial = 1;
$A5_SAI_CP->YInitial = 0;
$A5_SAI_CP->NombreColonne = 0;
$A5_SAI_CP->BulleTitre = '';
$A5_SAI_CP->JetonActif = false;
$A5_SAI_CP->JetonListeSeparateur = '';
$A5_SAI_CP->JetonAutoriseDoublon = false;
$A5_SAI_CP->JetonSupprimable = true;

$A5_SAI_CP->SetLiaisonFichier('Sentinelle', 'CP');

$A5_SAI_CP->lierVM('PAGE_info_sentinelle','SAI_CP','A5_SAI_CP');
$A6_SAI_Ville->Couleur = 0x69645F;
$A6_SAI_Ville->CouleurInitiale = 0x69645F;
$A6_SAI_Ville->CouleurFond = 0xFFFFFF;
$A6_SAI_Ville->CouleurFondInitiale = 0xFFFFFF;
$A6_SAI_Ville->Libelle = function_exists("construireTexteRiche_A6_SAI_Ville") ? null : 'Ville';
$A6_SAI_Ville->Masque = '0';
$A6_SAI_Ville->m_nHauteur = 31;
$A6_SAI_Ville->m_nLargeur = 301;
$A6_SAI_Ville->m_nOpacite = 100;
$A6_SAI_Ville->m_nCadrageHorizontal = -1;
$A6_SAI_Ville->m_nCadrageVertical = 1;
$A6_SAI_Ville->m_Police->m_bGras = false;
$A6_SAI_Ville->m_Police->m_bItalique = false;
$A6_SAI_Ville->m_Police->m_bSouligne = false;
$A6_SAI_Ville->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A6_SAI_Ville->m_Police->m_nTaille = '14px';
$A6_SAI_Ville->m_nX = 7;
$A6_SAI_Ville->m_nY = 279;
$A6_SAI_Ville->m_clCouleurJauge = 0x000000;
$A6_SAI_Ville->BoutonCalendrier = 0;
$A6_SAI_Ville->EtatInitial = 0;
$A6_SAI_Ville->VisibleInitial = 1;
$A6_SAI_Ville->YInitial = 0;
$A6_SAI_Ville->NombreColonne = 0;
$A6_SAI_Ville->BulleTitre = '';
$A6_SAI_Ville->JetonActif = false;
$A6_SAI_Ville->JetonListeSeparateur = '';
$A6_SAI_Ville->JetonAutoriseDoublon = false;
$A6_SAI_Ville->JetonSupprimable = true;

$A6_SAI_Ville->SetLiaisonFichier('Sentinelle', 'Ville');

$A6_SAI_Ville->lierVM('PAGE_info_sentinelle','SAI_Ville','A6_SAI_Ville');
$A7_SAI_Login->Couleur = 0x69645F;
$A7_SAI_Login->CouleurInitiale = 0x69645F;
$A7_SAI_Login->CouleurFond = 0xFFFFFF;
$A7_SAI_Login->CouleurFondInitiale = 0xFFFFFF;
$A7_SAI_Login->Libelle = function_exists("construireTexteRiche_A7_SAI_Login") ? null : 'Login';
$A7_SAI_Login->Masque = '0';
$A7_SAI_Login->m_nHauteur = 31;
$A7_SAI_Login->m_nLargeur = 301;
$A7_SAI_Login->m_nOpacite = 100;
$A7_SAI_Login->m_nCadrageHorizontal = -1;
$A7_SAI_Login->m_nCadrageVertical = 1;
$A7_SAI_Login->m_Police->m_bGras = false;
$A7_SAI_Login->m_Police->m_bItalique = false;
$A7_SAI_Login->m_Police->m_bSouligne = false;
$A7_SAI_Login->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A7_SAI_Login->m_Police->m_nTaille = '14px';
$A7_SAI_Login->m_nX = 7;
$A7_SAI_Login->m_nY = 384;
$A7_SAI_Login->m_clCouleurJauge = 0x000000;
$A7_SAI_Login->BoutonCalendrier = 0;
$A7_SAI_Login->EtatInitial = 0;
$A7_SAI_Login->VisibleInitial = 1;
$A7_SAI_Login->YInitial = 0;
$A7_SAI_Login->NombreColonne = 0;
$A7_SAI_Login->BulleTitre = '';
$A7_SAI_Login->JetonActif = false;
$A7_SAI_Login->JetonListeSeparateur = '';
$A7_SAI_Login->JetonAutoriseDoublon = false;
$A7_SAI_Login->JetonSupprimable = true;

$A7_SAI_Login->SetLiaisonFichier('Sentinelle', 'Login');

$A7_SAI_Login->lierVM('PAGE_info_sentinelle','SAI_Login','A7_SAI_Login');
$A9_BTN_valider->Libelle = function_exists("construireTexteRiche_A9_BTN_valider") ? null : 'Valider';
$A9_BTN_valider->JetonActif = false;


$A9_BTN_valider->lierVM('PAGE_info_sentinelle','BTN_valider','A9_BTN_valider');
$A10_BTN_fermer->Libelle = function_exists("construireTexteRiche_A10_BTN_fermer") ? null : 'Fermer';
$A10_BTN_fermer->JetonActif = false;


$A10_BTN_fermer->lierVM('PAGE_info_sentinelle','BTN_fermer','A10_BTN_fermer');
$A14_SAI_Telephone->Couleur = 0x69645F;
$A14_SAI_Telephone->CouleurInitiale = 0x69645F;
$A14_SAI_Telephone->CouleurFond = 0xFFFFFF;
$A14_SAI_Telephone->CouleurFondInitiale = 0xFFFFFF;
$A14_SAI_Telephone->Libelle = function_exists("construireTexteRiche_A14_SAI_Telephone") ? null : 'Téléphone :';
$A14_SAI_Telephone->Masque = '21';
$A14_SAI_Telephone->m_nHauteur = 31;
$A14_SAI_Telephone->m_nLargeur = 210;
$A14_SAI_Telephone->m_nOpacite = 100;
$A14_SAI_Telephone->m_nCadrageHorizontal = -1;
$A14_SAI_Telephone->m_nCadrageVertical = 1;
$A14_SAI_Telephone->m_Police->m_bGras = false;
$A14_SAI_Telephone->m_Police->m_bItalique = false;
$A14_SAI_Telephone->m_Police->m_bSouligne = false;
$A14_SAI_Telephone->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A14_SAI_Telephone->m_Police->m_nTaille = '14px';
$A14_SAI_Telephone->m_nX = 7;
$A14_SAI_Telephone->m_nY = 316;
$A14_SAI_Telephone->m_clCouleurJauge = 0x000000;
$A14_SAI_Telephone->BoutonCalendrier = 0;
$A14_SAI_Telephone->EtatInitial = 0;
$A14_SAI_Telephone->VisibleInitial = 1;
$A14_SAI_Telephone->YInitial = 0;
$A14_SAI_Telephone->NombreColonne = 0;
$A14_SAI_Telephone->BulleTitre = '';
$A14_SAI_Telephone->JetonActif = false;
$A14_SAI_Telephone->JetonListeSeparateur = '';
$A14_SAI_Telephone->JetonAutoriseDoublon = false;
$A14_SAI_Telephone->JetonSupprimable = true;

$A14_SAI_Telephone->SetLiaisonFichier('Sentinelle', 'TEL');

$A14_SAI_Telephone->lierVM('PAGE_info_sentinelle','SAI_Telephone','A14_SAI_Telephone');
$A13_SAI_EMail->Couleur = 0x69645F;
$A13_SAI_EMail->CouleurInitiale = 0x69645F;
$A13_SAI_EMail->CouleurFond = 0xFFFFFF;
$A13_SAI_EMail->CouleurFondInitiale = 0xFFFFFF;
$A13_SAI_EMail->Libelle = function_exists("construireTexteRiche_A13_SAI_EMail") ? null : 'eMail :';
$A13_SAI_EMail->Masque = '17';
$A13_SAI_EMail->m_nHauteur = 31;
$A13_SAI_EMail->m_nLargeur = 300;
$A13_SAI_EMail->m_nOpacite = 100;
$A13_SAI_EMail->m_nCadrageHorizontal = -1;
$A13_SAI_EMail->m_nCadrageVertical = 1;
$A13_SAI_EMail->m_Police->m_bGras = false;
$A13_SAI_EMail->m_Police->m_bItalique = false;
$A13_SAI_EMail->m_Police->m_bSouligne = false;
$A13_SAI_EMail->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A13_SAI_EMail->m_Police->m_nTaille = '14px';
$A13_SAI_EMail->m_nX = 7;
$A13_SAI_EMail->m_nY = 349;
$A13_SAI_EMail->m_clCouleurJauge = 0x000000;
$A13_SAI_EMail->BoutonCalendrier = 0;
$A13_SAI_EMail->EtatInitial = 0;
$A13_SAI_EMail->VisibleInitial = 1;
$A13_SAI_EMail->YInitial = 0;
$A13_SAI_EMail->NombreColonne = 0;
$A13_SAI_EMail->BulleTitre = '';
$A13_SAI_EMail->JetonActif = false;
$A13_SAI_EMail->JetonListeSeparateur = '';
$A13_SAI_EMail->JetonAutoriseDoublon = false;
$A13_SAI_EMail->JetonSupprimable = true;

$A13_SAI_EMail->SetLiaisonFichier('Sentinelle', 'email');

$A13_SAI_EMail->lierVM('PAGE_info_sentinelle','SAI_EMail','A13_SAI_EMail');
$A8_SAI_Mot_de_passe->Couleur = 0x69645F;
$A8_SAI_Mot_de_passe->CouleurInitiale = 0x69645F;
$A8_SAI_Mot_de_passe->CouleurFond = 0xFFFFFF;
$A8_SAI_Mot_de_passe->CouleurFondInitiale = 0xFFFFFF;
$A8_SAI_Mot_de_passe->Libelle = function_exists("construireTexteRiche_A8_SAI_Mot_de_passe") ? null : 'Mot de passe';
$A8_SAI_Mot_de_passe->Masque = '0';
$A8_SAI_Mot_de_passe->m_nHauteur = 31;
$A8_SAI_Mot_de_passe->m_nLargeur = 248;
$A8_SAI_Mot_de_passe->m_nOpacite = 100;
$A8_SAI_Mot_de_passe->m_nCadrageHorizontal = -1;
$A8_SAI_Mot_de_passe->m_nCadrageVertical = 1;
$A8_SAI_Mot_de_passe->m_Police->m_bGras = false;
$A8_SAI_Mot_de_passe->m_Police->m_bItalique = false;
$A8_SAI_Mot_de_passe->m_Police->m_bSouligne = false;
$A8_SAI_Mot_de_passe->m_Police->m_sNom = 'Roboto,Helvetica,Arial,sans-serif';
$A8_SAI_Mot_de_passe->m_Police->m_nTaille = '14px';
$A8_SAI_Mot_de_passe->m_nX = 26;
$A8_SAI_Mot_de_passe->m_nY = 421;
$A8_SAI_Mot_de_passe->m_clCouleurJauge = 0x000000;
$A8_SAI_Mot_de_passe->BoutonCalendrier = 0;
$A8_SAI_Mot_de_passe->EtatInitial = 0;
$A8_SAI_Mot_de_passe->VisibleInitial = 1;
$A8_SAI_Mot_de_passe->YInitial = 0;
$A8_SAI_Mot_de_passe->NombreColonne = 0;
$A8_SAI_Mot_de_passe->BulleTitre = '';
$A8_SAI_Mot_de_passe->JetonActif = false;
$A8_SAI_Mot_de_passe->JetonListeSeparateur = '';
$A8_SAI_Mot_de_passe->JetonAutoriseDoublon = false;
$A8_SAI_Mot_de_passe->JetonSupprimable = true;

$A8_SAI_Mot_de_passe->SetLiaisonFichier('Sentinelle', 'mdp');

$A8_SAI_Mot_de_passe->lierVM('PAGE_info_sentinelle','SAI_Mot_de_passe','A8_SAI_Mot_de_passe');


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
function& PAGE_info_sentinelle28()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_info_sentinelle','PAGE_info_sentinelle');
	
	
	FichierVersEcran(VersPrimitif('PAGE_info_sentinelle'));
	return _return ($_PHP_VAR_RETURN_);
}
// Code de chaque affichage de page
//Clic sur BTN_valider (serveur) :: (PCode de Clic sur %1!s!)
function& A9_BTN_valider16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_info_sentinelle','A9_BTN_valider');
	
	
	EcranVersFichier(VersPrimitif('PAGE_info_sentinelle'));
	HModifie(getRef('Sentinelle'));
	;
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_fermer (serveur) :: (PCode de Clic sur %1!s!)
function& A10_BTN_fermer16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_info_sentinelle','A10_BTN_fermer');
	
	
	;
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_INFO_SENTINELLE','PAGE_info_sentinelle');

// Code de déclaration des globales de page
function& PAGE_info_sentinelle0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_info_sentinelle','PAGE_info_sentinelle');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_info_sentinelle
	PAGE_info_sentinelle0();



// Code d'initialisation de page
	PAGE_info_sentinelle28();

}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_INFO_SENTINELLE','PAGE_info_sentinelle');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_INFO_SENTINELLE)){
$_BTNACTION = TrouveBouton( $PAGE_INFO_SENTINELLE );
if ($_BTNACTION=='A9') { 
//-------------------------------------------------------------------
//  PCodes de A9_BTN_valider
//-------------------------------------------------------------------
	A9_BTN_valider16();

}
if ($_BTNACTION=='A10') { 
//-------------------------------------------------------------------
//  PCodes de A10_BTN_fermer
//-------------------------------------------------------------------
	A10_BTN_fermer16();

}

}
if ( !bRenvoitCodeHTML($PAGE_INFO_SENTINELLE,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_info_sentinelle 04/02/2025 19:59 WEBDEV 28 28.0.459.4 --><html lang="fr" class="htmlstd html5">
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
<link rel="stylesheet" type="text/css" href="PAGE_info_sentinelle_style.css?10000c3ce1e90">
<style type="text/css">
body{ position:relative;line-height:normal;height:auto; min-height:100%; color:#5f6469;} body{}html {background-color:#f8f9fa;position:relative;}#page{position:relative; background-color:#ffffff;}html {height:100%;overflow-x:hidden;} body,form {height:auto; min-height:100%;margin:0 auto !important;box-sizing:border-box;} .dzA4{width:100%;height:76px;;overflow-x:hidden;;overflow-y:hidden;position:relative;}.A1{-webkit-appearance:none;}.A2{-webkit-appearance:none;}.A3{-webkit-appearance:none;}.A5{-webkit-appearance:none;}.A6{-webkit-appearance:none;}.A7{-webkit-appearance:none;}#A9,#bzA9{color:#003F80;border-left:1px solid #003F80;border-top:1px solid #003F80;border-right:1px solid #003F80;border-bottom:1px solid #003F80;}#A10,#bzA10{color:#003F80;border-left:1px solid #003F80;border-top:1px solid #003F80;border-right:1px solid #003F80;border-bottom:1px solid #003F80;}.A14{-webkit-appearance:none;}.A13{-webkit-appearance:none;}.A8{-webkit-appearance:none;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_INFO_SENTINELLE',15,'_COM')(event); " class="wbRwd"><form name="PAGE_INFO_SENTINELLE" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_INFO_SENTINELLE',18,void 0)(event); " method="post" class="clearfix"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_INFO_SENTINELLE->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value=""><input type="hidden" name="WD_ACTION_" value=""></div><div  class="clearfix pos1"><div  id="page" class="clearfix pos2" data-window-width="311" data-window-height="570" data-width="311" data-height="570" data-media="[{'query':'@media only all and (min-width: 398px)','attr':{'data-window-width':'398','data-width':'398'}},{'query':'@media only all and (min-width: 841px)','attr':{'data-window-width':'841','data-width':'841'}}]"><div  class="clearfix pos3"><div  class="clearfix ancragecenter pos4"><div class="lh0 dzSpan dzA4" id="dzA4" style=""><span style="position:absolute;top:0px;left:0px;width:100%;height:100%;"><img src="../ext/WhatsApp%20Image%202025-01-21%20at%2015.47.27.jpeg" alt="" id="A4" class="Image wbImgHomothetiqueModeAdapteCentre padding" style=" width:100%; height:76px;display:block;border:0;"></span></div></div><div  class="clearfix pos5"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:296px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:296px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA1">
<tr><td style=" height:31px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:289px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:296px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA1">
<li style=" height:31px;"><table style=" width:296px;height:31px;"><tr><td id="lzA1" class="Normal padding webdevclass-riche"><label for="A1"><?php echo $A1_SAI_Nom->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:31px;border-collapse:separate;border:0;outline:none;" id="bzA1"><tr><td style="border:none;" id="tzA1" class="valignmiddle"><INPUT TYPE="text" MAXLENGTH="50" NAME="A1" VALUE="<?php echo $A1_SAI_Nom->GetValeurHTML(); ?>" id="A1" class="SAI A1 padding webdevclass-riche"></td></tr></table></li></ul></TD></TR>
</TABLE></TD></TR>
</TABLE></td></tr></table></TD></TR>
</TABLE></TD></TR>
</TABLE></TD></TR>
</TABLE></div><div  class="clearfix pos6"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA2">
<tr><td style=" height:31px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:294px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA2">
<li style=" height:31px;"><table style=" width:301px;height:31px;"><tr><td id="lzA2" class="Normal padding webdevclass-riche"><label for="A2"><?php echo $A2_SAI_Prenom->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:31px;border-collapse:separate;border:0;outline:none;" id="bzA2"><tr><td style="border:none;" id="tzA2" class="valignmiddle"><INPUT TYPE="text" MAXLENGTH="50" NAME="A2" VALUE="<?php echo $A2_SAI_Prenom->GetValeurHTML(); ?>" id="A2" class="SAI A2 padding webdevclass-riche"></td></tr></table></li></ul></TD></TR>
</TABLE></TD></TR>
</TABLE></td></tr></table></TD></TR>
</TABLE></TD></TR>
</TABLE></TD></TR>
</TABLE></div><div  class="clearfix pos7"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA3">
<tr><td style=" height:31px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:294px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA3">
<li style=" height:31px;"><table style=" width:301px;height:31px;"><tr><td id="lzA3" class="Normal padding webdevclass-riche"><label for="A3"><?php echo $A3_SAI_Adresse->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:31px;border-collapse:separate;border:0;outline:none;" id="bzA3"><tr><td style="border:none;" id="tzA3" class="valignmiddle"><INPUT TYPE="text" MAXLENGTH="50" NAME="A3" VALUE="<?php echo $A3_SAI_Adresse->GetValeurHTML(); ?>" id="A3" class="SAI A3 padding webdevclass-riche"></td></tr></table></li></ul></TD></TR>
</TABLE></TD></TR>
</TABLE></td></tr></table></TD></TR>
</TABLE></TD></TR>
</TABLE></TD></TR>
</TABLE></div><div  class="clearfix pos8"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA5">
<tr><td style=" height:31px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:294px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA5">
<li style=" height:31px;"><table style=" width:301px;height:31px;"><tr><td id="lzA5" class="Normal padding webdevclass-riche"><label for="A5"><?php echo $A5_SAI_CP->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA5"><tr><td style="border:none;" id="tzA5" class="valignmiddle"><INPUT TYPE="text" MAXLENGTH="50" NAME="A5" VALUE="<?php echo $A5_SAI_CP->GetValeurHTML(); ?>" id="A5" class="SAI A5 padding webdevclass-riche"></td></tr></table></li></ul></TD></TR>
</TABLE></TD></TR>
</TABLE></td></tr></table></TD></TR>
</TABLE></TD></TR>
</TABLE></TD></TR>
</TABLE></div><div  class="clearfix pos9"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA6">
<tr><td style=" height:31px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:294px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA6">
<li style=" height:31px;"><table style=" width:301px;height:31px;"><tr><td id="lzA6" class="Normal padding webdevclass-riche"><label for="A6"><?php echo $A6_SAI_Ville->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:31px;border-collapse:separate;border:0;outline:none;" id="bzA6"><tr><td style="border:none;" id="tzA6" class="valignmiddle"><INPUT TYPE="text" MAXLENGTH="50" NAME="A6" VALUE="<?php echo $A6_SAI_Ville->GetValeurHTML(); ?>" id="A6" class="SAI A6 padding webdevclass-riche"></td></tr></table></li></ul></TD></TR>
</TABLE></TD></TR>
</TABLE></td></tr></table></TD></TR>
</TABLE></TD></TR>
</TABLE></TD></TR>
</TABLE></div><div  class="clearfix pos10"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:210px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:210px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA14">
<tr><td style=" height:31px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:203px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:210px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA14">
<li style=" height:31px;"><table style=" width:210px;height:31px;"><tr><td id="lzA14" class="Normal padding webdevclass-riche"><label for="A14"><?php echo $A14_SAI_Telephone->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:23px;border-collapse:separate;border:0;outline:none;" id="bzA14"><tr><td style="border:none;" id="tzA14" class="valignmiddle"><INPUT TYPE="text" MAXLENGTH="14" NAME="A14" VALUE="<?php echo $A14_SAI_Telephone->GetValeurHTML(); ?>" onkeypress="return NumTelFr(event); " id="A14" class="SAI A14 padding webdevclass-riche"></td></tr></table></li></ul></TD></TR>
</TABLE></TD></TR>
</TABLE></td></tr></table></TD></TR>
</TABLE></TD></TR>
</TABLE></TD></TR>
</TABLE></div><div  class="clearfix pos11"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:300px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:300px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA13">
<tr><td style=" height:31px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:293px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:300px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA13">
<li style=" height:31px;"><table style=" width:300px;height:31px;"><tr><td id="lzA13" class="Normal padding webdevclass-riche"><label for="A13"><?php echo $A13_SAI_EMail->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:23px;border-collapse:separate;border:0;outline:none;" id="bzA13"><tr><td style="border:none;" id="tzA13" class="valignmiddle"><INPUT TYPE="text" MAXLENGTH="260" NAME="A13" VALUE="<?php echo $A13_SAI_EMail->GetValeurHTML(); ?>" onkeypress="return Email(event); " id="A13" class="SAI A13 padding webdevclass-riche"></td></tr></table></li></ul></TD></TR>
</TABLE></TD></TR>
</TABLE></td></tr></table></TD></TR>
</TABLE></TD></TR>
</TABLE></TD></TR>
</TABLE></div><div  class="clearfix pos12"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA7">
<tr><td style=" height:31px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:294px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:301px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA7">
<li style=" height:31px;"><table style=" width:301px;height:31px;"><tr><td id="lzA7" class="Normal padding webdevclass-riche"><label for="A7"><?php echo $A7_SAI_Login->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:31px;border-collapse:separate;border:0;outline:none;" id="bzA7"><tr><td style="border:none;" id="tzA7" class="valignmiddle"><INPUT TYPE="text" MAXLENGTH="50" NAME="A7" VALUE="<?php echo $A7_SAI_Login->GetValeurHTML(); ?>" id="A7" class="SAI A7 padding webdevclass-riche"></td></tr></table></li></ul></TD></TR>
</TABLE></TD></TR>
</TABLE></td></tr></table></TD></TR>
</TABLE></TD></TR>
</TABLE></TD></TR>
</TABLE></div><div  class="clearfix pos13"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:248px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:248px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:100%;"><table style=" width:100%;" id="czA8">
<tr><td style=" height:31px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:222px;"><TABLE style=" width:100%;border-collapse:separate;">
<TR><TD style=" width:248px;"><ul style=" width:100%;" class="wbLibChamp wbLibChampA8">
<li style=" height:31px;"><table style=" width:248px;height:31px;"><tr><td id="lzA8" class="Normal padding webdevclass-riche"><label for="A8"><?php echo $A8_SAI_Mot_de_passe->pszGetLibelleHTML(); ?></label></td></tr></table></li><li style=" width:100%;"><table style=" width:100%;border-spacing:0;height:31px;border-collapse:separate;border:0;outline:none;" id="bzA8"><tr><td style="border:none;" id="tzA8" class="valignmiddle"><INPUT TYPE="text" NAME="A8" VALUE="<?php echo $A8_SAI_Mot_de_passe->GetValeurHTML(); ?>" id="A8" class="SAI A8 padding webdevclass-riche"></td></tr></table></li></ul></TD></TR>
</TABLE></TD></TR>
</TABLE></td></tr></table></TD></TR>
</TABLE></TD></TR>
</TABLE></TD></TR>
</TABLE></div><div  class="clearfix pos14"><div  class="clearfix pos15"><table style=" width:100%;border-spacing:0;height:37px;border-collapse:separate;border:0;outline:none;" id="bzA9"><tr><td style="border:none;" id="tzA9" class="valignmiddle"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_INFO_SENTINELLE',18,void 0)()){_JAEE(_PAGE_,'A9',16,2,48);} " id="A9" class="BTN-Style-1 wblien bbox padding webdevclass-riche" style="display:block;width:100%;height:auto;min-height:37px;width:100%;height:auto;min-height:37px;">Valider</button></td></tr></table></div><div  class="clearfix pos16"><table style=" width:100%;border-spacing:0;height:37px;border-collapse:separate;border:0;outline:none;" id="bzA10"><tr><td style="border:none;" id="tzA10" class="valignmiddle"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_INFO_SENTINELLE',18,void 0)()){_JAEE(_PAGE_,'A10',16,2,48);} " id="A10" class="BTN-Style-1 wblien bbox padding webdevclass-riche" style="display:block;width:100%;height:auto;min-height:37px;width:100%;height:auto;min-height:37px;">Fermer</button></td></tr></table></div></div></div></div></div><?php function construireTexteRiche_A8_SAI_Mot_de_passe(){ global $A8_SAI_Mot_de_passe,$A8_SAI_Mot_de_passe;$s="Mot de passe";return $s;}function construireTexteRiche_A7_SAI_Login(){ global $A7_SAI_Login,$A7_SAI_Login;$s="Login";return $s;}function construireTexteRiche_A13_SAI_EMail(){ global $A13_SAI_EMail,$A13_SAI_EMail;$s="eMail :";return $s;}function construireTexteRiche_A14_SAI_Telephone(){ global $A14_SAI_Telephone,$A14_SAI_Telephone;$s="Téléphone :";return $s;}function construireTexteRiche_A6_SAI_Ville(){ global $A6_SAI_Ville,$A6_SAI_Ville;$s="Ville";return $s;}function construireTexteRiche_A5_SAI_CP(){ global $A5_SAI_CP,$A5_SAI_CP;$s="Code postal";return $s;}function construireTexteRiche_A3_SAI_Adresse(){ global $A3_SAI_Adresse,$A3_SAI_Adresse;$s="Adresse";return $s;}function construireTexteRiche_A2_SAI_Prenom(){ global $A2_SAI_Prenom,$A2_SAI_Prenom;$s="Prénom";return $s;}function construireTexteRiche_A1_SAI_Nom(){ global $A1_SAI_Nom,$A1_SAI_Nom;$s="Nom";return $s;} ?>
</form>
<script type="text/javascript">var _bTable16_=false;
</script>
<script type="text/javascript" src="./res/WWConstante5.js?3fffede2f4ed5"></script>
<script type="text/javascript" src="./res/WDUtil.js?3ffff5c0b400e"></script>
<script type="text/javascript" src="./res/StdAction.js?3000082445df6"></script>
<script type="text/javascript" src="./res/WDChamp.js?300018421ea7d"></script>
<script type="text/javascript" src="./res/WDXML.js?30003a1ac501a"></script>
<script type="text/javascript" src="./res/WDAJAX.js?3000c5c0b400e"></script>
<script type="text/javascript" src="./res/WD.js?3002cbe23185d"></script>
<script type="text/javascript">
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJ4X3Bjc29mdF9ub21fbG9naXF1ZSI6IlBBR0VfaW5mb19zZW50aW5lbGxlIiwieF9wY3NvZnRfdHlwZV9sb2dpcXVlIjoiNjU1MzgiLCJ4X3Bjc29mdF9pZF9lbnNlbWJsZSI6IjUxNTY1NzM0MTM4NzA5OTYxMzkiLCJtYXBwaW5ncyI6IkEifQ==
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/LES_SENTINELLES_DE_LA_MER_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _WW_SEPMILLIER_="<?php echo ($_gszSEPMIL) ?>";
var _WW_SEPDECIMAL_="<?php echo ($_gszSEPDEC) ?>";
var _PHPID_="<?php echo session_name() . '=' . session_id(); ?>";
var _PAGE_=document["PAGE_INFO_SENTINELLE"];
NSPCS.NSWDW.SetDeclaration("DAAAAAEAAAABAAAABAAAAAAAAAAIAAAAAAAAAA==");
<!--
var _COL={9:"#f5cbc8",66:"#d93025"};
clWDUtil.DeclareTraitementEx("PAGE_INFO_SENTINELLE",true,[18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();var t=[];var c;c=_PAGE_["A8"];if(c.value==""){t.push(clWDUtil.sGetErreurChampObligatoire("Mot de passe","A8"));_PAGE_["A8"].focus();}if(0<t.length){alert(t.join('\n'));return false;}return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_INFO_SENTINELLE",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript">var bPCSFR=true;</script><script type="text/javascript" src="res/WDLIB.JS?20007a4537def"></script><script type="text/javascript" src="res/jquery-3.js?2000086c54b0a"></script><script type="text/javascript" src="res/jquery-ui.js?20006598c0fa6"></script><script type="text/javascript" src="res/jquery-effet.js?20004374c605b"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200051bfcee3e"></script><style type="text/css">.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}@media only all and (min-width: 398px){.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}}@media only all and (min-width: 841px){.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ delay : 1000,	items: "[title]:not(iframe,svg)", position : {my: 'left top+20',collision: 'flip'},	track : false, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); ui.tooltip.position( { my: 'left+15 center', at: 'right center', of : event} ); },content: function(callback) { callback($(this).prop('title').replace(/\n/g, '\x3Cbr /\x3E')); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_91=ob_get_contents();ob_end_clean();echo tidyHTML(_cp1252_to_utf8($_PHP_VAR_TMP_91)); ?>