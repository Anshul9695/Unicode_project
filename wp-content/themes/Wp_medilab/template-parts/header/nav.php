<?php

/**
 *template header nav .
 *
 *@package Wpunicode
 */
?>
<nav id="navbar" class="navbar order-last order-lg-0">
                   <?php
                  wp_nav_menu(array(
                     "theme_location" => "primary",
                     'add_li_class'=>'nav-link scrollto'
                  ));
                  ?>
        <!-- <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul> -->
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->