 <script>
    function checkfamilia(){
        var valorNumero =$("#numero").val(); 
        var valorClase =$("#clases").val(); 
            jQuery.ajax({ 
                url: 'verificarfamilia.php',
                type: "POST",
                data: {
                    numero: valorNumero,
                    clase: valorClase
                },           
                success: function(data){
                    $("#check-nombre").html(data);
                },
                error:function(){}

            });
        };

        $(document).ready(function(e){
            $("#dep").change(function(){
                var parametros = "id="+$("#dep").val();
                console.log(parametros)
                jQuery.ajax({
                    data: parametros,
                    url: 'ajax_clases.php',
                    type: 'POST',
                    beforeSend: function (){
                        $("#clases").html("En proceso");
                    },
                    success: function (response){
                        $("#clases").html(response);
                    },
                    error:function(){
                        alert("error")
                    }
                });
            })
        })

        $(document).ready(function () {
            $('input#numero')
              .keypress(function (event) {
                if (event.which < 48 || event.which > 57 || this.value.length === 3) {
                  return false;
                }
            });
            $('input#nombre')
              .keypress(function (event) {
                if (this.value.length === 30) {
                  return false;
                }
            });
            $("#dep").change(function(){
                $('select').prop('disabled',false);
            });
            $("#clases").change(function(){
                $('#numero').prop('disabled',false);
            });
        });


    </script>