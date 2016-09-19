<html>
<head>
  <title>Audiobook Catalog</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
  <style type="text/css" class="init">
    td.details-control {
      background: url('./img/details_open.png') no-repeat center center;
      cursor: pointer;
    }
    tr.shown td.details-control {
      background: url('./img/details_close.png') no-repeat center center;
    }
    span.tab{
      padding: 0 80px; /* Or desired space*/
    }
  </style>
</head>
<?php include 'header.php'; ?>
<body>
	<br>
	<br>
	<br>
	<br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table id="example" class="display" cellspacing="0" width="100%">
        		<thead>
		            <tr>
        		        <th></th>
                		<th>Title</th>
	                	<th>Series</th>
		                <th>Author</th>
				<th>Tags</th>
	        	    </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th></th>
		                <th>Title</th>
		                <th>Series</th>
		                <th>Author</th>
				<th>Tags</th>
		            </tr>
	        	</tfoot>
		    </table>
		</div>
	</div>
	<script>

function format ( d ) {
    // `d` is the original data object for the row
/*    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Title:</td>'+
            '<td>'+d.Title+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Length:</td>'+
            '<td>'+d.Length+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Description:</td>'+
            '<td>'+d.Description+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Path:</td>'+
            '<td>'+d.Path+'</td>'+
        '</tr>'+
    '</table>';*/
      var tag = d.Tags.split(",");
      var taghtml = "<div class=\"row\"><div class=\"col-md-9 col-md-offset-1\">";
      for (i = 0; i < tag.length; ++i)
      {
        taghtml += "<span class=\"label label-primary\">"+tag[i]+"</span>&nbsp&nbsp&nbsp";
      }
      taghtml += "</div></div>";
	return '<ul><b>Title:\t</b>'+d.Title+'</ul>'+
		'<ul><b>Series:</b>'+d.Series+'</ul>'+
		'<ul><b>Author:</b>'+d.Author+'</ul>'+
		'<ul><b>Length:</b>'+d.Length+'</ul>'+
		'<ul><b>Path:</b>'+d.Path+'</ul>'+
		'<ul><b>Description:</b>'+d.Description+'</ul>'+
		'<ul><b>Tags:</b></ul><br>'+
		taghtml+'<br><br>';
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
        //"ajax": "./objcatalog.txt",
	"ajax": {
		"url": "./objcatalog.txt",
		"dataSrc": "data"
	},
        "columns": [
            {
                "className":      'details-control',
                "orderable":      true,
                "data":           null,
                "defaultContent": '',
            },
            { "data": "Title", "searchable": false },
	    { "data": "Series", "searchable": false },
            { "data": "Author", "searchable": false },
            { "data": "Tags" }
        ],
        "order": [[3, 'asc'], [2, 'asc'], [1,'asc']],
        "paging": false
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );

</script>


</body>
<?php include 'footer.php'; ?> 
</html>
