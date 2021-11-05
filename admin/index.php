<?php include('partials/menu.php'); ?>

    <!--Main Content section start-->
    <div class="main-content">
    <div class ="wrapper">
           <h1> DASHBORD </h1>
            <br><br>
           <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br><br>

           <div class="col-4 text-center">
               <h1>5</h1>
               <br />
               Shops
           </div>

           <div class="col-4 text-center">
               <h1>5</h1>
               <br />
               Shops
           </div>

           <div class="col-4 text-center">
               <h1>5</h1>
               <br />
               Shops
           </div>

           <div class="col-4 text-center">
               <h1>5</h1>
               <br />
               Shops
           </div>
           <div class ="clearfix"></div>
        </div>
        
    </div>
    <!--Main Content section end-->

    <?php include('partials/footer.php'); ?>