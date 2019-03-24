<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Loan Calculator</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/compiled.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        @media print
        {
        .noprint {display:none;}
        }

        @media screen
        {
        ...
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="alertit" class="alert alert-danger text-center z-depth-2" style="display: none;">
            <strong>Fill empty spaces</strong>
            <br>
        </div>
        
        <table class="table wow fadeInLeft" data-wow-delay="0.2s" data-wow-duration="3s">
            <thead class="black white-text">
                <th colspan="7" class="text-center"><h2><strong>LOAN CALCULATOR</strong></h2></th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <!-- The following are buttons to help carryout activities-->
        <center>
            <button class="btn aqua-gradient btn-rounded wow fadeInLeft noprint" data-wow-duration="3s" id="add"><i class="fa fa-plus"></i> Add</button>
            <button class="btn blue-gradient btn-rounded wow fadeInRight noprint" data-wow-duration="3s" id="removeAll"><i class="fa fa-remove"></i> Remove All</button>
            <button class="btn purple-gradient btn-rounded wow fadeInRight noprint" data-wow-duration="3s" id="print" onclick="window.print()" value="print a div!"><i class="fa fa-print"></i> Print</button>
        </center>
        <div class="text-right wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="3s"><strong class="badge badge-dark-green">TOTAL</strong>&nbsp;&nbsp;<b id="tot">0</b></div>
    </div>

    <div class="drag">
        
    </div>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!--Google Maps-->
	
	<!--Animations initialization-->
	<script>
	new WOW().init();
	</script>

        <script>
            $(document).ready(function(){
                var n=0;
                $("#add").click(function(){
                    n++;
                    var tableRow = "<tr class='wow fadeInRight' data-wow-duration='2s' data-wow-delay='0.1s'><td id='sn'>" + n + "</td><td><input type='text' id='prod' placeholder='Product' class='form-control' /></td><td><input type='text' id='amount' placeholder='Amount' class='nums form-control' /></td><td><input type='text' id='qty' placeholder='Quantity' class='nums form-control' /></td><td><input type='text' id='total' name='toti' placeholder='Total' class='form-control' /></td><td><button class='btn btn-outline-info btn-rounded btn-sm noprint' id='edit'><i class='fa fa-edit'></i> EDIT</button></td><td><button class='btn btn-outline-danger btn-sm btn-rounded noprint' id='del'><i class='fa fa-trash'></i></button></td></tr>";
                    
                    if($("tr input:last").val()=="")
                       {
                        $("#alertit").show("fade").delay(2000).hide("slide");
                        $("table").effect("shake","slow");
                    }
                    else{
                        var allTr = document.getElementsByTagName('tr');
                        $("tbody").append(tableRow);
                        for(x=0;x<allTr.length-2;x++){
                            $("tbody tr").eq(x).find("input").attr("disabled", true);
                        }
                        
                    }
                });

                $(document).on("click","#edit",function(){
                    if($("#edit").html() == "DONE"){
                        $(this).closest("tr").find("input").attr("disabled", true);
                        $("#edit").html("EDIT");
                    }else{
                        $(this).closest("tr").find("input").attr("disabled", false);
                        $("#edit").html("DONE");
                    }
                });
                
                $(document).on("click","#del",function(){
                    n--;
                    $(this).closest("tr").nextAll("tr").find("#sn").each(function(){
                      gg=$(this).html();
                      $(this).html(gg-1);
                        
                    });
                    $(this).closest("tr").remove();
                });
                
                $(document).on("keyup","input",function(){
                    var added=0;
                    var first = $(this).closest("tr").find("input").eq(1).val();
                    var second = $(this).closest("tr").find("input").eq(2).val();

                    if(first && second != ""){
                        var addUp = parseInt(first) * parseInt(second);
                    }

                    $(this).closest("tr").find("#total").val(addUp);

                    $("input[name=toti]").each(function(){
                        added = added + parseInt($(this).val());
                    });

                    $("#tot").html(added);

                    var checkit = setTimeout(this);
                });

                $(document).on("click","#removeAll",function(){                   
                    $("tbody tr").remove();
                    $("#tot").html(0);
                    n = 0;

                });
            })
        </script>
</body>

</html>