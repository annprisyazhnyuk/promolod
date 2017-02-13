<?php
/**
 * META BOX for added link (for page 'Mass media')
 * Adds a meta box to the post editing screen
 */
function promolod_custom_meta() {
    add_meta_box( 'promolod_meta', __( 'Джерело публікації', 'promolod' ), 'promolod_meta_callback', 'media' );
}
add_action( 'add_meta_boxes', 'promolod_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function promolod_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'promolod_nonce' );
    $promolod_stored_meta = get_post_meta( $post->ID );
    ?>

    <p>
        <label for="address" class="meta-box-title"><?php _e( "Тут додати посилання [обов'язково вказати http:// ]  ", 'promolod' )?></label>
        <input type="text" name="address" id="address" value="<?php if ( isset ( $promolod_stored_meta['address'] ) ) echo $promolod_stored_meta['address'][0]; ?>" />
    </p>

    <?php
}

/**
 * Saves the custom meta input
 */
function promolod_meta_save( $post_id ) {

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'promolod_nonce' ] ) && wp_verify_nonce( $_POST[ 'promolod_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if( isset( $_POST[ 'address' ] ) ) {
        update_post_meta( $post_id, 'address', sanitize_text_field( $_POST[ 'address' ] ) );
    }

}
add_action( 'save_post', 'promolod_meta_save' );


/* -----------------------------------------  META-BOX 'PARTNERS'  --------------------------------------------- */
    /* ---------------------------------------------------------------------------------- */

/**
 * META BOX for page Partners
 * Adds a meta box to the post editing screen
 */
function promolod_partner_custom_meta() {
    add_meta_box( 'promolod_partner_meta', __( 'Сайт партнера', 'promolod' ), 'promolod_partner_meta_callback', 'partners' );
}
add_action( 'add_meta_boxes', 'promolod_partner_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function promolod_partner_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'promolod_partner_nonce' );
    $promolod_partner_stored_meta = get_post_meta( $post->ID );
    ?>

    <p>
        <label for="partner" class="meta-box-title"><?php _e( "Тут додати посилання [обов'язково вказати http:// ]  ", 'promolod' )?></label>
        <input type="text" name="partner" id="partner" value="<?php if ( isset ( $promolod_partner_stored_meta['partner'] ) ) echo $promolod_partner_stored_meta['partner'][0]; ?>" />
    </p>

    <?php
}

/**
 * Saves the custom meta input
 */
function promolod_partner_meta_save( $post_id ) {

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'promolod_partner_nonce' ] ) && wp_verify_nonce( $_POST[ 'promolod_partner_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if( isset( $_POST[ 'partner' ] ) ) {
        update_post_meta( $post_id, 'partner', sanitize_text_field( $_POST[ 'partner' ] ) );
    }

}
add_action( 'save_post', 'promolod_partner_meta_save' );








