$(document).ready(function(){

    var btnSubmit = $('#btn-form-submit');

    if (btnSubmit.length > 0) {
        btnSubmit.on('click', function(event){
            event.preventDefault();
            
            var self = $(this)
            self.prop("disabled",true);

            var loader = $('#form-loader');
            if(loader.length > 0){
                loader.css('display', 'inline-block');
            }

            var nbrExperience = 0;
            var inputNumber = $('#experience_numberOfThrow');
            if (inputNumber.length > 0){
                nbrExperience = inputNumber.val()
            }

            var data = {number: nbrExperience};
            $.ajax({
                url: "/",
                method: "POST",
                dataType: "json",
                data: data,
            }).done(function(data){
                console.log( data );
                var result = $('#result-experience');
                if(result.length > 0){
                    console.log(data);
                    var text = 'Sur ' + nbrExperience + ' jets, il y a eu ' + data + ' brelant de 6.';
                    result.html(text);
                }
            }).fail( function(data){
                alert('Une erreur est survenue veuillez recommencez.')
            }).always(function(){
                self.prop("disabled",false);
                if(loader.length > 0){
                    loader.css('display', 'none');
                }
            });

        });
    }
});