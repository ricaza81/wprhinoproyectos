jQuery(document).ready(function(){
	jQuery(".datepicker").datepicker({
	    dateFormat: "dd MM, yy",
	    onSelect: function(dateText, inst) {
            var dateArr = dateText.split(' ');
            var suffix = "";
            switch(inst.selectedDay) {
                case '1': case '21': case '31': suffix = 'st'; break;
                case '2': case '22': suffix = 'nd'; break;
                case '3': case '23': suffix = 'rd'; break;
                default: suffix = 'th';
            }

            jQuery(".datepicker").val(dateArr[0] + suffix +' '+ dateArr[1] + ' '+ dateArr[2] );
    }
	});
});