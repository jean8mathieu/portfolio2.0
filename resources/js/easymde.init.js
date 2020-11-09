import EasyMDE from 'easymde'

export default function (element) {
    element.removeAttribute('required')
    return new EasyMDE({
        element,
        toolbar: [
            'bold', 'italic', '|',
            'heading-1', 'heading-2', 'heading-3', '|',
            'code', 'quote', 'unordered-list', 'ordered-list', '|',
            'link', 'image', 'horizontal-rule', '|',
            'preview', 'side-by-side', 'fullscreen', '|',
            {
                name: 'guide',
                action: 'https://truckersmp.com/kb/443',
                className: 'fa fa-question-circle',
                noDisable: true,
                title: 'Markdown Guide'
            }
        ],
        sideBySideFullscreen: false,
        promptURLs: true,
        placeholder: 'Type here...',
        spellChecker: true,
        nativeSpellcheck: true,
        forceSync: true,
        inputStyle: 'contenteditable'
    })
}
