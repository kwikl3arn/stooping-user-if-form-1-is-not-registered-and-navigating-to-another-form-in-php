<!DOCTYPE HTML>
<html>
<body>
 
    <div class="w3ls-pos">
      
        <div class="w3ls-login box">
            <!-- form starts here -->
            <form action="<?php echo base_url(); ?>Mycontroller/lck" method="post">
                <div class="agile-field-txt">
                    <input type="text" name="uname" id="uname" placeholder="user name" required="" />
                </div>
                <div class="agile-field-txt">
                    <input type="password" name="upass" id="upass" placeholder="******" required="" id="myInput" />

                </div>
                <span style="color:red ;font-family: fantasy"><?php echo $this->session->flashdata('usercheck');  ?></span>
                <div class="w3ls-bot">
                    <input type="submit" value="LOGIN">
                </div>
            </form>
        </div>
 
    </div>
    <!-- scripts required  for particle effect -->
    <script src='<?php echo base_url(); ?>Assets/web/js/particles.min.js'></script>
    <script src="<?php echo base_url(); ?>Assets/web/js/index.js"></script>
    <!-- //scripts required for particle effect -->
</body>

</html> 
