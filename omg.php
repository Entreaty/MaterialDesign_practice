<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    function funcBefore(){
        $("#information").text ("ожидание данных...");
    }
    function funcSuccess(data){
        $("#information").text (data);
    }
    $(document).ready (function(){
        $("#load").bind("click", function(){
            $.ajax({
                url:"content.php",
                type:"POST",
                data:({name:"admin",number:"5"}),
                datatype:"html",
                beforeSend:funcBefore,
                success:funcSuccess
            });
        });
        });
</script>
</head>
<body>



<div class="xernya">
    <p id="load" style="cursor:pointer">Загрузить данные</p>
    <div id="information"></div>
</div>
</body>