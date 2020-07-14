<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!--<script src="functions.js"></script>-->
        <title>My Web Note</title>
    </head>
    <body>
        <div id="header">
            <p style="font-weight: bold;">Shared Note by PHP</p>
        </div>
        <?php
            try {
                $filecontent = file_get_contents('note.txt');  //@file_get_contents() to suppress the Warning
                if ($filecontent === FALSE){
                    throw new Exception("There is no note.txt");
                }
            } catch (Exception $e){
                fopen("note.txt", 'w+');
                echo "Exception Message: note.txt is created in the directory";
            }
        ?>
        <div id="container">
            <form target="_self" action = "action.php" method = "post">
                Type here: <br>
                <textarea style="resize:both" name="content" rows="20" cols="50"> <?php 
                    echo htmlentities($filecontent)
                ?>
                </textarea>
                <input type="submit" value="submit" />
            </form>
        </div>
        Refresh after every submit!
        <button id="refresh">refresh</button>
        <script>// refresh to keep display in syn // should be automated 
            document.getElementById("refresh").onclick = function() {refreshFunc()};
            function refreshFunc() {
               location.reload();
            }
        </script>
        <br>
        <br>
        Latest Note: 
        <?php
             echo $_POST["content"];
        ?> 
        <br>
        <div class="footer">
            <p id= "datetime"></p>
            <script>
                document.getElementById("datetime").innerHTML = new Date();
            </script>
        </div>
    </body>
</html>
