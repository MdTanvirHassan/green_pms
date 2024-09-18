<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">
    <?php require_once 'elements/head.php'; ?>
    <body>
       <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper"> 
            <nav class="navbar header-navbar pcoded-header">
               <?php require_once 'elements/top_menu.php'; ?> 
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                      <?php require_once 'elements/left_menu.php'; ?>  
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            {{CONTENT}}
                        </div>
                    </div>
                </div>
                </div>
        
        
        
                
               
                    
               
        <?php require_once 'elements/footer.php'; ?>
        </div>
        </div>
    </body>
</html>