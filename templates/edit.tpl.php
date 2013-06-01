<html>
<head>
    <script data-main="js/apps/editor/main" src="js/lib/require.js"> </script>
	<style type="text/css"> @import url(css/bootstrap/bootstrap.css) </style>
    <style type="text/css"> @import url(css/editor/editor.css) </style>
</head>
<body>
    <form method="post" action="/index.php?act=add">
         <div class="span12 title">
             <input type="text" id="title" name="title" placeholder="請輸入標題"/><br/>
         </div>
		 <div class="row-fluid">
		    <div class="span12">
		         <div class="row-fluid">
		             <div class="span5 offset1">
                         <div class="content">
                             <textarea name="content" id="content" value="" placeholder="請輸入內容"></textarea>
                        </div>
		            </div>
		            <div class="span5">
                        <div id="demo" class=" demo table table-bordered">
		     
                        </div>
		            </div>
		        </div>
		    </div>
		 </div>
         <div class="row-fluid">
		    <div class="span5 offset1">
             <input type="text" id="tag" placeholder="請輸入標籤"/> <br/>
        
             <input type="submit" class="btn btn-large btn-primary" id="button" /> <br/>
        </div>
		 </div>
		 </div>
    </form>
</body>
</html>
