import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$('#fileInput').change(function(){

    let reader = new FileReader();
    reader.onload = (e) => {
        $('#preview-images').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);

});
