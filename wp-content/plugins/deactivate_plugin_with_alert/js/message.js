window.onload = function(){
    document.querySelector('[data-slug="my-plugin"] a').addEventListener('click', function(event){
        event.preventDefault()
        var urlRedirect = document.querySelector('[data-slug="my-plugin"] a').getAttribute('href');
        if (confirm('Are you sure want to deactivate the plugin ')) {
            window.location.href = urlRedirect;
        } else {
            console.log('plugin is not deactivated!');
        }
    })
}
