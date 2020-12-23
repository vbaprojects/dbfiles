
include this

<link rel="stylesheet" id="bs-stylesheet" href="lib/abalert/bs3.css">
<link rel="stylesheet" href="lib/abalert/bundled.css">
<link rel="stylesheet" type="text/css" href="lib/abalert/jquery-confirm.css"/>


after write

//////////////////////////////////////////////////
 ?>              <script src="plugins/alert/bundled.js"></script>
	             <script type="text/javascript" src="plugins/alert/jquery-confirm.js"></script>
	             <script type="text/javascript">
                            $.confirm({
								title: 'Sorry!',
								content: 'EXCEL format is inappropriate...Please try with correct one !',
								buttons: {
									ok : function () {}				
								},
                                icon: 'fa fa-frown-o',
                                theme: 'material',
                                closeIcon: true,
                                animation: 'zoom',
                                closeAnimation: 'scale',
                                type: 'orange',
                            });
	            </script>
	<?php
/////////////////////////////////////////////////////////	