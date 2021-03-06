/* global jssor_options */

jQuery( document ).ready(function ($) {

	var jssor_1_options = {
		$Loop: 0,
		$DragOrientation: 1,
		$ThumbnailNavigatorOptions: {
			$Class: $JssorThumbnailNavigator$,
			$Cols: 3,
			$SpacingX: parseInt(jssor_options.spaceX),
			$SpacingY: parseInt(jssor_options.spaceY),
			$Orientation: parseInt(jssor_options.orientation),
			$Loop: 0,
			$ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$
			}
		}
	};

	var jssor_1_slider = new $JssorSlider$( "jssor_1", jssor_1_options ),
	easyzoom = [],
	easyZoomApi = [];

	//responsive code begin
	//you can remove responsive code if you don't want the slider scales while window resizing
	function ScaleSlider() {
			var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
			if ( refSize ) {
					refSize = Math.min( refSize, 960 );
					refSize = Math.max( refSize, 290 );
					jssor_1_slider.$ScaleWidth( refSize );
			}
			else {
					window.setTimeout(ScaleSlider, 30 );
			}
	}
	function zoom() {
		if ( 768 > Math.min( $( window ).width(), screen.width ) ) {
			easyZoomApi.forEach(function( item, i, arr ) {
				if ( item.$image ){
					item.teardown();
				}
			} );
			$( '.single-product-main_image:last > div.easyzoom' ).on( 'click', function( event ) {
				event.preventDefault();
			} );
		} else {
			easyZoomApi.forEach(function( item, i, arr ) {
				if ( !item.$image ){
					item._init();
				}
			} );
		}
	}
	ScaleSlider();
	$( window ).bind( "load", ScaleSlider );
	$( window ).bind( "resize", ScaleSlider );
	$( window ).bind( "orientationchange", ScaleSlider );

	$( window ).bind( "resize", zoom );
	$( window ).bind( "orientationchange", zoom );
	//responsive code end

	var items = [];
	$( '.single-product-main_image:last' ).find( '.easyzoom' ).each(function() {
		items.push( {
			src: $ (this ).find( '> a' ).attr( 'href' )
		} );
	});

	jssor_1_slider.$On( $JssorSlider$.$EVT_STATE_CHANGE, function( slideIndex, progress ){

		if ( !easyzoom.length ) {
			$( '.single-product-main_image:last > div.easyzoom' ).each(function(n){
				easyzoom[n] = $( this ).easyZoom();
				easyZoomApi[n] = easyzoom[n].data('easyZoom');
			});
		}

		if ( 768 > Math.min( $( window ).width(), screen.width ) ) {
			if ( easyZoomApi[slideIndex].$image ){
				easyZoomApi[slideIndex].teardown();
			}
		} else {
			if ( !easyZoomApi[slideIndex].$image ){
				easyZoomApi[slideIndex]._init();
			}
		}

		$( '.single-product-images .enlarge' ).click( function() {

			$.magnificPopup.open( {
				items:items,
				gallery: {
					enabled: true
				},
				type: 'image'
			}, slideIndex );
		});
	});


});