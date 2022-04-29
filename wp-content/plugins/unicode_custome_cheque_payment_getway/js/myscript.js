jQuery(document).ready(function(){
    jQuery('input[name=image]').on('change', function(){
        alert("hello");
        alert('fd');
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                jQuery('#divid').html('<img src="'+e.target.result+'">');
            }
            console.log(this.files[0]);
            reader.readAsDataURL(this.files[0]);
        }
    });
});