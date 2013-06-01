<html>
<head>
    <script data-main="js/apps/editor/main" src="js/lib/require.js"> </script>
    <style type="text/css"> @import url(css/bootstrap/bootstrap.css) </style>
    <style type="text/css"> @import url(css/editor/editor.css) </style>
</head>
<body>
    <form method="post" action="/index.php?act=add">
         <div class="title">
             <h3> title : </h3>
             <input type="text" id="title" name="title" /><br/>
         </div>
         <div class="content">
             <h3> content :</h3></br>
             <textarea name="content" id="content" value=""></textarea>
         </div>
         <div id="demo" class="demo">
         </div>
         <div class=tag>
             <input type="text" name="tag" /> <br/>
         </div>
         <div class="submit">
             <input type="submit" /> <br/>
         </div>
    </form>
</body>
</html>
