 <!-- footer start -->
 <footer>
    <div class="container">
       <div class="row">
          <div class="col-md-4">
             <div class="full">
                <div class="logo_footer">


                   <?php
                     $custom_logo_id = get_theme_mod('custom_logo');
                     $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                     if (has_custom_logo()) {
                        echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                     } else {
                        echo '<h1>' . get_bloginfo('name') . '</h1>';
                     } ?>
                </div>
                <div class="information_f">
                   <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                   <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                   <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                </div>
             </div>
          </div>
          <div class="col-md-8">
             <div class="row">
                <div class="col-md-7">
                   <div class="row">
                      <div class="col-md-6">
                         <div class="widget_menu">
                            <h3>Menu</h3>
                            <?php
                              wp_nav_menu(array(
                                 "theme_location" => "footer1"
                              ));
                              ?>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="widget_menu">
                            <h3>Account</h3>
                            <?php
                              wp_nav_menu(array(
                                 "theme_location" => "footer2"
                              ));
                              ?>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-md-5">
                   <div class="widget_menu">
                      <h3>Newsletter</h3>
                      <div class="information_f">
                         <p>Subscribe by our newsletter and get update protidin.</p>
                      </div>
                      <div class="form_sub">
                         <form>
                            <fieldset>
                               <div class="field">
                                  <input type="email" placeholder="Enter Your Mail" name="email" />
                                  <input type="submit" value="Subscribe" />
                               </div>
                            </fieldset>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
 <!-- footer end -->
 <div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
       Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
    </p>
 </div>
 </body>

 </html>