$(document).ready(function() {
    // get price
    $('#product-dropdown').on('change', function() {
        var product_name = this.value;
        // alert(product_name);
        $("#amount").html('');
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
                    $("#amount").val(value.selling_price);
                   // $("#quantity").val(value.quantity);
                });
            }
        });
    });


    // get barangay
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

});
