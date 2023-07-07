        <div class="pxl--author-info-e">
            <div class="entry-author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), $size = '370x257' ); ?>
            </div>
            <div class="entry-author-meta">
                <div class="author-description">
                    <?php the_author_meta( 'description' ); ?>
                </div>
                <?php builderrin_get_user_social(); ?>
            </div>
        </div>