/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.height = 350;
    config.toolbar_BijayToolbar =
        [
            { name: 'document', items : [ 'Source','NewPage','Preview','Templates' ] },
            { name: 'clipboard', items : [ 'Cut','Copy','Paste'] },
            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
            { name: 'insert', items : [ 'Smiley','SpecialChar','PageBreak','HorizontalRule'] },
            '/',
            { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
            { name: 'colors', items : [ 'TextColor','BGColor' ] },
            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','Underline','-','RemoveFormat' ] },
            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
                'CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'] },
            { name: 'links', items : [ 'Link','Unlink' ] },
            { name: 'tools', items : [ 'ShowBlocks' ] }
        ];
        config.toolbar = 'BijayToolbar';
        config.protectedSource.push( /<\?[\s\S]*?\?>/g );
        config.resize_dir = 'vertical';

        //If you want to disable Advanced Content Filter
        config.allowedContent = true;

        /*
            dont let html to encode
         */
        config.htmlEncodeOutput = false;
        config.entities = false;

    /*
        for support microsoft word formatting into it like tables, colouring inside table cells
     */
    config.pasteFromWordRemoveFontStyles=false;
    config.pasteFromWordRemoveStyles=false;
};
