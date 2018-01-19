<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Review</title>
</head>

<body>
    <?php
        function aboutMe($aboutMe){
            $ret = "";
            $ret .= "<ul>";
            foreach($aboutMe as $i => $i_val){
                if($i != "myName"){
                    $ret .=  "<li>" . $i . " : " . $i_val . "</li>";
                }
            }
            $ret .= "</ul>";
            return $ret;
        }

        include './includes/header.php';

        $aboutMe = array(
            "myName" => "Quinn McPhail",
            "favColor" => "Blue",
            "favMovie" => "John Wick",
            "favBook" => "Discipline Equals Freedom: Field Manual by Jocko Willink",
            "favWebsite" => "http://www.reddit.com"
        );

        echo "<h1>",$aboutMe["myName"],"</h1>";

        echo aboutMe($aboutMe);

        include './includes/footer.php';
    ?>
</body>

</html>