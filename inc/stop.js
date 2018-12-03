jQuery( document ).ready( function( $ ) {
    $( '#post' ).submit( function( e ) {
        alert( 'Stopping Form From Submitting.' );
        return false;
    } );
} );