<?php
$this->load->view('admin/_partial/header');
$this->load->view('admin/_partial/top');
$this->load->view('admin/_partial/menu_sidebar');
$this->load->get_section('sidebar');
$this->load->get_section('theme-switcher');
echo $output;
$this->load->view('admin/_partial/footer');
?>