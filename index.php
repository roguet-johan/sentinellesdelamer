<?php
//#28.0.380.0 Les sentinelles de la mer
ob_start();if (!defined('UNICODE_PAGE_UTF8')) define('UNICODE_PAGE_UTF8',false);
$gszId='Les sentinelles de la mer	PAGE_CONNEXION	20250204195930';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD28.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CBouton');
IHM_Include('CSaisie');
IHM_Include('CImage');


Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
WB_Include('WL/HF/HF.php');
WB_Include('HF.php');
WB_Include('WL/PAGE/Page.php');
// Equivalent de [%URL()%]
$gszURL='index.php';
$j=1;$i=1;
if (!isset($_SESSION)) session_start();
// protection contre register_globals = on
unset($PAGE_CONNEXION);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(0,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gtabCheminPage['PAGE_ADMINISTRATION']=array(5=>array('NOM'=>'PAGE-Administration','URL'=>'./'));
$gtabCheminPage['PAGE_PARTICIPENT']=array(5=>array('NOM'=>'PAGE-Participent','URL'=>'./'));
$gtabCheminPage['PAGE_INFO_SENTINELLE']=array(5=>array('NOM'=>'PAGE-info-sentinelle','URL'=>'./'));
$gszCheminPageInverse='./';
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
RechargementPageSiBesoin('PAGE_CONNEXION');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_CONNEXION']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_CONNEXION= $gTabVarSession['PAGE_CONNEXION'];
	$PAGE_CONNEXION->WB_RestaureContexte();
$MaPage =& $PAGE_CONNEXION;
$GLOBALS['PAGE_connexion'] =& $MaPage;
if (isset($gnIndiceAgencement) && $gnIndiceAgencement !== $MaPage->m_nIndiceAgencementCourant)
{

}
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_CONNEXION)) {
$PAGE_CONNEXION= new CPage(true);
$PAGE_CONNEXION->Nom = 'PAGE_connexion';
$PAGE_CONNEXION->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_CONNEXION->Alias = 'PAGE_CONNEXION';
$PAGE_CONNEXION->m_sNomPHP = 'PAGE_CONNEXION';
$PAGE_CONNEXION->Libelle = 'Connexion';
$PAGE_CONNEXION->bUTF8 = true;
$PAGE_CONNEXION->bHTML5 = true;
$PAGE_CONNEXION->bAvecContexte = true;
$PAGE_CONNEXION->sFichierPalette = '.\\res\\Material Blue 2.wpc';
$PAGE_CONNEXION->Plan = 1;
$PAGE_CONNEXION->ImageFond = '';
$MaPage =& $PAGE_CONNEXION;
$GLOBALS['PAGE_connexion'] =& $MaPage;
$A1_BTN_Connexion=&CreerChamp('CBouton');$PAGE_CONNEXION->WB_AjouteChamp('BTN_Connexion','A1',$A1_BTN_Connexion,'A1_BTN_Connexion');
$A1_BTN_Connexion->m_bLibelleRiche=true;

$A2_SAI_Email=&CreerChamp('CSaisie');$PAGE_CONNEXION->WB_AjouteChamp('SAI_Email','A2',$A2_SAI_Email,'A2_SAI_Email');
$A2_SAI_Email->SetChampFormate(false);
$A2_SAI_Email->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A2_SAI_Email->m_eBarreOutilsMode = 0;
$A2_SAI_Email->m_bLibelleRiche=true;

$A3_SAI_MotDePasse=&CreerChamp('CSaisie');$PAGE_CONNEXION->WB_AjouteChamp('SAI_MotDePasse','A3',$A3_SAI_MotDePasse,'A3_SAI_MotDePasse');
$A3_SAI_MotDePasse->SetChampFormate(false);
$A3_SAI_MotDePasse->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A3_SAI_MotDePasse->m_eBarreOutilsMode = 0;
$A3_SAI_MotDePasse->m_bLibelleRiche=true;

$A4_IMG_SansNom1=&CreerChamp('CImage',252,76,16447992);$PAGE_CONNEXION->WB_AjouteChamp('IMG_SansNom1','A4',$A4_IMG_SansNom1,'A4_IMG_SansNom1');
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



//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------
$A1_BTN_Connexion->Libelle = function_exists("construireTexteRiche_A1_BTN_Connexion") ? null : 'Connexion';
$A1_BTN_Connexion->JetonActif = false;


$A1_BTN_Connexion->lierVM('PAGE_connexion','BTN_Connexion','A1_BTN_Connexion');
$A2_SAI_Email->Couleur = 0x69645F;
$A2_SAI_Email->CouleurInitiale = 0x69645F;
$A2_SAI_Email->CouleurFond = 0xFFFFFF;
$A2_SAI_Email->CouleurFondInitiale = 0xFFFFFF;
$A2_SAI_Email->Valeur = '';
$A2_SAI_Email->Libelle = function_exists("construireTexteRiche_A2_SAI_Email") ? null : '';
$A2_SAI_Email->Masque = 'Login';
$A2_SAI_Email->m_nHauteur = 42;
$A2_SAI_Email->m_nLargeur = 141;
$A2_SAI_Email->m_nOpacite = 100;
$A2_SAI_Email->m_nCadrageHorizontal = -1;
$A2_SAI_Email->m_nCadrageVertical = 1;
$A2_SAI_Email->m_Police->m_bGras = true;
$A2_SAI_Email->m_Police->m_bItalique = false;
$A2_SAI_Email->m_Police->m_bSouligne = false;
$A2_SAI_Email->m_Police->m_sNom = 'Arial, Helvetica, sans-serif';
$A2_SAI_Email->m_Police->m_nTaille = '14px';
$A2_SAI_Email->m_nX = 84;
$A2_SAI_Email->m_nY = 363;
$A2_SAI_Email->m_clCouleurJauge = 0x000000;
$A2_SAI_Email->BoutonCalendrier = 0;
$A2_SAI_Email->EtatInitial = 0;
$A2_SAI_Email->VisibleInitial = 1;
$A2_SAI_Email->YInitial = 0;
$A2_SAI_Email->NombreColonne = 0;
$A2_SAI_Email->BulleTitre = '';
$A2_SAI_Email->JetonActif = false;
$A2_SAI_Email->JetonListeSeparateur = '';
$A2_SAI_Email->JetonAutoriseDoublon = false;
$A2_SAI_Email->JetonSupprimable = true;


$A2_SAI_Email->lierVM('PAGE_connexion','SAI_Email','A2_SAI_Email');
$A3_SAI_MotDePasse->Couleur = 0x69645F;
$A3_SAI_MotDePasse->CouleurInitiale = 0x69645F;
$A3_SAI_MotDePasse->CouleurFond = 0xFFFFFF;
$A3_SAI_MotDePasse->CouleurFondInitiale = 0xFFFFFF;
$A3_SAI_MotDePasse->Valeur = '';
$A3_SAI_MotDePasse->Libelle = function_exists("construireTexteRiche_A3_SAI_MotDePasse") ? null : '';
$A3_SAI_MotDePasse->Masque = '0';
$A3_SAI_MotDePasse->m_nHauteur = 42;
$A3_SAI_MotDePasse->m_nLargeur = 140;
$A3_SAI_MotDePasse->m_nOpacite = 100;
$A3_SAI_MotDePasse->m_nCadrageHorizontal = -1;
$A3_SAI_MotDePasse->m_nCadrageVertical = 1;
$A3_SAI_MotDePasse->m_Police->m_bGras = true;
$A3_SAI_MotDePasse->m_Police->m_bItalique = false;
$A3_SAI_MotDePasse->m_Police->m_bSouligne = false;
$A3_SAI_MotDePasse->m_Police->m_sNom = 'Arial, Helvetica, sans-serif';
$A3_SAI_MotDePasse->m_Police->m_nTaille = '14px';
$A3_SAI_MotDePasse->m_nX = 84;
$A3_SAI_MotDePasse->m_nY = 458;
$A3_SAI_MotDePasse->m_clCouleurJauge = 0x000000;
$A3_SAI_MotDePasse->BoutonCalendrier = 0;
$A3_SAI_MotDePasse->EtatInitial = 0;
$A3_SAI_MotDePasse->VisibleInitial = 1;
$A3_SAI_MotDePasse->YInitial = 0;
$A3_SAI_MotDePasse->NombreColonne = 0;
$A3_SAI_MotDePasse->BulleTitre = '';
$A3_SAI_MotDePasse->JetonActif = false;
$A3_SAI_MotDePasse->JetonListeSeparateur = '';
$A3_SAI_MotDePasse->JetonAutoriseDoublon = false;
$A3_SAI_MotDePasse->JetonSupprimable = true;


$A3_SAI_MotDePasse->lierVM('PAGE_connexion','SAI_MotDePasse','A3_SAI_MotDePasse');
$A4_IMG_SansNom1->Valeur = '../ext/WhatsApp Image 2025-01-21 at 15.47.27.jpeg';
$A4_IMG_SansNom1->JetonActif = false;


$A4_IMG_SansNom1->lierVM('PAGE_connexion','IMG_SansNom1','A4_IMG_SansNom1');


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
//Clic sur BTN_Connexion (serveur) :: (PCode de Clic sur %1!s!)
function& A1_BTN_Connexion16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_connexion','A1_BTN_Connexion');
	global $A2_SAI_Email;
	global $A3_SAI_MotDePasse;
	
	
	HLitRecherchePremier(getRef('Sentinelle'),Rubrique('Sentinelle','Login'),VersPrimitif($A2_SAI_Email));
	if (VersBooleen(HTrouve(getRef('Sentinelle'))))
	{
		if (VersBooleen(Operateur(24866,Rubrique('Sentinelle','mdp'),getRef(''))))
		{
			;
		}
		else 
		{
			if (VersBooleen(Operateur(24866,Rubrique('Sentinelle','mdp'),$A3_SAI_MotDePasse)))
			{
				;
			}
			else 
			{
				Info(getRef('Oups ! Ton mot de passe n’est pas tout à fait juste. Essaie encore ou demande un coup de pouce si besoin !'));
			}
		}
	}
	else 
	{
		Info(getRef('Oups ! Ton identifiant semble jouer à cache-cache… Es-tu sûr qu’il est bien écrit ? Vérifie et retente ta chance !'));
	}
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_CONNEXION','PAGE_connexion');

// Code de déclaration des globales de page
function& PAGE_connexion0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_connexion','PAGE_connexion');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_connexion
	PAGE_connexion0();




}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_CONNEXION','PAGE_connexion');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_CONNEXION)){
$_BTNACTION = TrouveBouton( $PAGE_CONNEXION );
if ($_BTNACTION=='A1') { 
//-------------------------------------------------------------------
//  PCodes de A1_BTN_Connexion
//-------------------------------------------------------------------
	A1_BTN_Connexion16();

}

}
if ( !bRenvoitCodeHTML($PAGE_CONNEXION,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_connexion 04/02/2025 19:59 WEBDEV 28 28.0.459.4 --><html lang="fr" class="htmlstd html5">
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
<link rel="stylesheet" type="text/css" href="PAGE_connexion_style.css?100005721150f">
<style type="text/css">
body{ position:relative;line-height:normal;height:auto; min-height:100%; color:#5f6469;} body{}html {background-color:#f8f9fa;position:relative;}#page{position:relative; background-color:#ffffff;}html {height:100%;overflow-x:hidden;} body,form {height:auto; min-height:100%;margin:0 auto !important;box-sizing:border-box;} .dzA4{width:252px;height:76px;;overflow-x:hidden;;overflow-y:hidden;position:static;}#A6,#tzA6{font-size:13px;font-size:0.8125rem;text-align:justify;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_CONNEXION',15,'_COM')(event); " class="wbRwd"><form name="PAGE_CONNEXION" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_CONNEXION',18,void 0)(event); " method="post" class="clearfix"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_CONNEXION->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value="A1"><input type="hidden" name="WD_ACTION_" value=""></div><div  class="clearfix pos1"><div  id="page" class="clearfix pos2" data-window-width="309" data-window-height="600" data-width="309" data-height="600" data-media="[{'query':'@media only all and (min-width: 310px)','attr':{'data-window-width':'310','data-window-height':'565','data-width':'310','data-height':'565'}},{'query':'@media only all and (min-width: 841px)','attr':{'data-window-width':'841','data-window-height':'565','data-width':'841','data-height':'565'}}]"><div  class="clearfix pos3"><div  class="clearfix ancragecenter pos4"><div class="lh0 dzSpan dzA4" id="dzA4" style=""><img src="../ext/WhatsApp%20Image%202025-01-21%20at%2015.47.27.jpeg" alt="" id="A4" class="Image wbImgHomothetiqueModeAdapteCentre padding" style=" width:252px; height:76px;display:block;border:0;"></div></div><div  class="clearfix pos5"><table style=" width:100%;"><tr><td id="A6" class="TXT-Normal padding webdevclass-riche"><p>&nbsp;Salut Sentinelle ! Si c’est ta première connexion, pas besoin de te casser la tête : entre juste ton identifiant qui ta été fourni, sans mot de passe, et tu arriveras directement sur ton espace perso. Là, tu pourras compléter tes infos et choisir un mot de passe qui te ressemble !</p></td></tr></table></div><div  class="clearfix ancragecenter pos6"><table style=" width:100%;"><tr><td id="A5" class="TXT-Normal padding webdevclass-riche"><p>Votre login</p></td></tr></table></div><div  class="clearfix ancragecenter pos7"><table style=" width:100%;border-spacing:0;height:42px;border-collapse:separate;border:0;background:none;outline:none;" id="bzA2" class="l-1"><tr><td style="border:none;-ms-transform:none;-moz-transform:none;-webkit-transform:none;-o-transform:none;transform:none;" id="tzA2" class="valignmiddle"><INPUT TYPE="text" NAME="A2" VALUE="<?php echo $A2_SAI_Email->GetValeurHTML(); ?>" id="A2" class="l-1 A2 padding webdevclass-riche"></td></tr></table></div><div  class="clearfix ancragecenter pos8"><table style=" width:100%;"><tr><td id="A7" class="TXT-Normal padding webdevclass-riche"><p>Votre mot de passe</p></td></tr></table></div><div  class="clearfix ancragecenter pos9"><table style=" width:100%;border-spacing:0;height:42px;border-collapse:separate;border:0;background:none;outline:none;" id="bzA3" class="l-2"><tr><td style="border:none;-ms-transform:none;-moz-transform:none;-webkit-transform:none;-o-transform:none;transform:none;" id="tzA3" class="valignmiddle"><div style="position:relative;"><INPUT TYPE="password" NAME="A3" VALUE="" onkeyup="if (!this.wbMdpInit && !event.key && !!this.value) this.nextElementSibling.remove(); this.wbMdpInit=this.value!=''; clWDUtil.SetDisplay(this.nextElementSibling, !!this.value); " onblur="this.type='password'; " id="A3" class="l-2 A3 padding webdevclass-riche" style="padding-right:34px;"><div style="position:absolute;right:9px;top:50%;margin-top:-10px;display:none;<?php if (($A3_SAI_MotDePasse->Valeur)!='') {
 ?>visibility:hidden;<?php 
 } ?>"><a tabindex="-1" href="javascript:{}" ontouchstart="this.onmouseleave=this.onmouseup=this.onmousedown=undefined; this.parentNode.parentNode.firstElementChild.type=='password' ? this.parentNode.parentNode.firstElementChild.type='text' : this.parentNode.parentNode.firstElementChild.type='password'" onmousedown="this.parentNode.parentNode.firstElementChild.type='text'" onmouseleave="this.parentNode.parentNode.firstElementChild.type='password'" onmouseup="this.parentNode.parentNode.firstElementChild.type='password'"><img style="vertical-align:top" src="./res/MenuAfficheMDP.png" alt="..."></a></div></div></td></tr></table></div><div  class="clearfix ancragecenter pos10"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_CONNEXION',18,void 0)()){_JSL(_PAGE_,'A1','_self','','');} " id="A1" class="l-0 wblien bbox padding webdevclass-riche" style="width:100%;height:auto;min-height:42px;width:100%;height:auto;min-height:42px;display:inline-block;">Connexion</button></div></div></div></div>
</form>
<script type="text/javascript">var _bTable16_=false;
</script>
<script type="text/javascript" src="./res/WWConstante5.js?3fffede2f4ed5"></script>
<script type="text/javascript" src="./res/WDUtil.js?3ffff5c0b400e"></script>
<script type="text/javascript" src="./res/StdAction.js?3000082445df6"></script>
<script type="text/javascript" src="./res/WD.js?3002cbe23185d"></script>
<script type="text/javascript">
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJ4X3Bjc29mdF9ub21fbG9naXF1ZSI6IlBBR0VfY29ubmV4aW9uIiwieF9wY3NvZnRfdHlwZV9sb2dpcXVlIjoiNjU1MzgiLCJ4X3Bjc29mdF9pZF9lbnNlbWJsZSI6IjUxNTY1NzM0MTM4NzA5OTYxMzkiLCJtYXBwaW5ncyI6IkEifQ==
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/LES_SENTINELLES_DE_LA_MER_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _WW_SEPMILLIER_="<?php echo ($_gszSEPMIL) ?>";
var _WW_SEPDECIMAL_="<?php echo ($_gszSEPDEC) ?>";
var _PHPID_="<?php echo session_name() . '=' . session_id(); ?>";
var _PAGE_=document["PAGE_CONNEXION"];
NSPCS.NSWDW.SetDeclaration("DAAAAAEAAAABAAAABAAAAAAAAAAIAAAAAAAAAA==");
<!--
var _COL={9:"#f5cbc8",66:"#d93025"};
clWDUtil.DeclareTraitementEx("PAGE_CONNEXION",true,[18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_CONNEXION",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript" src="res/jquery-3.js?2000086c54b0a"></script><script type="text/javascript" src="res/jquery-ui.js?20006598c0fa6"></script><script type="text/javascript" src="res/jquery-effet.js?20004374c605b"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200051bfcee3e"></script><style type="text/css">.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}@media only all and (min-width: 310px){.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}}@media only all and (min-width: 841px){.wbTooltip{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;font-size:0.875rem;color:rgba(95,100,105, 0.75);text-align:left;vertical-align:middle;background-color:#FFFFFF;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;border-left:1px solid #DADCE0;border-top:1px solid #DADCE0;border-right:1px solid #DADCE0;border-bottom:1px solid #DADCE0;border-radius:2px;padding:3px 8px;}}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ delay : 1000,	items: "[title]:not(iframe,svg)", position : {my: 'left top+20',collision: 'flip'},	track : false, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); ui.tooltip.position( { my: 'left+15 center', at: 'right center', of : event} ); },content: function(callback) { callback($(this).prop('title').replace(/\n/g, '\x3Cbr /\x3E')); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_90=ob_get_contents();ob_end_clean();echo tidyHTML(_cp1252_to_utf8($_PHP_VAR_TMP_90)); ?>