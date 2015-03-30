<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 30/03/15
 * Time: 11:16
 */


function loadBlog($blog)
{
    ?>

    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="container_blog">
                    <div id="content_blog">

                       <?
                       foreach($blog as $post)
                       {
                           ?>
                        <div class="blog_item">
                            <div class="blog_item_user">
                                <p><?php echo $post->getUsername();?></p>
                            </div><!-- blog_item_user -->
                            <div class="blog_item_post">
                                <div class="clearer"></div><!-- clearer -->
                                <div class="blog_item_title">
                                    <h1><?php echo $post->getTitle(); ?></h1>
                                </div><!-- blog_item_title -->
                                <div class="blog_item_text">
                                    <p><?php echo $post->getText(); ?></p>
                                </div><!-- blog_item_text -->

                            </div><!-- blog_item_post -->
                        </div><!-- blog_item -->

                        <?php
                       }
                       ?>

                    </div><!-- content_blog -->

                    <div class="clearer"></div>
                    <div id="new_blog">
                        <form class="form-style" method="POST" action="BlogController.php">
                            <h1>Nieuwe blog toevoegen</h1>
                            <ul>
                                <li>
                                    <input type="text" name="username" class="field-style field-split align-left" placeholder="Gebruikersnaam" />
                                    <input type="text" name="title" class="field-style field-split align-right" placeholder="Titel" />

                                </li>
                                <li>
                                    <textarea name="text" class="field-style" placeholder="Blogpost"></textarea>
                                </li>
                                <li>
                                    <input type="submit" value="Submit blog" />
                                </li>
                            </ul>
                        </form>

                    </div><!-- new_blog -->
                </div><!-- container_blog -->

            </div><!-- content -->
            <div class="clearer"></div><!-- clearer -->

        </div><!-- main -->
        <div class="clearer"></div> <!-- clearer -->
        <div class="push"></div><!-- push -->
    </div><!-- wrapper -->


<?php
}
?>