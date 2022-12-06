 <script>

        function checksku(){
            jQuery.ajax({
                url: "../controllers/articulo/verificarsku.php",
                data: 'sku='+$("#sku").val(),
                type: "POST",
                success: function(data){
                    $("#check-sku").html(data);
                },
                error:function(){}

            });
        };


    function checkstock(){
        var valorStock =$("#stock").val(); 
        var valorCantidad =$("#cantidad").val(); 
            jQuery.ajax({ 
                url: '../controllers/articulo/verificarstock.php',
                type: "POST",
                data: {
                    stock: valorStock,
                    cantidad: valorCantidad
                },           
                success: function(data){
                    $("#check-stock").html(data);
                },
                error:function(){}

            });
        };

    
        $(document).ready(function(e){
            $("#dep").change(function(){
                var parametros = "id="+$("#dep").val();
                jQuery.ajax({
                    data: parametros,
                    url: '../controllers/articulo/ajax_clases.php',
                    type: 'POST',
                    success: function (response){
                        $("#clases").html(response);
                    },
                    error:function(){
                        alert("error")
                    }
                });
            })
            $("#clases").change(function(){
                var parametros = "clase="+$("#clases").val();
                console.log(parametros);
                jQuery.ajax({
                    data: parametros,
                    url: '../controllers/articulo/ajax_familias.php',
                    type: 'POST',
                    success: function (response){
                        $("#familias").html(response);
                    },
                    error:function(){
                        alert("error")
                    }
                });
            })

            $('input#sku').keypress(function (event) {
                if (event.which < 48 || event.which > 57 || this.value.length === 6) {
                  return false;
                }
            });
            $('input#nombre').keypress(function (event) {
                if (this.value.length === 15) {
                  return false;
                }
            });
            $('input#marca').keypress(function (event) {
                if (this.value.length === 15) {
                  return false;
                }
            });
            $('input#modelo').keypress(function (event) {
                if (this.value.length === 20) {
                  return false;
                }
            });
            $('input#stock').keypress(function (event) {
                if (event.which < 48 || event.which > 57 || this.value.length === 9) {
                  return false;
                }
            });
            $('input#cantidad').keypress(function (event) {
                if (event.which < 48 || event.which > 57 || this.value.length === 9) {
                  return false;
                }
            });

        });

    </script>