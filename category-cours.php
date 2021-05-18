<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */
 
get_header();
?>
 
    <main id="primary" class="site-main">
 
        <?php if ( have_posts() ) : ?>
 
            <header class="page-header">
    
                <?php
               
                echo '<h1 class="page-title">' . single_cat_title( '', false ) . '</h1>';
                the_archive_description( '<div class="archive-description">', '</div>' );
        
                ?>  
            
            </header><!-- .page-header -->
            <section class="session">
            <?php
            /* Start the Loop */
 
            while ( have_posts() ) :
                the_post();
                
                convertirTableau($tPropriété);
 
                $precedent = "XXXXXX";
 
                get_template_part( 'template-parts/content', 'cours-article' );
 
            endwhile;?>
 
            </section>
 
        <?php endif; ?>
        
 
    </main>
 
<?php

get_footer();
 
function convertirTableau(&$tPropriété)
{

 //propriétés à afficher
    $tPropriété['titre'] = get_the_title(); 
    $tPropriété['sigle'] = substr($tPropriété['titre'], 0, 7);
    $tPropriété['nbHeure'] = substr($tPropriété['titre'],-6,6);
   // $tPropriété['titrePartiel'] = substr($tPropriété['titre'],8,-6);
    $tPropriété['session'] = substr($tPropriété['titre'], 4,1);
    $tPropriété['typeCours'] = get_field('type_de_cours');
}
