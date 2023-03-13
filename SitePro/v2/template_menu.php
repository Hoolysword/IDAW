<?php
function renderMenuToHTML($currentPageId) {
// un tableau qui d\'efinit la structure du site

$mymenu = array(
// idPage titre
'index' => array( 'Accueil' ),
'cv' => array( 'Cv' ),
'projets' => array('Mes Projets')
);
// ...
echo "<ul> ";
foreach($mymenu as $pageId => $pageParameters) {
    if($pageId==$currentPageId) {
    
        echo "<li > <a id='currentPage' href='{$currentPageId}.php'>{$pageParameters[0]} </a></li> <br>";
    }

    else
    {

    
        echo " <li ><a href='${pageId}.php'>{$pageParameters[0]} </a></li> <br>";
    }
}
echo "</ul> ";
// ...
}
?>