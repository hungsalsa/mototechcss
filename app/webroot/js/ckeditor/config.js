/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = baseUrl + 'js/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = baseUrl + 'js/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = baseUrl + 'js/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = baseUrl + 'js/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = baseUrl + 'js/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = baseUrl + 'js/kcfinder/upload.php?type=flash';
    config.toolbarGroups = [
        { name: 'document',    groups: [ 'mode' ] },
//    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
//    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
//    { name: 'forms' },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        '/',
        { name: 'links' },
        { name: 'insert' },
        '/',
        { name: 'styles' },
        { name: 'colors' },
        { name: 'tools' },
        { name: 'others' }
//    { name: 'about' }
    ];
};
