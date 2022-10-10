
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require ('RankPercentileFunctions.php');
        require ('GradingFunctions.php');
        require ('Functions.php');
        require ('CGPACalc.php');
        $conn = getConnection();
        CalcuRankPercentile($conn);
        Grading($conn);
        CalcCGPAAndUpgrd($conn);
        ?>
    </body>
</html>