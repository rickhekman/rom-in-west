var selectors = [
    '.entry-content p',
    '.entry-content ol',
    '.entry-content ul',
    '.entry-content h1',
    '.entry-content h2',
    '.entry-content h3',
    '.entry-content h4',
    '.entry-content h5',
    '.entry-content h6',
    '.wp-block-media-text__media',
    '.wp-block-button',
];

var el = document.querySelectorAll( selectors.toString() );
for ( var i=0; i < el.length; i++ ) {
    el[i].setAttribute( 'data-aos', 'fade-up' );
}
AOS.init({
    once: false
});