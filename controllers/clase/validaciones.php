<script>
    $(document).ready(function(e){
        $("#dep").change(function(){
        $('#numero').prop('disabled',false);
        })
    })

    function checknumero(){
        var valorDep = $("#dep").val();
        var valorNumero =$("#numero").val(); 
            jQuery.ajax({ 
                url: '../controllers/clase/verificarclase.php',
                type: "POST",
                data: {
                    dep: valorDep,
                    numero: valorNumero
                },           
                success: function(data){
                    $("#check-numero").html(data);
                },
                error:function(){}

            });
        };

    function checknombre(){
        var valorNumero =$("#numero").val(); 
        var valorNombre =$("#nombre").val(); 
            jQuery.ajax({ 
                url: '../controllers/clase/verificarnombre.php',
                type: "POST",
                data: {
                    numero: valorNumero,
                    nombre: valorNombre
                },           
                success: function(data){
                    $("#check-nombre").html(data);
                },
                error:function(){}

            });
        };

    $(document).ready(function () {
        $('input#numero')
            .keypress(function (event) {
            if (event.which < 48 || event.which > 57 || this.value.length === 2) {
                return false;
            }
        });
        $('input#nombre')
            .keypress(function (event) {
            if (this.value.length === 30) {
                return false;
            }
        });
    });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>