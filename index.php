<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Content 1</h1>
        </div>
        <button id="addmorecontent">Add more content</button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            //clear session storage
            sessionStorage.clear();
            //click #addmorecontent
            $("#addmorecontent").click(function(e) {
                e.preventDefault();
                //session storage
                var count = sessionStorage.getItem("count");
                if (count == null) {
                    count = 1;
                }
                //ajax
                $.ajax({
                    type: "GET",
                    url: "ajax.php",
                    data: {
                        count
                    },
                    dataType: "json",
                    success: function(response) {
                        //update count
                        count = response.count;
                        //update session storage
                        sessionStorage.setItem("count", count);
                        //update content
                        $(".content").append(response.content);
                    }
                });
            });
        });
    </script>
</body>

</html>