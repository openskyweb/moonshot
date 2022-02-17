/* Print Styling Added for Columns */
jQuery(document).ready(function($) {
	var all_widths = [];
	$('.fl-col').each(function(index, el) {
		col_width = Math.round($(this).width() / $(this).parent().width() * 100);
		if (col_width != 100) {
			$(this).addClass('print' + col_width);
			all_widths.push(col_width);
		}
	});

	var unique_widths = new Set(all_widths);

	var styles = "";
	unique_widths.forEach(function(width, index) {
		styles += ".fl-col.print"+width+" { width: "+width+"% !important; } "
	});
	
	$( "<style>@media print { "+styles+" }</style>" ).appendTo( "head" );
});
