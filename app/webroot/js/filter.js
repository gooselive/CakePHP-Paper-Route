    jQuery.fn.filterByText = function(textbox, selectSingleMatch) {
        return this.each(function() {
            var select = this;
            var options = [];
            $(select).find('option').each(function() {
                options.push({value: $(this).val(), text: $(this).text()});
            });
            $(select).data('options', options);
            $(textbox).bind('change keyup', function() {
                var options = $(select).empty().data('options');
                var search = $.trim($(this).val());
                var regex = new RegExp(search,"gi");
              
                $.each(options, function(i) {
                    var option = options[i];
                    if(option.text.match(regex) !== null) {
                        $(select).append(
                           $('<option>').text(option.text).val(option.value)
                        );
                    }
                });
                if (selectSingleMatch === true && $(select).children().length === 1) {
                    $(select).children().get(0).selected = true;
                }
            });            
        });
    };

    $(function() {
		// Single item views
        $('#AddressId').filterByText($('#addressbox'), true);
		$('#DirectionId').filterByText($('#directionbox'), true);
		// Multiple item views
        $('#AddressId0').filterByText($('#addressbox0'), true);
        $('#AddressId1').filterByText($('#addressbox1'), true);
        $('#AddressId2').filterByText($('#addressbox2'), true);
        $('#AddressId3').filterByText($('#addressbox3'), true);
        $('#AddressId4').filterByText($('#addressbox4'), true);
        $('#AddressId5').filterByText($('#addressbox5'), true);
        $('#AddressId6').filterByText($('#addressbox6'), true);
        $('#AddressId7').filterByText($('#addressbox7'), true);
        $('#AddressId8').filterByText($('#addressbox8'), true);
        $('#AddressId9').filterByText($('#addressbox9'), true);
		$('#DirectionId0').filterByText($('#directionbox0'), true);
        $('#DirectionId1').filterByText($('#directionbox1'), true);
        $('#DirectionId2').filterByText($('#directionbox2'), true);
        $('#DirectionId3').filterByText($('#directionbox3'), true);
        $('#DirectionId4').filterByText($('#directionbox4'), true);
        $('#DirectionId5').filterByText($('#directionbox5'), true);
        $('#DirectionId6').filterByText($('#directionbox6'), true);
        $('#DirectionId7').filterByText($('#directionbox7'), true);
        $('#DirectionId8').filterByText($('#directionbox8'), true);
        $('#DirectionId9').filterByText($('#directionbox9'), true);
    });  
