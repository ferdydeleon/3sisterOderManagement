<script>
    $(document).ready(function() {
        // get price

        $(document).on('change', 'select[id^="product-dropdown"]', function() {
            var product_name = this.value;
            var numberID = this.id.match(/\d+/);
            // alert(numberID);
            $("#price" + numberID).html('');
            $.ajax({
                url: "{{ url('get-product-by-price') }}",
                type: "POST",
                data: {
                    product_name: product_name,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    //  alert(result.states);
                    $.each(result.states, function(key, value) {
                        if (value.quantity < 1) {
                            alert('No Stocks Available')
                            $("#price" + numberID).prop('disabled', true).val('');
                            $("#quantity" + numberID).prop('disabled', true).val(
                            '');
                            $("#total" + numberID).prop('disabled', true).val('');

                        } else {
                            $("#price" + numberID).prop('disabled', false).val(value.selling_price);
                            $("#quantity" + numberID).prop('disabled', false).val(value.quantity);
                            $("#total" + numberID).prop('disabled', false).val(value.quantity * value.selling_price);

                            var sum = 0;
                            $("input[name^='total']").each(function() {
                                sum += parseInt($(this).val(), 10)
                            })
                            $('#grandtotal').val(sum);

                        }

                    });
                }
            });
        });
        // $('#quantity_').on('change', function() {
        //     var Pcs = $(this);
        //     var amount = $('#amount').val();
        //        $("#total").val(parseInt(Pcs.val()) * parseInt(amount));
        // });
        $('#town-dropdown').on('change', function() {
            var town_id = this.value;
            $("#barangay-dropdown").html('');
            $.ajax({
                url: "{{ url('get-barangay-by-id') }}",
                type: "POST",
                data: {
                    town_id: town_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#barangay-dropdown').html('<option value="">Select State</option>');
                    $.each(result.states, function(key, value) {
                        $("#barangay-dropdown").append('<option value="' + value
                            .id + '">' + value.barangay + '</option>');
                    });
                }
            });
        });



        $(document).on('click', '.remove-button', function() {
            $("#Remove-Div_" + $(this).val()).remove();
        });


        $(document).on('change', 'input[id^="quantity"]', function() {
            var numberID = this.id.match(/\d+/);
            var Amount = $('#price' + numberID).val();
            $('#total' + numberID).val(this.value * Amount);
            var grandTotal = $('#total' + numberID).val();

            var sum = 0;
            $("input[name^='total']").each(function() {
                sum += parseInt($(this).val(), 10)
            })
            $('#grandtotal').val(sum);



        });





    });
</script>

</body>

</html>
