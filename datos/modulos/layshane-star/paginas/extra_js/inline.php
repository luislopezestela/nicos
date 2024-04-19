<script type="text/javascript">
function layshane_carousel_views() {
  var COMPONENT_SELECTOR = '.carousel__wrapper';
  var CONTROLS_SELECTOR = '.carousel__controls';
  var CONTENT_SELECTOR = '.carousel__content';
  var components = document.querySelectorAll( COMPONENT_SELECTOR );
  for ( let i = 0; i < components.length; i++ ) {
    const component = components[ i ];
    const content = component.querySelector( CONTENT_SELECTOR );
    let isDragStart = false, isDragging = false;
    let x = 0;
    let mx = 0;
    const maxScrollWidth = content.scrollWidth - content.clientWidth / 2 - content.clientWidth / 2;
    const nextButton = component.querySelector( '.arrow-next' );
    const prevButton = component.querySelector( '.arrow-prev' );

    if ( maxScrollWidth !== 0 ) {
      component.classList.add( 'has-arrows' );
    }

    if ( nextButton ) {
      nextButton.addEventListener( 'click', function ( event ) {
        event.preventDefault();
        x = content.clientWidth / 2 + content.scrollLeft + 0;
        content.scroll( {
          left: x,
          behavior: 'smooth',
        } );
      } );
    }

    if ( prevButton ) {
      prevButton.addEventListener( 'click', function ( event ) {
        event.preventDefault();
        x = content.clientWidth / 2 - content.scrollLeft + 0;
        content.scroll( {
          left: -x,
          behavior: 'smooth',
        } );
      } );
    }

    /**
     * @param {object} e event object.
     */
    const mousemoveHandler = ( e ) => {
      if(!isDragStart) return;
      e.preventDefault();
      isDragging = true;
      content.classList.add("dragging");
      content.classList.add("no-click");
      const mx2 = e.pageX - content.offsetLeft;
      if ( mx ) {
        content.scrollLeft = content.sx + mx - mx2;
      }
    };

    /**
     * @param {object} e event object. 
     */
    const mousedownHandler = ( e ) => {
      isDragStart = true;
      content.sx = content.scrollLeft;
      mx = e.pageX - content.offsetLeft;
    };

    const scrollHandler = () => {
      toggleArrows();
    };
    const toggleArrows = () => {
      if ( content.scrollLeft > maxScrollWidth - 10 ) {
        nextButton.classList.add( 'disabled' );
        content.classList.remove("more_its");
      } else if ( content.scrollLeft < 10 ) {
        prevButton.classList.add( 'disabled' );
        content.classList.add("more_its");
      } else {
        content.classList.add("more_its");
        nextButton.classList.remove( 'disabled' );
        prevButton.classList.remove( 'disabled' );
      }
    };
    const mouseupHandler = () => {
      isDragStart = false;
      mx = 0;
      content.classList.remove( 'dragging' );
      content.classList.remove("no-click");
      if(!isDragging) return;
      isDragging = false;
    };

    /**
     * @param {object} e event object.
     */
    const touchmoveHandler = (e) => {
        if (!isDragStart) return;
        e.preventDefault();
        isDragging = true;
        content.classList.add("dragging");
        content.classList.add("no-click");
        const mx2 = e.touches[0].pageX - content.offsetLeft;
        if (mx) {
            content.scrollLeft = content.sx + mx - mx2;
        }
    };

    /**
     * @param {object} e event object. 
     */
    const touchstartHandler = (e) => {
        isDragStart = true;
        content.sx = content.scrollLeft;
        mx = e.touches[0].pageX - content.offsetLeft;
    };

    content.addEventListener('touchstart', touchstartHandler,{passive: true});
    content.addEventListener('touchmove', touchmoveHandler);
    content.addEventListener( 'mousedown', mousedownHandler);
    document.addEventListener( 'mousemove', mousemoveHandler);
    if ( component.querySelector( CONTROLS_SELECTOR ) !== undefined ) {
      content.addEventListener( 'scroll', scrollHandler );
    }
    document.addEventListener( 'mouseup', mouseupHandler );
    content.addEventListener( 'touchend', mouseupHandler);
    document.addEventListener('mouseleave', () => {
        isDragStart = false;
        isDragging = false;
    });
  }
};
function view_images_prod() {
  var lightboxEnabled = true;
  var flkty_1 = new Flickity('.wo_post_prod_full_img', {
      fullscreen: true,
      fade: true,
      pageDots: false,
      lazyLoad: true,
      imagesLoaded: true
  });

  var flkty_2 = new Flickity('.wo_post_prod_full_img_slider', {
      asNavFor: '.wo_post_prod_full_img',
      contain: true,
      pageDots: false,
      imagesLoaded: true,
      prevNextButtons: false
  });
  flkty_1.on('dragStart', () => flkty_1.slider.style.pointerEvents = 'none');
  flkty_1.on('dragEnd', () => flkty_1.slider.style.pointerEvents = 'auto');
  flkty_2.on('dragStart', () => flkty_2.slider.style.pointerEvents = 'none');
  flkty_2.on('dragEnd', () => flkty_2.slider.style.pointerEvents = 'auto');
}
</script>