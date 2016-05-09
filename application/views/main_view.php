<div class="wraper">
    <div id="header">
        <div class="container ">

            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <img src="/img/logo.jpg" alt="logo">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">

<?php  if ( isset($_SESSION['IS_ADMIN']) && $_SESSION['IS_ADMIN'] == 'true') { ?>
    
    <a href="main/logOut"><button  class="header-button btn btn-primary btn-lg active"> log-out</button></a>
    <a href="admin_page"><button class="header-button btn btn-primary btn-lg active"> До адмінки </button></a>
<?php }else { ?>


    <form class="form-inline" action="main/checkLogin" method="POST">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail3">Login</label>
            <input type="text"  name="login" class="form-control" id="exampleInputEmail3" placeholder="Login" required>
        </div>
        <div class="form-group">
            <label class="sr-only" for="exampleInputPassword3">Password</label>
            <input type="password" name="password"  class="form-control" id="exampleInputPassword3" placeholder="Password" required>
        </div>

        <button type="submit" class="header-button btn btn-default">Sign in</button>
    </form>
<?php } ?>
                </div>
            </div>
        </div>
    </div>


    <div id="content">
        <div class="container">
            <div class="row">
            <div class=" col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                

                <form data-toggle="validator" role="form" id="form"  method="post">
                    <div class="form-group">
                        <label for="inputName" class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email"  placeholder="St1p@gmail.com"  required>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Web Site</label>
                        <input type="text" class="form-control" name="website" placeholder="http://24tv.ua/"  >
                    </div>

                    <div class="form-group">
                        <textarea rows="10" cols="45" name="text" placeholder="Text" required></textarea>
                    </div>

                <!--<div class="g-recaptcha" data-sitekey="6LeMWxQTAAAAACOZrlTkG0hHwUxJmeLNmvPlWlem"></div>-->
                    <div class="g-recaptcha" data-sitekey="6Lc0bR8TAAAAAJa-fKRE3uWdZ5PqpStZLcs2DdGQ"></div>
                <div class="form-group main-submit-button">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>


                </div>
            </div>
        </div>

</div>
</div>