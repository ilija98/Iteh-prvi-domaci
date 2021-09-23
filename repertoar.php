<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/nastup.php";

$order = '';

$nastup=Nastup::vratiSve($mysqli,$order);

 ?>


<html>
<head>
    <?php
        include('head.php');
    ?>
        <title>Repertoar</title>
</head>

<body>
    <div id="background-img">
    </div>

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="find-form" class="row form-container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

                <div class="table-responsive" id="tabela-nastupa">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th><a class="column_sort" id="naslov" data-order="desc" href="#">Naslov</a></th>
                                <th><a class="column_sort" id="cena" data-order="desc" href="#">Cena</a></th>
                                <th><a class="column_sort" id="trajanje" data-order="desc" href="#">Trajanje</a></th>
                                <th><a class="column_sort" id="datum_izvodjenja" data-order="desc" href="#">Datum izvođenja</a></th>
                                <th>Vrsta nastupa</th>
                                <th>Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($nastup as $nastup):	
                            ?>
                                <tr>
                                    <td><?php echo $nastup->naslov;?></td>
                                    <td><?php echo $nastup->cena;?></td>
                                    <td><?php echo $nastup->trajanje;?></td>
                                    <td><?php echo $nastup->datum_izvodjenja;?></td>
                                    <td><?php echo $nastup->vrsta->naziv_vrste;?></td>
                                    <td><a href="brisanjenastupa.php?id=<?php echo $nastup->id_nastupa;?>">
                                            <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
                                        </a>
                                        <a href="izmenanastupa.php?id=<?php echo $nastup->id_nastupa;?>">
                                            <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
                                        </a>
                                    </td>

                                </tr>
                        
                            <?php endforeach; ?> 
                    
                        </tbody>
                    </table>
                </div>

            <div id="output" >

        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        </div>
        <div class="col-md-2"></div>
    </div>

</body>


</html>
<script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           //glyphicon glyphicon-arrow-up  
           //glyphicon glyphicon-arrow-down  
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
           $.ajax({  
                url:"server/sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#tabela-nastupa').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  

 </script> 