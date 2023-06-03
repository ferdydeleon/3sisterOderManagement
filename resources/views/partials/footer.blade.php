<script>
    $(document).ready(function() {
        $('#product-dropdown').on('change', function() {
            var product_name = this.value;
           // alert(product_name);
            $("#amount").html('');
            $.ajax({
                url:"{{url('get-product-by-price')}}",
                type: "POST",
                data: {
                    product_name: product_name,
                _token: '{{csrf_token()}}'
                },
                dataType : 'json',
                success: function(result){
                  //  alert(result.states);
                    $.each(result.states,function(key,value){
                        $("#amount").val(value.selling_price);
                    });
                }
            });
        });


    });
    </script>

</body>
</html>
