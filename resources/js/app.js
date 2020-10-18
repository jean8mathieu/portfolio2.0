require('./bootstrap');
require('jquery');
require('./tokenize2');
require('easymde/dist/easymde.min')
import editorInit from './easymde.init'
$('.markdown-editor').each(function(index) {
    editorInit(this);
})

