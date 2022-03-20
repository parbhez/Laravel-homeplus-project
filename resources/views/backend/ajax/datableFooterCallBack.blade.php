<script type="text/javascript">
	function columnTotalValue(row, data, start, end, api,columnNumber,placementId){
    // Remove the formatting to get integer data for summation
    var intVal = function ( i ) {
        return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
            typeof i === 'number' ?
                i : 0;
    };

    // Total over all pages
    total = api
        .column( columnNumber )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );

    // Total over this page
    pageTotal = api
        .column( columnNumber, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );
	$("#"+placementId).html(pageTotal);
    $("#dataTableCal").append('<span style="display:none" id="'+placementId+'Total">'+total+'</span>');
}
</script>