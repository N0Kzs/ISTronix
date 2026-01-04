<?php 
    function dateWording($ndate){
        global $monthWord;
        switch ($ndate){
            case 1:
                $monthWord = 'January';
                break;
            case 2:
                $monthWord = 'Febuary';
                break;
            case 3:
                $monthWord = 'March';
                break;
            case 4:
                $monthWord = 'April';
                break;
            case 5:
                $monthWord = 'May';
                break;
            case 6:
                $monthWord = 'June';
                break; 
            case 7:
                $monthWord = 'July';
                break;
            case 8:
                $monthWord = 'August';
                break;
            case 9:
                $monthWord = 'September';
                break;
            case 10:
                $monthWord = 'October';
                break;
            case 11:
                $monthWord = 'November';
                break;
            case 12:
                $monthWord = 'October';
                break;
        }
    }
    function dropaccname($naccidd){
        include('../connections/db.php');
        global $jaccname;
        $sqlchecks = "SELECT * FROM chartofacc";
        //$ncheckSQL = "SELECT * FROM pokemon WHERE pName = '$ncheck' ";
        $sqlcheckResultsz = $conn->query($sqlchecks);
        while($rowcheckz = $sqlcheckResultsz->fetch_assoc()){
            if($naccidd == $rowcheckz['acc_id'] ){
                $jaccname = $rowcheckz['acc_name'];
            }
        }
    }
    function genjaddcheck($naddcheck){
        include('../connections/db.php');
        global $jcoaid;
        $sqlcheck = "SELECT * FROM chartofacc";
        //$ncheckSQL = "SELECT * FROM pokemon WHERE pName = '$ncheck' ";
        $sqlcheckResults = $conn->query($sqlcheck);
        while($rowcheck = $sqlcheckResults->fetch_assoc()){
            if($naddcheck == $rowcheck['acc_name'] ){
                $jcoaid = $rowcheck['acc_id'];
            }
        }
    }
    function injaddcheck($naccname, $ngenamount){
        include('../connections/db.php');

        global $j_id;
        $a_id;

        $jSQL = "SELECT * FROM journal";
        $aSQL = "SELECT * FROM chartofacc";

        $jResults = $conn->query($jSQL);
        $aResults = $conn->query($aSQL);

        while($arow = $aResults->fetch_assoc()){//$naccname == $rowcheck['acc_name']
            if($naccname == $arow['acc_name'] ){
                $a_id = True;
            } 
        }
        while($jrow = $jResults->fetch_assoc()){
            if($ngenamount == $jrow['genJ_amount']){
                if($a_id == True){
                    $j_id = $jrow['genJ_id'];
                }  
            }
        }
    }
    function ingaddcheck($chartaddcheck){
        include('../connections/db.php');
        global $inname;

        $chartsqlcheck = "SELECT * FROM chartofacc";
        $chartgenjsqlcheckResults = $conn->query($chartsqlcheck);
        while($rowcheck = $chartgenjsqlcheckResults->fetch_assoc()){
            if($chartaddcheck == $rowcheck['acc_name'] ){
                $inname = $rowcheck['acc_id'];
            }
        }
    }

    function admincheck($nadmincheck){
        include('../connections/db.php');
        global $accAdmin;
        $sqlcheck = "SELECT * FROM admintb";
        //$ncheckSQL = "SELECT * FROM pokemon WHERE pName = '$ncheck' ";
        $sqlcheckResults = $conn->query($sqlcheck);
        while($rowcheck = $sqlcheckResults->fetch_assoc()){
            if($nadmincheck == $rowcheck['admin_lastName'] ){
                $accAdmin = $rowcheck['admin_id'];
            }
        }
    }
?>